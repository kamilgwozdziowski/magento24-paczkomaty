<?php

namespace MylSoft\Baner\Controller\Adminhtml\Baner;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use MylSoft\Baner\Model\Baner\ImageUploader;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var ImageUploader
     */
    protected $imageUploader;

    /**
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param ImageUploader $imageUploader
     */
    public function __construct(
        Context $context,
        DataPersistorInterface $dataPersistor,
        ImageUploader $imageUploader
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $id = $this->getRequest()->getParam('id');

            if (empty($data['id'])) {
                $data['id'] = null;
            }

            $imageName = '';
            if (!empty($data['image'])) {
                $imageName = $data['image'][0]['name'];
                $data['image'] = $imageName;
            }

            /** @var \MylSoft\Baner\Model\Baner $model */
            $model = $this->_objectManager->create('MylSoft\Baner\Model\Baner')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This baner no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            $model->setData($data);

            try {
                $model->save();
                if ($imageName) {
                    $this->imageUploader->moveFileFromTmp($imageName);
                }
                $this->messageManager->addSuccess(__('You saved the baner.'));
                $this->dataPersistor->clear('mylsoft_baner');

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the baner.'));
            }

            $this->dataPersistor->set('mylsoft_baner', $data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        return $resultRedirect->setPath('*/');
    }

    /**
     * Authorization level of a basic admin session
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('MylSoft_Baner::baner_update') || $this->_authorization->isAllowed('MylSoft_Baner::baner_create');
    }
}

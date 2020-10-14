<?php
namespace MylSoft\Baner\Controller\Adminhtml\Baner;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * Delete Banner
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        // check if we know what should be deleted
        $banerId = (int)$this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($banerId && (int) $banerId > 0) {
            try {
                $model = $this->_objectManager->create('MylSoft\Baner\Model\Baner');
                $model->load($banerId);
                $model->delete();
                $this->messageManager->addSuccess(__('The Baner has been deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to the question grid
                return $resultRedirect->setPath('*/*/index');
            }
        }
        // display error message
        $this->messageManager->addError(__('Baner doesn\'t exist any longer.'));
        // go to the question grid
        return $resultRedirect->setPath('*/*/index');
    }

    /**
     * Determines whether current user is allowed to access Action
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return true;
    }
}

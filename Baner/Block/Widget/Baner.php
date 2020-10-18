<?php

namespace MylSoft\Baner\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Baner extends \Magento\Framework\View\Element\Template implements BlockInterface
{
    /**
     * @var string template
     */
    protected $_template = "widget/baner.phtml";

    /**
     * @var \MylSoft\Baner\Model\BanerFactory
     */
    protected $banerFactory;

    /**
     * Baner constructor.
     * @param Template\Context $context
     * @param \MylSoft\Baner\Model\BanerFactory $banerFactory
     */
    public function __construct(Template\Context $context, \MylSoft\Baner\Model\BanerFactory $banerFactory, array $data = [])
    {
        $this->banerFactory = $banerFactory;
        parent::__construct($context, $data = []);
    }

    public function getBaner()
    {
        $groupId = (int)$this->getGroupId();
        $collectionBaner = $this->banerFactory->create()->getCollection()
            ->addFieldToFilter('group_id', $groupId)
            ->addFieldToFilter('status', \MylSoft\Baner\Model\Baner::STATUS_ENABLED)
            ->setOrder('main_table.order', 'ASC');
        return $collectionBaner;
    }
}

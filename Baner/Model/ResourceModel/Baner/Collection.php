<?php


namespace MylSoft\Baner\Model\ResourceModel\Baner;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\MylSoft\Baner\Model\Baner::class, \MylSoft\Baner\Model\ResourceModel\Baner::class);
    }
}

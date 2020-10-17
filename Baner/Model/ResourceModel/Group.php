<?php

namespace MylSoft\Baner\Model\ResourceModel;

class Group extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('mylsoft_baner_slider_group', 'id');
    }
}

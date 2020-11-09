<?php

namespace MylSoft\MyApi\Model\ResourceModel;

class Attribute extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('mylsoft_myapi_product_attribute', 'id');
    }
}

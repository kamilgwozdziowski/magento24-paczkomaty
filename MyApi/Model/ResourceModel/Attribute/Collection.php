<?php

namespace MylSoft\MyApi\Model\ResourceModel\Attribute;

use MylSoft\MyApi\Model\Attribute;
use MylSoft\MyApi\Model\ResourceModel\Attribute as AttributeResource;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    public function _construct()
    {
        $this->_init(Attribute::class, AttributeResource::class);
    }
}

<?php

namespace MylSoft\MyApi\Model;

use MylSoft\MyApi\Model\ResourceModel\Attribute as AttributeResource;

class Attribute extends \Magento\Framework\Model\AbstractModel
{

    public function _construct()
    {
        $this->_init(AttributeResource::class);
    }
}

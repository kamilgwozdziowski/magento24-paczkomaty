<?php

namespace MylSoft\MyApi\Model;

use MylSoft\MyApi\Api\Data\CustomDataInterface;

class CustomData extends \Magento\Framework\Model\AbstractModel implements CustomDataInterface
{
    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name)
    {
        return $this->setData(self::SKU, $name);
    }

    /**
     * @inheritDoc
     */
    public function getSku()
    {
        return $this->getData(self::SKU);
    }

    /**
     * @inheritDoc
     */
    public function setSku(string $sku)
    {
        return $this->setSku(self::SKU, $sku);
    }
}

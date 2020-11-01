<?php

namespace MylSoft\StockAttribute\Model\Attribute\Backend;

class Stock extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    /**
     * Validate
     * @param \Magento\Catalog\Model\Product $object
     * @return bool
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function validate($object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        if ($value == 'us') {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('You can not set US.')
            );
        }
        return true;
    }
}

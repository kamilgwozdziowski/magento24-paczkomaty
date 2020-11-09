<?php


namespace MylSoft\MyApi\Model;

use MylSoft\MyApi\Api\Data\CustomExtensionAttributeExtensionInterface;

class CustomExtensionAttribute extends \Magento\Framework\Api\AbstractExtensibleObject implements \MylSoft\MyApi\Api\Data\CustomExtensionAttributeInterface
{
    const PRODUCT_ID = 'product_id';

    const ATTRIBUTE = 'attribute';

    /**
     * @inheritDoc
     */
    public function getProductId()
    {
        return $this->_get(self::PRODUCT_ID);
    }

    /**
     * @inheritDoc
     */
    public function setProductId($id)
    {
        return $this->setData(self::PRODUCT_ID, $id);
    }

    /**
     * @inheritDoc
     */
    public function getAttribute()
    {
        return $this->_get(self::ATTRIBUTE);
    }

    /**
     * @inheritDoc
     */
    public function setAttribute($attribute)
    {
        $this->setData(self::ATTRIBUTE, $attribute);
    }

    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(CustomExtensionAttributeExtensionInterface $customExtensionAttribute)
    {
        return $this->_setExtensionAttributes($customExtensionAttribute);
    }
}

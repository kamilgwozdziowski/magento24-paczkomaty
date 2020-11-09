<?php

namespace MylSoft\MyApi\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface CustomExtensionAttributeInterface extends ExtensibleDataInterface
{
    /**
     * @return mixed
     */
    public function getProductId();

    /**
     * @param $id
     * @return mixed
     */
    public function setProductId($id);

    /**
     * @return mixed
     */
    public function getAttribute();

    /**
     * @param $name
     * @return mixed
     */
    public function setAttribute($name);

    /**
     * @return \MylSoft\MyApi\Api\Data\CustomExtensionAttributeExtensionInterface
     */
    public function getExtensionAttributes();

    /**
     * @param \MylSoft\MyApi\Api\Data\CustomExtensionAttributeExtensionInterface $customExtensionAttribute
     * @return $this
     */
    public function setExtensionAttributes(\MylSoft\MyApi\Api\Data\CustomExtensionAttributeExtensionInterface $customExtensionAttribute);

}

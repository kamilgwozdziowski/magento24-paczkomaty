<?php

namespace MylSoft\MyApi\Model;

use Magento\Framework\EntityManager\Operation\ExtensionInterface;

class ReadHandler implements ExtensionInterface
{
    /**
     * @var ResourceModel\CustomExtensionData
     */
    private $customExtensionData;

    /**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    private $dataObjectHelper;

    /**
     * @var \MylSoft\MyApi\Api\Data\CustomExtensionAttributeInterfaceFactory
     */
    private $customExtensionAttributeFactory;

    /**
     * ReadHandler constructor.
     * @param \MylSoft\MyApi\Api\Data\CustomExtensionAttributeInterfaceFactory $customExtensionAttributeFactory
     * @param ResourceModel\CustomExtensionData $customExtensionData
     * @param \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
     */
    public function __construct(
        \MylSoft\MyApi\Api\Data\CustomExtensionAttributeInterfaceFactory $customExtensionAttributeFactory,
        \MylSoft\MyApi\Model\ResourceModel\CustomExtensionData $customExtensionData,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper
    )
    {
        $this->customExtensionAttributeFactory = $customExtensionAttributeFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->customExtensionData = $customExtensionData;
    }

    /**
     * @param object $entity
     * @param array $arguments
     * @return bool|object
     */
    public function execute($entity, $arguments = [])
    {
        $customeExstensionData = [];
        foreach ($this->customExtensionData->getCustomTableData() as $data) {
            $customeExtensionFactory = $this->customExtensionAttributeFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $customeExtensionFactory,
                $data,
                \MylSoft\MyApi\Api\Data\CustomExtensionAttributeInterface::class
            );
            $customeExstensionData[] = $customeExtensionFactory;
        }

        $extensionAttribute = $entity->getExtensionAttributes();
        $extensionAttribute->setCustomDataFromPool(!empty($customeExstensionData) ? $customeExstensionData : nunll);
        $entity->setExtensionAttributes($extensionAttribute);

        return $entity;
    }
}

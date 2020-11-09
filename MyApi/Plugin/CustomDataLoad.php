<?php

namespace MylSoft\MyApi\Plugin;

class CustomDataLoad
{
    /**
     * @var \Magento\Catalog\Api\Data\ProductExtensionFactory
     */
    private $extensionFactory;

    /**
     * CustomDataLoad constructor.
     * @param \Magento\Catalog\Api\Data\ProductExtensionFactory $extensionFactory
     */
    public function __construct(\Magento\Catalog\Api\Data\ProductExtensionFactory $extensionFactory)
    {
        $this->extensionFactory = $extensionFactory;
    }

    /**
     * @param \Magento\Catalog\Api\Data\ProductInterface $entity
     * @param \Magento\Catalog\Api\Data\ProductExtensionInterface|null $extension
     * @return \Magento\Catalog\Api\Data\ProductExtension|\Magento\Catalog\Api\Data\ProductExtensionInterface|null
     */
    public function afterGetExtensionAttributes(
        \Magento\Catalog\Api\Data\ProductInterface $entity,
        \Magento\Catalog\Api\Data\ProductExtensionInterface $extension = null
    )
    {
        if ($extension == null) {
            $extension = $this->extensionFactory->create();
        }

        return $extension;
    }

    public function afterGetList(
        \Magento\Catalog\Api\ProductRepositoryInterface $subject,
        \Magento\Framework\Api\SearchResultsInterface $searchCriteria
    )
    {
        $products = [];
        foreach ($searchCriteria->getItems() as $entity) {
            $customData = "My custom data";
            $extensionAttributes = $entity->getExtensionAttributes();
            $extensionAttributes->setCustomDataStaticValue($customData);
            $entity->setExtensionAttributes($extensionAttributes);

            $products[] = $entity;
        }

        $searchCriteria->setItems($products);
        return $searchCriteria;
    }


}

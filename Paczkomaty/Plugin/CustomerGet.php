<?php

namespace MylSoft\Paczkomaty\Plugin;

class CustomerGet
{
    public function afterGet(
        \Magento\Customer\Api\CustomerRepositoryInterface $subject,
        \Magento\Customer\Api\Data\CustomerInterface $resultCustomer
    ) {
        $resultCustomer = $this->getPaczkomatAttribute($resultCustomer);

        return $resultCustomer;
    }

    private function getPaczkomatAttribute(\Magento\Customer\Api\Data\CustomerInterface $customer)
    {

        try {
            // The actual implementation of the repository is omitted
            // but it is where you would load your value from the database (or any other persistent storage)
            $foomanAttributeValue = $this->foomanExampleRepository->get($order->getEntityId());
        } catch (NoSuchEntityException $e) {
            return $order;
        }

        $extensionAttributes = $order->getExtensionAttributes();
        $orderExtension = $extensionAttributes ? $extensionAttributes : $this->orderExtensionFactory->create();
        $foomanAttribute = $this->foomanAttributeFactory->create();
        $foomanAttribute->setValue($foomanAttributeValue);
        $orderExtension->setFoomanAttribute($foomanAttribute);
        $order->setExtensionAttributes($orderExtension);

        return $order;
    }
}

<?php

namespace MylSoft\Paczkomaty\Plugin;

class CustomerSave
{
    public function afterSave(
        \Magento\Customer\Api\CustomerRepositoryInterface $subject,
        \Magento\Customer\Api\Data\CustomerInterface $resultCustomer)
    {
        return $this->savePaczkomatAttribiute($resultCustomer);
    }

    public function savePaczkomatAttribiute(\Magento\Customer\Api\Data\CustomerInterface $customer)
    {
        $extensionAttribiutes = $customer->getExtensionAttributes();
        if(
            null !== $extensionAttribiutes &&
            null !== $extensionAttribiutes->getPaczkomatAttribute()
        ) {
            $paczkomatAttribiuteValue = $extensionAttribiutes->getPaczkomatAttribiute()->getValue();
            return $customer;
        }
    }
}

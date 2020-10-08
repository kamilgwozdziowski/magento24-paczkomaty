<?php

namespace MylSoft\Paczkomaty\Plugin;

class CheckoutAttributesUpdater
{
    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject, $jsLayout)
    {

        $customAttributeCode = 'paczkomat';
        $customField = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress.paczkomaty',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
            ],
            'dataScope' => 'shippingAddress.paczkomaty' . '.' . $customAttributeCode,
            'label' => 'Selected Paczkomat',
            'provider' => 'checkoutProvider',
            'sortOrder' => 100,
            'validation' => [
                'required-entry' => true
            ],
            'options' => [],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
            'value' => ''
        ];

        /* @TODO: do usuniecia cała klasa zostawiam bo moze sie przydac zeby cos podpaczec  */
        //$jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children'][$customAttributeCode] = $customField;
        return $jsLayout;
    }
}

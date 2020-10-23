<?php

namespace MylSoft\Paczkomaty\Plugin\Checkout\Block;

class LayoutProcessor
{
    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject, $jsLayout)
    {

        /*        $customAttributeCode = 'paczkomat';
                $customField = [
                    'component' => 'Magento_Ui/js/form/element/abstract',
                    'config' => [
                        'customScope' => 'shippingAddress.custom_attributes',
                        'customEntry' => null,
                        'template' => 'ui/form/field',
                        'elementTmpl' => 'ui/form/element/input',
                    ],
                    'dataScope' => 'shippingAddress.custom_attributes' . '.' . $customAttributeCode,
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

                $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children'][$customAttributeCode] = $customField;
                */

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shippingAdditional'] = [
            'component' => 'uiComponent',
            'displayArea' => 'shippingAdditional',
            'children' => [
                'paczkomat' => [
                    'component' => 'Magento_Ui/js/form/element/abstract',
                    'config' => [
                        'customScope' => 'paczkomat',
                        'template' => 'ui/form/field',
                        'elementTmpl' => 'ui/form/element/input',
                        'options' => [],
                        'id' => 'paczkomat'
                    ],
                    'dataScope' => 'paczkomat',
                    'label' => 'Paczkomat',
                    'provider' => 'checkoutProvider',
                    'visible' => true,
                    'validation' => [],
                    'sortOrder' => 20,
                    'id' => 'paczkomat'
                ]
            ]];

        return $jsLayout;
    }
}

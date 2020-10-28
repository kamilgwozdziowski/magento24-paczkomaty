<?php

namespace MylSoft\CheckoutStep\Block;

use Magento\Checkout\Block\Checkout\AttributeMerger;
use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;
use Magento\Customer\Model\AttributeMetadataDataProvider;
use Magento\Eav\Api\Data\AttributeInterface;
use Magento\Ui\Component\Form\AttributeMapper;

class LayoutProcessor implements LayoutProcessorInterface
{
    /**
     * @var AttributeMerger
     */
    private $_merger;

    /**
     * @var AttributeMapper
     */

    private $_attribiuteMapper;
    /**
     * @var AttributeMetadataDataProvider
     */
    private $_attributeMetadataDataProvider;

    /**
     * LayoutProcessor constructor.
     * @param AttributeMapper $attributeMapper
     * @param AttributeMetadataDataProvider $metadataDataProvider
     * @param AttributeMerger $merger
     */
    public function __construct(
        AttributeMapper $attributeMapper,
        AttributeMetadataDataProvider $metadataDataProvider,
        AttributeMerger $merger
    )
    {
        $this->_attribiuteMapper = $attributeMapper;
        $this->_attributeMetadataDataProvider = $metadataDataProvider;
        $this->_merger = $this->_merger;
    }

    /**
     * @param array $jsLayout
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function process($jsLayout)
    {
        $elements = $this->getAddressAttributes();
        $fields = &$jsLayout['components']['checkout']['children']['steps']['children']['contact-step']['children']
        ['contact']['children']['contact-fieldset']['children'];

        $fieldCodes = array_keys($fields);
        $elements = array_filter($elements, function ($keys) use ($fieldCodes) {
            return in_array($keys, $fieldCodes);
        }, ARRAY_FILTER_USE_KEY);


        $fields = $this->_merger->merge(
            $elements,
            'checkoutProvider',
            'contact',
            $fields
        );


        return $jsLayout;
    }

    /**
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function getAddressAttributes(): array
    {
        /** @var AttributeInterface[] $attribiutes */
        $attribiutes = $this->_attributeMetadataDataProvider->loadAttributesCollection(
            'customer_address',
            'customer_register_address'
        );

        $elements = [];
        foreach ($attribiutes as $attribiute) {
            $code = $attribiute->getAttributeCode();
            $elements[$code] = $this->_attribiuteMapper->map($attribiute);
            if (isset($elements[$code]['label'])) {
                $label = $elements[$code]['label'];
                $elements[$code] = __($label);
            }
        }

        return $elements;
    }
}

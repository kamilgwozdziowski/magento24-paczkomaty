<?php

namespace MylSoft\Paczkomaty\Setup;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Model\Config;
use Magento\Customer\Model\Customer;

class InstallData implements InstallDataInterface
{
    const CUSTOMER_ATTRIBUTE_CODE = 'custom';

    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory, Config $eavConfig)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY,
            'paczkomat',
            [
                'type' => 'varchar',
                'label' => 'Default paczkomat for user',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'position' => 999,
                'system' => 0,
            ]
        );
        $sampleAttribute = $this->eavConfig->getAttribute(Customer::ENTITY, 'paczkomat');

        $sampleAttribute->setData(
            'used_in_forms',
            ['adminhtml_customer']

        );
        $sampleAttribute->save();

        $eavSetup->addAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::CUSTOMER_ATTRIBUTE_CODE,
            [
                'label' => 'Customer',
                'input' => 'text',
                'visible' => true,
                'required' => false,
                'position' => 150,
                'sort_order' => 150,
                'system' => false
            ]
        );

        $customerAttribute = $this->eavConfig->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::CUSTOMER_ATTRIBUTE_CODE
        );

        $customerAttribute->setData(
            'used_in_forms',
            ['adminhtml_customer_address', 'customer_address_edit', 'customer_register_address']
        );

        $customerAttribute->save();

        $setup->endSetup();
    }
}

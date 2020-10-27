<?php

namespace MylSoft\Custom\Plugin\Block\Address;

use Magento\Framework\View\LayoutInterface;

class Edit
{
    /**
     * @var LayoutInterface
     */
    private $_layout;

    /**
     * Edit constructor.
     * @param LayoutInterface $layout
     */
    public function __construct(LayoutInterface $layout)
    {
        $this->_layout = $layout;
    }

    /**
     * @param \Magento\Customer\Block\Address\Edit $edit
     * @param $result
     * @return mixed
     */
    public function afterGetNameBlockHtml(
        \Magento\Customer\Block\Address\Edit $edit,
        $result)
    {
        $customBlock = $this->_layout->createBlock(
            'MylSoft\Custom\Block\Address\Form\Edit\Custom',
            'mylsoft_custom_attribiute');
        return $result . $customBlock->toHtml();

    }
}

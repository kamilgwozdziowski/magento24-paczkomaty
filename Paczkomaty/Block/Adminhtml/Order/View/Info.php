<?php

namespace MylSoft\Paczkomaty\Block\Adminhtml\Order\View;

use Magento\Shipping\Helper\Data as ShippingHelper;
use Magento\Tax\Helper\Data as TaxHelper;
use Magento\Quote\Model\QuoteFactory;

class Info extends \Magento\Sales\Block\Adminhtml\Order\AbstractOrder
{
    /**
     * @var QuoteFactory
     */
    private $_quoteFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Sales\Helper\Admin $adminHelper,
        QuoteFactory $quoteFactory,
        array $data = [],
        ShippingHelper $shippingHelper = null, TaxHelper $taxHelper = null)
    {
        $this->_quoteFactory = $quoteFactory;
        parent::__construct($context, $registry, $adminHelper, $data, $shippingHelper, $taxHelper);
    }

    /**
     * @return string
     */
    public function getPaczkomatCode(): string
    {
        $quoteId = $this->getOrder()->getQuoteId();
        // @TODO: do poprawy load()
        $quote = $this->_quoteFactory->create()->load($quoteId);
        return (string)$quote->getPaczkomat();
    }
}

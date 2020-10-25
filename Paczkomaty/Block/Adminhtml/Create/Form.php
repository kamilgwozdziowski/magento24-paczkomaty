<?php

namespace MylSoft\Paczkomaty\Block\Adminhtml\Create;

use Magento\Quote\Model\QuoteFactory;
use Magento\Tax\Helper\Data as TaxHelper;

class Form extends \Magento\Shipping\Block\Adminhtml\Create\Form
{
    /**
     * @var QuoteFactory
     */
    private $_quoteFactory;

    /**
     * Form constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Sales\Helper\Admin $adminHelper
     * @param QuoteFactory $quoteFactory
     * @param array $data
     * @param TaxHelper|null $taxHelper
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Sales\Helper\Admin $adminHelper,
        QuoteFactory $quoteFactory,
        array $data = [],
        TaxHelper $taxHelper = null)
    {
        $this->_quoteFactory = $quoteFactory;
        parent::__construct($context, $registry, $adminHelper, $data, $taxHelper);
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


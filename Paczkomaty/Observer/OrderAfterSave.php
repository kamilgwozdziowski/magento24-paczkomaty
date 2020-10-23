<?php

namespace MylSoft\Paczkomaty\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class OrderAfterSave implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    private $_logger;

    /**
     * OrderAfterSave constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->_logger->debug('OrderAfterSaveObserver3');
        $order = $observer->getEvent()->getOrder();
        $this->_logger->debug($order->getId());
        return false;
    }
}

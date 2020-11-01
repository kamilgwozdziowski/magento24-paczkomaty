<?php


namespace MylSoft\StockAttribute\Model\Attribute\Source;


class Stock extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = [
                ['label' => __('PL'), 'value' => 'pl'],
                ['label' => __('EU'), 'value' => 'eu'],
                ['label' => __('US'), 'value' => 'us'],
                ['label' => __('CH'), 'value' => 'ch'],
            ];
        }
        return $this->_options;
    }
}

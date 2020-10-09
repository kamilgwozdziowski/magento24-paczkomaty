<?php

namespace MylSoft\Baner\Model\Baner\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Status
 */
class Status implements OptionSourceInterface
{
    /**
     * @var \MylSoft\Baner\Model\Baner`
     */
    protected $baner;

    /**
     * Constructor
     *
     * @param \MylSoft\Baner\Model\Baner $baner
     */
    public function __construct(\MylSoft\Baner\Model\Baner $baner)
    {
        $this->baner = $baner;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->baner->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}


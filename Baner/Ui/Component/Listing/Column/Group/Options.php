<?php

namespace MylSoft\Baner\Ui\Component\Listing\Column\Group;

use Magento\Framework\Escaper;
use Magento\Framework\Data\OptionSourceInterface;
use MylSoft\Baner\Model\GroupFactory as BanerGroupFactory;

/**
 * Class Options
 */
class Options implements OptionSourceInterface
{
    /**
     * Escaper
     *
     * @var Escaper
     */
    protected $escaper;

    /**
     * @var BanerGroupFactory
     */
    protected $banerGroupFactory;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var array
     */
    protected $currentOptions = [];

    /**
     * Constructor
     *
     * @param BanerGroupFactory $systemStore
     * @param Escaper $escaper
     */
    public function __construct(BanerGroupFactory $banerGroupFactory, Escaper $escaper)
    {
        $this->banerGroupFactory = $banerGroupFactory;
        $this->escaper = $escaper;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        if ($this->options !== null) {
            return $this->options;
        }

        $this->options = $this->getAvailableGroups();

        return $this->options;
    }

    /**
     * Prepare groups
     *
     * @return array
     */
    private function getAvailableGroups()
    {
        $collection = $this->banerGroupFactory->create()->getCollection();
        $result = [];
        $result[] = ['value' => ' ', 'label' => 'Select...'];
        foreach ($collection as $group) {
            $result[] = ['value' => $group->getId(), 'label' => $this->escaper->escapeHtml($group->getName())];
        }
        return $result;
    }
}

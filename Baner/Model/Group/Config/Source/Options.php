<?php
/**
 * GiaPhuGroup Co., Ltd.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GiaPhuGroup.com license that is
 * available through the world-wide-web at this URL:
 * https://www.giaphugroup.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category     MylSoft
 * @package      MylSoft_BanerSlider
 * @copyright   Copyright (c) 2018-2019 GiaPhuGroup Co., Ltd. All rights reserved. (http://www.giaphugroup.com/)
 * @license     https://www.giaphugroup.com/LICENSE.txt
 */

namespace MylSoft\Baner\Model\Group\Config\Source;

use Magento\Framework\Escaper;
use MylSoft\Baner\Model\GroupFactory as BanerGroupFactory;

class Options implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @var BanerGroupFactory
     */
    protected $banerGroupFactory;

    /**
     * Escaper
     *
     * @var Escaper
     */
    protected $escaper;

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
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return $this->getAvailableGroups();
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

<?php

namespace MylSoft\Baner\Model;

class Baner extends \Magento\Framework\Model\AbstractModel
{

    /**#@+
     * Baner Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    /**#@-*/

    /**
     * Baner cache tag
     */
    const CACHE_TAG = 'mylsoft_baner_slider';

    /**
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    //protected $_eventPrefix = 'mylsoft_baner_slider';

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\MylSoft\Baner\Model\ResourceModel\Baner::class);
    }

    /**
     * Prepare page's statuses, available.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
}

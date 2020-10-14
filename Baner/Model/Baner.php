<?php

namespace MylSoft\Baner\Model;

use MylSoft\Baner\Model\Baner\FileInfo;
use Magento\Framework\App\ObjectManager;
use Magento\Store\Model\StoreManagerInterface;

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
     * Store manager
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    //protected $_eventPrefix = 'mylsoft_baner';

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

    /**
     * Retrieve the Image URL
     *
     * @param string $imageName
     * @return bool|string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getImageUrl($imageName = null)
    {
        $url = '';
        $image = $imageName;
        if (!$image) {
            $image = $this->getData('image');
        }
        if ($image) {
            if (is_string($image)) {
                $url = $this->_getStoreManager()->getStore()->getBaseUrl(
                        \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                    ).FileInfo::ENTITY_MEDIA_PATH .'/'. $image;
            } else {
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('Something went wrong while getting the image url.')
                );
            }
        }
        return $url;
    }

    /**
     * Get StoreManagerInterface instance
     *
     * @return StoreManagerInterface
     */
    private function _getStoreManager()
    {
        if ($this->_storeManager === null) {
            $this->_storeManager = ObjectManager::getInstance()->get(StoreManagerInterface::class);
        }
        return $this->_storeManager;
    }
}

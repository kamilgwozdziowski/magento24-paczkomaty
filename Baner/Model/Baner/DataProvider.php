<?php

namespace MylSoft\Baner\Model\Baner;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use MylSoft\Baner\Model\ResourceModel\Baner\CollectionFactory;
use MylSoft\Baner\Model\Baner\FileInfo;
use Magento\Framework\Filesystem;
use Magento\Framework\App\ObjectManager;
/**
 * Class DataProvider
 */
class DataProvider extends \Magento\Ui\DataProvider\ModifierPoolDataProvider
{
    /**
     * @var \MylSoft\Baner\Model\ResourceModel\Block\Collection
     */
    protected $collection;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @var Filesystem
     */
    private $fileInfo;

    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $banerCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     * @param PoolInterface|null $pool
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $banerCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null
    ) {
        $this->collection = $banerCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var \MylSoft\Baner\Model\Block $baner */
        foreach ($items as $baner) {
            $baner = $this->convertValues($baner);
            $this->loadedData[$baner->getId()] = $baner->getData();
        }

        $data = $this->dataPersistor->get('mylsoft_baner');
        if (!empty($data)) {
            $baner = $this->collection->getNewEmptyItem();
            $baner->setData($data);
            $this->loadedData[$baner->getId()] = $baner->getData();
            $this->dataPersistor->clear('mylsoft_baner');
        }

        return $this->loadedData;
    }

    /**
     * Converts image data to acceptable for rendering format
     *
     * @param \MylSoft\Baner\Model\Baner $baner
     * @return \MylSoft\Baner\Model\Baner $baner
     */
    private function convertValues($baner)
    {
        $fileName = $baner->getImage();
        $image = [];
        if ($this->getFileInfo()->isExist($fileName)) {
            $stat = $this->getFileInfo()->getStat($fileName);
            $mime = $this->getFileInfo()->getMimeType($fileName);
            $image[0]['name'] = $fileName;
            $image[0]['url'] = $baner->getImageUrl();
            $image[0]['size'] = isset($stat) ? $stat['size'] : 0;
            $image[0]['type'] = $mime;
        }
        $baner->setImage($image);

        return $baner;
    }

    /**
     * Get FileInfo instance
     *
     * @return FileInfo
     *
     * @deprecated 101.1.0
     */
    private function getFileInfo()
    {
        if ($this->fileInfo === null) {
            $this->fileInfo = ObjectManager::getInstance()->get(FileInfo::class);
        }
        return $this->fileInfo;
    }
}

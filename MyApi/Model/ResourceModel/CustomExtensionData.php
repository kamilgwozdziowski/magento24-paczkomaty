<?php


namespace MylSoft\MyApi\Model\ResourceModel;

use Magento\Framework\App\ResourceConnection;

class CustomExtensionData
{
    const TABLE_NAME = 'mylsoft_myapi_product_attribute';

    /**
     * @var ResourceConnection
     */
    private $resourceConnection;

    /**
     * CustomExtensionData constructor.
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(
        ResourceConnection $resourceConnection
    )
    {
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * @return array
     */
    public function getCustomTableData()
    {
        $connection = $this->resourceConnection->getConnection();
        $select = $connection->select();
        $select->from(self::TABLE_NAME, ['product_id', 'attribute']);
        $result = $connection->fetchAll($select);

        return $result;
    }
}

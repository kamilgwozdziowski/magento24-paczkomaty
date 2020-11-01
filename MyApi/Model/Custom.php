<?php

namespace MylSoft\MyApi\Model;

use MylSoft\MyApi\Api\CustomInterface;
use MylSoft\MyApi\Api\MylSoft;

class Custom implements CustomInterface
{

    /**
     * @var \Magento\Catalog\Model\Product
     */
    protected $product;

    /**
     * Custom constructor.
     * @param \Magento\Catalog\Model\Product $product
     */
    public function __construct(
        \Magento\Catalog\Model\Product $product
    )
    {
        $this->product = $product;
    }

    /**
     * @inheritDoc
     */
    public function custom()
    {
        echo 'getCustom()';
        exit;
    }

    /**
     * @inheritDoc
     */
    public function getNamePost(string $name)
    {
        echo 'getNamePost() => ' . $name;
    }

    /**
     * @inheritDoc
     */
    public function getName(string $name)
    {
        echo 'getName() => ' . $name;
    }

    /**
     * @inheridoc
     */
    public function getProductById(int $id)
    {
        return $this->product->load($id);
    }
}

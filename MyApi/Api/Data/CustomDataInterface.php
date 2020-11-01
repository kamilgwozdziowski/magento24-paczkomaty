<?php

namespace MylSoft\MyApi\Api\Data;

interface CustomDataInterface
{

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getSku();

    /**
     * @param string $sku
     * @return void
     */
    public function setSku(string $sku);
}

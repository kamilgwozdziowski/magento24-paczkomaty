<?php

namespace MylSoft\MyApi\Api;

interface CustomInterface
{
    /**
     * @return string
     */
    public function custom();

    /**
     * @param string $name
     * @return string
     */
    public function getNamePost(string $name);

    /**
     * @param string $name
     * @return string
     */
    public function getName(string $name);

    /**
     * @param int $id
     * @return \MylSoft\MyApi\Api\Data\CustomDataInterface
     */
    public function getProductById(int $id);
}

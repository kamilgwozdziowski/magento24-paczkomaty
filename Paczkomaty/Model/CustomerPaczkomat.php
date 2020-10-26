<?php

namespace MylSoft\Paczkomaty\Model;

use MylSoft\Paczkomaty\Api\Data\nulll;

class CustomerPaczkomat implements \MylSoft\Paczkomaty\Api\Data\CustomerPaczkomatInterface
{
    /**
     * @return string|null
     */
    public function getValue()
    {
        return $this->getData(self::VALUE);
    }

    /**
     * @param nulll|string $value
     * @return CustomerPaczkomat|void
     */
    public function setValue($value)
    {
        return $this->setValue(self::VALUE, $value);
    }
}

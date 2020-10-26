<?php

namespace MylSoft\Paczkomaty\Api\Data;

interface CustomerPaczkomatInterface
{
    const VALUE = 'paczkomat';

    /**
     * Return value
     * @return string|null
     */
    public function getValue();

    /**
     * Set value
     * @param string|nulll $value
     * @return $this
     */
    public function setValue($value);
}

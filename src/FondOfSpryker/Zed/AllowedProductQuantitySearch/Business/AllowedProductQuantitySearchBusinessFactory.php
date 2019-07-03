<?php

namespace FondOfSpryker\Zed\AllowedProductQuantitySearch\Business;

use FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\Model\AllowedProductQuantitySearchWriter;
use FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\Model\AllowedProductQuantitySearchWriterInterface;

class AllowedProductQuantitySearchBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\Model\AllowedProductQuantitySearchWriterInterface
     */
    public function createAllowedProductQuantitySearchWriter(): AllowedProductQuantitySearchWriterInterface
    {
        return new AllowedProductQuantitySearchWriter();
    }
}

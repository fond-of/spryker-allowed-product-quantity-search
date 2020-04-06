<?php

namespace FondOfSpryker\Zed\AllowedProductQuantitySearch\Business;

use FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\Model\AllowedProductQuantitySearchWriter;
use FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\Model\AllowedProductQuantitySearchWriterInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\AllowedProductQuantitySearchConfig getConfig()
 */
class AllowedProductQuantitySearchBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\Model\AllowedProductQuantitySearchWriterInterface
     */
    public function createAllowedProductQuantitySearchWriter(): AllowedProductQuantitySearchWriterInterface
    {
        return new AllowedProductQuantitySearchWriter();
    }
}

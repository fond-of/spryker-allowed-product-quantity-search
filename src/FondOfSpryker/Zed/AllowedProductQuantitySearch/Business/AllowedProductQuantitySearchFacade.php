<?php

namespace FondOfSpryker\Zed\AllowedProductQuantitySearch\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\AllowedProductQuantitySearchBusinessFactory getFactory()
 */
class AllowedProductQuantitySearchFacade extends AbstractFacade implements AllowedProductQuantitySearchFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array $allowedProductQuantityIds
     *
     * @return void
     */
    public function publish(array $allowedProductQuantityIds): void
    {
        $this->getFactory()->createAllowedProductQuantitySearchWriter()->publish($allowedProductQuantityIds);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array $allowedProductQuantityIds
     *
     * @return void
     */
    public function unpublish(array $allowedProductQuantityIds): void
    {
        $this->getFactory()->createAllowedProductQuantitySearchWriter()->unpublish($allowedProductQuantityIds);
    }
}

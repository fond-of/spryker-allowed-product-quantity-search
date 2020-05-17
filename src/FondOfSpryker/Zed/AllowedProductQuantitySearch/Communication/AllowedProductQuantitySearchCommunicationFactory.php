<?php

namespace FondOfSpryker\Zed\AllowedProductQuantitySearch\Communication;

use FondOfSpryker\Zed\AllowedProductQuantitySearch\AllowedProductQuantitySearchDependencyProvider;
use FondOfSpryker\Zed\AllowedProductQuantitySearch\Dependency\Facade\AllowedProductQuantitySearchToAllowedProductQuantityFacadeInterface;
use FondOfSpryker\Zed\AllowedProductQuantitySearch\Dependency\Facade\AllowedProductQuantitySearchToEventBehaviorFacadeInterface;
use FondOfSpryker\Zed\AllowedProductQuantitySearch\Dependency\Facade\AllowedProductQuantitySearchToProductPageSearchFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

/**
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\AllowedProductQuantitySearchConfig getConfig()
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\AllowedProductQuantitySearchFacadeInterface getFacade()
 */
class AllowedProductQuantitySearchCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantitySearch\Dependency\Facade\AllowedProductQuantitySearchToAllowedProductQuantityFacadeInterface
     */
    public function getAllowedProductQuantityFacade(): AllowedProductQuantitySearchToAllowedProductQuantityFacadeInterface
    {
        return $this->getProvidedDependency(AllowedProductQuantitySearchDependencyProvider::FACADE_ALLOWED_PRODUCT_QUANTITY);
    }

    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantitySearch\Dependency\Facade\AllowedProductQuantitySearchToEventBehaviorFacadeInterface
     */
    public function getEventBehaviorFacade(): AllowedProductQuantitySearchToEventBehaviorFacadeInterface
    {
        return $this->getProvidedDependency(AllowedProductQuantitySearchDependencyProvider::FACADE_EVENT_BEHAVIOR);
    }

    /**
     * @return \FondOfSpryker\Zed\AllowedProductQuantitySearch\Dependency\Facade\AllowedProductQuantitySearchToProductPageSearchFacadeInterface
     */
    public function getProductPageSearchFacade(): AllowedProductQuantitySearchToProductPageSearchFacadeInterface
    {
        return $this->getProvidedDependency(AllowedProductQuantitySearchDependencyProvider::FACADE_PRODUCT_PAGE_SEARCH);
    }
}

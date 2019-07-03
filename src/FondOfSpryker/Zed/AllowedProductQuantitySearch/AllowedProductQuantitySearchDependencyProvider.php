<?php

namespace FondOfSpryker\Zed\AllowedProductQuantitySearch;

use FondOfSpryker\Zed\AllowedProductQuantitySearch\Dependency\Facade\AllowedProductQuantitySearchToAllowedProductQuantityFacadeBridge;
use FondOfSpryker\Zed\AllowedProductQuantitySearch\Dependency\Facade\AllowedProductQuantitySearchToEventBehaviorFacadeBridge;
use FondOfSpryker\Zed\AllowedProductQuantitySearch\Dependency\Facade\AllowedProductQuantitySearchToProductPageSearchFacadeBridge;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AllowedProductQuantitySearchDependencyProvider extends AbstractBundleDependencyProvider
{
    public const FACADE_ALLOWED_PRODUCT_QUANTITY = 'FACADE_ALLOWED_PRODUCT_QUANTITY';
    public const FACADE_EVENT_BEHAVIOR = 'FACADE_EVENT_BEHAVIOR';
    public const FACADE_PRODUCT_PAGE_SEARCH = 'FACADE_PRODUCT_PAGE_SEARCH';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addAllowedProductQuantityFacade($container);
        $container = $this->addEventBehaviorFacade($container);
        $container = $this->addProductPageSearchFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addAllowedProductQuantityFacade(Container $container): Container
    {
        $container[static::FACADE_ALLOWED_PRODUCT_QUANTITY] = function (Container $container) {
            return new AllowedProductQuantitySearchToAllowedProductQuantityFacadeBridge(
                $container->getLocator()->allowedProductQuantity()->facade()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addEventBehaviorFacade(Container $container): Container
    {
        $container[static::FACADE_EVENT_BEHAVIOR] = function (Container $container) {
            return new AllowedProductQuantitySearchToEventBehaviorFacadeBridge(
                $container->getLocator()->eventBehavior()->facade()
            );
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductPageSearchFacade(Container $container): Container
    {
        $container[static::FACADE_PRODUCT_PAGE_SEARCH] = function (Container $container) {
            return new AllowedProductQuantitySearchToProductPageSearchFacadeBridge(
                $container->getLocator()->productPageSearch()->facade()
            );
        };

        return $container;
    }
}

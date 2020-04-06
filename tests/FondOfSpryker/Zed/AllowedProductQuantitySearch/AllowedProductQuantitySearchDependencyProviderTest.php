<?php

namespace FondOfSpryker\Zed\AllowedProductQuantitySearch;

use Codeception\Test\Unit;
use Spryker\Zed\Kernel\Container;

class AllowedProductQuantitySearchDependencyProviderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\AllowedProductQuantitySearch\AllowedProductQuantitySearchDependencyProvider
     */
    protected $allowedProductQuantitySearchDependencyProvider;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @return void
     */
    protected function _before()
    {
        parent::_before();

        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->allowedProductQuantitySearchDependencyProvider = new AllowedProductQuantitySearchDependencyProvider();
    }

    /**
     * @return void
     */
    public function testProvideCommunicationLayerDependencies()
    {
        $this->assertInstanceOf(
            Container::class,
            $this->allowedProductQuantitySearchDependencyProvider->provideCommunicationLayerDependencies(
                $this->containerMock
            )
        );
    }
}

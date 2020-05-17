<?php

namespace FondOfSpryker\Zed\AllowedProductQuantitySearch\Communication\Plugin\Event\Listener;

use FondOfSpryker\Zed\AllowedProductQuantitySearch\AllowedProductQuantitySearchConfig;
use Orm\Zed\AllowedProductQuantity\Persistence\Map\FosAllowedProductQuantityTableMap;
use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PropelOrm\Business\Transaction\DatabaseTransactionHandlerTrait;

/**
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\AllowedProductQuantitySearchConfig getConfig()
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\Communication\AllowedProductQuantitySearchCommunicationFactory getFactory()
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\AllowedProductQuantitySearchFacadeInterface getFacade()
 */
class AllowedProductQuantitySearchListener extends AbstractPlugin implements EventBulkHandlerInterface
{
    use DatabaseTransactionHandlerTrait;

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface[] $transfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $transfers, $eventName): void
    {
        $this->preventTransaction();
        $productAbstractIds = $this->getFactory()->getEventBehaviorFacade()
            ->getEventTransferForeignKeys(
                $transfers,
                FosAllowedProductQuantityTableMap::COL_FK_PRODUCT_ABSTRACT
            );

        $this->getFactory()->getProductPageSearchFacade()
            ->refresh(
                $productAbstractIds,
                [AllowedProductQuantitySearchConfig::PLUGIN_PRODUCT_ALLOWED_QUANTITY_PAGE_DATA]
            );
    }
}

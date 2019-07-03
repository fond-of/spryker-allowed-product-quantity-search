<?php

namespace FondOfSpryker\Zed\AllowedProductQuantitySearch\Communication\Plugin\Event\Subscriber;

use FondOfSpryker\Zed\AllowedProductQuantity\Dependency\AllowedProductQuantityEvents;
use FondOfSpryker\Zed\AllowedProductQuantitySearch\Communication\Plugin\Event\Listener\AllowedProductQuantitySearchListener;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\AllowedProductQuantitySearchConfig getConfig()
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\AllowedProductQuantitySearchFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\Communication\AllowedProductQuantitySearchCommunicationFactory getFactory()
 */
class AllowedProductQuantitySearchEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @api
     *
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return \Spryker\Zed\Event\Dependency\EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection): EventCollectionInterface
    {
        $this->addAllowedProductQuantityCreateSearchListener($eventCollection);
        $this->addAllowedProductQuantityUpdateSearchListener($eventCollection);
        $this->addAllowedProductQuantityDeleteSearchListener($eventCollection);

        return $eventCollection;
    }

    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return void
     */
    protected function addAllowedProductQuantityCreateSearchListener(
        EventCollectionInterface $eventCollection
    ): void {
        $eventCollection->addListenerQueued(
            AllowedProductQuantityEvents::ENTITY_FOS_ALLOWED_PRODUCT_QUANTITY_CREATE,
            new AllowedProductQuantitySearchListener()
        );
    }

    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return void
     */
    protected function addAllowedProductQuantityUpdateSearchListener(
        EventCollectionInterface $eventCollection
    ): void {
        $eventCollection->addListenerQueued(
            AllowedProductQuantityEvents::ENTITY_FOS_ALLOWED_PRODUCT_QUANTITY_UPDATE,
            new AllowedProductQuantitySearchListener()
        );
    }

    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return void
     */
    protected function addAllowedProductQuantityDeleteSearchListener(
        EventCollectionInterface $eventCollection
    ): void {
        $eventCollection->addListenerQueued(
            AllowedProductQuantityEvents::ENTITY_FOS_ALLOWED_PRODUCT_QUANTITY_DELETE,
            new AllowedProductQuantitySearchListener()
        );
    }
}

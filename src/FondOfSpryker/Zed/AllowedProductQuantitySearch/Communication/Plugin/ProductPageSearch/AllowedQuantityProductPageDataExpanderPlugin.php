<?php

namespace FondOfSpryker\Zed\AllowedProductQuantitySearch\Communication\Plugin\ProductPageSearch;

use Generated\Shared\Transfer\AllowedProductQuantityTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageDataExpanderInterface;

/**
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\Communication\AllowedProductQuantitySearchCommunicationFactory getFactory()
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\AllowedProductQuantitySearchConfig getConfig()
 * @method \FondOfSpryker\Zed\AllowedProductQuantitySearch\Business\AllowedProductQuantitySearchFacadeInterface getFacade()
 */
class AllowedQuantityProductPageDataExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderInterface
{
    /**
     * {@inheritdoc}
     *
     * @param array $productData
     * @param \Generated\Shared\Transfer\ProductPageSearchTransfer $productAbstractPageSearchTransfer
     *
     * @return void
     * @api
     *
     */
    public function expandProductPageData(
        array $productData,
        ProductPageSearchTransfer $productAbstractPageSearchTransfer
    ): void {
        $idProductAbstract = $productAbstractPageSearchTransfer->getIdProductAbstract();

        if ($idProductAbstract === null) {
            return;
        }

        $productAbstractTransfer = (new ProductAbstractTransfer())->setIdProductAbstract($idProductAbstract);

         $allowedProductQuantityResponseTransfer = $this->getFactory()->getAllowedProductQuantityFacade()
            ->findProductAbstractAllowedQuantity($productAbstractTransfer);

        if ($allowedProductQuantityResponseTransfer->getIsSuccessful() === false) {
            return;
        }

        $allowedProductQuantityTransfer = $allowedProductQuantityResponseTransfer->getAllowedProductQuantityTransfer();

        if ($allowedProductQuantityTransfer === null) {
            return;
        }

        $productAbstractPageSearchTransfer->setAllowedQuantity(
            $this->mapAllowedProductQuantityTransferToAllowedQuantityArray($allowedProductQuantityTransfer)
        );
    }

    /**
     * @param \Generated\Shared\Transfer\AllowedProductQuantityTransfer $allowedProductQuantityTransfer
     *
     * @return array
     */
    protected function mapAllowedProductQuantityTransferToAllowedQuantityArray(
        AllowedProductQuantityTransfer $allowedProductQuantityTransfer
    ): array {
        $allowedQuantityArray = $allowedProductQuantityTransfer->toArray();

        if (array_key_exists('id_allowed_product_quantity', $allowedQuantityArray)) {
            unset($allowedQuantityArray['id_allowed_product_quantity']);
        }

        if (array_key_exists('id_product_abstract', $allowedQuantityArray)) {
            unset($allowedQuantityArray['id_product_abstract']);
        }

        return $allowedQuantityArray;
    }
}

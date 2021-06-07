<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class Order implements ModelInterface
{
    /** @var OrderRecipient */
    private $orderRecipient;
    /** @var OrderProduct[] */
    private $orderProducts;

    /**
     * @param OrderRecipient $orderRecipient
     *
     * @return Order
     */
    public function setOrderRecipient(OrderRecipient $orderRecipient)
    {
        $this->orderRecipient = $orderRecipient;

        return $this;
    }

    /**
     * @return OrderRecipient
     */
    public function getOrderRecipient()
    {
        return $this->orderRecipient;
    }

    /**
     * @param OrderProduct $orderProduct
     *
     * @return Order
     */
    public function addOrderProduct(OrderProduct $orderProduct)
    {
        $this->orderProducts[] = $orderProduct;

        return $this;
    }

    /**
     * @param OrderProduct[] $orderProducts
     *
     * @return Order
     */
    public function setOrderProducts(array $orderProducts)
    {
        $this->orderProducts = [];

        foreach ($orderProducts as $orderProduct) {
            $this->addOrderProduct($orderProduct);
        }

        return $this;
    }

    /**
     * @return OrderProduct[]
     */
    public function getOrderProducts()
    {
        return $this->orderProducts;
    }

    public function toArray()
    {
        return [
            'recipient'      => $this->getOrderRecipient()->toArray(),
            'order_products' => array_map(function(OrderProduct $p) { return $p->toArray(); }, $this->orderProducts),
        ];
    }
}

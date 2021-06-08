<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class Order implements ModelInterface
{
    /** @var int */
    private $id;
    /** @var string */
    private $status;
    /** @var OrderRecipient */
    private $orderRecipient;
    /** @var OrderProduct[] */
    private $orderProducts;

    public function __construct(array $data = [])
    {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }

        if (isset($data['status'])) {
            $this->setStatus($data['status']);
        }

        if (isset($data['recipient'])) {
            $this->setOrderRecipient(new OrderRecipient($data['recipient']));
        }

        if (isset($data['order_products'])) {
            $this->orderProducts = [];

            foreach ($data['order_products'] as $product) {
                $this->addOrderProduct(new OrderProduct($product));
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

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

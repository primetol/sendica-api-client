<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class Order implements ModelInterface
{
    /** @var int */
    private $id;
    /** @var string */
    private $refId;
    /** @var string */
    private $status;
    /** @var OrderRecipient */
    private $orderRecipient;
    /** @var OrderProduct[] */
    private $orderProducts;
    /** @var Shipment[] */
    private $shipments;

    public function __construct(array $data = [])
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }

        if (isset($data['ref_id'])) {
            $this->refId = $data['ref_id'];
        }

        if (isset($data['status'])) {
            $this->status = $data['status'];
        }

        if (isset($data['recipient'])) {
            $this->orderRecipient = new OrderRecipient($data['recipient']);
        }

        if (isset($data['order_products'])) {
            $this->orderProducts = [];

            foreach ($data['order_products'] as $product) {
                $this->orderProducts[] = new OrderProduct($product);
            }
        }

        if (isset($data['shipments'])) {
            $this->shipments = [];

            foreach ($data['shipments'] as $shipment) {
                $this->shipments[] = new Shipment($shipment);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setRefId($refId)
    {
        $this->refId = $refId;

        return $this;
    }

    public function getRefId()
    {
        return $this->refId;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setOrderRecipient(OrderRecipient $orderRecipient)
    {
        $this->orderRecipient = $orderRecipient;

        return $this;
    }

    public function getOrderRecipient()
    {
        return $this->orderRecipient;
    }

    public function addOrderProduct(OrderProduct $orderProduct)
    {
        $this->orderProducts[] = $orderProduct;

        return $this;
    }

    public function setOrderProducts(array $orderProducts)
    {
        $this->orderProducts = [];

        foreach ($orderProducts as $orderProduct) {
            $this->addOrderProduct($orderProduct);
        }

        return $this;
    }

    public function getOrderProducts()
    {
        return $this->orderProducts;
    }

    public function toArray()
    {
        return [
            'refId'          => $this->getRefId(),
            'recipient'      => $this->orderRecipient ? $this->orderRecipient->toArray() : null,
            'order_products' => array_map(function(OrderProduct $p) {return $p->toArray();}, $this->orderProducts),
            'shipments'      => array_map(function(Shipment $s) {return $s->toArray();}, $this->shipments),
        ];
    }
}

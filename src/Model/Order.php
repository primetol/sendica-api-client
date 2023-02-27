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
    /** @var string */
    private $parcelLabel;
    /** @var string */
    private $trackingNumber;

    /**
     * @param array $data
     */
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

        if (isset($data['parcel_label'])) {
            $this->parcelLabel = $data['parcel_label'];
        }

        if (isset($data['tracking_number'])) {
            $this->trackingNumber = $data['tracking_number'];
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

    public function addShipment(Shipment $shipment)
    {
        $this->shipments[] = $shipment;

        return $this;
    }

    public function setShipments($shipments)
    {
        foreach ($shipments as $shipment) {
            $this->addShipment($shipment);
        }

        return $this;
    }

    public function getShipments()
    {
        return $this->shipments;
    }

    public function setParcelLabel($parcelLabel)
    {
        $this->parcelLabel = $parcelLabel;

        return $this;
    }

    public function getParcelLabel()
    {
        return $this->parcelLabel;
    }

    public function setTrackingNumber($trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    public function toArray()
    {
        return [
            'ref_id'          => $this->getRefId(),
            'recipient'       => $this->orderRecipient ? $this->orderRecipient->toArray() : null,
            'order_products'  => array_map(function(OrderProduct $p) {return $p->toArray();}, $this->orderProducts),
            'shipments'       => array_map(function(Shipment $s) {return $s->toArray();}, $this->shipments),
            'parcel_label'    => $this->getParcelLabel(),
            'tracking_number' => $this->getTrackingNumber(),
        ];
    }
}

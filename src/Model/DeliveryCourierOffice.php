<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class DeliveryCourierOffice implements ModelInterface
{
    /** @var string */
    private $courierOfficeId;
    /** @var string */
    private $shippingCourier;

    public function __construct(array $data = [])
    {
        if (isset($data['courier_office_id'])) {
            $this->courierOfficeId = $data['courier_office_id'];
        }

        if (isset($data['shipping_courier'])) {
            $this->shippingCourier = $data['shipping_courier'];
        }
    }

    public function setCourierOfficeId($courierOfficeId)
    {
        $this->courierOfficeId = $courierOfficeId;

        return $this;
    }

    public function getCourierOfficeId()
    {
        return $this->courierOfficeId;
    }


    public function getShippingCourier()
    {
        return $this->shippingCourier;
    }

    public function setShippingCourier($shippingCourier)
    {
        $this->shippingCourier = $shippingCourier;

        return $this;
    }

    public function toArray()
    {
        return [
            'courier_office_id' => $this->getCourierOfficeId(),
            'shipping_courier'  => $this->getShippingCourier(),
        ];
    }
}

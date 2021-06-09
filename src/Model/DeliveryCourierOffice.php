<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class DeliveryCourierOffice implements ModelInterface
{
    /** @var string */
    private $courierOfficeId;
    /** @var string */
    private $shippingCourierType;

    public function __construct(array $data = [])
    {
        if (isset($data['courier_office_id'])) {
            $this->courierOfficeId = $data['courier_office_id'];
        }

        if (isset($data['shipping_courier_type'])) {
            $this->shippingCourierType = $data['shipping_courier_type'];
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


    public function getShippingCourierType()
    {
        return $this->shippingCourierType;
    }

    public function setShippingCourierType($shippingCourierType)
    {
        $this->shippingCourierType = $shippingCourierType;

        return $this;
    }

    public function toArray()
    {
        return [
            'courier_office_id'     => $this->getCourierOfficeId(),
            'shipping_courier_type' => $this->getShippingCourierType(),
        ];
    }
}

<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

class DeliveryCourierOffice implements ModelInterface
{
    /** @var string */
    private $shippingCourier;
    /** @var string */
    private $courierOfficeId;

    /**
     * @param string $shippingCourier
     *
     * @return DeliveryCourierOffice
     */
    public function setShippingCourier($shippingCourier)
    {
        $this->shippingCourier = $shippingCourier;

        return $this;
    }

    /**
     * @return string
     */
    public function getShippingCourier()
    {
        return $this->shippingCourier;
    }

    /**
     * @param string $courierOfficeId
     *
     * @return DeliveryCourierOffice
     */
    public function setCourierOfficeId($courierOfficeId)
    {
        $this->courierOfficeId = $courierOfficeId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCourierOfficeId()
    {
        return $this->courierOfficeId;
    }

    public function toArray()
    {
        return [
            'courier_office_id' => $this->getCourierOfficeId(),
            'shipping_courier'  => $this->getShippingCourier(),
        ];
    }
}

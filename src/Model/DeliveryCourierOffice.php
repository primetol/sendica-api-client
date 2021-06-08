<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class DeliveryCourierOffice implements ModelInterface
{
    /** @var string */
    private $shippingCourier;
    /** @var string */
    private $courierOfficeId;

    public function __construct(array $data = [])
    {
        if (isset($data['courier_office_id'])) {
            $this->setCourierOfficeId($data['courier_office_id']);
        }

        if (isset($data['shipping_courier'])) {
            $this->setShippingCourier($data['shipping_courier']);
        }
    }

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

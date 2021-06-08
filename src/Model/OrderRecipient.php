<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class OrderRecipient implements ModelInterface
{
    /** @var string */
    private $name;
    /** @var string */
    private $email;
    /** @var string */
    private $phone;
    /** @var DeliveryAddress|null */
    private $deliveryAddress;
    /** @var DeliveryCourierOffice|null */
    private $deliveryCourierOffice;

    public function __construct(array $data = [])
    {
        if (isset($data['name'])) {
            $this->name = $data['name'];
        }

        if (isset($data['email'])) {
            $this->email = $data['email'];
        }

        if (isset($data['phone'])) {
            $this->phone = $data['phone'];
        }

        if (isset($data['delivery_address'])) {
            $this->deliveryAddress = new DeliveryAddress($data['delivery_address']);
        }

        if (isset($data['delivery_courier_office'])) {
            $this->deliveryCourierOffice = new DeliveryCourierOffice($data['delivery_courier_office']);
        }
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setDeliveryAddress(DeliveryAddress $deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryCourierOffice(DeliveryCourierOffice $deliveryCourierOffice)
    {
        $this->deliveryCourierOffice = $deliveryCourierOffice;

        return $this;
    }

    public function getDeliveryCourierOffice()
    {
        return $this->deliveryCourierOffice;
    }

    public function toArray()
    {
        return [
            'name'                    => $this->getName(),
            'email'                   => $this->getEmail(),
            'phone'                   => $this->getPhone(),
            'delivery_address'        => $this->getDeliveryAddress()->toArray(),
            'delivery_courier_office' => $this->getDeliveryCourierOffice()->toArray(),
        ];
    }
}

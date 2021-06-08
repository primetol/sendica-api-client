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
            $this->setName($data['name']);
        }

        if (isset($data['email'])) {
            $this->setEmail($data['email']);
        }

        if (isset($data['phone'])) {
            $this->setPhone($data['phone']);
        }

        if (isset($data['delivery_address'])) {
            $this->setDeliveryAddress(new DeliveryAddress($data['delivery_address']));
        }

        if (isset($data['delivery_courier_office'])) {
            $this->setDeliveryCourierOffice(new DeliveryCourierOffice($data['delivery_courier_office']));
        }
    }

    /**
     * @param string $name
     *
     * @return OrderRecipient
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $email
     *
     * @return OrderRecipient
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $phone
     *
     * @return OrderRecipient
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param DeliveryAddress|null $deliveryAddress
     *
     * @return OrderRecipient
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    /**
     * @return DeliveryAddress|null
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param DeliveryCourierOffice|null $deliveryCourierOffice
     *
     * @return OrderRecipient
     */
    public function setDeliveryCourierOffice($deliveryCourierOffice)
    {
        $this->deliveryCourierOffice = $deliveryCourierOffice;

        return $this;
    }

    /**
     * @return DeliveryCourierOffice|null
     */
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

<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class DeliveryAddress implements ModelInterface
{
    /** @var string|null */
    private $address;
    /** @var string|null */
    private $streetNumber;
    /** @var string|null */
    private $neighborhood;
    /** @var string */
    private $city;
    /** @var string|null */
    private $state;
    /** @var string */
    private $country;
    /** @var string */
    private $zipCode;
    /** @var string */
    private $shippingCourier;

    public function __construct(array $data = [])
    {
        if (isset($data['address'])) {
            $this->address = $data['address'];
        }

        if (isset($data['street_number'])) {
            $this->streetNumber = $data['street_number'];
        }

        if (isset($data['neighborhood'])) {
            $this->setNeighborhood($data['neighborhood']);
            $this->neighborhood = $data['neighborhood'];
        }

        if (isset($data['city'])) {
            $this->city = $data['city'];
        }

        if (isset($data['state'])) {
            $this->state = $data['state'];
        }

        if (isset($data['country'])) {
            $this->country = $data['country'];
        }

        if (isset($data['zip_code'])) {
            $this->zipCode = $data['zip_code'];
        }

        if (isset($data['shipping_courier'])) {
            $this->shippingCourier = $data['shipping_courier'];
        }
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getZipCode()
    {
        return $this->zipCode;
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
            'address'          => $this->getAddress(),
            'street_number'    => $this->getStreetNumber(),
            'neighborhood'     => $this->getNeighborhood(),
            'city'             => $this->getCity(),
            'state'            => $this->getState(),
            'country'          => $this->getCountry(),
            'zip_code'         => $this->getZipCode(),
            'shipping_courier' => $this->getShippingCourier(),
        ];
    }
}

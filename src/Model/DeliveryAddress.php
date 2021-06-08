<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class DeliveryAddress implements ModelInterface
{
    /** @var string|null */
    private $company;
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

    public function __construct(array $data = [])
    {
        if (isset($data['company'])) {
            $this->company = $data['company'];
        }

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
    }

    /**
     * @param string|null $company
     *
     * @return DeliveryAddress
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string|null $address
     *
     * @return DeliveryAddress
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string|null $streetNumber
     *
     * @return DeliveryAddress
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param string|null $neighborhood
     *
     * @return DeliveryAddress
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @param string $city
     *
     * @return DeliveryAddress
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string|null $state
     *
     * @return DeliveryAddress
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $country
     *
     * @return DeliveryAddress
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $zipCode
     *
     * @return DeliveryAddress
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function toArray()
    {
        return [
            'company'       => $this->getCompany(),
            'address'       => $this->getAddress(),
            'street_number' => $this->getStreetNumber(),
            'neighborhood'  => $this->getNeighborhood(),
            'city'          => $this->getCity(),
            'state'         => $this->getState(),
            'country'       => $this->getCountry(),
            'zip_code'      => $this->getZipCode(),
        ];
    }
}

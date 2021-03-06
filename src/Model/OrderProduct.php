<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class OrderProduct implements ModelInterface
{
    /** @var string */
    private $sku;
    /** @var string */
    private $name;
    /** @var int */
    private $quantity;
    /** @var float */
    private $price;

    public function __construct(array $data = [])
    {
        if (isset($data['sku'])) {
            $this->sku = $data['sku'];
        }

        if (isset($data['name'])) {
            $this->name = $data['name'];
        }

        if (isset($data['quantity'])) {
            $this->quantity = $data['quantity'];
        }

        if (isset($data['price'])) {
            $this->price = $data['price'];
        }
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function toArray()
    {
        return [
            'sku'      => $this->sku,
            'name'     => $this->name,
            'quantity' => $this->quantity,
            'price'    => $this->price,
        ];
    }
}

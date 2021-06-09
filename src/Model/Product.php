<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class Product implements ModelInterface
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $sku;

    public function __construct(array $data = [])
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }

        if (isset($data['name'])) {
            $this->name = $data['name'];
        }

        if (isset($data['sku'])) {
            $this->sku = $data['sku'];
        }
    }

    public function getId()
    {
        return $this->id;
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

    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    public function toArray()
    {
        return [
            'id'   => $this->getId(),
            'name' => $this->getName(),
            'sku'  => $this->getSku(),
        ];
    }
}

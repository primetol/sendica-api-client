<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class Product implements ModelInterface
{
    /** @var int */
    private $id;
    /** @var string */
    private $sku;

    public function __construct(array $data = [])
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }

        if (isset($data['sku'])) {
            $this->sku = $data['sku'];
        }
    }

    public function getId()
    {
        return $this->id;
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
            'id'  => $this->getId(),
            'sku' => $this->getSku(),
        ];
    }
}

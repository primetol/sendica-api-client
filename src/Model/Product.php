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
            $this->setId($data['id']);
        }

        if (isset($data['sku'])) {
            $this->setSku($data['sku']);
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     *
     * @return $this
     */
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

<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class OrderProduct implements ModelInterface
{
    /** @var int */
    private $quantity;
    /** @var string */
    private $sku;

    public function __construct(array $data = [])
    {
        if (isset($data['sku'])) {
            $this->setSku($data['sku']);
        }

        if (isset($data['quantity'])) {
            $this->setQuantity($data['quantity']);
        }
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

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
            'sku'      => $this->getSku(),
            'quantity' => $this->getQuantity(),
        ];
    }
}

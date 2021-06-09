<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

final class OrderProduct implements ModelInterface
{
    /** @var int */
    private $id;
    /** @var int */
    private $quantity;
    /** @var Product */
    private $product;

    public function __construct(array $data = [])
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }

        if (isset($data['quantity'])) {
            $this->quantity = $data['quantity'];
        }

        if (isset($data['product'])) {
            $this->product = new Product($data['product']);
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
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     *
     * @return $this
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    public function toArray()
    {
        return [
            'id'       => $this->id,
            'product'  => $this->product ? $this->product->toArray() : null,
            'quantity' => $this->quantity,
        ];
    }
}

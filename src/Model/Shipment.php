<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

class Shipment implements ModelInterface
{
    /** @var bool */
    private $cacheOnDelivery;
    /** @var float */
    private $invoiceAmount;
    /** @var string */
    private $invoiceCurrency;

    public function __construct(array $data = [])
    {
        if (isset($data['cache_on_delivery'])) {
            $this->cacheOnDelivery = $data['cache_on_delivery'];
        }

        if (isset($data['invoice_amount'])) {
            $this->invoiceAmount = $data['invoice_amount'];
        }

        if (isset($data['invoice_currency'])) {
            $this->invoiceCurrency = $data['invoice_currency'];
        }
    }

    /**
     * @param bool $cacheOnDelivery
     *
     * @return Shipment
     */
    public function setCacheOnDelivery($cacheOnDelivery)
    {
        $this->cacheOnDelivery = (bool)$cacheOnDelivery;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCacheOnDelivery()
    {
        return (bool)$this->cacheOnDelivery;
    }

    /**
     * @param float $invoiceAmount
     *
     * @return Shipment
     */
    public function setInvoiceAmount($invoiceAmount)
    {
        $this->invoiceAmount = $invoiceAmount;

        return $this;
    }

    /**
     * @return float
     */
    public function getInvoiceAmount()
    {
        return $this->invoiceAmount;
    }

    /**
     * @param string $invoiceCurrency
     *
     * @return Shipment
     */
    public function setInvoiceCurrency($invoiceCurrency)
    {
        $this->invoiceCurrency = $invoiceCurrency;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceCurrency()
    {
        return $this->invoiceCurrency;
    }

    public function toArray()
    {
        return [
            'cache_on_delivery' => $this->cacheOnDelivery,
            'invoice_amount'    => $this->invoiceAmount,
            'invoice_currency'  => $this->invoiceCurrency,
        ];
    }
}

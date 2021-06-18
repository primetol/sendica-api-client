<?php

namespace SendicaApi\Model;

use SendicaApi\Model\Interfaces\ModelInterface;

class Shipment implements ModelInterface
{
    /** @var bool */
    private $declaredValue;
    /** @var bool */
    private $cacheOnDelivery;
    /** @var float */
    private $invoiceAmount;
    /** @var string */
    private $invoiceCurrency;
    /** @var string */
    private $courierLabelDescription;

    public function __construct(array $data = [])
    {
        if (isset($data['declared_value'])) {
            $this->declaredValue = $data['declared_value'];
        }

        if (isset($data['cache_on_delivery'])) {
            $this->cacheOnDelivery = $data['cache_on_delivery'];
        }

        if (isset($data['invoice_amount'])) {
            $this->invoiceAmount = $data['invoice_amount'];
        }

        if (isset($data['invoice_currency'])) {
            $this->invoiceCurrency = $data['invoice_currency'];
        }

        if (isset($data['courier_label_description'])) {
            $this->courierLabelDescription = $data['courier_label_description'];
        }
    }

    public function isDeclaredValue()
    {
        return (bool)$this->declaredValue;
    }

    public function setDeclaredValue($declaredValue)
    {
        $this->declaredValue = (bool)$declaredValue;

        return $this;
    }

    public function setCacheOnDelivery($cacheOnDelivery)
    {
        $this->cacheOnDelivery = (bool)$cacheOnDelivery;

        return $this;
    }

    public function isCacheOnDelivery()
    {
        return (bool)$this->cacheOnDelivery;
    }

    public function setInvoiceAmount($invoiceAmount)
    {
        $this->invoiceAmount = (float)$invoiceAmount;

        return $this;
    }

    public function getInvoiceAmount()
    {
        return $this->invoiceAmount;
    }

    public function setInvoiceCurrency($invoiceCurrency)
    {
        $this->invoiceCurrency = $invoiceCurrency;

        return $this;
    }

    public function getInvoiceCurrency()
    {
        return $this->invoiceCurrency;
    }

    public function setCourierLabelDescription($courierLabelDescription)
    {
        $this->courierLabelDescription = $courierLabelDescription;

        return $this;
    }

    public function getCourierLabelDescription()
    {
        return $this->courierLabelDescription;
    }

    public function toArray()
    {
        return [
            'declared_value'            => $this->declaredValue,
            'cache_on_delivery'         => $this->cacheOnDelivery,
            'invoice_amount'            => $this->invoiceAmount,
            'invoice_currency'          => $this->invoiceCurrency,
            'courier_label_description' => $this->courierLabelDescription,
        ];
    }
}

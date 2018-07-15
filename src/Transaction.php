<?php

namespace kapitanluffy\Paymuna;

use kapitanluffy\Paymuna\Support\Variable;
use kapitanluffy\Paymuna\Support\Address;
use kapitanluffy\Paymuna\Support\Item;
use kapitanluffy\Paymuna\Payment\PaymentMethod;
use kapitanluffy\Paymuna\Shipping\ShippingMethod;

class Transaction
{
    protected $data = [
        'transaction_id' => null,
        'transaction_active' => null,
        'transaction_created' => null,
        'transaction_updated' => null,
        'transaction_reference' => null,
        'transaction_title' => null,
        'transaction_callback' => null,
        'transaction_redirect' => null,
        'transaction_currency' => null,
        'transaction_status' => null,
        'transaction_addresses' => ['billing' => null, 'shipping' => null],
        'transaction_items' => [],
        'transaction_shipping_methods' => [],
        'transaction_payment_methods' => [],
        'transaction_variables' => [],
        'transaction_summary' => [],
        'transaction_extras' => [],
        'transaction_total' => null,
        'transaction_type' => null,
        'transaction_flag' => null,
        'checkout_reference' => null,
    ];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getId()
    {
        return $this->data['transaction_id'];
    }

    public function isActive()
    {
        return (bool) $this->data['transaction_active'];
    }

    public function getCreated()
    {
        return $this->data['transaction_created'];
    }

    public function getUpdated()
    {
        return $this->data['transaction_updated'];
    }

    public function getReference()
    {
        return $this->data['transaction_reference'];
    }

    public function getTitle()
    {
        return $this->data['transaction_title'];
    }

    public function getCallbackUrl()
    {
        return $this->data['transaction_callback'];
    }

    public function getRedirectUrl()
    {
        return $this->data['transaction_redirect'];
    }

    public function getCurrency()
    {
        return $this->data['transaction_currency'];
    }

    public function getStatus()
    {
        return $this->data['transaction_status'];
    }

    public function getBillingAddress()
    {
        return $this->data['transaction_addresses']['billing'];
    }

    public function getShippingAddress()
    {
        return $this->data['transaction_addresses']['shipping'];
    }

    public function getItems()
    {
        return $this->data['transaction_items'];
    }

    public function getShippingMethods()
    {
        return $this->data['transaction_shipping_methods'];
    }

    public function getPaymentMethods()
    {
        return $this->data['transaction_payment_methods'];
    }

    public function getVariables()
    {
        return $this->data['transaction_variables'];
    }

    public function getSummary()
    {
        return $this->data['transaction_summary'];
    }

    public function getExtras()
    {
        return $this->data['transaction_extras'];
    }

    public function getTotal()
    {
        return $this->data['transaction_total'];
    }

    public function getType()
    {
        return $this->data['transaction_type'];
    }

    public function getFlag()
    {
        return $this->data['transaction_flag'];
    }

    public function getCheckoutTemplate()
    {
        return $this->data['checkout_reference'];
    }

    public function toArray()
    {
        return $this->data;
    }
}

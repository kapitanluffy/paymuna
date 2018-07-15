<?php

namespace kapitanluffy\Paymuna;

use kapitanluffy\Paymuna\Support\Address;

class CheckoutTemplate
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getId()
    {
        return $this->data['checkout_id'];
    }

    public function isActive()
    {
        return (bool) $this->data['checkout_active'];
    }

    public function getCreated()
    {
        return $this->data['checkout_created'];
    }

    public function getUpdated()
    {
        return $this->data['checkout_updated'];
    }

    public function getTitle()
    {
        return $this->data['checkout_title'];
    }

    public function getReference()
    {
        return $this->data['checkout_reference'];
    }

    public function getCallbackUrl()
    {
        return $this->data['checkout_callback'];
    }

    public function getRedirectUrl()
    {
        return $this->data['checkout_redirect'];
    }

    public function getWebsite()
    {
        return $this->data['checkout_website'];
    }

    public function getStylesheet()
    {
        return $this->data['checkout_stylesheet'];
    }

    public function getCurrency()
    {
        return $this->data['checkout_currency'];
    }

    public function getLogo()
    {
        return $this->data['checkout_logo'];
    }

    public function getFavicon()
    {
        return $this->data['checkout_favicon'];
    }

    public function getTerms()
    {
        return $this->data['checkout_terms'];
    }

    public function getBillingAddress()
    {
        return new Address($this->data['checkout_addresses']['billing']);
    }

    public function getShippingAddress()
    {
        return new Address($this->data['checkout_addresses']['shipping']);
    }

    public function getItems()
    {
        return $this->data['checkout_items'];
    }

    public function getShippingMethods()
    {
        return $this->data['checkout_shipping_methods'];
    }

    public function getPaymentMethods()
    {
        return $this->data['checkout_payment_methods'];
    }

    public function getVariables()
    {
        return $this->data['checkout_variables'];
    }

    public function isDefault()
    {
        return (bool) $this->data['checkout_default'];
    }

    public function getType()
    {
        return $this->data['checkout_type'];
    }

    public function getFlag()
    {
        return $this->data['checkout_flag'];
    }

    public function toArray()
    {
        return $this->data;
    }
}

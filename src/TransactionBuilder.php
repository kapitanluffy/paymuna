<?php

namespace kapitanluffy\Paymuna;

use kapitanluffy\Paymuna\Support\Item;
use kapitanluffy\Paymuna\Support\Address;
use kapitanluffy\Paymuna\Support\Variable;
use kapitanluffy\Paymuna\Payment\PaymentMethod;
use kapitanluffy\Paymuna\Shipping\ShippingMethod;

class TransactionBuilder
{
    protected $callback;

    protected $redirect;

    protected $billingAddress = null;

    protected $shippingAddress = null;

    protected $items = [];

    protected $shippingMethods = [];

    protected $paymentMethods = [];

    protected $variables = [];


    public function setCallbackUrl($url)
    {
        $this->callback = $url;
    }

    public function setRedirectUrl($url)
    {
        $this->redirect = $url;
    }

    public function setBillingAddress(Address $address)
    {
        $this->billingAddress = $address;
    }

    public function setShippingAddress(Address $address)
    {
        $this->shippingAddress = $address;
    }

    public function addItem(Item $item)
    {
        $this->items = $item;
    }

    public function addShippingMethod(ShippingMethod $shipping)
    {
        $this->shippingMethods = $shipping;
    }

    public function addPaymentMethod(PaymentMethod $payment)
    {
        $this->paymentMethods = $payment;
    }

    public function addVariable($name, $value, $type = 'custom')
    {
        $this->variables = new Variable($name, $value, $type);
    }
}

<?php

namespace kapitanluffy\Paymuna\Payment;

abstract class PaymentMethod
{
    protected $data = [
        'payment_name' => null,
        'payment_description' => '',
        'payment_type' => null,
        'payment_fee' => null,
        'payment_fee_type' => 'fixed',
        'payment_email' => null,
        'payment_token' => null,
        'payment_secret' => null,
        'payment_account_name' => null,
        'payment_account_number' => null,
        'payment_selected' => false
    ];

    protected $types = [
        'bank-deposit' => 'Bank Deposit',
        'cash-on-delivery' => 'Cash On Delivery',
        'cash-on-pickup' => 'Cash On Pickup',
        'dragonpay' => 'Dragonpay',
        'paypal-ec' => 'Paypal (Express Checkout)',
        'paymaya-ec' => 'Paymaya Checkout',
        'wepay-ec' => 'Wepay Checkout'
    ];

    protected $feeType = [
        'percentage',
        'fixed'
    ];

    public function __construct($type)
    {
        if (isset($this->types[$type]) == false) {
            throw new \Exception("Unsupported payment method type [$type]");
        }

        $name = $this->types[$type];
        $this->data['payment_type'] = $type;

        $this->setName($name);
        $this->setDescription($name);
    }

    public function getName()
    {
        return $this->data['payment_name'];
    }

    public function getDescription()
    {
        return $this->data['payment_description'];
    }

    public function getType()
    {
        return $this->data['payment_type'];
    }

    public function getFee()
    {
        return $this->data['payment_fee'];
    }

    public function getFeeType()
    {
        return $this->data['payment_fee_type'];
    }

    public function getEmail()
    {
        return $this->data['payment_email'];
    }

    public function getToken()
    {
        return $this->data['payment_token'];
    }

    public function getSecret()
    {
        return $this->data['payment_secret'];
    }

    public function getAccountName()
    {
        return $this->data['payment_account_name'];
    }

    public function getAccountNumber()
    {
        return $this->data['payment_account_number'];
    }

    public function isSelected()
    {
        return (bool) $this->data['payment_selected'];
    }

    public function toArray()
    {
        return $this->data;
    }

    public function setName($name)
    {
        $this->data['payment_name'] = $name;
    }

    public function setDescription($description)
    {
        $this->data['payment_description'] = $description;
    }

    public function setFee($fee)
    {
        $this->data['payment_fee'] = $fee;
    }

    public function setFeeType($type)
    {
        if (in_array($type, $this->feeType) == false) {
            throw new \Exception("Invalid fee type [$type]");
        }

        $this->data['payment_fee_type'] = $type;
    }

    public function setEmail($email)
    {
        $this->data['payment_email'] = $email;
    }

    public function setToken($token)
    {
        $this->data['payment_token'] = $token;
    }

    public function setSecret($secret)
    {
        $this->data['payment_secret'] = $secret;
    }

    public function setAccountName($name)
    {
        $this->data['payment_account_name'] = $name;
    }

    public function setAccountNumber($number)
    {
        $this->data['payment_account_number'] = $number;
    }

    public function setSelected($selected)
    {
        $this->data['payment_selected'] = $selected;
    }
}

<?php

namespace kapitanluffy\Paymuna\Payment;

class Dragonpay extends PaymentMethod
{
    public function __construct($email, $token, $secret)
    {
        $this->setEmail($email);
        $this->setToken($token);
        $this->setSecret($secret);

        parent::__construct('dragonpay');
    }
}

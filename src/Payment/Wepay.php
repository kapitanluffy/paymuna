<?php

namespace kapitanluffy\Paymuna\Payment;

class Wepay extends PaymentMethod
{
    public function __construct($email, $token, $secret)
    {
        $this->setEmail($email);
        $this->setToken($token);
        $this->setSecret($secret);

        parent::__construct('wepay-ec');
    }
}

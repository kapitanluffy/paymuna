<?php

namespace kapitanluffy\Paymuna\Payment;

class CashOnPickup extends PaymentMethod
{
    public function __construct($accountName, $accountNumber)
    {
        $this->setAccountName($accountName);
        $this->setAccountNumber($accountNumber);

        parent::__construct('cash-on-pickup');
    }
}

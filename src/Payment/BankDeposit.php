<?php

namespace kapitanluffy\Paymuna\Payment;

class BankDeposit extends PaymentMethod
{
    public function __construct($accountName, $accountNumber)
    {
        $this->setAccountName($accountName);
        $this->setAccountNumber($accountNumber);

        parent::__construct('bank-deposit');
    }
}

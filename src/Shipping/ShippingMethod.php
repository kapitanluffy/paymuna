<?php

namespace kapitanluffy\Paymuna\Shipping;

class ShippingMethod
{
    protected $data = [
        'shipping_name' => null,
        'shipping_description' => null,
        'shipping_fee' => null,
        'shipping_fee_type' => 'fixed',
        'shipping_selected' => false,
    ];

    protected $feeType = [
        'percentage',
        'fixed'
    ];

    public function __construct($name, $fee)
    {
        $this->data['shipping_name'] = $name;
        $this->data['shipping_fee'] = $fee;
        $this->data['shipping_description'] = $name;
    }

    public function getName()
    {
        return $this->data['shipping_name'];
    }

    public function getDescription()
    {
        return $this->data['shipping_description'];
    }

    public function getFee()
    {
        return $this->data['shipping_fee'];
    }

    public function getFeeType()
    {
        return $this->data['shipping_fee_type'];
    }

    public function isSelected()
    {
        return (bool) $this->data['shipping_selected'];
    }

    public function toArray()
    {
        return $this->data;
    }

    public function setName($name)
    {
        $this->data['shipping_name'] = $name;
    }

    public function setDescription($description)
    {
        $this->data['shipping_description'] = $description;
    }

    public function setFee($fee)
    {
        $this->data['shipping_fee'] = $fee;
    }

    public function setFeeType($type)
    {
        if (in_array($type, $this->feeType) == false) {
            throw new \Exception("Invalid fee type [$type]");
        }

        $this->data['shipping_fee_type'] = $type;
    }

    public function setSelected($selected)
    {
        $this->data['shipping_selected'] = $selected;
    }
}

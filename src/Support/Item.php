<?php

namespace kapitanluffy\Paymuna\Support;

class Item
{
    protected $data = [
        'item_name' => null,
        'item_reference' => null,
        'item_image' => null,
        'item_description' => null,
        'item_price' => null,
        'item_quantity' => 1,
        'item_link' => null,
        'item_shipping' => 0,
        'item_tax' => 0,
        'item_insurance' => 0,
        'item_handling' => 0
    ];

    public function __construct($name, $price)
    {
        $this->data['item_name'] = $name;
        $this->data['item_price'] = $price;
    }

    public function getName()
    {
        return $this->data['item_name'];
    }

    public function getReference()
    {
        return $this->data['item_reference'];
    }

    public function getImage()
    {
        return $this->data['item_image']['file_path'];
    }

    public function getDescription()
    {
        return $this->data['item_description'];
    }

    public function getPrice()
    {
        return $this->data['item_price'];
    }

    public function getQuantity()
    {
        return $this->data['item_quantity'];
    }

    public function getLink()
    {
        return $this->data['item_link'];
    }

    public function getShipping()
    {
        return $this->data['item_shipping'];
    }

    public function getTax()
    {
        return $this->data['item_tax'];
    }

    public function getInsurance()
    {
        return $this->data['item_insurance'];
    }

    public function getHandling()
    {
        return $this->data['item_handling'];
    }

    public function toArray()
    {
        return $this->data;
    }

    public function setName($name)
    {
        $this->data['item_name'] = $name;
    }

    public function setReference($reference)
    {
        $this->data['item_reference'] = $reference;
    }

    public function setImage($image)
    {
        $this->data['item_image']['file_path'] = $image;
    }

    public function setDescription($description)
    {
        $this->data['item_description'] = $description;
    }

    public function setPrice($price)
    {
        $this->data['item_price'] = $price;
    }

    public function setQuantity($quantity)
    {
        $this->data['item_quantity'] = $quantity;
    }

    public function setLink($link)
    {
        $this->data['item_link'] = $link;
    }

    public function setShipping($shipping)
    {
        $this->data['item_shipping'] = $shipping;
    }

    public function setTax($tax)
    {
        $this->data['item_tax'] = $tax;
    }

    public function setInsurance($insurance)
    {
        $this->data['item_insurance'] = $insurance;
    }

    public function setHandling($handling)
    {
        $this->data['item_handling'] = $handling;
    }
}

<?php

namespace kapitanluffy\Paymuna\Support;

class Address
{
    protected $data = [
        'address_fullname' => null,
        'address_email' => null,
        'address_phone' => null,
        'address_country' => null,
        'address_state' => null,
        'address_city' => null,
        'address_street' => null,
        'address_postal' => null
    ];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getFullname()
    {
        return $this->data['address_fullname'];
    }

    public function getEmail()
    {
        return $this->data['address_email'];
    }

    public function getPhone()
    {
        return $this->data['address_phone'];
    }

    public function getCountry()
    {
        return $this->data['address_country'];
    }

    public function getState()
    {
        return $this->data['address_state'];
    }

    public function getCity()
    {
        return $this->data['address_city'];
    }

    public function getStreet()
    {
        return $this->data['address_street'];
    }

    public function getPostal()
    {
        return $this->data['address_postal'];
    }

    public function toArray()
    {
        return $this->data;
    }

    public function setFullname($fullname)
    {
        $this->data['address_fullname'] = $fullname;
    }

    public function setEmail($email)
    {
        $this->data['address_email'] = $email;
    }

    public function setPhone($phone)
    {
        $this->data['address_phone'] = $phone;
    }

    public function setCountry($country)
    {
        $this->data['address_country'] = $country;
    }

    public function setState($state)
    {
        $this->data['address_state'] = $state;
    }

    public function setCity($city)
    {
        $this->data['address_city'] = $city;
    }

    public function setStreet($street)
    {
        $this->data['address_street'] = $street;
    }

    public function setPostal($postal)
    {
        $this->data['address_postal'] = $postal;
    }
}

<?php

namespace kapitanluffy\Paymuna\Support;

class Variable
{
    protected $data = [];

    protected $types = [
        'custom',
        'shipping',
        'tax',
        'insurance',
        'handling'
    ];

    public function __construct($name, $value, $type = 'custom')
    {
        $this->data['variable_name'] = $name;
        $this->data['variable_value'] = $value;

        if (isset($this->types[$type]) == false) {
            throw new \Exception("Unsupported variable type [$type]");
        }

        $this->data['variable_type'] = $type;
    }

    public function getName()
    {
        return $this->data['variable_name'];
    }

    public function getValue()
    {
        return $this->data['variable_value'];
    }

    public function getType()
    {
        return $this->data['variable_type'];
    }
}

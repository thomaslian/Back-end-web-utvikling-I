<?php

class Select
{
    private $name; //Name of the select field
    private $optionsArray; //array of options in the select field

    function __construct($name, $values)
    {
        $this->name = $name;

        if (!is_array($values)) {
            die ("Error :value is not an array.");
        } else {
            $this->optionsArray = $values;
            $this->makeSelect();
        }

    }

// method : create options in the select field
    private function makeOptions($value)
    {
        return "<option value=$value>$value</option>";
    }

//method : initialize the select field
    private function makeSelect()
    {
        $options = "";
        foreach ($this->optionsArray as $value) {
            $options .= $this->makeOptions($value);
        }
        echo "<select name=$this->name>$options</select>";
    }

}

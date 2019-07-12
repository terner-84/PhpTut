<?php

class Accessories {
    public $group;
    public $name;
    public $item_detail;
    public $diameter;
    public $usual_price;

    public function __construct($group, $name, $item_detail, $diameter, $usual_price) {
        $this->group = $group;
        $this->name = $name;
        $this->item_detail = $item_detail;
        $this->diameter = $diameter;
        $this->usual_price = $usual_price;
    }

    public function getGroup() {
        return $this->group;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}
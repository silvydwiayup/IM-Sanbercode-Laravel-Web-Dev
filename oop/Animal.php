<?php
class Animal
{
    public $legs = 4;
    public $cold_blooded = "no";
    public $name;
    public function __construct($name){
        $this->name = $name;
    }
}


?>
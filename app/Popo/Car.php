<?php

namespace App\Popo;


class Car{
    
    /**
     * @link https://en.wikipedia.org/wiki/Car_classification
     * 
     * eg. "A", "B"
     * 
     * array
    */
    protected $carClass = array();

    /**
     * The capacity of passengers at all, number
    */
    protected $passengerCapacity = 1;

    /**
     * TODO
     * 
    */
    public function __construct() {
        
    }

}
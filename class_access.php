<?php 

class Car {
    
    public $wheels = 4;
    protected $hood = 1;
    private $engine = 1;
    var $doors = 4;
    var $count = 0;
  
    function __construct(){
    
        $this->count = $this->count+1;

    } 

    function showProperty(){
        echo $this->hood;
    }

}
$bmw = new Car();
echo $bmw->engine;

$semi = new Semi();
// echo $semi->showProperty();

class Semi extends Car {

    function showProperty(){
        echo $this->engine;
    }
}
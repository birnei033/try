<?php 

class Car {
    
    var $wheels = 4;
    var $hood = 1;
    var $engine = 1;
    var $doors = 4;
    var $count = 0;
  
    function __construct(){
    
        $this->count = $this->count+1;
        
    
    } 

}
$bmw = new Car();
$bmw1 = new Car();
$bmw2 = new Car();
echo $bmw2->count;
?>
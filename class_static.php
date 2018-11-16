<?php 

class Car {
    
    static $wheels = 4;
    var $hood = 1;
    static $count = 0;

    function __construct()
    {
        Car::$count = Car::$count + 1;
    }
  
    function MoveWheels(){
    
      Car::$wheels = 10;
        
    
    } 
    


}

$bmw = new Car();
$toyota = new Car();
$toyota2 = new Car();
$toyota3 = new Car();

Car::MoveWheels();
echo Car::$wheels;

echo "<br>Car count: " . Car::$count;

?>
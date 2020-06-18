<?php

namespace App;
/* 
* Class RobotBatteryPower
* Class for Robot battery power storage 
*/
class RobotBatteryPower
{
    public $battery_power  = 100;
    
    /**
    * Function to set battery power  
    * @return boolean 
    */
    public function set_power()
    {
        $this->battery_power = 100;
    }

    /**
    * Function consume battery power  
    * @return boolean 
    */
    public function consume_power($seconds) {
        $this->battery_power = $this->battery_power - ( (100/Config::BATTERY_LIFE)* $seconds);

    }
        
}

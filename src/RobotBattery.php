<?php

namespace App;

require_once ('src/Config.php');
require_once ('src/RobotBatteryPower.php');

use App\Config;
use App\RobotBatteryPower;

/* 
* Class RobotBattery
* Class for Robot Battery properties
*/
class RobotBattery extends RobotBatteryPower
{
    public $battery = Config::BATTERY_LIFE;

    /**
    * Function for Robot charge   
    * @return boolean
    */
    public function charge_battery()
    {
        $this->task = 'Charging';
        $this->battery = Config::BATTERY_LIFE;
        echo "\n ------------Battery charging started-----------";

        SLEEP(Config::BATTERY_CHARGING_TIME);

        $this->set_power();

        echo "\n ------------Battery charging completed----------";
        return true;
    }

   
}

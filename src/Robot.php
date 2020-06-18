<?php
namespace App;

require_once ('src/Config.php');
require_once ('src/RobotBattery.php');

use App\Config;
use App\RobotBattery;
use InvalidArgumentException;

/* 
* Class Robot
* Class for Robot functionality 
*/
class Robot extends RobotBattery
{
    public $task;
    
    /**
    * Function to validate area  
    * @return void
    */
    protected function checkValidArea(int $area):void
        {
            if (empty($area) || !is_numeric($area))
            {
                throw new InvalidArgumentException(sprintf('"%s" is not a valid area', $area));
            }

            if ($area <= 0)
            {
                throw new InvalidArgumentException(sprintf('"%s" is not a valid area', $area));
            }
        }
    }
    

<?php

namespace src;

use src\Config;
use src\RobotBattery;
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
    protected function checkValidArea(int $area): void
    {
        if (empty($area) || !is_numeric($area)) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid area', $area));
        }

        if ($area <= 0) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid area', $area));
        }
    }
}

<?php
namespace App;

require_once ('src/Robot.php');
require_once ('src/CleanFloorInterface.php');

use App\Robot;
use App\CleanFloorInterface;

/* 
* Class CleanCarpetfloor
* Class for Robot to clean hard floor
*/
class CleanHardFloor extends Robot implements CleanFloorInterface
{
    public $area;

    /**
    * Class constructor. 
    */
    public function __construct(int $area)
    {
        $this->checkValidArea($area);
        $this->area = $area;
    }

    /**
    * Class destructor. 
    */
    function __destruct()
    {
    }

    /**
    * Function for Robot task to clean floor  
    * @return boolean 
    */
    public function clean():bool
        {
            echo "\n Hard floor clening started::";
            while ($this->area > 0)
            {
                if ($this->battery > 0) //Check if battery available
                {
                    echo "\n Robot Cleaning Hard area ";                   
                    echo "\n Area remaining :$this->area";
                    echo "\n Battery power :".round($this->battery_power);
                    echo "\n Battery time :$this->battery ";

                    sleep(1);
                    $this->task = 'Cleaning';
                    $this->battery--;
                    $this->area--;
                    $this->consume_power(1); //Consume battery after use
                }
                else
                {
                    //Charge the robot battery
                    $this->charge_battery();
                }
            }

            if ($this->area == 0) echo "\n Hard floor cleaning completed";

            return true;
        }
    }
    
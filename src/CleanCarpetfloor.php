<?php

namespace src;

use src\Robot;
use src\CleanFloorInterface;

/* 
* Class CleanCarpetfloor
* Class for Robot to clean carpet floor
*/

class CleanCarpetfloor extends Robot implements CleanFloorInterface
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
    public function clean(): bool
    {
        echo "\n Carpet floor cleaning started::";
        while ($this->area > 0) {
            if ($this->battery > 0) {
                echo "\n Robot Cleaning Carpet area ";
                echo "\n Area remaining :$this->area";
                echo "\n Battery power :" . round($this->battery_power);
                echo "\n Battery time :$this->battery ";

                sleep(2);
                $this->task = 'Cleaning';
                $this->battery = $this->battery - 2;
                $this->area--;
                $this->consume_power(2); //COnsume the battery after use

            } else {
                $this->charge_battery();
            }
        }
        if ($this->area == 0) echo "\n Carpet floor cleaning completed";

        return true;
    }
}

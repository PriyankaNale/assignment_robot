<?php
namespace App;

require_once ('src/Robot.php');
require_once ('src/CleanFloorInterface.php');

use App\Robot;
use App\CleanFloorInterface;

//Class for Robot to clean carpet floor
class CleanCarpetfloor extends Robot implements CleanFloorInterface
{
    public $area;

    public function __construct(int $area)
    {
        $this->checkValidArea($area);
        $this->area = $area;
    }

    function __destruct()
    {
    }

    public function clean():bool
        {
            echo "\n Carpet floor clening started::";
            while ($this->area > 0)
            {
                if ($this->battery > 0)
                {
                    echo "\n Cleaning Carpet area with robot battery $this->battery .";
                    echo "\n Area remaining $this->area";
                    sleep(2);
                    $this->battery = $this->battery - 2;
                    $this->area--;
                }
                else
                {
                    $this->charge_battery();
                }
            }
            if ($this->area == 0) echo "\n Carpet floor cleaning completed";

            return true;
        }

    }
    

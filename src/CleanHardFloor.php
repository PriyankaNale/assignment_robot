<?php
namespace App;

require_once ('src/Robot.php');
require_once ('src/CleanFloorInterface.php');

use App\Robot;
use App\CleanFloorInterface;

//Class for Robot to clean hard floor
class CleanHardFloor extends Robot implements CleanFloorInterface
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
            echo "\n Hard floor clening started::";
            while ($this->area > 0)
            {
                if ($this->battery > 0)
                {
                    echo "\n Cleaning hard area with robot battery $this->battery .";
                    echo "\n Area remaining $this->area";
                    sleep(1);
                    $this->battery--;
                    $this->area--;
                }
                else
                {
                    $this->charge_battery();
                }
            }

            if ($this->area == 0) echo "\n Hard floor cleaning completed";

            return true;
        }
    }
    
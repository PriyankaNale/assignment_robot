<?php
namespace App;

require_once ('src/Config.php');

use App\Config;
use InvalidArgumentException;

class Robot
{
    public $battery = Config::BATTERY_LIFE;

    public function charge_battery()
    {
        $this->battery = Config::BATTERY_LIFE;
        echo "\n Battery charging started....";
        SLEEP(Config::BATTERY_CHARGING_TIME);
        echo "\n Battery charging completed";
        return;
    }

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
    

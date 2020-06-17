<?php

// declare(strict_types=1);

// side effect: change ini settings
ini_set('error_reporting', E_ALL);

require_once('src/Config.php');
require_once('src/CleanHardFloor.php');
require_once('src/CleanCarpetfloor.php');

use App\CleanHardFloor;
use App\CleanCarpetfloor;
use App\Config;


#Run cleaning process
if (isset($argv)) {
    cleanFloor($argv);
}

function cleanFloor(array $argv): void
{
    $floor = "";
    $area  = 0;

    if (empty($argv)) {
        throw new InvalidArgumentException(
            sprintf('Invalid arguments')
        );
    }
    if (
        empty($argv['1']) ||
        (!empty($argv['1']) && $argv['1'] != Config::ROBOT_TASK)
    ) {
        throw new InvalidArgumentException(
            sprintf('Invalid command')
        );
    }

    if (empty($argv['2']) || empty($argv['3'])) {
        throw new InvalidArgumentException(
            sprintf('Invalid parameters passed')
        );
    }

    $floor = explode("=", $argv['2'])[1];
    $area  = explode("=", $argv['3'])[1];

    if (empty($area) || !is_numeric($area)) {
        throw new InvalidArgumentException(
            sprintf(
                '"%s" is not a valid area',
                $area
            )
        );
    }

    if ($floor == Config::FLOOR_HARD) {
        $hard_floor = new CleanHardFloor($area);

        $hard_floor->clean();
    } elseif ($floor == Config::FLOOR_CARPET) {
        $carpet_floor = new CleanCarpetfloor($area);

        $carpet_floor->clean();
    } else {
        throw new InvalidArgumentException(
            sprintf(
                '"%s" is not a valid floor',
                $floor
            )
        );
    }
}
?>

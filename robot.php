<?php

// declare(strict_types=1);

// side effect: change ini settings
ini_set('error_reporting', E_ALL);

include_once 'includes/autoload.php';

use src\CleanHardFloor;
use src\CleanCarpetfloor;
use src\Config;



#Run cleaning process
if (isset($argv)) {
    cleanFloor($argv);
}

/**
 * Function for cleaning floor  
 * @return boolean 
 */
function cleanFloor(array $argv): bool
{
    $floor = "";
    $area  = 0;

    if (empty($argv)) {
        echo 'Invalid arguments';
        return false;
    }
    if (
        empty($argv['1']) ||
        (!empty($argv['1']) && $argv['1'] != Config::ROBOT_TASK)
    ) {

        echo 'Invalid command';
        return false;
    }

    if (empty($argv['2']) || empty($argv['3'])) {

        echo 'Invalid parameters passed';
        return false;
    }

    $floor = explode("=", $argv['2'])[1];
    $area  = explode("=", $argv['3'])[1];

    if (empty($area) || !is_numeric($area)) {

        sprintf(
            '"%s" is not a valid area',
            $area
        );
        return false;
    }

    //Clean floor with valid arguments
    if ($floor == Config::FLOOR_HARD) {
        $hard_floor = new CleanHardFloor($area);

        return $hard_floor->clean();
    } elseif ($floor == Config::FLOOR_CARPET) {
        $carpet_floor = new CleanCarpetfloor($area);

        return $carpet_floor->clean();
    } else {
        sprintf(
            '"%s" is not a valid floor',
            $floor
        );

        return false;
    }
}

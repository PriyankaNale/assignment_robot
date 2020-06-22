<?php

// declare(strict_types=1);

// side effect: change ini settings
ini_set('error_reporting', E_ALL);

//Autoload required classes
spl_autoload_register();

use src\CleanHardFloor;
use src\CleanCarpetfloor;
use src\Config;


// Get command line arguments
$options = getopt(" clean:", ["floor:","area:"]);
cleanFloor($options);


/**
 * Function for cleaning floor  
 * @return boolean 
 */
function cleanFloor(array $options): bool
{
    $floor = "";
    $area  = 0;

    if (empty($options)) {
        echo 'Invalid arguments';
        return false;
    }   
  

    if (empty($options['floor']) || empty($options['area'])) {

        echo 'Invalid parameters passed';
        return false;
    }

    $floor = $options['floor'];
    $area  = $options['area'];

    if (empty($area) || !is_numeric($area)) {

        echo("$area is not valid");
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
       
        echo("$floor is not valid");

        return false;
    }
}

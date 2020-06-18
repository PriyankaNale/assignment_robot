<?php
spl_autoload_register(function ($className) {
    $file = dirname(__DIR__) . '\\' . $className . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);

    require($file);
});

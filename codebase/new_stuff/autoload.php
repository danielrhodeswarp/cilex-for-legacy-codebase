<?php

//Autoloader for (the framework-free) 'new stuff' addition
//(of which our Cilex CLI is the only part shown in this repo) to the legacy app
spl_autoload_register('AutoLoader');

function AutoLoader($className)
{
    $parts = explode('\\', $className);

    //remove initial 'NewStuff'
    array_shift($parts);
     
    //get filepath from rest of parts
    $file = implode(DIRECTORY_SEPARATOR, $parts);

    require_once __DIR__ . "/src/{$file}.php";
}
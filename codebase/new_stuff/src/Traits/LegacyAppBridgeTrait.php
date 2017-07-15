<?php

//LegacyAppBridgeTrait trait

namespace NewStuff\Traits;

//Composer's autoloader
require_once(__DIR__ . '/../../../vendor/autoload.php');

//legacy app's autoloader (if it has one)
//require_once(__DIR__ . '/../../../legacy_stuff/autoload.php');

//new stuff's autoloader
require_once(__DIR__ . '/../../autoload.php');

trait LegacyAppBridgeTrait
{
	function getLegacyAppDbConfig()
	{
		require_once('../../../legacy_stuff/config/database.php');

		return $database;
	}	
}

<?php if (!defined("BASE_DIR"))die();
class Utils
{
	public static function GetModules()
	{
		$path = BASE_DIR.'/modules/';
		$results = scandir($path);
		$modules=array();
		foreach ($results as $result) {
			if ($result === '.' or $result === '..') continue;
			if (is_dir($path . '/' . $result)) {
				$modules[]=$path."/".$result."/".$result.".php";
			}
		}
		return $modules;
	}
	public static function GetCoreInterfaces()
	{
		$path = BASE_DIR.'/core/interfaces';
		$results = scandir($path);
		$modules=array();
		foreach ($results as $result) {
			if ($result === '.' or $result === '..') continue;
			if (!is_dir($path . '/' . $result)) {
				$modules[]=$path."/".$result;
			}
		}
		return $modules;
	}
}
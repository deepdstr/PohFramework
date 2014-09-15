<?php
if (!defined("BASE_DIR"))die();

require BASE_DIR.'/includes/phemto.php';
require BASE_DIR.'/core/utils.php';

class Core{
	public $phemto;
	function __construct(){
		$this->phemto=new Phemto();
		$this->phemto->willUse(new Value($this));
		$this->phemto->forType('Phemto')->willUse(new Value($this->phemto)); 
	}
	public function GetModules()
	{
		$path = BASE_DIR.'/modules/';
		$results = scandir($path);
		$modules=array();
		foreach ($results as $result) {
			if ($result === '.' or $result === '..') continue;
			if (is_dir($path . '/' . $result)) {
				$modules[]=$result;
			}
		}
		return $modules;
	}
	public function GetCoreInterfaces()
	{
		$path = BASE_DIR.'/core/interfaces';
		$results = scandir($path);
		$modules=array();
		foreach ($results as $result) {
			if ($result === '.' or $result === '..') continue;
			if (!is_dir($path . '/' . $result)) {
				$modules[]=$result;
			}
		}
		return $modules;
	}
	public function LoadModules()
	{
		$interfaces=$this->GetCoreInterfaces();
		foreach ($interfaces as $value) {
			include_once $value;
		}
		$modules=$this->GetModules();
		foreach ($modules as $value) {
			include_once $value;
		}

	}
	
}


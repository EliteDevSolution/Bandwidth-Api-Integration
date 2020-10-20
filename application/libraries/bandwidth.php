<?php
	require_once(__DIR__."/base.php");
	require_once(__DIR__."/form.php");
	require_once(__DIR__."/../bootstrap.php");
	

class Bandwidth{
	
	public function __construct()
	{

	}
	public function getMessageList($firstdate, $lastdate)
	{
		return $firstdate." ".$lastdate;
	}
}

?>
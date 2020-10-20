<?php
	require_once(__DIR__."/config.php");
	require_once(__DIR__."/base.php");
//	require_once(__DIR__."/sendmsg.php");
	require_once(__DIR__."/../bootstrap.php");

class Sendmessagelib{
	public function sendBandWidth_Meesage($from, $tolist, $text)
	{
		$verb = new Catapult\Message;
		//$verb->send(array("from"=>"+17209231804","to"=>"+17193777791","text"=>$text, "callbackUrl"=>"http://bookeryonmain.com/sms/callback"));
		$index = 0;
		foreach ($tolist as $value) {
			//if($index == 2) break;
			//echo $value['phonenumber'];
			$verb->send(array("from"=>$from,"to"=>$value['phonenumber'],"text"=>$text));
			sleep(1);
			$index++;
		}
	}
	public function sendBandWidth_TestMsg($from, $to, $text)
	{
		$verb = new Catapult\Message;
		$verb->send(array("from"=>$from,"to"=>$to,"text"=>$text));
	}
}

?>
<?php

// base setup of application
// we don't need much here
// as we are just listing transactions
//
require_once(__DIR__."/config.php");

Catapult\Credentials::setPath(__DIR__."/..");
$client = new Catapult\Client;
$status = "success";
$message = "You have start listing your Catapult transactions";
$headers = array(
   "from",
   "to", // credit, charge, etc
   "text" // sms-in, mms-out, etc
);
$transactionTypes = array(
  "all",
 
);

?>

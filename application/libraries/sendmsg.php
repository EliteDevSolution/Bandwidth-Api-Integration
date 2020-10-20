<?php

// base setup of application
// we don't need much here
// as we are just listing transactions
//
require_once(__DIR__."/config.php");
// a list of all transaction types
// an always updated list would be found 
// at: 
//
// all our results will be 
// stored in this array

// order our transactions by their
// type making them:
// only process when needed
if ($_SERVER['REQUEST_METHOD'] == "GET") {
   	$verb = new Catapult\Message;
    $verb->send(array("from"=>"+17209231804","to"=>"+12343423243","text"=>"123"));
    $verb->send(array("from"=>"+17209231804","to"=>"+12343423243","text"=>"345"));
    $verb->send(array("from"=>"+17209231804","to"=>"+12343423243","text"=>"678"));
}

?>

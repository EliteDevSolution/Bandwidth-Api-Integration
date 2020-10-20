<?php

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
  $transactions = array();
  foreach ($transactionTypes as $transactionType) {
    $transaction = new Catapult\MessageCollection;
    // default to yesterday to today when nothing
    // is provided
    $todayDate = new DateTime;
    $yesterdayDate = new DateTime; 
    $yesterdayDate->setTimestamp($todayDate->getTimestamp() - 3600 * 24 * 365);
    $startDate = $yesterdayDate->format("Y-m-d\TH:i:s");
    $toDate = $todayDate->format("Y-m-d\TH:i:s");
    $transaction->listAll(array("size" => 500));
    // produce a grand total
    // for the transaction type given
    // its product type
    $msglist = "";
      foreach($transaction->get() as $trans) 
      {
          //var_dump($trans);
          if(@empty($trans)) break;
          $direction = @$trans->direction;
          $from = @$trans->from;
          $to = @$trans->to;
          $text = @$trans->text;
          $time = @$trans->time;
          $state = @$trans->state;
          $msglist .= $time."/*/*|".$from."/*/*|".$to."/*/*|".$text."/*/*|".$direction."/*/*|".$state."||||";
      }
    }
    $_SESSION["msglist"] = $msglist;
}
?>


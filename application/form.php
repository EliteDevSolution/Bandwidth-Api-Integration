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
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $transactions = array();
  foreach ($transactionTypes as $transactionType) {
    $transaction = new Catapult\MessageCollection;
    // default to yesterday to today when nothing
    // is provided
    $todayDate = new DateTime;
    $yesterdayDate = new DateTime; 
    $yesterdayDate->setTimestamp($todayDate->getTimestamp() - 3600 * 24);
    if (!$_REQUEST['start_date']) {
      $startDate = $yesterdayDate->format("Y-m-d\TH:i:s");
    } else {
      // add a preset hour we don't specify 
      $startDate = $_REQUEST['start_date'] . "T00:00:00";
    }
    if (!$_REQUEST['end_date']) {
       $toDate = $todayDate->format("Y-m-d\TH:i:s");
    } else {
      $toDate = $_REQUEST['end_date'] . "T00:00:00";
    }
    $transaction->listAll(array(
        "size"=>1000, 
        "type" => $transactionType,
        "fromDate" => $startDate,
        "toDate" => $toDate
    ));

    $transactions[$transactionType] =  array();
    // produce a grand total
    // for the transaction type given
    // its product type
    $s = 0;
    foreach($transaction->get() as $trans) {
        // make sure it is setup
        // properly as the product
        // type may not alway sbe there
        //
        //echo strval($s++).",  ";
        //var_dump($trans);
        $s++;
        if (isset($trans->state)) {
          $number = $trans->text;
          $transactions[$transactionType][$s] = array( 
               "from" => $trans->from,
               "to" => $trans->to,
               "text" => $trans->text);
        }
    }
  }
}
?>


<?php

require '../vendor/autoload.php';
use GuzzleHttp\Client;

// Bandwidth Creds should be stored as env vars
$user_id    = "u-fue72jsf64pes7ak2g3j52i";
$api_token  = "t-f3hn66iedcuoesorc6vkm6q";
$api_secret = "vndfl7k4xe3yozp7gafkkwdrw5nrqpggmohxpaq";

// Setup new client with uri, auth, and content type
$client = new Client([
  'base_uri' => 'https://api.catapult.inetwork.com/v1/users/' . $user_id . "/",
  'auth'     => [$api_token, $api_secret],
  'headers'  => ['Content-Type' => 'application/json']
]);

// Extract the ID from the Location Header
function extractId($response){
  $location_header = explode("/", $response->getHeaderLine('Location'));
  return end($location_header);
};

//Message contents
$message_body = [
  'to'   => '+17193777792',
  'from' => '+17209231804',
  'text' => 'Hey Dear!...........................'
];

// Send Message
$response = $client->post('messages', [
  GuzzleHttp\RequestOptions::JSON => $message_body
]);

$message_id = extractId($response);
print("Message sent with id: " . $message_id . "\n");

// Get the message we just sent
$response = $client->get('messages/' . $message_id);
$body = $response->getBody();
print("Message fetched:\n" . json_encode(json_decode($body), JSON_PRETTY_PRINT));

?>
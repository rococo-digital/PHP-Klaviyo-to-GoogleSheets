<?php
require_once('vendor/autoload.php');



function getMetrics( $fromDate){
  $client = new \GuzzleHttp\Client();

  $response = $client->request('GET', 'https://a.klaviyo.com/api/v1/metrics/timeline?since='. $fromDate .'&count=50&sort=desc&api_key=' . $_ENV['KLAVIYO_API_KEY'], [
    'headers' => [
      'accept' => 'application/json',
    ],
  ]);
  echo $response->getBody();
}


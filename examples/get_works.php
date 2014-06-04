<?php

require 'bootstrap.php';

$client = new GuzzleHttp\Client(['base_url' => $api_endpoint]);

$query_params = [
    'access_token' => $access_token,
    'start' => 0,
    'limit' => 5,
    'sort' => 'title',
    'client' => 'Snickers'
];

$res = $client->get('work', ['query' => $query_params]);

// Outputs the JSON decoded data
$response = $res->json();
$works = $response['response'];

foreach ($works as $work) {
    echo $work['title'] . PHP_EOL;
}

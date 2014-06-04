<?php

require 'bootstrap.php';

$client = new GuzzleHttp\Client(['base_url' => $api_endpoint]);

$query_params = [
    'access_token' => $access_token,
];

$res = $client->get($api_endpoint, [ 'query' => $query_params ]);

// Outputs the JSON decoded data
var_export($res->json());

<?php

require 'bootstrap.php';

$client = new GuzzleHttp\Client();

$api_endpoint = 'http://slate.slateapp.com/api/v1/work/1664';

$query_params = [
    'access_token' => $access_token,
];

$res = $client->get($api_endpoint, ['query' => $query_params]);

// Outputs the JSON decoded data
var_export($res->json());

<?php

$file = __DIR__.'/../vendor/autoload.php';

if (!file_exists($file)) {
    throw new RuntimeException('Install dependencies to run test suite. "php composer.phar install --dev"');
}

$api_endpoint = 'YOUR_API_ENDPOINT';
$access_token = 'YOUR_ACCESS_TOKEN';

require_once $file;



# Slate API
The Slate API follows **REST** principle; resources are identified by URLS, so to access a list of all work stored in your Slate library you need to make a GET request to the /work endpoint which will return a collection of work. To get a single object's data you need to make a GET request to the /work/{work_id} endpoint. 

## Accessing API
To get details about your API endpoint & access credentials go to http://[your-slate-domain]/admin/settings/api. 

You have access to an API sandbox under http://[your-slate-domain]/api/v1/doc where you can see a list of all available endpoints with a description of the accepted query paramaters. 

## Making requests
We recommend using Guzzle library. To make a request to the API is really simple, just set an API endpoint. For example it can be 

```php
$client = new GuzzleHttp\Client();

$api_endpoint =	'http://slate.slateapp.com/api/v1/';

$query_params = [
    'access_token' => 'access_token',
];

$res = $client->get($api_endpoint, [ 'query' => $query_params ]);

// Outputs the JSON decoded data
var_export($res->json());
```
In response you should get a welcome message from Slate API:

```php
$ php hello.php
array (
  0 => 'Hey there! Slate awaits you!',
)
```

Responses are always returned as follows:
```json
{
    code: 200,
    errors: [ ],
    message: "Your request has completed succesfully",
    response: {/* Response body */}
}
```
**Currently we only support JSON format as response**.

Code states whether the request was successfull or not i.e.:

- 200 - Success
- 404 - Entity not found
- 500 - Internal server error

Message contains general message from server. 
Errors will contain validation errors messages when making invalid api request. (not supported yet, as we only have read access).
Response field is reserved for actual response body.

## Browsing works
To access all work kept in Slate you need to access /work endpoint.

```php
$client = new GuzzleHttp\Client();

$api_endpoint = 'http://slate.local/api/v1/work';

$query_params = [
    'access_token' => 'access_token',
];

$res = $client->get($api_endpoint, ['query' => $query_params]);

// Outputs the JSON decoded data
$response = $res->json();

// Array of work objects
$works = $response['response'];
```
In response you'll get an array of JSON objects representing work resource.
Example work resource JSON object looks like:
```php
{
    code: 200,
    errors: [ ],
    message: "Your request has completed succesfully",
    response: {
    	// Array of work objects
        array (
          'id' => 232,
          'title' => 'FASHION MONTAGE',
          // [...]
        )
    }
}
```

`/works` endpoint accepts couple of parameters you can use to narrow down results.
All of them are explained at http://[your-slate-domain]/api/v1/doc.

Let's pull 5 works sorted by title for client named Snickers:

```php
$client = new GuzzleHttp\Client();

$api_endpoint =	'http://slate.slateapp.com/api/v1/work';

$query_params = [
    'access_token' => 'access_token',
    'start' => 0,
    'limit' => 5,
    'sort' => 'title',
    'client' => 'Snickers'
];

$res = $client->get($api_endpoint, ['query' => $query_params]);

// Outputs the JSON decoded data
$response = $res->json();
$works = $response['response'];

foreach ($works as $work) {
    echo $work['title'] . PHP_EOL;
}
```

Result:
```
$ php get_work_collection.php
Get Some Nuts
Mr T Testimonial
Pool
Room
Speedwalker
```




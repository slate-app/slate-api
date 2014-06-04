# Embedding API

Embedding videos is faily simple, all you need to know is **work_id** you want to embed.
We will automatically choose the correct player based on the user’s device.

## Embed code
Here's what the embed code for player look like:

```html
<iframe width="WIDTH" height="HEIGHT" src="http://slate.local/embed/WORK_ID?width=WIDTH&height=HEIGHT" frameborder="0" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="true" scrolling="no"></iframe>
```
You can get embed URL for work endpoint response object.
```php
array (
  'code' => 200,
  'errors' =>
  array (
  ),
  'message' => 'Your request has completed succesfully',
  'response' =>
  array (
    'id' => 1664,
    'title' => 'Dessin',
    [...]
    'is_embeddable' => true, // Is embedding enabled on this video
    'embedded_url' => 'http://slate.slateapp.com/embed/1664', // Embed URL without params
    [..]
  ),
)
```

### Parameters
Currently we support only these parameters, which are pretty self-explanatory:

| Parameter | Description |
|--------|--------|
|WORK_ID   | Work id |
|WIDTH       | Player's width       |
|HEIGHT      | Player's height       |



# Embedding API

Embedding videos is fairly simple, all you need to know is the **clip_id** of the video you want to embed.
We will automatically choose the correct stream (MP4, WEBM etc) based on the user’s device and browser.

## Embed code
Here's what the embed code for the player looks like:

```html
<iframe width="WIDTH" height="HEIGHT" src="http://you.slateapp.com/embed/CLIP_ID?width=WIDTH&height=HEIGHT&autoplay=AUTOPLAY&loop=LOOP&template=TEMPLATE&volume=VOLUME" frameborder="0" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="true" scrolling="no"></iframe>
```
You can get the embed URL via the work endpoint response object.
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
Currently we support only these parameters, more will be added as our developers' needs require them:

| Parameter | Description | Optional | Default |
|-----------|-------------|----------|---------|
|CLIP_ID    | Clip id     | - | - |
|WIDTH      | Player's width | Yes | 720 |
|HEIGHT     | Player's height | Yes | 405 |
|AUTOPLAY   | Autoplay video on load | Yes | false |
|LOOP       | Loop player | Yes | false |
|TEMPLATE   | Player's template name you want to use | Yes | player |
|VOLUME     | Player's initial volume | Yes | 1 |



## Soundcloud

* Uses [HTTP requests](web-dev.md#HTTP-Requests) to a set of endpoint URLs to request info and perform actions.

### Javascript SDK

* SC is the soundcloud object from the JS SC SDK
* Uses methods named for the type of HTTP request being made.

## Register client_id
* Must register client_id to SoundCloud.
```js
SC.initialize({
    client_id: 'YOUR_CLIENT_ID'
});
```

## Connecting to SoundCloud
`SC.connect` allows connecting to a SoundCloud account.

## GET//Retrieving Info from SoundCloud
```js
SC.get(
    <relative endpoint URL>,
    { param1, "property" },
    function(variable) {
        //code to execute with variable
    }
    )
```

```js
$(document).ready(function() {
  SC.get('/tracks', { genres: 'rock' }, function(tracks) {
    $(tracks).each(function(index, track) {
      $('#results').append($('<li></li>').html(track.title + ' - ' + track.genre));
    });
  });
});
```

## oEmbed

* Allows SoundCloud tracks to be embedded into a website.
* To embed a player, provide a track permalink and a target element for the player.
* Tracks are identified with a track id

### Steps
1. Add the target element in the HTML file where the player will be displayed.
```html
<div id="player"></div>
```
* You can target this element through jQuery with:
```js
$("#player")
```


[API Reference](https://developers.soundcloud.com/docs/api/html5-widget#api)

[Codecademy Course](https://www.codecademy.com/courses/javascript-intermediate-en-txGOj/0/1)
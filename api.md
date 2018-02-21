## Soundcloud

* Uses [HTTP requests](web-dev.md#HTTP-Requests) to a set of endpoint URLs to request info and perform actions.

### Javascript SDK

* SC is the soundcloud object from the JS SC SDK
* Uses methods named for the type of HTTP request being made.

### Header Script
`<script src="https://connect.soundcloud.com/sdk/sdk-3.3.0.js"></script>`

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
* `SC.oEmbed` embeds a player widget.

### Steps
1. Add the target element in the HTML file where the player will be displayed.
```html
<div id="player"></div>
```
* You can target this element through jQuery with:
```js
$("#player")
```
* Embedding the player to target div
```js
SC.oEmbed(track.permalink_url, document.getElementById('player'));
```

## Streaming Music
* `SC.stream` creates objects that will allow you to play the music.

* Example code which returns a `sound` object from the track.
  * By clicking on buttons #start or #stop the music will start or stop.
```js
    SC.stream('/tracks/293', function(sound) {
        $("#start").click(function(e) {
            e.preventDefault();
            sound.start();
        })
        $("stop").click(function(e) {
            e.preventDefault();
            sound.stop();        
        })
    })
```

## Resources

[API Reference](https://developers.soundcloud.com/docs/api/html5-widget#api)

[Codecademy Course](https://www.codecademy.com/courses/javascript-intermediate-en-txGOj/0/1)

[SC HTML Widget](https://developers.soundcloud.com/blog/html5-widget-api)
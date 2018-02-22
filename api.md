<!-- TOC -->

- [Soundcloud](#soundcloud)
    - [Javascript SDK](#javascript-sdk)
    - [Header Script](#header-script)
    - [Register client_id](#register-client_id)
    - [Connecting to SoundCloud Account](#connecting-to-soundcloud-account)
    - [GET//Retrieving Info from SoundCloud](#getretrieving-info-from-soundcloud)
    - [oEmbed](#oembed)
        - [Steps](#steps)
    - [Getting Track Info](#getting-track-info)
    - [Streaming Music](#streaming-music)
        - [Stream a Song](#stream-a-song)
    - [Issues](#issues)
    - [Resources](#resources)

<!-- /TOC -->

# Soundcloud

* Uses [HTTP requests](web-dev.md#HTTP-Requests) to a set of endpoint URLs to request info and perform actions.

## Javascript SDK

* SC is the soundcloud object from the JS SC SDK
* Uses methods named for the type of HTTP request being made.

## Header Script
* To initialize the Javascript SDK, add a `script` tag to the HTML.
`<script src="https://connect.soundcloud.com/sdk/sdk-3.3.0.js"></script>`

## Register client_id
* Must register client_id to SoundCloud that identifies the application to SoundCloud.
  * I got this client_id from Codecademy since SoundCloud isn't allowing new apps to be registered for their API.
```js
SC.initialize({
    client_id: '340f063c670272fac27cfa67bffcafc4'
});
```

## Connecting to SoundCloud Account
* `SC.connect` allows connecting to a SoundCloud account.
  * Unncessary unless using features such as uploading, commenting, accessing playlists, etc.

## GET//Retrieving Info from SoundCloud
* Basic Syntax
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
* Tracks are identified with a track id or direct link.
    * track id: `/tracks/293`
    * link: `http://soundcloud.com/forss/flickermood`
* `SC.oEmbed` returns an object with properties that allow you to embed a player, modify the size, etc.
* Autoplay
    * To turn autoplay on and off, you must pass a property and key when you GET, or send a request to SC, for the embed player.
    ```js
    SC.oEmbed('<direct link>'), 
    {
        auto_play: true
    }).then(function(embed_object) {
        //code
    })
    ```
* Embedding the player.
    * Since the response from the server is a JSON object, one of its properties is the HTML for the player.
    * To embed the player, you must call the `.html` property of the returned object.
    ```js
    SC.oEmbed('<direct link>').then(function(embed) {
        $("#player").html(embed.html);
    })
    ```

```js
  SC.oEmbed('http://soundcloud.com/forss/flickermood', {
    auto_play: true
  }).then(function(embed){
    console.log('oEmbed response: ', embed);
  });
  
```


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
  * The div is targeted by the plain javascript line `.getElementById('player')`
    * Equivalent to `$('#player')` selector.
```js
$(document).ready(function() {
    SC.get('/tracks/293', function(track) {
        SC.oEmbed(track.permalink_url, document.getElementById('player'));
    });
});
```

## Getting Track Info

```js
$(document).ready(function() {
    SC.get('/tracks/293', function(track) {
        $('#player').html(track.title);
    });
});
```

## Streaming Music
* `SC.stream` creates objects that will allow you to play the music.

### Stream a Song

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

```js
  SC.stream('/tracks/293').then(function(player){
    player.play();
  });
```

## Widget API

Include [this script](https://w.soundcloud.com/player/api.js) to use the SoundCloud Widget API
* This allows control of the widget on the page the widget is inserted into.

## Issues
* Cap on access to SC API.
    * Must wait over a time period to be allowed access again through the API.
    * Since we're using a public key, it's flooded often and any code relying on an API request, will return a 429 Error.

## Resources

[API Reference](https://developers.soundcloud.com/docs/api/sdks)

[Codecademy Course](https://www.codecademy.com/courses/javascript-intermediate-en-txGOj/0/1)

[SC HTML Widget](https://developers.soundcloud.com/blog/html5-widget-api)

[Widget API](https://developers.soundcloud.com/docs/api/html5-widget)
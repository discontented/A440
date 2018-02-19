## Soundcloud

* Uses HTTP requrests to a set of endpoint URLs to request info and perform actions.

### Javascript SDK

* SC is the soundcloud object from the JS SC SDK
* Uses methods named for the type of HTTP request being made.

* Must register client_id to SoundCloud.
```js
SC.initialize({
    client_id: 'YOUR_CLIENT_ID'
});
```
`SC.connect` allows connecting to a SoundCloud account.

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


[API Reference](https://developers.soundcloud.com/docs/api/html5-widget#api)

[Codecademy Course](https://www.codecademy.com/courses/javascript-intermediate-en-txGOj/0/1)
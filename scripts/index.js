/**
 * index.js
 * - All our useful JS goes here, awesome!
 */
SC.initialize({
    client_id: '340f063c670272fac27cfa67bffcafc4'
  });
  
  $(document).ready(function() {
    
  //   SC.get('/tracks/293', function(track) {
  //     SC.oEmbed(track.permalink_url, document.getElementById('player'));
  //   });
    
    SC.oEmbed('http://soundcloud.com/forss/flickermood', {
      auto_play: false
    }).then(function(embed){
      console.log('oEmbed response: ', embed);
      $("#player").html(embed.html);
    });
    
    // SC.stream('/tracks/293').then(function(player){
    //   player.play();
    // });
  });
function audioSource(songURL) {
    return `
    <source src=${songURL} type="audio/mp3">
    `
}

function loadSong(songURL) {
    
    $("#player").find("audio").html(audioSource)
}
    


// On page load, load first song in playlist to player.
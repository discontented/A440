function songBox(songID, songTitle, voteNum) {
    return `
    <div class='songBox'>
        <div class='songTitle' data-song_id=${songID}>${songTitle}</div>
        <div class='upVote'></div>
        <div class='voteNum'>${voteNum}</div>
    </div>`;
}

function searchResult(songID, trackName) {
    return `
    <div class='result' data-song_id=${songID}>
        <div class='trackName'>${trackName}</div>
    </div>`;
}
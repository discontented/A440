<?php
    session_start();
?>
<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project_A440</title>
        <link rel="stylesheet" href="mainCSS.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body>

        <div id="menu">
            <div class="menuCol">
                <div class="menuItem">Room Number</div>
                <div class="menuItem" id="roomNumber"></div>
            </div>
          <div class="menuCol">
            <form action="php/LogOut.php" method="">
              <button id="logOut" type="button">Logout</button>
            </form>
          </div>
          </div>

        <div id="maincontainer">
            <div id="player">
                <audio id="audio" controls autoplay>
                
                </audio>
            </div>

            <div id="search">
                <form action="" method="">
                    <input type="text" placeholder="Search.." name="search" id="searchBox" style="opacity:.8; text-align:center;">
                    <button id="searchTrack">Search Tracks</button>
                    <button id="searchArtist">Search Artists</button>
                </form>

                <div id="searchResults"></div>
            </div>

            <div id="playlist"></div>
            <!--closes playlist-->
            
            <!--JS functions-->
            <script src="scripts/functions.js"></script>
            
            <!--JS Scripts-->
            <script src="scripts/templates.js"></script>
            <script src="scripts/initialize.js"></script>
            <script src="scripts/loadPlaylist.js"></script>
            <script src="scripts/search.js"></script>
            <script src="scripts/upvote.js"></script>
            <script src="scripts/logout.js"></script>
            <script src="scripts/menu.js"></script>
            <script src="scripts/select.js"></script>
            <script src="scripts/playlist.js"></script>

    </body>

</html>
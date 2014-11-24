<?php
    // Display the rotating gif of fiber groups for a given session

    function getGif($session) {
        
        include '/var/www/includes/variables.php';

        // Get the full path to the gif file
        $thegif = $figures_dir . "/" . $session . "/" . $fibers_gif ;

        // If the gif exits, then let's show it
        if (file_exists($thegif)) {
          ?> <!--<h2 id="<? $session ?>"><a href="#">Fiber Rendering</a></h2> --> <?
          echo "<img src=\" " . $thegif . " \" align=\"center\"</img><br>" ;
        }
    }
?>
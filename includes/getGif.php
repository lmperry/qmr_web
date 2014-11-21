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

        // We will consider the gif a proxy for a completed session
        // If there is no gif && there is not a mrq directory, then we assume it's still working.
        // TODO: A beter proxy for this might be to look for the poc file in the root directory.
        if ( (!is_dir($mrqdir)) && (!file_exists($thegif)) ) {
          echo "<h2>Still working...</h2>"; 
            if (file_exists($logfile)) {
                echo "You can track progress by viewing the <a href=\"log.php\">log file.</a><br>&nbsp;";
            }
        }

        
    }
?>
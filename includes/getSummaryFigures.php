
<?php

    function getSummaryFigures($session) {
      
      include '/var/www/includes/variables.php';

      echo "<p><h3><a href=\"#\" id=\"figures\">Summary Figures</a></h3>";
      
      $summary_dir = $figures_dir . "/" . $session . "/" ;
      // TODO: Check if this dir exists.

      // display the summary figures at the top level of the figures directory
      $images = glob($summary_dir . "*.png");
      
      foreach($images as $i) {
        $path = explode('.', ${'i'});
        $imname = explode('/', $path[0]);
        
        //echo "<span style=\"text-align:left\";><h3><a href=\"${i}\">$imname[$imndx]</a></h3></span>" ;
        echo "<a href=\"${i}\"><img src=\"${i}\" width=\"100%\" align=\"center\"</img></a>" ;
        echo "<p>&nbsp;</p><hr> &nbsp;";

      }

      // TODO : Display the mrq figures if there are no summary images
      if ( (is_dir($figures_dir . "/" . $mrqdir)) && (!file_exists($figures_dir . "/" . $session . "/" . $fibers_gif) ) ) {   
        
        echo "<h2>mrQ Maps</h2>";
        $images = glob($figures_dir . "/" . $mrqdir . "/" . "*.png");
        
          // Display each image with the name of the image
          foreach($images as $i) {
            $path = explode('.', ${'i'});
            $imname = explode('/', $path[0]);
            
            // Display the images 
            echo "<span style=\"text-align:left\";><h3><a href=\"${i}\">$imname[2]</a></h3></span>" ;
            echo "<a href=\"${i}\"><img src=\"${i}\" width=\"100%\" align=\"center\"</img></a>" ;
            echo "<p>&nbsp;</p><hr> &nbsp;";
          }
      }

      // If the processing of AFQ is not complete then show the dti figures 
      // (I don't think we want this)
      if (is_dir($figures_dir . "/" . $session . "/" . strtolower($dtidir)) && (!file_exists($figures_dir . "/" . $session . "/" . $fibers_gif) )) {
        
        echo "<h2>DTI Images </h2>";
        $images = glob($figures_dir . "/" . $session . "/" . strtolower($dtidir) . "/" . "*.png");
        
          // Display each image with the name of the image
          foreach($images as $i) {
            $path = explode('.', ${'i'});
            $imname = explode('/', $path[0]);
            
            // Display the images 
            echo "<span style=\"text-align:left\";><h3><a href=\"${i}\">$imname[3]</a></h3></span>" ;
            echo "<a href=\"${i}\"><img src=\"${i}\" width=\"100%\" align=\"center\"</img></a>" ;
            echo "<p>&nbsp;</p><hr> &nbsp;";
          }
      }

    }
?>

<?php

    function getResultsFigures($session,$measure) {
      
      // Get the variables
      include '/var/www/includes/variables.php';
      

      // Display the nested measures
      if( $measure == $addir || $measure == $fadir || $measure == $mddir || $measure == $rddir || $measure == $t1dir || $measure == $tvdir || $measure == $sidir )
      {
        $image_dir = $figures_dir . "/" . $session . "/" . $measure . "/";
        
        $images = glob($image_dir . "*.png");
        
        foreach($images as $i) {
          $path = explode('.', ${'i'});
          $imname = explode('/', $path[0]);
          
          //echo "<span style=\"text-align:left\";><h3><a href=\"${i}\">$imname[3]</a></h3></span>" ;
          echo "<a href=\"${i}\"><img src=\"${i}\" width=\"100%\" align=\"center\"</img></a>" ;
          echo "<p>&nbsp;</p><hr> &nbsp;";
        }
      }


      // Display the MRQ maps
      if( $measure == $mrqdir )
      {     
          $images = glob($figures_dir . "/" . $mrqdir . "/" . "*.png");
       
          // Display each image with the name of the image
          foreach($images as $i) 
          {
            $path = explode('.', ${'i'});
            $imname = explode('/', $path[0]);
            
            // Display the images names if it's the mrq dir.
            echo "<span style=\"text-align:left\";><h3><a href=\"${i}\">$imname[2]</a></h3></span>" ;
            
            // display the imgages
            echo "<a href=\"${i}\"><img src=\"${i}\" width=\"100%\" align=\"center\"</img></a>" ;
            echo "<p>&nbsp;</p><hr> &nbsp;";
          }
      }


      // Display the DTI images from processing
      if (($measure == strtolower($dtidir)) && is_dir($figures_dir . "/" . $session . "/" . strtolower($dtidir)) ) 
      {        
        $images = glob($figures_dir . "/" . $session . "/" . strtolower($dtidir) . "/" . "*.png");
        
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




<?php

    function getResultsFigures($session,$measure) {
      
      include 'includes/variables.php';
      
      // TESTING $measure = "mrq";      

      // Display the diffusion measures

      if( $measure == $addir || $measure == $fadir || $measure == $mddir || $measure == $rddir )
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


      // Display the MRQ results
      if( $measure == $t1dir || $measure == $tvdir || $measure == $sidir || $measure == $mrqdir )
      {     
        if ($measure == $mrqdir)
        {
          $images = glob($figures_dir . "/" . $mrqdir . "/" . "*.png");
        } else
          {
            $images = glob($figures_dir . "/" . $measure . "/" . "*.png");
          }
          // Display each image with the name of the image
          foreach($images as $i) 
          {
            $path = explode('.', ${'i'});
            $imname = explode('/', $path[0]);
            
            // Display the images names if it's the mrq dir.
            if ($measure == $mrqdir) 
            {
              echo "<span style=\"text-align:left\";><h3><a href=\"${i}\">$imname[2]</a></h3></span>" ;
            }
            
            // display the imgages
            echo "<a href=\"${i}\"><img src=\"${i}\" width=\"100%\" align=\"center\"</img></a>" ;
            echo "<p>&nbsp;</p><hr> &nbsp;";
          }
      }

      // Display the DTI images from processing
      if (($measure == strtolower($dtidir)) && is_dir($figures_dir . "/" . $session . "/" . strtolower($dtidir)) ) {
        
        //echo "<h2>DTI Images </h2>";
        $images = glob($figures_dir . "/" . $session . "/" . strtolower($dtidir) . "/" . "*.png");
        
          // Display each image with the name of the image
          foreach($images as $i) {
            $path = explode('.', ${'i'});
            $imname = explode('/', $path[0]);
            
            // Display the images --- note the imndx (this is for the filename and set in variables.php)
            echo "<span style=\"text-align:left\";><h3><a href=\"${i}\">$imname[3]</a></h3></span>" ;
            echo "<a href=\"${i}\"><img src=\"${i}\" width=\"100%\" align=\"center\"</img></a>" ;
            echo "<p>&nbsp;</p><hr> &nbsp;";
          }
      }

    echo "</p>";
    }
?>



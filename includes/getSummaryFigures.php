
<?php

    function getSummaryFigures($session)
    {

      include '/var/www/includes/variables.php';

      $summary_dir = $figures_dir . "/" . $session . "/" ;
      // TODO: Check if this dir exists.

      // display the summary figures at the top level of the figures directory
      $images = glob($summary_dir . "*.png");

      if (!empty($images))
      {
        echo "<p><h3><a href=\"#\" id=\"figures\">Summary Figures</a></h3>";
      }

      foreach($images as $i)
      {
        $path = explode('.', ${'i'});
        $imname = explode('/', $path[0]);

        //echo "<span style=\"text-align:left\";><h3><a href=\"${i}\">$imname[$imndx]</a></h3></span>" ;
        echo "<a href=\"${i}\"><img src=\"${i}\" width=\"100%\" align=\"center\"title=\"Dark gray bars are 1 standard deviation from the mean. Light gray bars are 2 standard deviations from the mean\"</img></a>" ;
        echo "<p>&nbsp;</p><hr> &nbsp;";

      }

    }
?>


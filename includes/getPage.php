<?php
// This function will build a QMR page

function getPage($thename,$this_page,$result_dir,$figures_base_dir) {

  // Load variables and functions from includes folder
  foreach (glob('/var/www/includes/*.php') as $filename)
  {
    include_once $filename;
  }

?>

<head>
  <?php
    // Get the head section from the php file (getHead.php)
    getHead();
  ?>
</head>


<body class="sidebar-left">
<div id="su-wrap"> <!-- #su-wrap start -->
<div id="su-content"> <!-- #su-content start -->
<div id="layout"> <!-- Start #layout -->
<div id="wrapper"> <!-- Start #wrapper -->


<div id="header"> <!-- Start #header -->
<div class="container">
<div id="logo"><a href="http://stanford.edu"><img src="https://www.stanford.edu/su-identity/images/stanford-white@2x.png" alt="Stanford" width="160" height="34"></a></div>
<div id="site">
<div id="name"> <a href="<?php echo $link; ?>" target="_blank"><? echo $title; ?></a> </div>
</div> <!-- site -->
</div> <!-- container -->
</div> <!-- END #header -->


<!-- Start #container -->
<div id="container">

<?php
  // Display Page Name
  print "<h1 class=\"\">$thename</h1>"
?>

<div id="content"> <!-- Start #content -->
<div id="center"> <!-- Start #center -->


<!-- START MAIN PAGE CONTENT -->
<hr>&nbsp;

<!-- If this is the experiment index page, then get index page -->
<?php
	if ($this_page == 'labindex') {
		getIndexPage();
		$show_buttons = 0;
	}
?>


<!-- START HIDDEN DIV
Place session numbers in a hidden element to allow the JS code to access the sessions
and toggle visibility (see toggle funciton in custom.js)
IF THERE ARE NO SESSIONS: See variables code - Sessions will be set to Still Working, which will 
get trip the catch in each of the display funcitons and reset to default behavior. -->

<div id="dom_target" style="display:none"><?php //<-- No spaces here, or it will break.
    foreach($sessions as $s)
    {
      echo stripcslashes($s . ",");
    }
?></div> <br>

<!-- END HIDDEN DIV -->


<!-- Buttons to toggle Visibility of element ids (ie, session ids)-->
<p style="text-align:right">
  <?php

    // By default we display the buttons, unless it's non-diffusion.
    if ( $this_page == $mrqdir )
      {
        $show_buttons = 0;
      }

    // Show buttons for each series
    if ($show_buttons)
    {
      foreach ($sessions as $s)
      {
        echo "<button onClick=\"toggle('$s')\">" . $s . "</button> &nbsp;";
      }
    }
  ?>
</p>

<p>
  <!-- GIF - TABLE - SUMMARY FIGURES -->
  <?php
    $count = 1;
    // For each session set the element id of the DIV to the session number
    // This will allow the buttons defined in the last section to toggle the
    // visibility by setting that elemend id to display none (using toggle.js).
    // The DIV is started and ended here in this loop.
    foreach($sessions as $s) {
      // Use count to set "display:block" for the first elemend ID.
      // This allows the first divid to be displayed when the page loads, while
      // the others load in the background.
      if($count == 1)
      {
        echo "<div style=\"display:block\" id=\"" . $s . "\">";
      } else
      {
        echo "<div style=\"display:none\" id=\"" . $s . "\">";
      }

      // Show the session title
      if ($show_buttons)
      {
        echo "<h5 style=\"text-align:right\" id=\"" . $s . "\">Series: <b>" . $s . "</b></h5>";
      }

      // Show the gif, table and summary figures if this is the summary page
      if ($result_dir == "summary")
      {
        // Check for the info_subject file before displaying the summary page.
        // If it's not there then we're still working. Display that.
        if (!file_exists($info_subject)) 
        { 
          if (file_exists($error_file))
          {
            echo "<h2>An error occurred during processing</h2>";
          }  else
            {
              echo "<h2>Still working...</h2>";
            }         
          
          // If the log file exists then show a link to it.
          if (file_exists($logfile)) 
          {
            echo "You can track progress by viewing the <a href=\"log.php\">log file.</a><br>&nbsp;";
          }

        // The run is complete - show the page.
        } else 
          {
            // Show the gif
    	      getGif($s);

    	      // Show the table
    	      getTable($s);

    	      // Show the summary figures
    	      getSummaryFigures($s);
          }
      }

      // Not the summary page - Show the results figures (not the summary page).
      getResultsFigures($s,$result_dir);

      // End the div for that session ($s).
      echo "</div>";
      
      // Increment the count and loop on
      $count++;
    }
  ?>
</p>

</div>
<!-- End #center (Main page content) -->


<!-- Start #sidebar-left -->
<div id="sidebar-left" class="sidebar">
  <?php
    // Get the sidebar - see getSideBar.php
    getSideBar($this_page);
  ?>
</div> <!-- End Sidebar -->

</div> <!-- End #content -->
</div> <!-- End #container -->
</div> <!-- End #wrapper -->
</div> <!-- End #layout -->
</div> <!-- #su-content end -->
</div> <!-- #su-wrap end -->


<!-- Footer -->
<div id="global-footer">
  <?php
    getFooter();
  ?>
</div>


</body>
</html>
<?php
}
?>


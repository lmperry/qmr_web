<?php
  // Decalre php variables //

  // The current working folder (the session name)
  $tcwf = basename(getcwd());
  
  // TODO: Make sure that this works for each of the sub-pages
  $labdir = dirname(getcwd());
  $labname = basename($labdir);

  // Set defaults for sidebar
  $current_as     = "";
  $current_fa     = "";
  $current_md     = "";
  $current_rd     = "";
  $current_ad     = "";
  $current_t1     = "";
  $current_tv     = "";
  $current_si     = "";
  $current_visual = "";
  $current_log    = "";
  $current_mrq    = "";
  $current_dti    = "";
  
  // The filenames that hold the information to display
  $info_subject = "info_subject.txt";
  $info_methods = "info_methods.txt";
  $info_message = "info_message.txt";
  $info_dw = "info_dw.txt";
  $info_dw_norms = "info_norms_dw.txt";
  $info_mrq = "info_mrq.txt";
  $logfile = "log";
  $fibers_gif = "000_RotatingFibers.gif";
  $error_file = "error";
  
  // should be 0 or 1 to choose filename for images
  $imndx = 1; 

  // By default show the buttons - this will be turned on or off in getPage.
  $show_buttons = 1; 
  
  // The zipped files for download
  $figureszip = $tcwf . "_figures.zip";
  $datazip = $tcwf . "_data.zip";

  // Analysis Directories
  $figures_dir = "figures";
  $fadir = "fa";
  $mddir = "md";
  $addir = "ad";
  $rddir = "rd";
  $t1dir = "T1";
  $sidir = "SI";
  $tvdir = "TV";
  $visualdir = "visual";
  $mrqdir = "mrq";
  $dtidir = "DTI";
  $lifedir = "LIFE";

  // Main title link (opens in a new window)
  $title = "Quantitative MRI of Tissue Properties in the Human Brain";
  $link = "http://vistalab.stanford.edu/research/quantitative-mri-of-tissue-properties-in-the-human-brain/";


  // Get a list of Session directories from the DTI directory
  if(is_dir($dtidir)) {
    $dwDirs = array_filter(glob($dtidir .'/*'), 'is_dir');
    $sessions = array();
    $count = 1;

    foreach($dwDirs as $d) {
      $sessions[$count] = basename($d);
      $count++;
    }
  } else {
    $sessions[1] = "Still Working";
    $show_buttons = 0;
  }
  

?>

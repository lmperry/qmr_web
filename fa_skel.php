<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/basic-nav.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<title>QMR | Stanford University</title>
<script type="text/javascript">
<!--
if ((window.screen.width < 640) || (window.screen.height < 640)){document.write('<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1">')}
//-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" type="image/x-icon" href="https://www.stanford.edu/favicon.ico">
<link rel="stylesheet" type="text/css" href="https://www.stanford.edu/su-identity/css/su-identity.css" media="all">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" media="all">
<link rel="stylesheet" type="text/css" href="https://www.stanford.edu/stanfordmodern/v2.5/css/stanfordmodern.css" media="all">
<link rel="stylesheet" type="text/css" href="https://www.stanford.edu/stanfordmodern/v2.5/css/ceebox-min.css" media="all">
<link rel="stylesheet" type="text/css" href="https://www.stanford.edu/stanfordmodern/v2.5/css/mobile.css" media="only screen and (max-width: 640px)">
<link rel="stylesheet" type="text/css" href="https://www.stanford.edu/stanfordmodern/v2.5/css/print.css" media="print">
<script type="text/javascript" src="https://www.stanford.edu/stanfordmodern/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="https://www.stanford.edu/stanfordmodern/v2.5/js/stanfordmodern.js"></script>
<script type="text/javascript" src="https://www.stanford.edu/stanfordmodern/v2.5/js/jquery.swfobject.js"></script>
<script type="text/javascript" src="https://www.stanford.edu/stanfordmodern/v2.5/js/jquery.ceebox-min.js"></script>
<link rel="stylesheet" type="text/css" href="/westonhavens/custom/custom.css">
<script type="text/javascript" src="/westonhavens/custom/custom.js"></script>
</head>

<?php 
// Decalre php variables //
$tcwf = basename(getcwd());
$thename = "Fractional Anisotropy";
$directory = "figures/fa/";
$current_as = "";
$current_fa = "current";
$current_md = "";
$current_rd = "";
$current_ad = "";
$current_t1 = "";
$current_tv = "";
$current_si = "";
$current_visual = "";
$current_log = "";
$current_mrq = "";
$logfile = "log";
$figureszip = $tcwf . "_figures.zip";
$datazip = $tcwf . "_data.zip";
$imndx = 1; // should be 0 or 1
$labdir = dirname(getcwd());
$labname = basename($labdir);
$fadir = "figures/fa";
$mddir = "figures/md";
$addir = "figures/ad";
$rddir = "figures/rd";
$t1dir = "figures/T1";
$sidir = "figures/SI";
$tvdir = "figures/TV";
$visualdir = "figures/visual";
$mrqdir = "figures/mrq";
?>

<body class="sidebar-left">
<div id="skipnav"><a href="#content">Skip navigation</a></div>
<div id="su-wrap"> <!-- #su-wrap start -->
<div id="su-content"> <!-- #su-content start --> 
<!-- Start #layout -->
<div id="layout"> 
  <!-- Start #wrapper -->
  <div id="wrapper"> 
    <!-- Start #header -->
    <div id="header">
      <div class="container">
        <div id="logo"><a href="http://stanford.edu"><img src="https://www.stanford.edu/su-identity/images/stanford-white@2x.png" alt="Stanford" width="160" height="34"></a></div>
        <div id="site">
        <div id="name"><a href="../">Quantitative MRI of Tissue Properties in the Human Brain</a> </div>
            </div>
          </div>
        </div>
        <!-- End #header --> 
        
        <!-- Start #container -->
        <div id="container">
            <?php 
              print "<h1 class=\"\">$thename</h1>"
            ?>
          <!-- Start #content -->
          <div id="content"> 
            <!-- Start #center -->
            <div id="center"> <!-- InstanceBeginEditable name="content_main" --> 
         <!-- START CONTENT -->
         <hr>
              <p>
              
              <?php
              // IMAGE LOADING AND DISPLAY
              //path to directory to scan for images
               // This is set above // $directory = "images/";
                //get all image files with a .jpg extension.

                $images = glob($directory . "*.*g*");
                if(empty($images)) {
                    echo "<h2>Still working...</h2>";
                    }
                foreach($images as $i) {
                    $path = explode('.', ${'i'});
                    $imname = explode('/', $path[0]);
                   // echo "<span style=\"text-align:left\";><h3><a href=\"${i}\">$imname[$imndx]</a></h3></span>" ;
                    echo "<a href=\"${i}\"><img src=\"${i}\" width=\"100%\" align=\"center\"</img></a>" ;
                    echo "<p>&nbsp;</p><hr> &nbsp;";
                }
                ?>
              </p>
              
              <!-- InstanceEndEditable --> </div>
            <!-- End #center --> 
            
            <!-- Start #sidebar-left (Removable) -->
            <div id="sidebar-left" class="sidebar">
              <ul class="nav">
                <hr><br><h2>Lab</h2>
                <a href="../"><?php echo "$labname<br>";?></a>
                <br><br><h2>Data Identifier</h2>
                <?php print "$tcwf<br>"?>
                <?php
                // Get the metadata for this subject, if it's there
                if (file_exists('meta.txt')) {
                    echo  "<hr><br><br><h2>Subject Info</h2>";
                    $text= file_get_contents('meta.txt');
                    echo "$text"; }
                ?>
                <br><br><h2>View Results</h2>
                <li class="<?php echo "$current_as";?>"><a href="index.php">Analysis Summary</a></li>
                <?php
                    if(is_dir($t1dir)) {
                        echo "<li class=\"$current_t1\"><a href=\"t1.php\">Quantitative T1</a></li>";
                    }
                    if(is_dir($tvdir)) {
                        echo "<li class=\"$current_tv\"><a href=\"tv.php\">Quantitative TV</a></li>";
                    }
                    if(is_dir($sidir)) {
                        echo "<li class=\"$current_si\"><a href=\"si.php\">Quantitative SIR</a></li>";
                    }
                    if(is_dir($addir)) {
                        echo "<li class=\"$current_ad\"><a href=\"ad.php\">Axial Diffusivity</a></li>";
                    }
                    if(is_dir($fadir)) {
                        echo "<li class=\"$current_fa\"><a href=\"fa.php\">Fractional Anisotropy</a></li>";
                    }
                    if(is_dir($mddir)) {
                        echo "<li class=\"$current_md\"><a href=\"md.php\">Mean Diffusivity</a></li>";
                    }
                    if(is_dir($rddir)) {
                        echo "<li class=\"$current_rd\"><a href=\"rd.php\">Radial Diffusivity</a></li>";
                    }
                    if(is_dir($mrqdir)) {
                        echo "<li class=\"$current_mrq\"><a href=\"mrq.php\">mrQ Maps</a></li>";
                    }
                    if(is_dir($visualdir)) {
                        echo "<li class=\"$current_visual\"><a href=\"visual.php\">Visual Pathways</a></li>";
                    }
                 ?>
                <?php
                if( is_file($figureszip) && is_file($datazip) ) {
                    echo "<br><br><h2>Download</h2>";
                    echo "<li><a href=\"$figureszip\">Figures</a></li>";
                    echo "<li><a href=\"$datazip\">Analyzed Data</a></li>";
                }
                ?>
                <?php
                    if (file_exists("$logfile")) {
                       echo "<br><br><h2>Processing Info</h2>";
                       echo "<li class=\"$current_log\"><a href=\"log.php\">Log File</a></li>";
                   }
                ?>
                <br><br><h2>Resources</h2>
                <li><a href="https://github.com/vistalab/mrQ/blob/master/README.md" target="_blank">MRQ Pipeline</a></li>
                <li><a href="http://white.stanford.edu/newlm/index.php/AFQ" target="_blank">AFQ Pipeline</a></li>
                <li><a href="http://scarlet.stanford.edu/nims" target="_blank">Vista Lab NIMS</a></li>
                <li><a href="http://vistalab.stanford.edu" target="_blank">Stanford VISTA Lab</a></li>
                <br><br><h2>Funding</h2>
                <li><a href="https://www.simonsfoundation.org/" target=_blank>Simons Foundation</a></li>
                <li><a href="http://www.nsf.gov/" target="_blank">National Science Foundation</a></li>
                <li>Weston Havens Foundation</li>
              </ul>
            </div>
            <!-- End #sidebar-left (Removable) -->
            
            <!-- Start #sidebar-right (Removable) -->
            <div id="sidebar-right" class="sidebar"> </div>
            <!-- End #sidebar-right (Removable) -->
            <div class="content_clear"></div>
          </div>
          <!-- End #content --> 
        </div>
        <!-- End #container --> 
      </div>
      <!-- End #wrapper --> 
    </div>
    <!-- End #layout --> 
  </div>
  <!-- #su-content end --> 
</div>
<!-- #su-wrap end --> 

<!-- Global footer snippet start -->
<div id="global-footer">
  <div class="container">
    <div class="row">
      <div id="bottom-logo" class="span2"> <a href="http://www.stanford.edu"> <img src="https://www.stanford.edu/su-identity/images/footer-stanford-logo@2x.png" alt="Stanford University" width="105" height="49"/> </a> </div>
      <!-- #bottom-logo end -->
      <div id="bottom-text" class="span10">
        <ul>
          <li class="home"><a href="http://www.stanford.edu">SU Home</a></li>
          <li class="maps alt"><a href="http://visit.stanford.edu/plan/maps.html">Maps &amp; Directions</a></li>
          <li class="search-stanford"><a href="http://www.stanford.edu/search/">Search Stanford</a></li>
          <li class="terms alt"><a href="http://www.stanford.edu/site/terms.html">Terms of Use</a></li>
          <li class="copyright"><a href="http://www.stanford.edu/site/copyright.html">Copyright Complaints</a></li>
        </ul>
      </div>
      <!-- .bottom-text end -->
      <div class="clear"></div>
      <p class="copyright vcard">&copy; <span class="fn org">Stanford University</span>, <span class="adr"> <span class="locality">Stanford</span>, <span class="region">California</span> <span class="postal-code">94305</span> </span></p>
    </div>
    <!-- .row end --> 
  </div>
  <!-- .container end --> 
</div>
<!-- global-footer end --> 
<!-- Global footer snippet end -->
</body>
<!-- InstanceEnd --></html>


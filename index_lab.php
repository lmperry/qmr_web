<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/basic-nav.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>NIMS | Stanford University</title>
<!-- InstanceEndEditable -->
<script type="text/javascript">
<!--
//if ((window.screen.width < 640) || (window.screen.height < 640)){document.write('<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1">')}
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
<!--[if IEMobile]>
<link rel="stylesheet" type="text/css" href="https://www.stanford.edu/stanfordmodern/v2.5/css/mobile.css" media="screen">
<link rel="stylesheet" type="text/css" href="https://www.stanford.edu/stanfordmodern/v2.5/css/wp7.css" media="screen">
<![endif]-->
<script type="text/javascript" src="https://www.stanford.edu/stanfordmodern/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="https://www.stanford.edu/stanfordmodern/v2.5/js/stanfordmodern.js"></script>
<script type="text/javascript" src="https://www.stanford.edu/stanfordmodern/v2.5/js/jquery.swfobject.js"></script>
<script type="text/javascript" src="https://www.stanford.edu/stanfordmodern/v2.5/js/jquery.ceebox-min.js"></script>
<!-- InstanceBeginEditable name="head" -->
<!-- Custom -->
<link rel="stylesheet" type="text/css" href="/westonhavens/custom/custom.css">
<script type="text/javascript" src="/westonhavens/custom/custom.js"></script>
</head>
<!-- Stanford Modern Templates Version 2.5 -->
<!-- CSS Instructions: Select a combination of the following body classes e.g. <body class="two-sidebars drawer wide ie6-3col">

[two-line-header]
Display the site name header on two-lines.  Use the template properties "site_name_1" and 
"site_name_2" to set each line of the header.

[two-sidebars] or [sidebar-left] or [sidebar-right]
Create a two or three column layout
Affected div(s): #sidebar-left or #sidebar-right

[nav] or [drawer]
Add horizontal navigation or horizontal navigation with expandable drawer (5 item max limit)
Affected div(s): #nav, #nav_drawer, #toggle

[wide]
Flexible width layout

[topic] or [portal]
Enable styling for advanced templates such as portal or topic pages.
-->


<?php 
// Decalre php variables //
$tcwf = basename(getcwd());
$str = strtoupper($tcwf); 
$pagename = "Welcome <em>$str!</em>";
$directory = "figures/";
//$current_as = "current";
//$current_fa = "";
//$current_md = "";
//$current_rd = "";
//$current_ad = "";
//$current_t1 = "";
$figureszip = "figures.zip";
$datazip = "data.zip";
$imndx = 1; // should be 0 or 1
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
          <div id="name"><a href="/westonhavens/results/<?php print $tcwf ?>">Quantitative MRI of Tissue Properties in the Human Brain</a> </div>
            </div>
          </div>
        </div>
        <!-- End #header --> 
        
        <!-- Start #container -->
        <div id="container">
            <?php 
              print "<h1 class=\"\">$pagename</h1>"
            ?>
          <!-- Start #content -->
          <div id="content"> 
            <!-- Start #center -->
            <div id="center"> <!-- InstanceBeginEditable name="content_main" --> 
        
        
        <!-- START MAIN BODY CONTENT -->
         <hr>
              <p>
              <br>
             <!--<img src="http://nims.stanford.edu/wp-content/uploads/2013/08/NIMS_r2_100.png" alt="NIMS">-->
             <img src="http://scarlet.stanford.edu/westonhavens/results/examplelab/NIMS_banner.png" alt="NIMS" width="75%" height=90px>
              <p> This is your lab's main page. Here you can view the progress of your data as it moves through the pipeline. You can view the results by clicking on the data identifier. Below the link you will find information regarding the status of your processing. If you would like to download the figures or the processed data you will find those links in the sidebar on the page for each dataset. </p>
              <?php
                echo "<h2><strong>$str's data:</strong></h2>";
                echo "<ul>";
                $dirs = array_filter(glob('*'), 'is_dir');
                foreach($dirs as $i) {
                    echo "<li><h2><a href=\"$i\">$i</a></h2></li>" ;
                    echo "<span style=\"font-size:8pt\">";
                    if (file_exists("$i/display.txt")) {
                        $text= file_get_contents("$i/display.txt");
                        echo "$text";
                    } else {
                        echo "<em>- No details available.</em>";
                    }
                    echo "</span>";
                }
                echo "</ul>";
               ?>
              </p>
              
              <!-- InstanceEndEditable --> </div>
            <!-- End #center --> 
            
            <!-- Start #sidebar-left (Removable) -->
            <div id="sidebar-left" class="sidebar">
              <ul class="nav">
               <hr><br><h2>Lab</h2>
                <?php print "$tcwf<br>"?>
                <br><br><h2>View Data</h2>
                <?php
                $dirs = array_filter(glob('*'), 'is_dir');
                foreach($dirs as $d) {
                    $path = explode('.', ${'d'});
                    echo "<li><a href=\"$d\">$d</a></li>";
                }
                ?>
                <br><br><h2>Processing Info</h2>
                <li><a href="https://github.com/vistalab/mrQ/blob/master/README.md" target="_blank">MRQ Pipeline</a></li>
                <li><a href="http://vistalab.stanford.edu/newlm/index.php/AFQ" target="_blank">AFQ Pipeline</a></li>
                <li><a href="http://scarlet.stanford.edu/nims" target="_blank">Vista Lab NIMS</a></li>
                <li><a href="http://vistalab.stanford.edu" target="_blank">Stanford VISTA Lab</a></li>
                <br><br><h2>Funding</h2>
                This research project is funded by the Weston Havens Foundation
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


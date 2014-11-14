<?php


function getSideBar($page_input) {
    
    //  Import the variables
    include 'includes/variables.php';
    

    // Parse the input page
    if(strcasecmp($page_input,"summary") == 0) {
        $current_as = "current";
    }
    if(strcasecmp($page_input,"t1") == 0) {
        $current_t1 = "current";
    }
    if(strcasecmp($page_input,"tv") == 0) {
        $current_tv = "current";
    }
    if(strcasecmp($page_input,"si") == 0) {
        $current_si = "current";
    }
    if(strcasecmp($page_input,"ad") == 0) {
        $current_ad = "current";
    }
    if(strcasecmp($page_input,"fa") == 0) {
        $current_fa = "current";
    }
    if(strcasecmp($page_input,"md") == 0) {
        $current_md= "current";
    }
    if(strcasecmp($page_input,"rd") == 0) {
        $current_rd = "current";
    }
    if(strcasecmp($page_input,"mrq") == 0) {
        $current_mrq = "current";
    }
    if(strcasecmp($page_input,"visual") == 0) {
        $current_visual = "current";
    }

    ?>
    
    <ul class="nav">
    
    <hr><br><h2>Lab</h2>
    <a href="../"><?php echo "$labname<br>";?></a>
    
    <br><br><h2>Data Identifier</h2>
    <?php print "$tcwf<br>";?>
    
    <?php 
    // Get the metadata for this subject, if it's there
        if (file_exists('meta.txt')) {
            echo  "<hr><br><br><h2>Subject Info</h2>";
            $text= file_get_contents('meta.txt');
            echo "$text"; 
        }
    ?>
    
    <br><br>
    
    <h2>View Results</h2>

    <li class="<?php echo "$current_as";?>"><a href="index.php">Analysis Summary</a></li>
        
        <?php
        
            // DISPLAY THE ANALYSIS NAVIGATION IN THE SIDEBAR

            if(is_dir($figures_dir . "/" . $t1dir)) {
                echo "<li class=\"$current_t1\"><a href=\"t1.php\">Quantitative T1</a></li>";
            }
            if(is_dir($figures_dir . "/" . $tvdir)) {
                echo "<li class=\"$current_tv\"><a href=\"tv.php\">Quantitative TV</a></li>";
            }
            if(is_dir($figures_dir . "/" . $sidir)) {
                echo "<li class=\"$current_si\"><a href=\"si.php\">Quantitative SIR</a></li>";
            }
            if(is_dir($figures_dir . "/" . $sessions[1] . "/" . $addir)) {
                echo "<li class=\"$current_ad\"><a href=\"ad.php\">Axial Diffusivity</a></li>";
            }
            if(is_dir($figures_dir . "/" . $sessions[1] . "/" . $fadir)) {
                echo "<li class=\"$current_fa\"><a href=\"fa.php\">Fractional Anisotropy</a></li>";
            }
            if(is_dir($figures_dir . "/" . $sessions[1] . "/" . $mddir)) {
                echo "<li class=\"$current_md\"><a href=\"md.php\">Mean Diffusivity</a></li>";
            }
            if(is_dir($figures_dir . "/" . $sessions[1] . "/" . $rddir)) {
                echo "<li class=\"$current_rd\"><a href=\"rd.php\">Radial Diffusivity</a></li>";
            }
            if(is_dir($figures_dir . "/" . $sessions[1] . "/" . $mrqdir)) {
                echo "<li class=\"$current_mrq\"><a href=\"mrq.php\">mrQ Maps</a></li>";
            }
            if(is_dir($figures_dir . "/" . $sessions[1] . "/" . $visualdir)) {
                echo "<li class=\"$current_visual\"><a href=\"visual.php\">Visual Pathways</a></li>";
            }

            if( is_file($figureszip) && is_file($datazip) ) {
                echo "<br><br><h2>Download</h2>";
                echo "<li><a href=\"$figureszip\">Figures</a></li>";
                echo "<li><a href=\"$datazip\">Analyzed Data</a></li>";
            }

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

    <?php 
}

?>

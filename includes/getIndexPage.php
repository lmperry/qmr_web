<?php

function getIndexPage() {

	?>	
	<!--<img src="/westonhavens/media/nims_banner_01.png" alt="NIMS" width="100%">-->
	
	<p>
		<span style="font-size:1.1em;">This is the main page for your experiment. Here you can view the progress of your data as it moves through the pipeline. You can view the results by clicking on the data identifier (session ID), wich will take you to the results page for that session. On each results page you will find links where you can download the processed data and figures.
		</span> 
	</p>
	
	<?php
	
	echo "<hr><h2>Data currently in the pipeline:</h2>";
	
	echo "<ul>";
	
	// Each directory should be a session
	$dirs = array_filter(glob('*'), 'is_dir');
	
	foreach($dirs as $i) 
	{
	    echo "<li><h2><a href=\"$i\">$i</a></h2></li>" ;
	    echo "<span style=\"font-size:8pt\">";
	    if (file_exists("$i/display.txt")) 
	    {
	        $text= file_get_contents("$i/display.txt");
	        echo "$text";
	    } else 
	    {
	        echo "<em>- No details available.</em>";
	    }
	    echo "</span>";
	}
	echo "</ul>";
	echo "</p>";
}

?>


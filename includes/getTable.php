
<?php
    // Show a table, loading the details from each session

    function getTable($session) {
        
        include '/var/www/includes/variables.php';

?>
            <h2 id="<? $session ?>"><a href="#" title="Back to top">Processing Info</a></h2>
            <table>
                <colgroup>
                    <col span="1" style="width:20%">
                </colgroup>
                <!-- Set up the headers for the table -->
                <tr>
                <th></th>
                <th><h4>Uploaded Data: (<?echo $session ?>)</h4></th>
                <th><h4>Control Data</h4></th>
                </tr>

                <!-- ROW 1-->
                <tr>
                  <td><h4>Demographics</h4> </td>
                    <!-- USER'S DATA -->
                    <td>
                    <ul>
                    <?php
                    if (file_exists($info_subject)) {
                        $text = file_get_contents($info_subject);
                        echo $text;
                    }
                    ?>
                    </ul>
                    </td>
                    <!-- DATABASE'S DATA -->
                    <td>
                    <ul>
                    <li>Age: 31.2 (mean)</li>
                    <li>Sex: 53 F, 51 M </li>
                    </ul>
                  </td>
                </tr>

                <!-- ROW 2 -->
                <?php
                    // Only show this if the mrq file exists (ie. mrq was run)
                    if(file_exists($info_mrq)) 
                    {
                ?>
                    <tr>
                      <td><h4> mrQ Parameters</h4> </td>
                      <!-- USER'S DATA -->
                      <td>
                        <ul>
                        <?php
                            echo file_get_contents($info_mrq);
                        ?>
                        </ul>
                        </td>
                        <!-- DATABASE'S DATA -->
                        <td>
                        <ul>
                        <li>Flip Angles: 4 10 20 30 <em>deg</em></li>
                        <li>Inversion Times: 1200  50  2400  400 <em>msec</em></li>
                        <li>Resolution: 1 x 1 x 1 <em>mm </em></li>
                        </ul>
                      </td>
                    </tr>
                <?php 
                    }
                ?>

                <!-- ROW 3 -->
                <tr>
                  <td><h4> Diffusion Parameters</h4></td>
                  <!-- USER'S DATA -->
                  <td>
                    <ul>
                    <?php
                    if (file_exists($dtidir . "/" . $session . "/" . $info_dw)) {
                        $text = file_get_contents($dtidir . "/" . $session . "/" . $info_dw);
                        echo $text;
                    }
                    ?>
                    </ul>
                    </td>
                    <!-- DATABASE'S DATA -->
                    <td>
                    <ul>
                    <?php
                    if (file_exists($dtidir . "/" . $session . "/" . $info_dw_norms)) {
                        $text = file_get_contents($dtidir . "/" . $session . "/" .  $info_dw_norms);
                        echo $text;
                    } 
                    ?>
                    </ul>
                  </td>
                </tr>
                </table>


                <!-- NEW TABLE -->
                <!-- <h2>Analysis Information</h2> -->
                <table>
                <colgroup>
                    <col span="1" style="width:20%">
                </colgroup>
                <!--
                <tr></tr><th></th><th><h3>Analysis Details</h3></th></tr>
                -->
                
                <tr>
                    <td><h4>Analysis Details</h4></td>
                    <td>
                        <ul>
                        <?php
                        if ( file_exists($info_methods) ) {
                            echo file_get_contents($info_methods);
                            echo "<li>Population Age Distribution: 7-12 (n=32); 13-18 (n=14); 19-29 (n=12); 30-39 (n=11); 40-49 (n=7); 50-59 (n=9); 60-69 (n=8); 70-85 (n=9).</li> <li>Dark gray bars are 1 standard deviation from the mean</li> <li>Light gray bars are 2 standard deviations from the mean</li>";
                        }
                        ?>
                        </ul>
                    </td>
                </tr>

                <tr>
                    <td><h4>Processing Notes</h4></td>
                    <td>
                        <ul>
                        <?php
                        if ( file_exists($dtidir . "/" . $session . "/" . $info_message) ) {
                            echo file_get_contents($dtidir . "/" . $session . "/" . $info_message);
                        }
                        ?>
                        </ul>
                    </td>
                </tr>
                </table>

<?php

    }
?>

<!DOCTYPE html>

<html>

<?php
  include_once "/var/www/includes/getPage.php";

  // Set page-specific variables after the load above - to overwrite defaults
  $this_exp = basename(getcwd());
  $str = strtoupper($this_exp); 
  $thename = "<em>$str</em>";
  $this_page = 'labindex';
  $result_dir = "";
  $figures_base_dir = "";

  // Call the get page function to build the actual page
  getPage($thename,$this_page,$result_dir,$figures_base_dir);
?>

</html>

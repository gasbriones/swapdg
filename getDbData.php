<?php
require("config.php");
$table = $_POST["ttable"];

session_name("SWAPDesign");
session_start();

if (!empty($table)) {
  $return = "nodata";
  $sql = "SELECT * FROM $table ORDER BY adate DESC LIMIT 4";
  if ($rs=mysql_query($sql,$con)) {
    if (mysql_num_rows($rs)>0) {
      while ($result = mysql_fetch_array($rs)) {
        $year = substr($result['adate'],0,4);
        $month = substr($result['adate'],5,2);
        $day = substr($result['adate'],8,2);
        $dates .= $day . "/" . $month . "/" . $year . "\n";
        if ($_SESSION['swapLang'] == "en") {
           $texts .= $result['atexten'] . "\n";
           if ( (strlen($result['atexten'])) > 80) {
              $dates .= "\n";
           }
           if ( (strlen($result['atexten'])) > 160) {
              $dates .= "\n";
           }
        } else {
           $texts .= $result['atext'] . "\n";
           if ( (strlen($result['atext'])) > 80) {
              $dates .= "\n";
           }
           if ( (strlen($result['atext'])) > 160) {
              $dates .= "\n";
           }
        }
      }
      $return = "result=success&dates=$dates&texts=$texts";
    } else {
      if ($_SESSION['swapLang'] == "en") {
         $return = "result=empty";
      } else {
         $return = "result=vacio";
      }
    }
  } else {
    $return = "result=error";
  }
}

echo $return;
?>
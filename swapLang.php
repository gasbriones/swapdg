<?php
session_name("SWAPDesign");
session_start();
if ($_SESSION['swapLang'] == 'en') { $_SESSION['swapLang'] = 'es'; } else { $_SESSION['swapLang'] = 'en'; }
?>
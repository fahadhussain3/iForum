<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
   session_destroy();
   session_unset();
   header("Location: /iForum/home.php?logout=true");
}


?>
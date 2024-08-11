<?php
$servername="localhost";
$username="root";
$password="";
$database="iForum";
$connection=mysqli_connect($servername,$username,$password,$database);
if (!$connection) {
    echo "Connection error....>".mysqli_connect_error();
}
?>
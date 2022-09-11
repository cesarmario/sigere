<?php
$hostname_ = "localhost";
$database_ = "anestesia";
$username_ = "root";
$password_ = "";
$conexion  = mysqli_connect($hostname_, $username_, $password_, $database_) or trigger_error(mysqli_error(),E_USER_ERROR); 
?>
<?php

// Variables de conexión
$host = "localhost"; 
$user = "root"; 
$password = "";
$database = "practica_vw";

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>
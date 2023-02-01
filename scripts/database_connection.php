<?php
//Artemi
$host = "localhost";
$port = 5432;
$db = "travel_agency";
$user = "postgres";
$pw = "PW";
$conStr="pgsql:host=$host;port=$port;dbname=$db;";
$dbConnection = new PDO( $conStr, $user, $pw );
?>
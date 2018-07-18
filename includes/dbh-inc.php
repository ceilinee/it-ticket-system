<?php

$dbServername = "localhost";//being hosted locally
$dbUsername = "root";//because we are using local server
$dbPassword = "";//xaamp doesnt have password as default so leave it empty
$dbName = "msci346";//this is the name of the folder with all the files
//to connect to the database
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

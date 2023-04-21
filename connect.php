<?php

$server = "us-cdbr-east-06.cleardb.net";
$username ="b5f754e0ff5e7f";
$password = "a5bb5d50";
$db = "heroku_9a6ee2442b34b52";

$conn = mysqli_connect($server,$username,$password,$db);
if($conn->connect_error){
    die("Failed ".$conn->connect_error);
}

?>

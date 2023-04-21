<?php

$server = "localhost";
$username ="root";
$password = "";
$db = "asm";

$conn = mysqli_connect($server,$username,$password,$db);
if($conn->connect_error){
    die("Failed ".$conn->connect_error);
}

?>
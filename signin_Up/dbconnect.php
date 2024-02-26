<?php

//here dataconnection 
error_reporting(0);
$servername = "localhost";
$username ="root";
$password ="";
$databasename ="notes";

$conn = mysqli_connect($servername,$username, $password,$databasename);
if ($conn){
    // echo "Connection succesfull";
}
else{
    die("Connection fialed". mysqli_connect_error());
}

?>
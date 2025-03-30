<?php
$host ="localhost";
$user = "root";
$password = "";
$database ="ngosaathi";
$conn = new mysqli($host,$user,$password,$database);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
echo"Successful Dattabase connection";
?>
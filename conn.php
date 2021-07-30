<?php

$dbhost = "localhost"; 
$dbuser = "root"; 
$dbpass = "root"; 
$dbname = "Email2"; 

$mysqli = new mysqli("localhost", "root", "root", "Email2");
header('Location: http://127.0.0.1/thanks.html');
    if($mysqli === false){
        die("ERROR: Could not connect. " . $mysqli->connect_error);
} 
echo "Connect Successfully. Host info: " . $mysqli->host_info;

$sql = "CREATE DATABASE Email2";
    if($mysqli->query($sql) === true){
        echo "Database created successfully";
} else{
        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
} //
#$sql = "CREATE TABLE Email_list(
        
 #email VARCHAR(70) NOT NULL PRIMARY KEY AUTO_INCREMENT)";
#if(mysqli_query($link, $sql)){
  #  echo "Table created successfully.";
#} else{
 #   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
#} //

$sql = "INSERT INTO Email_list (email123) VALUES ('$_POST[email]')";
    if($mysqli->query($sql) === true){
     echo "Records inserted successfully.";
} else{
     echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
} 

$mysqli->close();
?>
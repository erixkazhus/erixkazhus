<?php
	 $mysqli = new mysqli("localhost", "root", "root", "Email2");    
	 if($mysqli === false){
		 die("ERROR: Could not connect. " . $mysqli->connect_error);
        }

if(isset($_GET['Del'])) 
    {
    $email123=$_GET['Del'];
    $query="DELETE FROM Email_list WHERE email123='".$email123."'";
    $result=mysqli_query($mysqli,$query);

    if($result){
        header("location:table5.php");
    }else{
        echo 'wrong';
    }
}


?>
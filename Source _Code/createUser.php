<?php

include "connect_db.inc.php";

$lname= mysql_real_escape_string($_POST['lname']);
$fname= mysql_real_escape_string($_POST['fname']);
$phone= mysql_real_escape_string($_POST['contact_phone']);
$email= mysql_real_escape_string($_POST['email']);
$username= mysql_real_escape_string($_POST['username']);
$pass= mysql_real_escape_string($_POST['password']);
$pass1= mysql_real_escape_string($_POST['password1']);

if(0 !==strcmp($pass,$pass1))
    {
    ?>
    <script>
    alert("Password entries do not match");
    window.location="register.php";
    </script>
    <?php
    die();
}

$register = mysql_query("INSERT INTO user (username,password,lname,fname,email,contact_phone) VALUES  ('{$username}','{$pass}','{$lname}','{$fname}','{$email}','{$phone}')");  	    
	if(!$register) {
	die(mysql_error());
	}else{
	?>
	<script>
        alert("Registration successful!");
        window.location="login.php";
        </script>
        <?php
    	}
?>



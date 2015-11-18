<?php
session_start();
include "connect_db.inc.php";

$username=$_POST['username'];
$password=$_POST['password'];

$sql=mysql_query("SELECT * FROM user") or die(mysql_error());

while($user=mysql_fetch_array($sql)){
	  if(($user['username']==$username) && ($user['password']==$password)){
	   $_SESSION['user']=$user['id'];
	   $_SESSION['Timer']=time();//current time
	   $_SESSION['limit']=$_SESSION['Timer']+(600);//current time + 10 minutes
	  }
	  
	  if(isset($_SESSION['user'])){
	  header('Location:index.php');
	  exit;
	  } else{
	  ?>
	  <script>
	  alert("Sorry, try again!Username and/or password are incorrect!");
	  window.location="login.php";
	  </script>
	  <?php
	  }
    }

?> 


















































<?php
session_start();
include "connect_db.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ART SMS-Alert::Invalid Details</title>
</head>
<body>

</body>
</html>

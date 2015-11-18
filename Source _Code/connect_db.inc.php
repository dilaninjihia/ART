<?php

//Make connection to MySQL
$conn = mysql_connect('localhost','root','password') or 
        die('Could not connect to MySQL database. ' . mysql_error());

//Choose database to work with 
mysql_select_db(artSms,$conn) or die(mysql_error());

?>

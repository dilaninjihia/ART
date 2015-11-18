<?php

include "connect_db.inc.php";
include "auth_user.php";

//details for patient table
$id= mysql_real_escape_string($_POST['patientId']);
$lname= mysql_real_escape_string($_POST['lname']);
$fname= mysql_real_escape_string($_POST['fname']);
$dob= mysql_real_escape_string($_POST['date_of_birth']);
$gender= mysql_real_escape_string($_POST['gender']);
$enroldate= mysql_real_escape_string($_POST['enrolment_date']);
$phone= mysql_real_escape_string($_POST['phone']);
$date = mysql_real_escape_string($_POST['visit_date']);
$time = mysql_real_escape_string($_POST['visit_time']);
$purpose = mysql_real_escape_string($_POST['purpose']);
 
if(isset($_SESSION['user'])){
   $getId = mysql_query("SELECT id FROM user WHERE id ='" . $_SESSION['user'] ."' ") or die("Could not get id, " .mysql_error());
   while ($row=mysql_fetch_assoc($getId)){
     $userid=$row['id'];   
         }
    }
    
//populate patient table
$sql=mysql_query("INSERT INTO patient (patientId,lname,fname,date_of_birth,gender,enrolment_date,phone,userId)
                  VALUES('{$id}','{$lname}','{$fname}','{$dob}','{$gender}',NOW(),'{$phone}','{$userid}')");
    
$sql1=mysql_query("INSERT INTO patient_appointment (patientId, visit_date, visit_time, purpose)
                   VALUES ('$id','$date','$time','$purpose')");

if((!$sql) || (!$sql1)){
die(mysql_error());
}else{
?>
<script>
alert("Update successful!");
window.location="addPatient.php";
</script>
<?php
}	
?>

<?php

include "connect_db.inc.php";

//details for patient_appointment table
$id= mysql_real_escape_string($_POST['patientId']);
$visitdate= mysql_real_escape_string($_POST['visit_date']);
$time= mysql_real_escape_string($_POST['visit_time']);
$purpose= mysql_real_escape_string($_POST['purpose']);

//populate patient table
$sql="INSERT INTO patient_appointment (patientId,visit_date,visit_time,purpose) VALUES('{$id}','{$visitdate}','{$time}','{$purpose}')";

//query mysql
mysql_query($sql) or die(mysql_error());
?>
<script>
alert("Update successful!");
window.location="addPatient.php";
</script>
<?php
?>

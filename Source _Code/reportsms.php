<?php
include "files_inc.php";
?>

<!--Display of appointments-->
        <div id="displayAppointments">
        <?php
        $sql="SELECT * FROM user WHERE id='". $_SESSION['user']. "'";
        $result = mysql_query($sql) or die (mysql_error());

	while($row=mysql_fetch_assoc($result))
	{
	$access_lvl=$row['access_lvl'];
	}
	
$appointmentHeader=<<<HAH
<h2>Due Appointments</h2>
<table width=70% border="1" cellpadding="2" cellspacing="2" >
     <tr>
       <th>No.</th>
       <th>Last Name</th>
       <th>First Name</th>
       <th>ID Number</th>
       <th>Phone Number</th>
       <th>Visit Date</th>
       <th>Visit Time</th>
       <th>Purpose</th>
     </tr>
        
HAH;

echo $appointmentHeader;
$counter = 1; 
        if($access_lvl == '1') {
              $sql="SELECT patient.lname,patient.fname,patient.patientId,patient.phone,patient_appointment.visit_date," .                   
		   "patient_appointment.visit_time,patient_appointment.purpose " .
                   "FROM patient INNER JOIN patient_appointment USING (patientId)" .
                   "WHERE DATE(visit_date) = DATE(NOW())+1 " ;
                   //"AND userId = '" .$_SESSION['user'] ."'";
                   }else{
               $sql="SELECT patient.lname,patient.fname,patient.patientId,patient.phone,patient_appointment.visit_date," .                   
		   "patient_appointment.visit_time,patient_appointment.purpose " .
                   "FROM patient INNER JOIN patient_appointment USING (patientId)" .
                   "WHERE DATE(visit_date) = DATE(NOW())+1 " .
                   "AND userId = '" .$_SESSION['user'] ."'";
                   }
$results=mysql_query($sql) or die(mysql_error());


while($row = mysql_fetch_assoc($results)){
      echo "<tr>\n";
          echo "<td>\n";
          echo "$counter";
          echo "</td>\n";
      foreach($row as $value){
          echo "<td>\n";
          echo "$value";
          echo "</td>\n";
      }
      echo "</tr>\n";
      $counter++;
}
echo "</table>\n";
        if(mysql_num_rows($results) < 1){
        echo "<br><br>No records to show!<br>";
        }
        ?>
        </div>
<!--end of showing due messages -->




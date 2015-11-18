<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
<meta http-equiv="refresh" content="5" charset="UTF-8">
<title>ARTSMS-Alert</title>
</head>
<body>
<?php

include "files_inc.php";
include "functions.php";


//Send message to ozekimessageout table
//Retrieve records once appointment is due
$sql="SELECT patient.lname,patient.fname,patient.patientId,patient.phone,patient_appointment.visit_date," .                   
     "patient_appointment.visit_time,patient_appointment.purpose " .
     "FROM patient INNER JOIN patient_appointment USING (patientId)" .
     "WHERE DATE(visit_date) =DATE(NOW())+1 " .
     "AND status = 'Alertpending' " ;
   
$results=mysql_query($sql) or die(mysql_error());

while($row = mysql_fetch_assoc($results)){
        
       //specify what to have in ozekimessageout table
       $id= $row['patientId'];       
       $status = "send"; 
       $msgtype = "SMS:TEXT";      
       $receiver = $row['phone'];
       $msg = "Hi {$row['lname']}, this is to notify you to attend {$row['purpose']} at {$row['visit_time']} on {$row['visit_date']}. Anti-Retroviral Therapy Program. Thank You.";
       //insertMessage($receiver,$msg,$status);
       insertMessage($receiver,$msgtype,$msg,$status);
       
       $update = mysql_query("UPDATE patient_appointment SET status = 'Alertdelivered' WHERE patientId='$id'") or die("Could not change status!");
            
       }
       
 
//Section to restrict sent messages seen by administrators depending on their access levels     
     $sql="SELECT * FROM user WHERE id='". $_SESSION['user']. "'";
        $result = mysql_query($sql) or die (mysql_error());

	while($row=mysql_fetch_assoc($result))
	{
	$access_lvl=$row['access_lvl'];
	}
	
//Display messages sent
$header=<<<HAH
<h2>Message Log</h2>
<table width=85% border="1" cellpadding="2" cellspacing="2" >
<tr>
<th>No.</th>
<th>Receiver</th>
<th>SentTime</th>
<th>Status</th>
<th>Message Text</th>
</tr>        
HAH;

echo $header;
$counter = 1; 
       
	if($access_lvl == '1'){
	$query = "SELECT receiver,senttime,status,msg " .
	         "FROM ozekimessageout o INNER JOIN patient p ON p.phone=o.receiver " ;
	}else{
	$query = "SELECT receiver,senttime,status,msg " .
	         "FROM ozekimessageout o INNER JOIN patient p ON p.phone=o.receiver " .
	         "WHERE p.userId='".$_SESSION['user']."' ";      
	}
  
$result = mysql_query($query);
 
    if (!$result)
    {
        echo (mysql_error() . "<br>");
       
    }
    
    while ($row = mysql_fetch_assoc($result))
        {
        
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

echo "<br>";
echo "<br>";
echo "<br>";



//Give notification if there are no messages to show
if(mysql_num_rows($result) < 1){
echo "<br><br>No messages to show!<br>";
} 

?>
 <!--end of script-->
</body>
</html>

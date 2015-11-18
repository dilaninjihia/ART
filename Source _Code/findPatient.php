<?php
include "files_inc.php";
?>
       
<!--Find and display,edit patient account-->
           <div>
                <h2>Search and Manage Patient Accounts.</h2>
                <p><em>Enter patient ID Number to find record;</em></p>
                <!--p><em>Enter patient ID Number or date to find record(s);</em></p-->
                <p>                
		<form  method="post" action="findPatient.php">
		<input type="text"  name="search" value="" required="required" size="20">		
		<input type="submit" name="submit" value="search">			       
		</form>
		</p>
		<?php
		
		 $sql="SELECT * FROM user WHERE id='". $_SESSION['user']. "'";
                 $result = mysql_query($sql) or die (mysql_error());

	         while($row=mysql_fetch_assoc($result))
	         {
	          $access_lvl=$row['access_lvl'];
	         }
	
		if(isset($_POST['submit']) && $_POST['submit'] == "search"){  
		if($access_lvl == '1'){		
		$sql="SELECT patient.lname,patient.fname,patient.patientId,patient.date_of_birth,patient.gender,patient.phone,patient_appointment.visit_date," .
		     "patient_appointment.visit_time,patient_appointment.purpose,patient_appointment.status " .
                     "FROM patient,patient_appointment " .
                     "WHERE patient.patientId = {$_POST['search']} " .
                     "AND patient_appointment.patientId = patient.patientId ";
                     }else{
                     $sql="SELECT patient.lname,patient.fname,patient.patientId,patient.date_of_birth,patient.gender,patient.phone,patient_appointment.visit_date," .
		     "patient_appointment.visit_time,patient_appointment.purpose,patient_appointment.status " .
                     "FROM patient,patient_appointment " .
                     "WHERE patient.patientId = {$_POST['search']} " .
                     "AND patient_appointment.patientId = patient.patientId AND patient.userId ='".$_SESSION['user']."'";
                     }
                 $result=mysql_query($sql) or die("Sorry, could not search. Entry unknown. ");                 
                 
                  $row = mysql_fetch_array($result); 
                  
                  if(mysql_num_rows($result) < 1){
                  echo "<br><br>No records to show!<br>";
                  die();
                  
                  }
                  
                
		?>
		<p>
                <table width=30% border="1" cellpadding="1" cellspacing="2">
			  <tr>
			  <th>Last Name: </th>             
			  <td> <?php echo $row['lname']; ?></td>
			  </tr>
			  
			  <tr>
			  <th>First Name: </th>             
			  <td> <?php echo $row['fname']; ?></td>
			  </tr>  
			  		  
			  <tr>
			  <th>Date Of Birth: </th>             
			  <td> <?php echo $row['date_of_birth']; ?></td>
			  </tr>
			  
			  <tr>
			  <th>Gender: </th>             
			  <td> <?php print $row['gender']; ?></td>
			  </tr>
			  
			  <tr>
			  <th>ID/Passport Number: </th>             
			  <td> <?php echo $row['patientId']; ?></td>
			  </tr>
			  
			  <tr>
			  <th>Contact Phone: </th>             
			  <td> <?php echo $row['phone']; ?></td>
			  </tr>
			  
			  <tr>
			  <th>Visit Date: </th>             
			  <td> <?php echo $row['visit_date']; ?></td>
			  </tr>
			  
			  <tr>
			  <th>Visit Time: </th>             
			  <td> <?php echo $row['visit_time']; ?></td>
			  </tr> 
			  
			  <tr>
			  <th>Visit Purpose: </th>             
			  <td> <?php echo $row['purpose']; ?></td>
			  </tr>		
			  
			  <tr>
			  <th>Alert Status: </th>             
			  <td> <?php echo $row['status']; ?></td>
			  </tr>	  
                  </table>
                  
		  <p>
		  <a href="updatePatient.php? id=<?php echo $row['patientId']; ?>"><em>Update Account</em></a>&nbsp&nbsp&nbsp&nbsp
		  <a href="deletePatient.php? id=<?php echo $row['patientId']; ?>"><em>Delete Account</em></a>
		  </p>
          
		<?php
		}
		?>
        </div>        
<!--end of manage patient account section-->




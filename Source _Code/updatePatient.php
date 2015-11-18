<?php
include "files_inc.php";

?>
       
<!--edit patient account-->
        <div>
            <h2>Update Patient Account Information.</h2>
            <p>
               <em> Update account here:<br></em>    
            </p> 
             
             <?php
             if(isset($_GET['id'])){
             
             $previous=$_GET['id'];
             
             }
                                       
              $lname= $_POST['lname']; 
              $fname= $_POST['fname']; 
              $id= $_POST['patientId'];              
              $dob= $_POST['date_of_birth'];
              $gender= $_POST['gender'];
              $phone= $_POST['phone'];
              $visitDate= $_POST['visit_date'];
              $visitTime= $_POST['visit_time'];
              $purpose= $_POST['purpose'];
              $status=$_POST['status'];
              
              if(isset($_POST['submit']) && $_POST['submit'] == "submit"){
                
               $update1 = "UPDATE patient SET " .
                         "lname = '$lname',fname = '$fname',date_of_birth='$dob',gender='$gender',phone='$phone' ".
                         "WHERE patientId='$previous'";
                         
                         
               $result = mysql_query($update1) or die("Unable to update patient profile. " .mysql_error());  
                
               $update2= "UPDATE patient_appointment SET " .
                         "visit_date = '$visitDate',visit_time = '$visitTime',purpose='$purpose',status='$status' " .
                         "WHERE patientId='$previous'" ;
                         
                         
                $result = mysql_query($update2) or die("Unable to update patient appointment. " .mysql_error());
                
              $sql="SELECT patient.lname,patient.fname,patient.patientId,patient.date_of_birth,patient.gender,patient.phone,patient_appointment.visit_date," .
		   "patient_appointment.visit_time,patient_appointment.purpose,patient_appointment.status " .
                   "FROM patient INNER JOIN patient_appointment USING (patientId)" .
                   "WHERE  patient.patientId=$previous" ;
                                   
                           
                                          
                 $result=mysql_query($sql) or die("Could not retrieve details for updating. " .mysql_error());
                 
                 $row = mysql_fetch_array($result);                                
                  
                 ?>
                   <b>Account updated.</b><br>
              <a href="findPatient.php"><em>Go back</em></a>
              <div id="registration">
              <h2>Update Patient Account</h2>
              <form id="RegistrationUserForm" method="post" action="updatePatient.php?id=<?php echo $previous; ?>">
		     <fieldset>
		         <p>
		         <label for="lname">Last Name: </label>
		         <input autofocus id="lname" type="text" name="lname"  class="text"  value="<?php echo $row['lname']; ?>"   required="required">
		         </p>
		        
		         <p>
		         <label for="fname">First Name: </label>
		         <input id="fname" type="text" name="fname"  class="text"  value="<?php echo $row['fname']; ?>" required="required"/>
		         </p>
		        
		         <p>
		         <label for="date_of_birth">Date Of Birth:</label>
		         <input id="date_of_birth" type="date" name="date_of_birth" class="text" value="<?php echo $row['date_of_birth']; ?>" required="required"/>
		         </p>
		        
		         <p>
		        <label for="gender">Gender(select one):</label><br />
		        <input id="gender" type="radio" name="gender"  value="M" <?php if($row['gender'] == "M"){echo 'checked="checked"';} ?> >Male <br />
		         <input id="gender" type="radio" name="gender"  value="F"<?php if($row['gender'] == "F"){echo 'checked="checked"';} ?> />Female
		        </p>       
		        		       
		        <p>
		        <label for="phone">Phone Number: </label>
		        <input id="phone" type="text" name="phone"  class="text"   value="<?php echo $row['phone']; ?>" required="required"/>
		        </p>
		        	        		        
		        <p>
		        <label for="visit_date">Visit Date:</label>
		        <input id="visit_date" type="date" name="visit_date" class="text" value="<?php echo $row['visit_date']; ?>" />
		        </p>
		              
		        <p>
		        <label for="visit_time">Visit Time(Hour:Min AM/PM):</label>
		        <input id="visit_time" type="time" name="visit_time" class="text" value="<?php echo $row['visit_time']; ?>" required="required"/>
		        </p>
		        
		     <p>
<label for="purpose">Visit Purpose(select one):</label><br />
<input id="purpose" type="radio" name="purpose"  value="Pharmacy" <?php if($row['purpose'] == "Pharmacy"){echo 'checked="checked"';} ?> />Pharmacy <br />
<input id="purpose" type="radio" name="purpose"  value="Treatment" <?php if($row['purpose'] == "Treatment"){echo 'checked="checked"';} ?> />Treatment <br />
<input id="purpose" type="radio" name="purpose"  value="Counseling" <?php if($row['purpose']== "Counseling"){echo 'checked="checked"';} ?> />Counseling <br />
<input id="purpose" type="radio" name="purpose"  value="Laboratory"<?php if($row['purpose']== "Laboratory"){echo 'checked="checked"';} ?> />Laboratory
                        </p>
                        
                        <p>
		        <label for="status">Alert Status(select one):</label><br />
		        <input id="status" type="radio" name="status"  value="Alertdelivered" <?php if($row['status'] == "Alertdelivered"){echo 'checked="checked"';} ?> >Delivered <br />
		         <input id="status" type="radio" name="status"  value="Alertpending"<?php if($row['status'] == "Alertpending"){echo 'checked="checked"';} ?> />Pending
		        </p> 	
		        		        
		        <p>
		        <button id="registerNew" type="submit" name="submit" value="submit">UPDATE</button>
		        </p>
		        
		     </fieldset>
		</form>
		</div>
		<br />
		<br />
		<br />
		
		<?php
		}else{
		
		 $sql="SELECT patient.lname,patient.fname,patient.patientId,patient.date_of_birth,patient.gender,patient.phone,patient_appointment.visit_date," .
		   "patient_appointment.visit_time,patient_appointment.purpose " .
                   "FROM patient INNER JOIN patient_appointment USING (patientId)" .
                   "WHERE  patient.patientId=$previous" ;
                           
                     
                     $result=mysql_query($sql) or die("Could not retrieve details..." .mysql_error());
                 
                    $row = mysql_fetch_array($result);
                                  
             ?>
             <div id="registration">
             <h2>Update Account</h2>
             <form id="RegistrationUserForm" method="post" action="updatePatient.php?id=<?php echo $previous; ?>">
		     <fieldset>
		        <p>
		        <label for="lname">Last Name: </label>
		        <input autofocus id="lname" type="text" name="lname"  class="text"  value="<?php echo $row['lname']; ?>"   required="required"/>
		        </p>
		        
		         <p>
		        <label for="fname">First Name: </label>
		         <input id="fname" type="text" name="fname"  class="text" value="<?php echo $row['fname']; ?>" required="required"/>
		        </p>
		        		        		        
		         <p>
		        <label for="email">Date Of Birth: </label>
		         <input id="date_of_birth" type="date" name="date_of_birth"  class="text"  value="<?php echo $row['date_of_birth']; ?>" required="required"/>
		        </p>
		        
		        <p>
		        <label for="gender">Gender(select one):</label><br />
		        <input id="gender" type="radio" name="gender"  value="M" <?php if($row['gender'] == "M"){echo 'checked="checked"';} ?> >Male <br />
		         <input id="gender" type="radio" name="gender"  value="F"<?php if($row['gender'] == "F"){echo 'checked="checked"';} ?> />Female
		        </p>		        
		       		       
		        <p>
		        <label for="phone">Phone Number: </label>
		        <input id="phone" type="text" name="phone"  class="text"   value="<?php echo $row['phone']; ?>" required="required"/>
		        </p>          	        		        
		        		        		        
		         <p>
		        <label for="visit_date">Visit Date:</label>
		        <input id="visit_date" type="date" name="visit_date" class="text" value="<?php echo $row['visit_date']; ?>" />
		        </p>
		              
		        <p>
		        <label for="visit_time">Visit Time(Hour:Min AM/PM):</label>
		        <input id="visit_time" type="time" name="visit_time" class="text" value="<?php echo $row['visit_time']; ?>" required="required"/>
		        </p>
		        
		         <p>
<label for="purpose">Visit Purpose(select one):</label><br />
<input id="purpose" type="radio" name="purpose"  value="Pharmacy" <?php if($row['purpose'] == "Pharmacy"){echo 'checked="checked"';} ?> />Pharmacy <br />
<input id="purpose" type="radio" name="purpose"  value="Treatment" <?php if($row['purpose'] == "Treatment"){echo 'checked="checked"';} ?> />Treatment <br />
<input id="purpose" type="radio" name="purpose"  value="Counseling" <?php if($row['purpose']== "Counseling"){echo 'checked="checked"';} ?> />Counseling <br />
<input id="purpose" type="radio" name="purpose"  value="Laboratory"<?php if($row['purpose']== "Laboratory"){echo 'checked="checked"';} ?> />Laboratory
                        </p>	
                        
                        
                        <p>
		        <label for="status">Alert Status(select one):</label><br />
		        <input id="status" type="radio" name="status"  value="Alertdelivered" <?php if($row['status'] == "Alertdelivered"){echo 'checked="checked"';} ?> >Delivered <br />
		         <input id="status" type="radio" name="status"  value="Alertpending"<?php if($row['status'] == "Alertpending"){echo 'checked="checked"';} ?> />Pending
		        </p> 	
		        		        		        
		        <p>
		        <button id="registerNew" type="submit" name="submit" value="submit">UPDATE</button>		        	        
		        <input type="button" value="Cancel" onclick="history.go(-1);">		        
		       </p>
		        
		     </fieldset>
		</form>
	       </div>
	       <br />
	       <br />
	       <br />
		<?php
		}
	     
		?>
		</div>
           
              
<!--end update-->
       


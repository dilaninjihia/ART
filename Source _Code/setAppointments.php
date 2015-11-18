<?php
session_start();
if(!isset($_SESSION['user']))
header('Location:login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
<title>Set Appointment</title>
</head>
   <body>
   
   <!--Header section on home page-->  
     <div id="topdiv">
     <h1 id="heading">ART SMS-ALERT</h1>
     <em id="sitemantra">A messaging solution for ART patients.</em>
     </div>
     
      <!--Navigation menu on home page-->   
      <nav>
         <ul>
             <li><a href="index.php">HOME</a></li>
             <li><a href="">PATIENTS</a>
                 <ul>
                     <li><a href="addPatient.php">Add Patient</a></li>
                     <li><a href="findPatient.php">Find Patient</a></li>
                     <li><a href="editPatient.php">Edit Patient Profile</a></li>
                     <li><a href="deletePatient.php">Delete Patient</a></li>
                 </ul>
             </li>
             <li><a href="">APPOINTMENTS</a>
                 <ul>
                     <li><a href="displayAppointments.php">View Appointments</a></li>
                     <li><a href="setAppointments.php">Set Appointments</a></li>
                     <li><a href="reportsms.php">Reports</a></li>
                 </ul>
             </li>
             <li><a href="userprofile.php">USERS</a></li>
             <li><a href="contact.php">CONTACT US</a></li>
             <li><a href="logout.php">LOG OUT</a></li>
          </ul>
        </nav> 
        <br />
        <br />
        
     <!--Create user registration form-->
        
        <div id="registration">
        <h2>Set Appointment</h2>
		<form id="RegistrationUserForm" method="post" action="createAppointments.php">
		     <fieldset>
		        
		        <p>
		        <label for="patientId">ID Number: </label>
		         <input id="patientId" type="text" name="patientId"  class="text"  placeholder="'28540956'" value="" required="required"/>
		        </p>
		        
		        <p>
		        <label for="visit_date">Visit Date:</label>
		        <input id="visit_date" type="date" name="visit_date" class="text" value="" />
		        </p>
		              
		        <p>
		        <label for="visit_time">Visit Time(Hour:Min AM/PM):</label>
		        <input id="visit_time" type="time" name="visit_time" class="text" value="" required="required"/>
		        </p>
		        
		        <p>
		        <label for="purpose">Visit Purpose(select one):</label><br />
		        <input id="purpose" type="radio" name="purpose"  value="pharmacy" checked="checked"/>Pharmacy <br />
		        <input id="purpose" type="radio" name="purpose"  value="treatment" />Treatment <br />
		        <input id="purpose" type="radio" name="purpose"  value="counseling" />Counseling <br />
		        <input id="purpose" type="radio" name="purpose"  value="laboratory" />Laboratory
		        </p>
		                               	        		        
		        <p>
		        <button id="registerNew" type="submit" value="submit">SUBMIT</button>
		        </p>
		        
		     </fieldset>
		</form>
        </div>
        <br />
        <br />
        <br />
        <br />
              
      <!--footer section on home page-->
       <div id="bottomdiv">
          <em>brayoni@copyright2013<br />
          By using this system, you agree to the <b>Terms</b> and <b>Conditions</b> and its <b>Privacy Policy.</b>
          </em>
      </div> 
           
   </body>
</html>



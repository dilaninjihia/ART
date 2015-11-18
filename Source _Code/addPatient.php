<?php
include "files_inc.php";
?>
     <!--Create add patient registration form-->
        <p> <em>Enter details of a patient to create account here: </em> </p>
        <div id="registration">        
        <h2>Create Patient Account</h2>
		<form id="RegistrationUserForm" method="post" action="createPatient.php">
		     <fieldset>
			 <p>
			 <label for="lname">Last Name: </label>
			 <input autofocus id="lname" type="text" name="lname"  class="text" placeholder="'Type the last name'" value=""   required="required">
			 </p>

			 <p>
			 <label for="fname">First Name: </label>
			 <input id="fname" type="text" name="fname"  class="text" placeholder="'Type the first name'" value="" required="required"/>
			 </p>

			 <p>
			 <label for="date_of_birth">Date Of Birth:</label>
			 <input id="date_of_birth" type="date" name="date_of_birth" class="text" value="" required="required"/>
			 </p>

			 <p>
			 <label for="gender">Gender(select one):</label><br />
			 <input id="gender" type="radio" name="gender"  value="M" >Male <br />
			 <input id="gender" type="radio" name="gender"  value="F" />Female
			 </p>

			<p>
			<label for="patientId">ID Number: </label>
			 <input id="patientId" type="text" name="patientId"  class="text"  placeholder="'28540956'" value="" required="required"/>
			</p>

			<p>
			<label for="phone">Phone Number: </label>
			<input id="phone" type="text" name="phone"  class="text"  placeholder="'+254754004400'" value="" required="required"/>
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
			<input id="purpose" type="radio" name="purpose"  value="pharmacy" />Pharmacy <br />
			<input id="purpose" type="radio" name="purpose"  value="treatment" />Treatment <br />
			<input id="purpose" type="radio" name="purpose"  value="counseling" />Counseling <br />
			<input id="purpose" type="radio" name="purpose"  value="laboratory" />Laboratory
			</p>
		
			<p>
		        <button id="registerNew" type="submit" name="submit" value="submit">SUBMIT</button>
			</p>
		        
		     </fieldset>
		</form>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        
      <!--end of add patient registration-->
      

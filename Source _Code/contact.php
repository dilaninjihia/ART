<?php
include "files_inc.php";
?>
        
     <!--Contact form-->   
        <p><em>Submit questions and concerns here;</em></p>     
        <div id="registration">
        <h2>Send us an email</h2>
		<form id="RegistrationUserForm" method="post" action="contact.php">
		     <fieldset>
		         <p>
		         <label for="name">Name: </label>
		         <input autofocus id="name" type="text" name="name"  class="text" placeholder="'Enter your full name'" value=""   required="required">
		         </p>
		        
		         <p>
		         <label for="email">Email: </label>
		         <input id="email" type="text" name="email"  class="text" placeholder="'Enter your email address'" value="" required="required"/>
		         </p>
		        
		        <p>
		         <label for="message">Message: </label>
		         <textarea id="message" class="text" placeholder="'What's on your mind?'"></textarea>
		         </p>		        
		         
		        <p>
		        <button id="registerNew" type="submit" value="Send Message">SEND MESSAGE</button>
		        </p>
		        
		     </fieldset>
		</form>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        
      <!--end of contact form-->
     

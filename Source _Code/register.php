<?php
include "header.php";
include "footer.php";
?>
                
     <!--Create user registration form-->
        
        <div id="registration">
        <h2>Create an Account</h2>
		<form id="RegistrationUserForm" method="post" action="createUser.php">
		     <fieldset>
				<p>
				<label for="lname">Last Name: </label>
				<input autofocus id="lname" type="text" name="lname"  class="text" placeholder="Type last name" value=""   required="required"/>
				</p>

				<p>
				<label for="fname">First Name: </label>
				<input id="fname" type="text" name="fname"  class="text" placeholder="Type first name" value="" required="required"/>
				</p>

				<p>
				<label for="contact_phone">Phone Number: </label>
				<input id="contact_phone" type="text" name="contact_phone"  class="text"  placeholder="'+254714004400'" value="" required="required"/>
				</p>

				<p>
				<label for="email">Email: </label>
				<input id="email" type="text" name="email"  class="text" placeholder="'yourname@example.com'" value="" required="required"/>
				</p>

				<p>
				<label for="username">Username: </label>
				<input id="username" type="text" name="username"  class="text" placeholder="Type username" value="" required="required"/>
				</p>

				<p>
				<label for="password">Password: </label>
				<input id="password" type="password" name="password"  class="text" placeholder="6-10 characters" value="" required="required"/>
				</p>

				<p>
				<label for="password1">Confirm Password: </label>
				<input id="password1" type="password" name="password1"  class="text" placeholder="Retype password" value="" required="required"/>
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
        <br />
        
<!--end of user registration-->




<?php
include "files_inc.php";
?>
          
<!--Update User Account-->  
       <div>
       <h2>Update Account Information.</h2>
       <p>
       <em>       
       Update account here:<br></em>
              
       <div>
       <?php    
      
       $username= $_POST['username']; 
       $password= $_POST['password']; 
       $lname= $_POST['lname']; 
       $fname= $_POST['fname']; 
       $email= $_POST['email'];
       $phone= $_POST['contact_phone'];
       
       if(isset($_POST['submit']) && $_POST['submit'] == "submit"){
       $update= "UPDATE user SET " .
                "username = '$username', password ='$password', lname = '$lname',fname ='$fname', email ='$email', contact_phone = '$phone' " .
                "WHERE id = '" . $_SESSION['user'] ."' ";
                           
        $result = mysql_query($update) or die(mysql_error());
       
        $query = "SELECT * FROM user " .
                "WHERE id = '" . $_SESSION['user'] ."' ";
        $result = mysql_query($query) or die(mysql_error());
        
        $row = mysql_fetch_array($result);  
                                     
       ?> 
       <b>Account updated.</b><br>
       <a href="userprofile.php"><em>Go back to account.</em></a>
       <div id="registration">
       <h2>Update Account</h2>
		<form id="RegistrationUserForm" method="post" action="updateUser.php">
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
		        <label for="contact_phone">Phone Number: </label>
		         <input id="contact_phone" type="text" name="contact_phone"  class="text"  value="<?php echo $row['contact_phone']; ?>" required="required"/>
		        </p>
		        
		         <p>
		        <label for="email">Email: </label>
		         <input id="email" type="text" name="email"  class="text"  value="<?php echo $row['email']; ?>" required="required"/>
		        </p>
		        
		        <p>
		        <label for="username">Username: </label>
		        <input id="username" type="text" name="username"  class="text"  value="<?php echo $row['username']; ?>" required="required"/>
		        </p>
		        
		        <p>
		         <label for="password">Password: </label>
		        <input id="password" type="text" name="password"  class="text" value="<?php echo $row['password']; ?>" required="required"/>
		        </p>
		        		        		        
		        <p>
		        <button id="registerNew" name="submit" type="submit" value="submit">UPDATE</button>
		        <!--input type="button" value="Cancel" onclick="history.go(-1);"-->
		       </p>
		        
		     </fieldset>
		</form>
		</div>
		<br />
		<br />
 	<?php
 	}else{
 	$query = "SELECT * FROM user " .
                "WHERE id = '" . $_SESSION['user'] ."' ";
        $result = mysql_query($query) or die(mysql_error());
        
        $row = mysql_fetch_array($result); 
         
 	?>
 	         <div id="registration">
                 <h2>Update Account</h2>
		<form id="RegistrationUserForm" method="post" action="updateUser.php">
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
		        <label for="contact_phone">Phone Number: </label>
		         <input id="contact_phone" type="text" name="contact_phone"  class="text"  value="<?php echo $row['contact_phone']; ?>" required="required"/>
		        </p>
		        
		         <p>
		        <label for="email">Email: </label>
		         <input id="email" type="text" name="email"  class="text"  value="<?php echo $row['email']; ?>" required="required"/>
		        </p>
		        
		        <p>
		        <label for="username">Username: </label>
		        <input id="username" type="text" name="username"  class="text"  value="<?php echo $row['username']; ?>" required="required"/>
		        </p>
		        
		        <p>
		         <label for="password">Password: </label>
		        <input id="password" type="text" name="password"  class="text" value="<?php echo $row['password']; ?>" required="required"/>
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
 	<?php
 	}
 	?>
       </div>          
<!--end-->
      

<?php
session_start();
include "connect_db.inc.php";
include "header.php";
include "footer.php";
?>

<!--Reset password-->
         <div id="registration">
         <h2>Reset Password</h2>
             <form id="ResetPassword" method="post" action="forgotpass.php">
                 <fieldset>
                        <p>
                        <label>Username: </label>
		        <input  type="text" name="username"  class="text" placeholder="'Type your username'" value=""   required="required"/>
		        </p>
		        
                        <p>
                        <label>Enter Old Password: </label>
		        <input  type="password" name="oldpass"  class="text" placeholder="'Type old password'" value=""   required="required"/>
		        </p>
		        
		        <p>
                        <label>Enter New Password: </label>
		        <input  type="password" name="newpass"  class="text" placeholder="'Type new password'" value=""   required="required"/>
		        </p>
		        
		        <p>
                        <label>Confirm Password: </label>
		        <input  type="password" name="confirmpass"  class="text" placeholder="'Confirm new password'" value=""   required="required"/>
		        </p>
		        
		        <p>
		        <button  name="submit" class="text" type="submit" value="submit">SUBMIT</button>
		        </p>		        
		        
                 </fieldset>
             </form>
             </div>  
             <?php
             $username= mysql_real_escape_string($_POST['username']);
             $oldpass = mysql_real_escape_string($_POST['oldpass']);
             $newpass = mysql_real_escape_string($_POST['newpass']);
             $confirmpass = mysql_real_escape_string($_POST['confirmpass']);
             
             if(isset($_POST['submit']) && $_POST['submit'] == "submit"){
                  if(0 !==strcmp($newpass,$confirmpass))
			    {
			    ?>
			    <script>
			    alert("Password entries do not match");
			    window.location="forgotpass.php";
			    </script>
			    <?php
			    die();
			}else{
			     $sql = "UPDATE user SET " .
			            "password = '$newpass'" .
			            "WHERE password = '$oldpass' " .
			            "AND username='$username'";
			            		            
			      $result = mysql_query($sql);
			      			      
			      if(!$result){
			      ?>
			      <script>
			      alert("Sorry, could not reset password.");
			      window.location="forgotpass.php";
			      </script>
			      <?php			     
			      }else{           
			    ?>
			    <script>
			    alert("Password reset");
			    window.location="login.php";
			    </script>
			    <?php
			    die();
			    }		
			}		
             }
             ?>       
         
<!--end of section-->
       

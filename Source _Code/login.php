<?php
include "header.php";
include "footer.php";
?>
          
<!--Creating login form on home page-->
   
       <div id="login">
        <h4><em>Please log in to continue</em</h4>
           <form id="userLogin" action="setSession.php" method="post">
               <fieldset>
                   <p>
                      <label for="username">Username: </label>
                      <input autofocus id="username" name="username" type="text" class="text" value="" placeholder="Type your username" required="required" />
                    </p>
                    <p>
                      <label for="password">Password: </label>
                      <input id="password" name="password" type="password" class="text" value="" placeholder="Type password" autocomplete="off" required="required" />
                   </p>
                   
                   <p>
                   <button id="userlog" type="submit">LOG IN</button>
                   </p>
               </fieldset>
           </form>
           
        </div>
        <p id="otherAccountDetails">
       Not yet registered?<a href="register.php">Create an account.</a></br>
       Reset password?<a href="forgotpass.php">Click here.</a></br>
        </p>
      
<!--end of login section-->
      


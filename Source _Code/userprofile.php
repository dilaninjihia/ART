<?php
include "files_inc.php";
?>
      
  <!--fetch users and manage accounts-->  
       <div>
       <h2>Welcome to your personal information area.</h2>
       <p>
       <em>
       You can update your personal information, or delete your account.<br >
       Your information as you currently have it is as shown below:<br></em>
       <?php
       $query = "SELECT * FROM user " .
                "WHERE id = '" . $_SESSION['user'] ."' ";
        $result = mysql_query($query) or die(mysql_error());
        
        $row = mysql_fetch_array($result);        
        ?>
          <p>
          <table width=40% border="1" cellpadding="1" cellspacing="2">
		  <tr>
		  <th>Username: </th>             
		  <td> <?php echo $row['username']; ?></td>
		  </tr>
		  
		  <tr>
		  <th>Password: </th>             
		  <td> <?php echo md5($row['password']); ?></td>
		  </tr>
		  
		  <tr>
		  <th>Last Name: </th>             
		  <td> <?php echo $row['lname']; ?></td>
		  </tr>
		  
		  <tr>
		  <th>First Name: </th>             
		  <td> <?php echo $row['fname']; ?></td>
		  </tr>
		  
		  <tr>
		  <th>Email: </th>             
		  <td> <?php echo $row['email']; ?></td>
		  </tr>
		  
		  <tr>
		  <th>Contact Phone: </th>             
		  <td> <?php echo $row['contact_phone']; ?></td>
		  </tr> 
          </table>
		  <p>
		  <a href="updateUser.php"><em>Update Account</em></a>&nbsp&nbsp&nbsp&nbsp
		  <?php
		   $sql="SELECT * FROM user WHERE id='". $_SESSION['user']. "'";
                   $result = mysql_query($sql) or die (mysql_error());

			while($row=mysql_fetch_assoc($result))
			{
			$access_lvl=$row['access_lvl'];
			}
						
			if($access_lvl == '1'){
			;
			}else{
			?>
			<a href="deleteUser.php"><em>Delete Account</em></a>
			<?php
			}
		  ?>
		  
		  </p>
          
          </p>
       </p>
       </div>     
       
      <!--end-->
     

<?php
include "files_inc.php";

$submit=$_POST['submit'];

if(isset ($submit) && $submit == "Yes"){
    $delete="DELETE FROM user " .
            "WHERE id = '" . $_SESSION['user'] ."'";
    $result=mysql_query($delete) or die(mysql_error());
    
    header("Refresh: 5; URL=login.php");
    echo "Your account has been deleted!Create an account to use the system!<br>";
    die();
}else{
?>
          
  <!--Delete User Account-->  
       <div>
          <p>
          <em><b>
          Are you sure you want to delete your account?<br>
          There is no way to retrieve your account once you confirm!<br>
          You will also not be able to use this system any more.</b></em><br>
               <form action="deleteUser.php" method="post">
                    <input type="submit" name="submit" value="Yes"> &nbsp
                    <input type="button" value=" No " onclick="history.go(-1);">
               </form>    
          </p>
       </div>          
       
      <!--end of delete user account -->
<?php
}
?>




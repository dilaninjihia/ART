<?php

include "files_inc.php";

if(isset($_GET['id'])){

$passed=$_GET['id'];

$submit=$_POST['submit'];

if(isset ($submit) && $submit == "Yes"){
    $delete="DELETE FROM patient " .
            "WHERE patient.patientId = '$passed'" .
            "AND userId = '".$_SESSION['user']."'";
            
                
    $result=mysql_query($delete) or die("Sorry, could not delete. "  . mysql_error());
    
    $delete1="DELETE FROM patient_appointment " .
            "WHERE patient_appointment.patientId = '$passed'";
     
    $result=mysql_query($delete1) or die("Sorry, could not delete. "  . mysql_error());
     
        
    ?>
    <script>
    alert("Patient deleted!");
    window.location="findPatient.php";
    </script>
    <?php
    die();
}else{
?>
   
     <!--delete patient record-->
         <div>
          <p>
          <em><b>
          Are you sure you want to delete the patient?<br>
          There is no way to retrieve their account once you confirm!</em><br>          
               <form action="deletePatient.php?id=<?php echo $passed; ?>" method="post">
                    <input type="submit" name="submit" value="Yes"> &nbsp
                    <input type="button" value=" No " onclick="history.go(-2);">
               </form>    
          </p>
       </div>          
       
       <!--footer section -->
<?php
  }
}
?>


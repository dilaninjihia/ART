<?
include "files_inc.php";
?>
<!--To display welcome message and background information on home page --> 
     <div id="welcomemsg">  
     <?php
          $sql="SELECT * FROM user WHERE id='". $_SESSION['user']. "' ";
          $result=mysql_query($sql) or die(mysql_error());
          
         
          while($row=mysql_fetch_assoc($result))
          {
             $lname = $row['lname'];
                      
             ?>
            <h2 id="welcome">Welcome <?php echo $lname; ?>!</h2> 
            <?php
          }
          
	echo "Today is ";
	echo date("F d");
	echo ", ";
	echo date("Y");
    ?>
     <caption>
     <br />
     <strong><em id="siteinfo">About ART SMS-Alert.</em></strong> <br/>
		     <details>
		       <p>
			     <em>
			     ART SMS-Alert is an automated short text messaging solution to remind patients on anti-retroviral therapy<br />
			     to heed medical appointments in an effort to reduce default of treatment and in so doing curb loss to follow-up.
			     Patient,in this system, has been used to refer to anyone living with HIV/AIDS who has enrolled for Anti-Retro Viral Therapy.
			     </em>
			</p>
		     </details>
     </caption>
     </div>
     <br />
     <br />
<!--end of welcome messsage-->


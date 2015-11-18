<?php
     function insertMessage($receiver,$msgtype,$msg,$status){
     $sql = "INSERT INTO ozekimessageout(receiver,msgtype,msg,status)" .
            "VALUES('{$receiver}','{$msgtype}','{$msg}','{$status}')" ;
     $result = mysql_query($sql);
     if(!$result){
      echo ("Could not insert into ozekimessageout." . mysql_error() ."<br>");
      return false;
     }
     return true;
     }
?>

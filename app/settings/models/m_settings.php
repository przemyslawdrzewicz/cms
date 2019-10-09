<?php

class Settings {
   
   function changePassword($user,$newpass){
       
       global $SK;
       
       if($stmt = $SK->Database->prepare("UPDATE users SET password = ? WHERE username = ? ")){
           $stmt->bind_param('ss', md5($newpass . $SK->Auth->getSalt()), $user);
           $stmt->execute();
           $stmt->close();
           
           return TRUE;
       } else {
           return FALSE;
       }
       
   }
    
}
<?php

session_start();

include "../includes/database.php";
include "../includes/functions.php";

if(@$_POST['mail']!=""){
try{
    
    $mail=securisation($_POST['mail']);
    $mdp=securisation($_POST['mdp']);
    $sql = "SELECT user.mail,user.mdp,user.role,user.prenom FROM user WHERE mail='$mail'";
			

    $sth = $dbco->prepare($sql);
   $sth->execute();
    $resultat = $sth->fetch(PDO::FETCH_ASSOC);
    if($sth->rowCount()>0){
      
         $actualmdp=$resultat["mdp"];
         $prenom=$resultat["prenom"];
         $role=$resultat["role"];
          if($actualmdp==$mdp){
              $_SESSION["user_prenom"]=$prenom;
              $_SESSION["user_mail"]=$mail;
              $_SESSION["role"]=$role;
              $_SESSION["error_message"]="";  
              header("location:../admin/starter.php");
              exit();
          }
        else{
			
            $_SESSION["error_message"]="Password doesn't match";           
            /*echo "Password doesn't match";*/
        } 
        
        
    }
    else {
        
        $_SESSION["error_message"]="User not found";      
        //echo "user not found";
     }
   }   
	catch(PDOException $e){

	   echo "Erreur : " . $e->getMessage();

	}
  

 }
 else {
        
        $_SESSION["error_message"]="Enter your email";       
        //echo "user not found";
    }
 header("location:loginformuser.php");
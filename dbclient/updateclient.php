<?php
include "../security/secure.php";
include "../includes/database.php";

  if(@$_POST['id_client']!=""){


	        $servername = 'localhost';
            $dbusername = 'root';
            $dbpassword = '';
			
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $id_client=$_POST['id_client'];
            $telephone = $_POST ['telephone'];
            


try{
	

$sql = "UPDATE client set nom=:nom,telephone=:telephone,prenom=:prenom WHERE id_client=:id_client";
$sth = $dbco->prepare($sql);
$params=array(
                                    ':nom' => $nom,
                                    ':prenom' => $prenom,
                                    ':telephone' => $telephone,
                                    ':id_client' => $id_client,
									);
$sth->execute($params);
 // header('Location:../admin/starter.php?page=clientlist');  
  echo "Modification effectuée";    
}

catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}
 
 }
?>
<?php
include "../security/secure.php";
include "../includes/database.php";
  if(@$_POST['id_editeur']!=""){


	        $servername = 'localhost';
            $dbusername = 'root';
            $dbpassword = '';
			
            $nom = $_POST['nom'];
            $adresse=$_POST['adresse'];
            $id_editeur=$_POST['id_editeur'];


try{
	


$sql = "UPDATE editeur set nom=:nom,adresse=:adresse WHERE id_editeur=:id_editeur";
$sth = $dbco->prepare($sql);
$params=array(
                                    ':nom' => $nom,
                                    ':adresse' => $adresse,
                                    ':id_editeur' => $id_editeur,
									);
$sth->execute($params);
 // header('Location:../admin/starter.php?page=editeurlist');      
 echo "Modification effectuée";
}

catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}
 
 }
?>
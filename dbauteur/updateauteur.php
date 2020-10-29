<?php
include "../security/secure.php";
include "../includes/database.php";

if(@$_POST['id_auteur']!=""){


	        $servername = 'localhost';
            $dbusername = 'root';
            $dbpassword = '';
			
            $nom = $_POST['nom'];
            $prenom=$_POST['prenom'];
            $nationalite=$_POST['nationalite'];
            $id_auteur=$_POST['id_auteur'];


try{
	

$sql = "UPDATE auteur set prenom=:prenom,nom=:nom,nationalite=:nationalite WHERE id_auteur=:id_auteur";
$sth = $dbco->prepare($sql);
$params=array(
                                    ':prenom' => $prenom,
                                    ':nom' => $nom,
									':nationalite' => $nationalite,
                                    ':id_auteur' => $id_auteur,
									);
$sth->execute($params);
 // header('Location:../admin/starter.php?page=auteurlist');  
 echo "Modification effectuée";    
}

catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}
 
 }
?>
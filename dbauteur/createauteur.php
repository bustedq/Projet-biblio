<?php

include "../includes/functions.php";
include "../security/secure.php";
include "../includes/database.php";

	        $servername = 'localhost';
            $dbusername = 'root';
            $dbpass = '';
			
			$nom = $_POST['nom'];
			$prenom=$_POST['prenom'];
            $nationalite=$_POST['nationalite'];
            
			

try{
    
    $sth = $dbco->prepare("
    INSERT INTO auteur(nom,prenom,nationalite)
    VALUES(:nom,:prenom,:nationalite)
    ");
    $sth->execute(array(
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':nationalite' => $nationalite,));
    //    header('location:../admin/starter.php?page=auteurlist');
    echo "Nouvel Auteur ajouté avec succées";
    }
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

?>
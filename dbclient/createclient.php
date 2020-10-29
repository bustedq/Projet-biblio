<?php

include "../includes/functions.php";
include "../security/secure.php";
include "../includes/database.php";


	        $servername = 'localhost';
            $dbusername = 'root';
            $dbpass = '';
			
			$nom = $_POST['nom'];
            $prenom=$_POST['prenom'];
            $telephone=$_POST['telephone'];
            
            
			

try{
    $sth = $dbco->prepare("
    INSERT INTO client(nom,prenom,telephone)
    VALUES(:nom,:prenom,:telephone)
    ");
    $sth->execute(array(
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':telephone' => $telephone,));
    //    header('location:../admin/starter.php?clientlist');
    echo "Client ajouté avec succées";
    }
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

?>
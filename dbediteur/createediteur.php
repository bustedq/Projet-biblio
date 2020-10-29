<?php
  
  include "../includes/functions.php";
  include "../security/secure.php";
  include "../includes/database.php";

	        $servername = 'localhost';
            $dbusername = 'root';
            $dbpass = '';
			
			$nom = $_POST['nom'];
			$adresse=$_POST['adresse'];
            
            
			

try{
    
    $sth = $dbco->prepare("
    INSERT INTO editeur(nom,adresse)
    VALUES(:nom,:adresse)
    ");
    $sth->execute(array(
        ':nom' => $nom,
        ':adresse' => $adresse,));
     //   header('location:../admin/starter.php?page=editeurlist');
    echo "Editeur ajouté avec succées";
    }
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

?>
<?php
include "../security/secure.php";
include "../includes/database.php";
  if(@$_POST['id_bibliotheque']!=""){


	        $servername = 'localhost';
            $dbusername = 'root';
            $dbpassword = '';
			
			$nom = $_POST['nom'];
			$prenom=$_POST['prenom'];
            $telephone=$_POST['telephone'];
            $id_bibliotheque=$_POST['id_bibliotheque'];


try{
	


$sql = "UPDATE bibliotheque set prenom=:prenom,nom=:nom,telephone=:telephone WHERE id_bibliotheque=:id_bibliotheque";
$sth = $dbco->prepare($sql);
$params=array(
                                    ':prenom' => $prenom,
                                    ':nom' => $nom,
									':telephone' => $telephone,
                                    ':id_bibliotheque' => $id_bibliotheque,
									);
$sth->execute($params);
 // header('Location:../admin/starter.php?bibliolist');   
 echo "Modification effectuée";    
}

catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}
 
 }
?>
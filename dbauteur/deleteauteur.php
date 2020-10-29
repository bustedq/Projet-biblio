<?php
include "../security/secure.php";
include "../includes/database.php";
$id_auteur=$_GET['id'];
try{

	$sql="DELETE FROM auteur WHERE id_auteur=$id_auteur";
	$sth=$dbco->prepare($sql);
	$sth->execute();
	
	header('location:../admin/starter.php?page=auteurlist');
}
catch(PDOException $e){
	echo "Erreur:".$e->getMessage();
}
?>
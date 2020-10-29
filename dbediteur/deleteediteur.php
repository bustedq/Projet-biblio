<?php
include "../security/secure.php";
include "../includes/database.php";
$id_editeur=$_GET['id'];
try{
	$sql="DELETE FROM editeur WHERE id_editeur=$id_editeur";
	$sth=$dbco->prepare($sql);
	$sth->execute();
	
	header('location:../admin/starter.php?page=editeurlist');
}
catch(PDOException $e){
	echo "Erreur:".$e->getMessage();
}
?>
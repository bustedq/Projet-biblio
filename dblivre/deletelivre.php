<?php

include "../security/secure.php";
include "../includes/database.php";

$id_livre=$_GET['id'];
try{

	$sql="DELETE FROM livre WHERE id_livre=$id_livre";
	$sth=$dbco->prepare($sql);
	$sth->execute();
	
	header('location:../admin/starter.php?page=livrelist');
}
catch(PDOException $e){
	echo "Erreur:".$e->getMessage();
}
?>
<?php
include "../security/secure.php";
include "../includes/database.php";
$id_bibliotheque=$_GET['id'];
try{
	
	$sql="DELETE FROM bibliotheque WHERE id_bibliotheque=$id_bibliotheque";
	$sth=$dbco->prepare($sql);
	$sth->execute();
	
	header('location:../admin/starter.php?bibliolist');
	
}
catch(PDOException $e){
	echo "Erreur:".$e->getMessage();
}
?>
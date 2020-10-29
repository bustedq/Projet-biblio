<?php
include "../security/secure.php";
include "../includes/database.php";
$id_client=$_GET['id'];
	
$sql = "select *  FROM client WHERE id_client='$id_client'";
$sth = $dbco->prepare($sql);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
/*$id_user=$result['id_user'];*/
$nom=$result['nom'];
$prenom=$result['prenom'];
$telephone=$result['telephone'];
?>
		  	      <link rel="stylesheet" href="style.css">
<h1>UPDATE CLIENT</h1>
        <form action="?page=updateclient" method="post">
		
		<input type="hidden" id="id_client" name="id_client" value="<?php echo $id_client;?>">
		
            <div class="c100">
                <label for="nom">Nom : </label>
                <input type="text" id="nom" name="nom" value="<?php echo $nom;?>">
            </div>
            <div class="c100">
                <label for="nom">Prénom : </label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $prenom;?>">
            </div>
            <div class="c100">
                <label for="adresse">Téléphone : </label>
                <input type="text" id="telephone" name="telephone" value="<?php echo $telephone;?>">
            </div>
            
				             
            <div class="c100" id="submit">
                <input type="submit" value="Envoyer">
            </div>
        </form>
<?php
include "../security/secure.php";
include "../includes/database.php";
$id_editeur=$_GET['id'];
	
$sql = "select *  FROM editeur WHERE id_editeur='$id_editeur'";
$sth = $dbco->prepare($sql);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
/*$id_user=$result['id_user'];*/
$nom=$result['nom'];
$adresse=$result['adresse'];
?>
		  	      <link rel="stylesheet" href="style.css">
<h1>UPDATE EDITEUR</h1>
        <form action="?page=updateediteur" method="post">
		
		<input type="hidden" id="id_editeur" name="id_editeur" value="<?php echo $id_editeur;?>">
		
            <div class="c100">
                <label for="nom">Nom : </label>
                <input type="text" id="nom" name="nom" value="<?php echo $nom;?>">
            </div>
            <div class="c100">
                <label for="adresse">Adresse : </label>
                <input type="text" id="adresse" name="adresse" value="<?php echo $adresse;?>">
            </div>
            
				             
            <div class="c100" id="submit">
                <input type="submit" value="Envoyer">
            </div>
        </form>
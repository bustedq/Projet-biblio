<?php
include "../security/secure.php";
include "../includes/database.php";
$id_auteur=$_GET['id'];
$sql = "select *  FROM auteur WHERE id_auteur='$id_auteur'";
$sth = $dbco->prepare($sql);
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
/*$id_user=$result['id_user'];*/
$nom=$result['nom'];
$prenom=$result['prenom'];
$nationalite=$result['nationalite'];
?>
		  	      <link rel="stylesheet" href="style.css">
<h1>UPDATE AUTEUR</h1>
        <form action="?page=updateauteur" method="post">
		
		<input type="hidden" id="id_auteur" name="id_auteur" value="<?php echo $id_auteur;?>">
		
            <div class="c100">
                <label for="nom">Nom : </label>
                <input type="text" id="nom" name="nom" value="<?php echo $nom;?>">
            </div>
            <div class="c100">
                <label for="prenom">Prénom : </label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $prenom;?>">
            </div>
            <div class="c100">
                <label for="nationalite">Nationalité : </label>
                <input type="text" id="nationalite" name="nationalite" value="<?php echo $nationalite;?>">
            </div>
				             
            <div class="c100" id="submit">
                <input type="submit" value="Envoyer">
            </div>
        </form>
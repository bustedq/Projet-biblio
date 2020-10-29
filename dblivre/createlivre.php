<?php
 include "../includes/functions.php";
 include "../security/secure.php";
 include "../includes/database.php";




	        $servername = 'localhost';
            $dbusername = 'root';
            $dbpass = '';

			      $titre = $_POST['titre'];
            $genre=$_POST['genre'];
            $date_publication = $_POST['date_publication'];
            $id_auteur=$_POST['id_auteur'];
            $id_editeur = $_POST['id_editeur'];
            $prix=$_POST ['prix'];
            $description=$_POST['description'];
            $pages=$_POST['pages'];

            $logo= uploadfile('logo',true);
            $id_bibliotheque=$_POST['id_bibliotheque'];



try{


    $sth = $dbco->prepare("
    INSERT INTO livre(titre,genre,logo,prix,pages,description,id_bibliotheque)
    VALUES(:titre,:genre,:logo,:prix,:description,:pages,:id_bibliotheque)
    ");
    $sth->execute(array(
        ':titre' => $titre,
        ':genre' => $genre,
        ':logo' => $logo,
        ':pages' => $pages,
        ':description' => $description,
        ':prix' => $prix,
        ':id_bibliotheque' => $id_bibliotheque,
        ));

        $id_livre=$dbco->lastInsertId();
        $sql = "INSERT INTO publier (id_livre,date_publication,id_auteur,id_editeur)
                VALUES (:id_livre,:date_publication,:id_auteur,:id_editeur)";
        $sth = $dbco->prepare($sql);
        $sth->execute(array(
            ':date_publication' => $date_publication,
            ':id_auteur' => $id_auteur,
            ':id_editeur' => $id_editeur,
            ':id_livre' => $id_livre,
            ));
    	// header('location:../admin/starter.php?livrelist');

    echo "Création réussie";
    }
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

?>

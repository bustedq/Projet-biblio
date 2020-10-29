<?php
include "../security/secure.php";
include "../includes/database.php";
include "../includes/functions.php";

if(@$_POST['id_livre']!=""){



  $id_livre = $_POST['id_livre'];
  $id_bibliotheque=$_POST['id_bibliotheque'];
  $titre=$_POST['titre'];
  $genre=$_POST['genre'];
  $pages=$_POST['pages'];
  $prix=$_POST['prix'];
  $description=$_POST['description'];
  $logo=uploadfile('logo',true);//$_POST['logo'];
  $id_auteur=$_POST['id_auteur'];
  $id_editeur=$_POST['id_editeur'];
  $date_publication=$_POST['date_publication'];

try{


  $sql = "UPDATE livre set titre=:titre, id_bibliotheque=:id_bibliotheque, genre=:genre, logo=:logo, prix=:prix, pages=:pages, description=:description WHERE id_livre=$id_livre";

  $params=array(':id_bibliotheque' => $id_bibliotheque,
          ':titre' => $titre,
          ':genre' => $genre,
          ':logo' => $logo,
          ':pages' => $pages,
          ':description' => $description,
          ':prix' => $prix,

          );
  $sth = $dbco->prepare($sql);
  $sth->execute($params);

  $params=array(':id_auteur'=>$id_auteur,
            ':id_editeur'=>$id_editeur,
            ':date_publication'=>$date_publication

                    );
  $sql = "UPDATE publier set  id_auteur=:id_auteur, id_editeur=:id_editeur, date_publication=:date_publication WHERE id_livre=$id_livre";

  $sth = $dbco->prepare($sql);

  $sth->execute($params);
   // header('Location:../admin/starter.php?livrelist');
  echo "Modification effectuée";

}
catch(PDOException $e){

echo "Erreur : " . $e->getMessage();

}
}
?>

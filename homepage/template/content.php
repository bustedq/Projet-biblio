<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<?php

include "../../includes/database.php";
include "../../includes/functions.php";


    echo '  <form action="search" method="get" class="form-inline">
        <div class="input-group">
          <input type="text" name="search" class="form-control" placeholder="Je cherche...">
          <div class="input-group-btn">
            <button type="submit" class="btn btn-info"><span class="fa fa-search"></span>
              Chercher
            </button>
          </div>
        </div>
      </form>';
            try{

              $sth = $dbco->prepare("SELECT distinct genre FROM livre,publier where livre.id_livre=publier.id_livre");
                              $sth->execute();
              				$listeGenres= $sth->fetchAll(PDO::FETCH_ASSOC);

              			foreach ($listeGenres as $grow => $genre) {

              			echo '<div class="page-header">';
						echo '<h1>';
						echo $genre["genre"];
						echo '</h1>';
						echo '</div>';
              			echo "<div class='container'> <div class='row'>";
                /*Sélectionne les valeurs dans les colonnes prenom et mail de la table
                 *users pour chaque entrée de la table*/
                $sth = $dbco->prepare("SELECT livre.titre,livre.id_livre,livre.genre,livre.prix,livre.description,livre.pages,livre.logo,auteur.nom as auteur_name,editeur.nom as editeur_name

                FROM livre,publier,auteur,editeur

                WHERE publier.id_livre=livre.id_livre AND publier.id_auteur=auteur.id_auteur AND publier.id_editeur=editeur.id_editeur and livre.genre=:genre");
      //          $sth->execute();

                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                 $param=array("genre"=>$genre["genre"]);
		             $sth->execute($param);
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

				foreach ($result as $row => $livre) {

        echo '<div class="col-4">';
        echo '<div class="card livrecard border border-primary">';
        echo '<img class="card-img-top" src="../../uploads/'.$livre['logo'].'">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$livre['titre'].'</h5>';
        echo '<p class="card-text">'.$livre['genre'].'</p>';
        echo '<p class="card-text">'.$livre['prix'].'</p>';
        echo '<p class="card-text">'.$livre['description'].'</p>';
        echo '<p class="card-text">'.$livre['pages'].'</p>';
        echo '<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>';
        echo'<a class="btn btn-success" href="?id='.$livre['id_livre'].'&page=livre">Détails</a>';
        echo '</div>';
        echo '</div>';
    echo '</div>';
        }
        echo'</div>';
		   echo'</div>';

			}

                }

            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
 ?>
    <!--<div class="col-4">
        <div class="card livrecard border border-primary">
            <img class="card-img-top" ssrc="img/image1.png" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Titre Livre</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card livrecard border border-primary">
            <img class="card-img-top" ssrc="img/image3.png" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Titre Livre</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
</div> -->

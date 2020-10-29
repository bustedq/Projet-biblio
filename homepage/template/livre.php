<?php

include "/Applications/XAMPP/xamppfiles/htdocs/TP-WEB/includes/database.php";
include "/Applications/XAMPP/xamppfiles/htdocs/TP-WEB/includes/define.php";

if(@$_GET['id']!=""){
			$id_livre=$_GET['id'];
				
			

			$sql = "SELECT livre.titre,livre.id_livre,livre.genre,livre.logo,auteur.nom as auteur_name,editeur.nom as editeur_name,publier.date_publication
                
            FROM livre,publier,auteur,editeur 
                
            WHERE publier.id_livre=livre.id_livre AND publier.id_auteur=auteur.id_auteur AND publier.id_editeur=editeur.id_editeur and livre.id_livre=$id_livre";
			$sth = $conn->prepare($sql);

			$sth->execute();
			$result = $sth->fetch(PDO::FETCH_ASSOC);

			
			$titre=$result['titre'];
			$genre=$result['genre'];
			$logo=$result['logo'];
            $editeur=$result['editeur_name'];
            $auteur=$result['auteur_name'];
            $date_publication=$result['date_publication'];
		
				 $action=$path['updatelivre'];
				 $titreForm=" MODIFIER LIVRE ";
    }


echo '<div class="container-fluid">
    <div class="row">
        
            <div class="col-5">
                <img class="card-img-left" src="uploads/'.$logo.'" alt="Card image cap">  
            </div>  
            
            <div class="col-7">
                <div class="card livrecard">
                <h5 class="livre-titre">'.$titre.'</h5>
                <p class="livre-desc">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="livre-auteur">'.$auteur.'</p> 
                <p class="livre-editeur">'.$editeur.'</p>
                <p class="livre-datepublication">'.$date_publication.'</p>
                <a class=""><button  type="button" class="btn btn-success">Emprunter</button></a>  
                </div>
            </div>
    </div>
</div>';




    ?>

<!--
<div class="container-fluid">
    <div class="row">
        
            <div class="col-5">
                <img class="card-img-left" src="img/contesdelafolie.jpg" alt="Card image cap">  
            </div>  
            
            <div class="col-7">
                <div class="card livrecard">
                <h5 class="livre-titre"><?php echo $titre;?></h5>
                <p class="livre-desc">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="livre-auteur"><?php echo $auteur;?></p> 
                <p class="livre-editeur"><?php echo $editeur;?></p>
                <p class="livre-datepublication"><?php echo $date_publication;?></p>
                <a class=""><button  type="button" class="btn btn-success">Emprunter</button></a>  
                </div>
            </div>
    </div>
</div>
-->
<DOCTYPE! html>
​
<?php
			include "../security/secure.php";
      include "../includes/database.php";


			$sql = "select id_bibliotheque, nom FROM bibliotheque";
			$sth = $dbco->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			 foreach ($result as $bi => $val){
				 @$option .="<option value='".$val['id_bibliotheque']."'>".$val['nom']."</option>";
			 }

			$sql = "select id_auteur , nom FROM auteur";
			$sth = $dbco->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			 foreach ($result as $bi => $val){
				 @$option1 .="<option value='".$val['id_auteur']."'>".$val['nom']."</option>";
			 }


			$sql = "select id_editeur, nom FROM editeur";
			$sth = $dbco->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_ASSOC);
			 foreach ($result as $bi => $val){
				 @$option2 .="<option value='".$val['id_editeur']."'>".$val['nom']."</option>";
             }
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link href="css/style.css" rel="stylesheet" > -->
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	</head>

	<body>
​
​
​
        <div class="container"style="height:800px;width:100%;background-color:grey;justify-content:center;" >

		<h1>Formulaire LIVRE</h1>
        <div class="row">
        <div class="col-12">
        <form action="?page=createlivre" method="post" enctype="multipart/form-data">
<div class="col-3"style="width:100%;">
            <div class="c100">
                <label for="titre">Titre : </label>
                <input type="text" id="titre" name="titre">
            </div>
</div>
<form action="?page=createlivre" method="post" enctype="multipart/form-data">
<div class="col-3"style="width:100%;">
		<div class="c100">
				<label for="prix">Prix : </label>
				<input type="text" id="prix" name="prix">
		</div>
</div>
<form action="?page=createlivre" method="post" enctype="multipart/form-data">
<div class="col-3"style="width:100%;">
		<div class="c100">
				<label for="description">Description : </label>
				<input type="text" id="description" name="description">
		</div>
</div>
<form action="?page=createlivre" method="post" enctype="multipart/form-data">
<div class="col-3"style="width:100%;">
		<div class="c100">
				<label for="pages">Pages : </label>
				<input type="text" id="pages" name="pages">
		</div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
</div>
<div class="col-3"style="width:100%;">
            <div class="c100">
                <label for="genre">Genre : </label>
                <input type="text" id="genre" name="genre">
            </div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
</div>
<div class="col-3"style="width:100%;">
<div class="c100">
                <label for="logo">Logo : </label>
                <input type="file" id="logo" name="logo" >  <img class='tabimg' src="../uploads/<?php echo @$logo;?> "/>
            </div>
</div>
<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
</div>
<div class="col-3"style="width:100%;">
			<div class="c100">
                <label for="id_bibliotheque">Bibliothèque :</label>
                <select id="id_bibliotheque" name="id_bibliotheque">  <!-- liste déroulante des bibliothèques disponibles-->
                    <option value="">Selectionnez la bibliotheque</option>
                       <?php echo $option;
                        ?>
				</select>
			</div>
            </div>
            </div>
            </div>
            <div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
</div>
            <div class="c100">
                <label for="id_auteur">Auteur :</label>
                <select id="id_auteur" name="id_auteur">  <!-- liste déroulante des auteurs disponibles-->
                    <option value="">Selectionnez l'auteur</option>
                       <?php echo $option1;
                        ?>
				</select>
			</div>
            <div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
</div>
            <div class="c100">
                <label for="id_editeur">Editeur :</label>
                <select id="id_editeur" name="id_editeur">  <!-- liste déroulante des éditeurs disponibles-->
                    <option value="">Selectionnez l'éditeur</option>
                       <?php echo $option2;
                        ?>
				</select>
			</div>

            <div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:70%;color:white;"></div>
</div>
<div class="c100">
                <label for="date_publication">Date publication : </label>
                <input type="date" id="date_publication" name="date_publication">
            </div>
            <div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:70%;color:white;"></div>
</div>
            <div class="c100" id="submit">
                <input type="submit" value="Envoyer">
            </div>
        </form>



</div>
​
​
</body>
</html>

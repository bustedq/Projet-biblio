<?php
@session_start();
include "../security/secure.php";
include "../includes/database.php";
?><html>
​
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="formuser.css" />
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </head>
​
    <body>
        <h1>NEW EDITEUR</h1>
        
        <form action="?page=createediteur" method="post">
            <div class="c100">
                <label for="nom">Nom : </label>
                <input type="text" id="nom" name="nom">
            </div>
            <div class="c100">
                <label for="genre">Adresse : </label>
                <input type="text" id="adresse" name="adresse">
            </div>
           

           
            <div class="c100" id="submit">
                <input type="submit" value="Envoyer">
            </div>
        </form>
        
    </body>
    
</html>
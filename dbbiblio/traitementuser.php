<?php
        
        if(@$_POST['prenom']!="" && @$_POST['age']!="" && @$_POST['mail']!="" )
        {
        @$prenom=$_POST["prenom"];
        echo $prenom.'<br/>';
        
        @$mail=$_POST["mail"];
        echo $mail.'<br/>';
        
        @$mdp=$_POST["mdp"];
        echo $mdp;
        
        
        @$age=$_POST["age"];
        echo $age;
        
        /*$servername = 'localhost'; //connexion en local
            $username = 'root'; // par défaut
            $password = ''; // rien par défaut
            
            //On établit la connexion
            $conn = new mysqli($servername, $username, $password);
            
            //On vérifie la connexion
            if($conn->connect_error){
                die('Erreur : ' .$conn->connect_error);
            }
            echo 'Connexion réussie';*/
        
            $servername = 'localhost';
            $user = 'root';
            $pass = '';
        
            $prenom = $_POST['prenom'];
            $email = $_POST['mail'];
            $mdp = $_POST['mdp'];
            $age = $_POST['age'];
            $sexe = $_POST['sexe'];
            $pays = $_POST['pays'];
            //On établit la connexion
            try{
            $conn = new PDO("mysql:host=$servername;dbname=bd_diogo_biblio", $user, $pass);
            echo 'Connexion réussie';
                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$sql = "INSERT INTO user(prenom,email,password,age,sexe,pays,role)
           // VALUES('$prenom','$email','$passw','$age','$sexe','$pays','admin')";
             
                $sql = "INSERT INTO user (prenom,mail,mdp,age,sexe,pays,role)
                VALUES(:prenom,:mail,:mdp,:age,:sexe,:pays,:admin)";
                //$sql = $conn
                $sth = $conn->prepare( $sql);
                
               // echo "<br>".$sql;
               // $conn->exec($sql);
               // echo '<br>Entrée ajoutée dans la table';
                
                $params=array(
                ':prenom' => $prenom,
                ':mail' => $mail,
                ':mdp' => $mdp,
                ':age' => $age,
                ':sexe' => $sexe,
                ':pays' => $pays,
                ':admin'=> "admin");
        
                $sth->execute($params);
                
                echo "Entrée ajoutée dans la table";
            
            }
        
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        
            
        }
        
        ?>
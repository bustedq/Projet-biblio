<?php

$servname = "localhost"; $dbname = "bd_diogo_biblio"; $dbuser = "root"; $dbpass = "";

$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $dbuser, $dbpass);

$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

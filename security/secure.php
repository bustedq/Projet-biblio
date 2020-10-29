<?php
@session_start();
 if(@$_SESSION["user_prenom"]=="" || @$_SESSION["role"]!="admin"){

    header("location:../index.php");
    exit();
 }


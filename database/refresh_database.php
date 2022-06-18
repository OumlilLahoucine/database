<?php
include "../connexion/connexion.php";

        global $connect;

if(isset($_POST['submit_create_database'])){
            $name = $_POST['create_database_name'];
            $query = "CREATE DATABASE ".$name;
            $result = mysqli_query($connect, $query);
            header("Refresh:0; url=database.php");
            
            //  if(){
            //     echo "<script>alert('La base de données `".$name."` à été crée avec succès');</script>";
            // }
            // else{
            //     echo "<script>alert('Echec de création de la base de données');</script>";
            // }
        }

        if(isset($_POST['submit_delete_database'])){
            $name = $_POST['database'];
            $query = "DROP DATABASE ".$name;
            $result = mysqli_query($connect, $query);
            header("Refresh:0; url=database.php");
            //  if(){
            //     echo "<script>alert('La base de données `".$name."` à été crée avec succès');</script>";
            // }
            // else{
            //     echo "<script>alert('Echec de création de la base de données');</script>";
            // }
        }
    // header("Refresh : 0; url=database.php");
?>
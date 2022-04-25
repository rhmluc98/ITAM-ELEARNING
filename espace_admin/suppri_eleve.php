<?php
    include("connexion.php");

    $code = $_GET['code'];
    $suppression_eleve = "DELETE FROM eleve WHERE ID_ELEVE=$code";
    mysqli_query($bdd,$suppression_eleve);

    header("location:eleves.php");
?>
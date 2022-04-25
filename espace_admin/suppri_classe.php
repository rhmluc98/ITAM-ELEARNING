<?php
    include("connexion.php");

    $code = $_GET['code'];
    $requete = "DELETE FROM classes WHERE id_classe=$code";
    mysqli_query($bdd,$requete);
    header("location:classes.php");
?>
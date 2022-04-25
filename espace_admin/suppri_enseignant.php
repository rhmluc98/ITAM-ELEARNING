<?php
    include("connexion.php");
    $code = $_GET['code'];
    $supprimer = "DELETE FROM enseignant WHERE ID_ENSEIGNANT=$code";
    $execute_supprimer = mysqli_query($bdd,$supprimer);
    
    header("location:enseignants.php");
?>
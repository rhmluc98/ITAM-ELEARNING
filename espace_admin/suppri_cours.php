<?php
    include("connexion.php");
    $code = $_GET['code'];
    $suppression_cours = "DELETE FROM cours WHERE id_cours=$code";
    mysqli_query($bdd,$suppression_cours);

    header("location:cours.php");
?>
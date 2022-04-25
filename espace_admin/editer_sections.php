<?php
    include("header.php");

    $code = $_POST['id_section'];
    $libelle = $_POST['libelle_section'];

    $requete = "UPDATE sections SET libelle_section='$libelle' WHERE id_section=$code";
    mysqli_query($bdd,$requete);

    header("location:section.php");
?>
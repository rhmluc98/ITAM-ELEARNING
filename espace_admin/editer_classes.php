<?php
    include("connexion.php");

    $id_classe = $_POST['id_classe'];
    $libelle_classe = $_POST['libelle_classe'];
    $id_section = $_POST['id_section'];

    $modifier = "UPDATE classes SET libelle_classe='$libelle_classe', id_section=$id_section WHERE id_classe=$id_classe";
    mysqli_query($bdd,$modifier);

    header("location:classes.php");
?>
<?php
    include("header.php");
    $code = $_GET['code'];

    $requete = "DELETE FROM sections WHERE (id_section=$code)";
    mysqli_query($bdd,$requete);

    header("location:section.php");
?>
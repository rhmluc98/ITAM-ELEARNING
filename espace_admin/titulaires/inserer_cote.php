<?php
    include("headertitulaire.php");

    $code = $_GET['code'];
    
    $requete_apporter = "SELECT * FROM eleves WHERE id_eleve=$code";
    $execute_requete_apporter = mysqli_query($bdd,$requete_apporter);
    $nombre_requete_apporter = mysqli_fetch_array($execute_requete_apporter);
    
    $nom_eleve_trouver = $nombre_requete_apporter['nom_eleve'];
    $postnom_eleve_trouver = $nombre_requete_apporter['postnom_eleve'];
    $id_classe_eleve = $nombre_requete_apporter['id_classe'];

    if (isset($_POST['submit'])) {

        $id_eleve = htmlspecialchars($_POST['id_eleve']);
        $id_periode = htmlspecialchars($_POST['id_periode']);
        $id_cours = htmlspecialchars($_POST['id_cours']);
        $ponderation = htmlspecialchars($_POST['ponderation']);

        $inserer_cote = "INSERT INTO cotes VALUES ('','$id_eleve',$id_periode,$id_cours,'$ponderation')";
        $execute_inserer_cote = mysqli_query($bdd,$inserer_cote);

        if ($execute_inserer_cote==1) {
            echo "<script>alert('Enregistrement effectué')</script>";
            echo "<script>window.open('inserer_cote.php','_self')</script>";
        }
    }


?>

<?php
    include("sidebartitulaire.php");
?>
<div class="panel panel-primary" style="margin-top:20px;">
    <div class="panel-heading">
        <center>
            <h2>Ajout de note de : <?php echo $nom_eleve_trouver ?> <?php echo $postnom_eleve_trouver ?></h2>    
        </center>
    </div>
    <div class="panel-body">
        <div class="row">
            <form action="inserer_cote.php" method="post" class="form-group">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <input type="text" name="id_eleve" value="<?php echo $code ?>" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <select name="id_periode" id="" class="form-control" required>
                            <option value="">Selectionnez une période içi</option>
                                <?php
                                    $requete_periode = "SELECT id_periode,libelle_periode,libelle_annee FROM periodes,annee_scolaires WHERE annee_scolaires.id_annee=periodes.id_annee";
                                    $execute_periode = mysqli_query($bdd,$requete_periode);
                                    while ($nombre_periode = mysqli_fetch_array($execute_periode)) {
                                        $id_periode = $nombre_periode['id_periode'];
                                        $libelle_periode = $nombre_periode['libelle_periode'];
                                        $annee_periode = $nombre_periode['libelle_annee'];

                                        echo "<option value='$id_periode'>$libelle_periode $annee_periode</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="id_cours" id="" class="form-control" required>
                            <option value="">Selectionnez un cours içi</option>
                                <?php
                                    $requete_cours = "SELECT * FROM cours WHERE id_classe=$id_classe_eleve";
                                    $execute_requete_cours = mysqli_query($bdd,$requete_cours);
                                    while ($nombre_cours = mysqli_fetch_array($execute_requete_cours)) {
                                        $id_cours = $nombre_cours['id_cours'];
                                        $libelle_cours = $nombre_cours['libelle_cours'];

                                    echo "<option value='$id_cours'>$libelle_cours</option>";
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="point_obtenu" id="" class="form-control" required>
                    </div>
                    <div class="col-md-12" style="margin-top:10px;">
                         <div class="text-right">
                            <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Ajouter la note</button>
                         </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?>


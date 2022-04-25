<?php
    include("headertitulaire.php");
    
    $password_titulaire = $_SESSION['password_titulaire'];

    $requete_titulair = "SELECT * FROM titulaires WHERE password_titulaire='$password_titulaire'";
    $execute_requet = mysqli_query($bdd,$requete_titulair);
    $nombre_lign = mysqli_fetch_array($execute_requet);

    $id_class = $nombre_lign['id_classe'];
?>
<?php
    include("sidebartitulaire.php");
?>
<div class="panel panel-primary" style="margin-top:20px;">
    <div class="panel-heading">
        <center>
            <h2>Formulaire de Proclamation des résultats</h2>
        </center>
    </div>
    <div class="panel-body">
        <?php
            if (isset($_POST['submit'])) {
                $id_eleve = $_POST['id_eleve'];
                $nom_eleve = $_POST['nom_eleve'];
                $postnom_eleve = $_POST['postnom_eleve'];
               $photo_eleve = $_POST['photo_eleve'];
            }
        ?>
        <div class="col-md-3">
            <img src="img/<?php echo $photo_eleve ?>" width="200" height= "150" class="img-responsive">
            <br>
            <td><?php echo $nom_eleve ?> <?php echo $postnom_eleve ?></td>
        </div>
        <div class="col-md-9">
            <form action="" method="post" class="form-group">
                <input type="hidden" name="id_eleve" value="<?php echo $id_eleve ?>">
                <div class="form-group">
                    <label class="col-md-4 control-label">Année scolaire</label>
                    <div class="selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="id_annee" class="form-control selectpicker" required>
                                   <option value="">Sélectionnez içi</option>
                                    <?php
                                        $selection_annee = "SELECT * FROM annee_scolaires";
                                        $execute_selection = mysqli_query($bdd,$selection_annee);
                                        while ($a = mysqli_fetch_array($execute_selection)) {
                                            $id_anne = $a['id_annee'];
                                            $libelle_annee = $a['libelle_annee'];

                                            echo"<option value='$id_anne'>$libelle_annee</option>";
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Période</label>
                    <div class="selectContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                            <select name="id_periode" class="form-control selectpicker" required>
                                   <option value="">Sélectionnez içi</option>
                                    <?php
                                        $selection_periode = "SELECT * FROM periodes";
                                        $execute_periode = mysqli_query($bdd,$selection_periode);
                                        while ($p = mysqli_fetch_array($execute_periode)) {
                                            $id_periode = $p['id_periode'];
                                            $libelle_periode = $p['libelle_periode'];

                                            echo"<option value='$id_periode'>$libelle_periode</option>";
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">Pourcentage</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
                        <input type="text" name="pourcentage" placeholder="Pourcentage" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="modal-footer">
                        <button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
                        <a href="cotes.php" class="btn btn-danger">Annuler</a>
                    </div>
                </div>
                <?php
                    if (isset($_POST['enregistrer'])) {
                        $eleve = htmlspecialchars($_POST['id_eleve']);
                        $annee_scolaire = htmlspecialchars($_POST['id_annee']);
                        $periode = htmlspecialchars($_POST['id_periode']);
                        $pourcentage = htmlspecialchars($_POST['pourcentage']);

                        // $verification_resultat = "SELECT id_annee,id_periode FROM  resultats WHERE id_eleve=$eleve";
                        // $execute_verification_resultat = mysqli_query($bdd,$verification_resultat);
                        // if ($execute_verification_resultat==1) {
                        //     echo"<script>alert('Enregistrement impossible car le résultat existe déjà pour cette période')</script>";
                        //     echo"<script>window.open('publier_cote.php','_self')</script>";
                        // }else {
                            $insertion_resultat = "INSERT INTO resultats VALUES ('',$eleve,$id_anne,$id_periode,'$pourcentage')";
                            $execute_insertion_resultat = mysqli_query($bdd,$insertion_resultat);
                            if ($execute_insertion_resultat==1) {
                                echo"<script>alert('Enregistrement effectué')</script>";
                                header("location:cotes.php");
                            }
                        }
                    // }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?>

<?php
    include("header.php");

    if (isset($_POST['submit'])) {

        $libelle_lecon = $_POST['CHAPITRE'];
        $libelle_cours = $_POST['DESCRIPTION_COURS'];
        $fichier_texte = $_POST['FICHIER_TEXTE'];
        $fichier_audio = $_POST['FICHIER_AUDIO'];
        $fichier_video = $_POST['FICHIER_VIDEO'];
        


            
            $inserser_lecon = "INSERT INTO lecon VALUES ('','$libelle_lecon','$fichier_texte','$fichier_audio','$fichier_video',$libelle_cours)";
            $resultat_lecon = mysqli_query($bdd,$inserser_lecon);

            if ($resultat_lecon == 1) {
                echo"<script>alert('La leçon est enregistrée avec succès ?')</script>";
                echo"<script>window.open('ajouter_lecon.php','_self')</script>";
            }
        }
?>

<?php
    include("sidebar.php");
?>
<div class="row" style="margin-top:5px;">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-book"></i> AJOUTER UNE NOUVELLE LECON
                </h3>
            </div>
            <div class="panel-body">
                <form action="ajouter_lecon.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="DESCRIPTION_COURS" class="col-md-3 control-label">TITRE DU COURS</label>
                        <div class="col-md-6">
                        <select type="text" name="DESCRIPTION_COURS" id="" class="form-control" required>
                                <option value=""><--Sélectionnez içi le cour--></option>
                                <?php
                                    $select_cours =  "SELECT* FROM cours";
                                    $res_req_classe = mysqli_query($bdd,$select_cours);

                                    while ($ligne_tableau = mysqli_fetch_array($res_req_classe)) {

                                        $id_cours = $ligne_tableau['ID_COURS'];
                                        $libelle_cours = $ligne_tableau['DESCRIPTION_COURS'];

                                        echo "<option value='$id_cours'>$libelle_cours</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CHAPITRE" class="col-md-3 control-label">LECON DU JOUR</label>
                        <div class="col-md-6">
                        <input type="text" name="CHAPITRE" id="" class="form-control" required>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="FICHIER_TEXTE" class="col-md-3 control-label">FICHIER TEXTE</label>
                        <div class="col-md-6">
                        <input type="file" name="FICHIER_TEXTE" id="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="FICHIER_AUDIO" class="col-md-3 control-label">FICHIER AUDIO</label>
                        <div class="col-md-6">
                        <input type="file" name="FICHIER_AUDIO" id="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="FICHIER_VIDEO" class="col-md-3 control-label">FICHIER VIDEO</label>
                        <div class="col-md-6">
                        <input type="file" name="FICHIER_VIDEO" id="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Enregistrer" class="btn btn-primary" onclick="return confirm('Etes-vous sûr de vouloir enregister ?')">
                        </div>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?>
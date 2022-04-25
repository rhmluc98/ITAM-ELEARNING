<?php
    session_start();
    include("includes/db.php");

    if(!isset($_SESSION['admin_email']))
    {
        header("location:login.php");
    }

    else
    {
?>

<?php
    include("includes/header.php");
    include("includes/sidebar.php");
?>
<div class="row" style="margin-top:5px;">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-user"></i> Insérer Classe
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Nom class</label>
                        <div class="col-md-6">
                            <input type="number" name="classe_desc" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Section</label>
                        <div class="col-md-6">
                            <select type="text" name="section_desc" id="" class="form-control" required>
                                <option disabled selected>Sélectionnez section</option>
                                <?php
                                    $get_section =  "SELECT *FROM section";
                                    $run_section = mysqli_query($con,$get_section);

                                    while ($row_section = mysqli_fetch_array($run_section)) {

                                        $description_section = $row_section['description'];

                                        echo "<option value='$description_section'>$description_section</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Titulaire</label>
                        <div class="col-md-6">
                            <select type="text" name="id_titulaire" id="" class="form-control" required>
                                <option disabled selected>Sélectionnez titulaire</option>
                                <?php
                                    $get_titu =  "SELECT *FROM enseignant";
                                    $run_titu = mysqli_query($con,$get_titu);

                                    while ($row_titu = mysqli_fetch_array($run_titu)) {

                                        $titu_id = $row_titu['id_enseignant'];
                                        $nom_titulaire = $row_titu['nom_enseignant'];
                                        $postnom_titulaire = $row_titu['postnom_enseignant'];
                                        $prenom_titulaire = $row_titu['prenom_enseignant'];

                                        echo "<option value='$titu_id'>$nom_titulaire $postnom_titulaire $prenom_titulaire</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="insert_classe" value="Enregistrer classe" class="btn btn-primary form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <a href="index.php" class="btn btn-danger form-control">Annuler</a>
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


<?php } ?>

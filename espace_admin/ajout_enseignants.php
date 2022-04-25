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
                    <i class="fa fa-user"></i> Insérer Enseignant
                </h3>
            </div>
            
            <div class="panel-body">
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Nom</label>
                        <div class="col-md-6">
                            <input type="text" name="nom" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Postnom</label>
                        <div class="col-md-6">
                            <input type="text" name="postnom" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Prenom</label>
                        <div class="col-md-6">
                            <input type="text" name="prenom" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Matricule</label>
                        <div class="col-md-6">
                            <input type="number" name="matricule" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Etat civile</label>
                        <div class="col-md-6">
                            <select type="text" name="etat_civile" id="" class="form-control" required>
                                <option disabled selected>Sélectionnez</option>
                                <option>Marié(e)</option>
                                <option>Celibataire</option>
                                <option>Divorcé(e)</option>
                                <option>Veuf</option>
                                <option>Veuve</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Sexe</label>
                        <div class="col-md-6">
                            <select type="text" name="sexe" id="" class="form-control" required>
                                <option disabled selected>Sélectionnez</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Telephone</label>
                        <div class="col-md-6">
                            <input type="number" name="phone" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Adresse</label>
                        <div class="col-md-6">
                            <input type="text" name="adresse" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="photo" id="" class="form-control" required>
                        </div>
                    </div>
                    <?php 
                  
                    $current_mounth = date('n');
                    $current_year = date('Y');

                    if($current_mounth >= 7)
                    {
                      $year1 = $current_year + 1;
                      $year2 = $year1 - 1;
                      $school_year = $year2.'-'.$year1;
                    }
                    else
                    {
                      $year1 = $current_year - 1;
                      $school_year = $year1.'-'.$current_year;
                    }  
                  ?>
                  <input type="hidden" name="annee_sco" value="<?php echo $school_year ?>" class="form-control">
                
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="insert_enseignant" value="Enregistrer enseignant" class="btn btn-primary form-control">
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

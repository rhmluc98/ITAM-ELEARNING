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
                    <i class="fa fa-user"></i> Modifier Enseignant
                </h3>
            </div>
             
             <?php 
             
               if(isset($_GET['modifier_btn']))
               {
                $ensei_id = $_GET['modif_id'];
                $get_ensei = "SELECT *FROM enseignant WHERE id_enseignant='$ensei_id'";
                $run_get = mysqli_query($con,$get_ensei);

                foreach($run_get as $row)
                {

             ?>
            <div class="panel-body">
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="enseignant_id" id="" value="<?php echo $row['id_enseignant'] ?>" class="form-control" required>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Nom</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_nom" id="" value="<?php echo $row['nom_enseignant'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Postnom</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_postnom" id="" value="<?php echo $row['postnom_enseignant'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Prenom</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_prenom" id="" value="<?php echo $row['prenom_enseignant'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Matricule</label>
                        <div class="col-md-6">
                            <input type="number" name="modif_matricule" id="" value="<?php echo $row['matricule'] ?>" class="form-control" required>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Etat civile</label>
                        <div class="col-md-6" >
                            <select name="modif_etatciv" class="form-control" required>
                                <option disabled selected><?php echo $row['etat_civile'] ?></option>
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
                        <div class="col-md-6" >
                            <select name="modif_sexe" class="form-control" required>
                                <option disabled selected><?php echo $row['sexe'] ?></option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Numero telephone</label>
                        <div class="col-md-6">
                            <input type="number" name="modif_numero" id="" value="<?php echo $row['numero_telephone'] ?>" class="form-control" required>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Adresse</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_adresse" id="" value="<?php echo $row['addresse'] ?>" class="form-control" required>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="modif_photo" id="" value="" class="form-control" required><br>
                            <img src="img/enseignants_photos/<?php echo $row['photo']?>" width="70" height="70" alt="" style="border-radius: 10px">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="modif_enseignant" value="Modifier l'enseignant" class="btn btn-primary form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <a href="enseignants.php" class="btn btn-danger form-control" onclick="return confirm('Etes-vous sûr de vouloir annuler cette operation?')">Annuler</a>
                        </div>
                    </div>
                </form>   
            </div>
        </div>
        <?php } } ?>
    </div>
</div>
<?php
    include("footer.php");
?> 


<?php } ?>

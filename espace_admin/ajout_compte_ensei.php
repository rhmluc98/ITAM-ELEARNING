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
                    <i class="fa fa-user"></i> Voulez-vous vraiment atribuer un compte à cet enseignant?
                </h3>
            </div>
            
            <?php 
            
              if(isset($_GET['creer_compte_btn']))
              {
                  $compte_id = $_GET['compte_id'];
                  
                  $get_compt_infos = "SELECT *FROM enseignant WHERE id_enseignant='$compte_id'";
                  $run_infos = mysqli_query($con,$get_compt_infos);
                  $password = mt_rand();

                  foreach($run_infos as $row)
                  {
            
            ?>
            <div class="panel-body">
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="ensei_id" value="<?php echo $row['id_enseignant'] ?>" id="" class="form-control" required>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="hidden" name="nom_utili" value="<?php echo $row['nom_enseignant'] ?> <?php echo $row['prenom_enseignant'] ?>" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Privilege</label>
                        <div class="col-md-6">
                            <select type="text" name="type" id="" class="form-control" required>
                              <option disabled selected>Sélectionnez type</option>
                              <option>Professeur</option>
                              <option>Titulaire</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="user_name" value="<?php echo $row['matricule'] ?>" id=""  class="form-control" required>
                    <input type="hidden" name="password" value="<?php echo $password ?>" id="" class="form-control" required>
                    <input type="hidden" name="acces" value="Permis" id="" class="form-control" required>
                    <input type="hidden" name="statut" value="deconneter" id="" class="form-control" required>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="insert_compte_ensei" value="Enregistrer compte" class="btn btn-primary form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <a href="enseignants.php" class="btn btn-danger form-control">Annuler</a>
                        </div>
                    </div>
                </form>   
            </div>
            <?php  } } ?>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?> 


<?php } ?>

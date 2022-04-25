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
    <div class="col-lg-12"><br>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-warning"></i> Voulez-vous vraiment atribuer un compte à cet eleve?
                </h3>
            </div>
            
            <?php 
            
              if(isset($_GET['creer_compte_btn']))
              {
              
                  $compte_id = $_GET['compte_id'];
                  
                  $get_compt_infos = "SELECT *FROM eleves WHERE id_eleves='$compte_id'";
                  $run_infos = mysqli_query($con,$get_compt_infos);
                  $password = mt_rand();
                  $row = mysqli_fetch_array($run_infos);
            
            ?>
            <div class="panel-body"><br>
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="eleves_id" value="<?php echo $row['id_eleves'] ?>" id="" class="form-control" required>
                    <input type="hidden" name="noms_eleve" value="<?php echo $row['nom_eleves'] ?> <?php echo $row['postnom_eleves'] ?>" id="" class="form-control" required>
                    <input type="hidden" name="type_eleve" value="eleve" id=""  class="form-control" required>
                    <input type="hidden" name="username" value="<?php echo $row['matricule'] ?>" id=""  class="form-control" required>
                    <input type="hidden" name="eleve_password" value="<?php echo $password ?>" id="" class="form-control" required>
                    <input type="hidden" name="eleve_acces" value="Permis" id="" class="form-control" required>
                    <input type="hidden" name="eleve_statut" value="deconneter" id="" class="form-control" required>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="insert_compte_eleve" value="Enregistrer compte" class="btn btn-primary form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <a href="eleves.php" class="btn btn-danger form-control">Annuler</a>
                        </div>
                    </div>
                </form>   
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?> 


<?php } ?>

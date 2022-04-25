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
                    <i class="fa fa-user"></i> Modifier les information de l'ecole
                </h3>
            </div>
             
             <?php 
             
               if(isset($_GET['modifier_info_btn']))
               {
                $info_id = $_GET['modif_info_id'];
                $get_info = "SELECT *FROM ecole_info WHERE id_info='$info_id'";
                $run_get = mysqli_query($con,$get_info);

                foreach($run_get as $row)
                {

             ?>
            <div class="panel-body">
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="info_ecole_id" id="" value="<?php echo $row['id_info'] ?>" class="form-control" required>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Nom ecole</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_ecole_nom" id="" value="<?php echo $row['nom_ecole'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Adresse ecole</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_adresse" id="" value="<?php echo $row['adresse_ecole'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Numero de telephone</label>
                        <div class="col-md-6">
                            <input type="number" name="modif_numero" id="" value="<?php echo $row['numero_telephone'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" name="modif_email" id="" value="<?php echo $row['adresse_email'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Devise</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_devise" id="" value="<?php echo $row['devise_ecole'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Description</label>
                        <div class="col-md-6">
                            <textarea type="text" name="modif_description" id="" value="" class="form-control" rows="5" required>
                                 <?php echo $row['details_ecole'] ?>
                            </textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="modif_info_photo" id="" value="" class="form-control" required><br>
                            <img src="img/admin_photos/<?php echo $row['photo_ecole']?>" width="70" height="70" alt="" style="border-radius: 10px">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="modifier_ecole_info_btn" value="Modifier informations" class="btn btn-primary form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <a href="affiche_apropos.php" class="btn btn-danger form-control" onclick="return confirm('Etes-vous sûr de vouloir annuler cette operation?')">Annuler</a>
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

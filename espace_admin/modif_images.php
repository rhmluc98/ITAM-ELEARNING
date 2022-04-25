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
                    <i class="fa fa-user"></i> Modifier image
                </h3>
            </div>
             
             <?php 
             
               if(isset($_POST['modif_img_btn']))
               {
                $image_id = $_POST['modif_image_id'];
                $get_image = "SELECT *FROM images WHERE id_img='$image_id'";
                $run_get = mysqli_query($con,$get_image);

                foreach($run_get as $row)
                {

             ?>
            <div class="panel-body">
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="image_id" id="" value="<?php echo $row['id_img'] ?>" class="form-control" required>
                    <div class="form-group">
                    <label for="" class="col-md-3 control-label">Nom d'image</label>
                        <div class="col-md-6">
                            <select type="text" name="modif_nom_image" id="" class="form-control" required>
                                <option value="" disabled><?php echo $row['img_nom'] ?></option>
                                <option value="Baniere_accueil">Baniere_accueil</option>
                                <option value="Baniere_apropos">Baniere_apropos</option>
                                <option value="Baniere_cours">Baniere_cours</option>
                                <option value="Baniere_contact">Baniere_contact</option>
                                <option value="Baniere_connexion">Baniere_connexion</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="modif_image" id="" value="" class="form-control" required><br>
                            <img src="img/admin_photos/<?php echo $row['img_fichier']?>" width="70" height="70" alt="" style="border-radius: 10px">
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
                  <input type="hidden" name="modif_annee_sco" value="<?php echo $school_year ?>" class="form-control">
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="modifier_image_btn" value="Modifier l'image" class="btn btn-primary form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <a href="images.php" class="btn btn-danger form-control" onclick="return confirm('Etes-vous sûr de vouloir annuler cette operation?')">Annuler</a>
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

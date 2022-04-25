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
                    <i class="fa fa-user"></i> Modifier votre mot de passe
                </h3>
            </div>
             
             <?php 
             
               if(isset($_POST['modif_admin_btn']))
               {
                $admin_id = $_POST['modif_admin_btn'];
                $get_admin = "SELECT *FROM admins WHERE id_admin='$admin_id'";
                $run_get = mysqli_query($con,$get_admin);

                foreach($run_get as $row)
                {

             ?>
            <div class="panel-body">
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="admin_id" id="" value="<?php echo $row['id_admin'] ?>" class="form-control">
                   
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Ancien mot de passe</label>
                        <div class="col-md-6">
                            <input type="password" name="ancien_pass" id="" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Nouveau mot de passe</label>
                        <div class="col-md-6">
                            <input type="password" name="new_pass" id="" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Repeter le nouveau mot de passe</label>
                        <div class="col-md-6">
                            <input type="password" name="repeat_password" id="" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="modif_admin_password" value="Modifier" class="btn btn-primary form-control" onclick="return confirm('Etes-vous sûr de vouloir modifier votre mot de passe?')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <a href="index.php" class="btn btn-danger form-control" onclick="return confirm('Etes-vous sûr de vouloir annuler cette operation?')">Annuler</a>
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

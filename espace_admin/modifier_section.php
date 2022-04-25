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
                    <i class="fa fa-user"></i> Modifier section
                </h3>
            </div>
             
             <?php 
             
               if(isset($_GET['modifier_btn']))
               {
                $section_id = $_GET['modif_id'];
                $get_section = "SELECT *FROM section WHERE id_section='$section_id'";
                $run_get = mysqli_query($con,$get_section);

                foreach($run_get as $row)
                {

             ?>
            <div class="panel-body">
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="section_id" id="" value="<?php echo $row['id_section'] ?>" class="form-control" required>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Nom section</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_nom" id="" value="<?php echo $row['description'] ?>" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="modif_section" value="Modifier section" class="btn btn-primary form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <a href="affiche_section.php" class="btn btn-danger form-control" onclick="return confirm('Etes-vous sûr de vouloir annuler cette operation?')">Annuler</a>
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

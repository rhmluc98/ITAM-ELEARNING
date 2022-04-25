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
                    <i class="fa fa-user"></i> Modifier Horaire journalier
                </h3>
            </div>
             
             <?php 
             
               if(isset($_GET['modifier_horaire_btn']))
               {
                $hor_id = $_GET['modif_hor_id'];
                $get_hor= "SELECT *FROM horaire_classe WHERE horaire_id='$hor_id'";
                $run_get = mysqli_query($con,$get_hor);

                foreach($run_get as $row)
                {

             ?>
        <div class="panel-body">
            <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="horaire_id" id="" value="<?php echo $row['horaire_id'] ?>" class="form-control" required>
            
            <div class="form-group">
                <label for="jour" class="col-md-3 control-label">Jour</label>
                <div class="col-md-6">
                    <select type="text" name="modif_jour" id="" class="form-control" required>
                        <option disabled selected><?php echo $row['jour'] ?></option>
                        <option value="Lundi">Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeudi">Jeudi</option>
                        <option value="Vendredi">Vendredi</option>
                        <option value="Samedi">Samedi</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">1ère heure</label>
                <div class="col-md-6">
                    <input type="text" name="modif_1ere_heure" id="" value='<?php echo $row['premiere_h'] ?>' class="form-control" placeholder="Cours" required>
                </div>
            </div>            
            <div class="form-group">
                <label class="col-md-3 control-label">2ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="modif_2ieme_heure" id="" value='<?php echo $row['deuxieme_h'] ?>' class="form-control" placeholder="Cours" required>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">3ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="modif_3ieme_heure" id="" value='<?php echo $row['troisieme_h'] ?>' class="form-control" placeholder="Cours" required>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">4ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="modif_4ieme_heure" id="" value='<?php echo $row['quatrieme_h'] ?>' class="form-control" placeholder="Cours" required>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">5ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="modif_5ieme_heure" id="" value='<?php echo $row['cinquieme_h'] ?>' class="form-control" placeholder="Cours">
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">6ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="modif_6ieme_heure" id="" value='<?php echo $row['sixieme_h'] ?>' class="form-control" placeholder="Cours" >
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">7ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="modif_7ieme_heure" id="" value='<?php echo $row['septieme_h'] ?>' class="form-control" placeholder="Cours">
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">8ième heure</label>
                    <div class="col-md-6">
                         <input type="text" name="modif_8ieme_heure" id="" value='<?php echo $row['huitieme_h'] ?>' class="form-control" placeholder="Cours">
                    </div>
            </div>        
            <div class="form-group">
                <label for="" class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <input type="submit" name="modifier_horaire" value="Modifier horaire" class="btn btn-primary form-control">
                    </div>
            </div>
            <div class="form-group">
                <label for="" class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <?php $id_class = $row['classe_id'] ?>
                        <a href="classes.php" class="btn btn-danger form-control" onclick="return confirm('Etes-vous sûr de vouloir annuler cette operation?')">Annuler</a>
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

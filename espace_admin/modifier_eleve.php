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
                    <i class="fa fa-user"></i> Modifier Elève
                </h3>
            </div>
             
             <?php 
             
               if(isset($_GET['modifier_btn']))
               {
                $elev_id = $_GET['modif_id'];
                $get_eleve = "SELECT *FROM eleves WHERE id_eleves='$elev_id'";
                $run_get = mysqli_query($con,$get_eleve);

                foreach($run_get as $row)
                {

             ?>
            <div class="panel-body">
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="eleve_id" id="" value="<?php echo $row['id_eleves'] ?>" class="form-control" required>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Nom</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_nom" id="" value="<?php echo $row['nom_eleves'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Postnom</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_postnom" id="" value="<?php echo $row['postnom_eleves'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Prenom</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_prenom" id="" value="<?php echo $row['prenom_eleves'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Classe</label>
                        <div class="col-md-6">
                            <select type="text" name="modif_classe" id="" class="form-control" required>
                            <?php 
                                $class_id = $row['classe_id'];
                                $query_class = "SELECT *FROM classes WHERE id_classe='$class_id'";
                                $run = mysqli_query($con,$query_class);
                                $class_row = mysqli_fetch_array($run);
                                $nom_class = $class_row['description'];
                                $nom_section = $class_row['section'];
                            ?>
                                <option disabled selected><?php echo $nom_class ?><sup>e</sup><?php echo $nom_section ?></option>
                                <?php
                                    $get_classes =  "SELECT *FROM classes";
                                    $run_classes = mysqli_query($con,$get_classes);

                                    while ($row_classes = mysqli_fetch_array($run_classes)) {

                                        $nom_id = $row_classes['id_classe'];
                                        $nom_classe = $row_classes['description'];
                                        $nom_section = $row_classes['section'];

                                        echo "<option value='$nom_id'>$nom_classe<sup>e</sup>$nom_section</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Matricule</label>
                        <div class="col-md-6">
                            <input type="number" name="modif_matricule" id="" value="<?php echo $row['matricule'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Sexe</label>
                        <div class="col-md-6" >
                            <select name="modif_sexe" class="form-control" required>
                                <option value=""><?php echo $row['Sexe'] ?></option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Feminin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Adresse</label>
                        <div class="col-md-6">
                            <input type="text" name="modif_adresse" id="" value="<?php echo $row['adresse'] ?>" class="form-control" required>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="modif_photo" id="" value="" class="form-control" required><br>
                            <img src="img/eleves_photos/<?php echo $row['eleve_img']?>" width="70" height="70" alt="" style="border-radius: 10px">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="modif_eleve" value="Modifier l'eleve" class="btn btn-primary form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <a href="eleves.php" class="btn btn-danger form-control" onclick="return confirm('Etes-vous sûr de vouloir annuler cette operation?')">Annuler</a>
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

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
                    <i class="fa fa-user"></i> Modifier classe
                </h3>
            </div>
             
             <?php 
             
               if(isset($_GET['modifier_btn']))
               {
                $classe_id = $_GET['modif_id'];
                $get_classe = "SELECT *FROM classes WHERE id_classe='$classe_id'";
                $run_get = mysqli_query($con,$get_classe);

                foreach($run_get as $row)
                {

             ?>
            <div class="panel-body">
                <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="classe_id" id="" value="<?php echo $row['id_classe'] ?>" class="form-control" required>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Nom classe</label>
                        <div class="col-md-6">
                            <input type="number" name="classe_nom" id="" value="<?php echo $row['description'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Section</label>
                        <div class="col-md-6">
                            <select type="text" name="nom_section" id="" class="form-control" required>
                                <option disabled selected><?php echo $row['section'] ?></option>
                                <?php
                                    $get_section =  "SELECT *FROM section";
                                    $run_section = mysqli_query($con,$get_section);

                                    while($row_section = mysqli_fetch_array($run_section)) {

                                        $description = $row_section['description'];

                                        echo "<option value='$description'>$description</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Titulaire</label>
                        <div class="col-md-6">
                        <?php 
                        
                          $id_t = $row['id_titulaire'];
                          $titu = "SELECT *FROM enseignant WHERE id_enseignant='$id_t'";
                          $run_t = mysqli_query($con,$titu);
                          $row_t = mysqli_fetch_array($run_t);
                          $t_nom = $row_t['nom_enseignant'];
                          $t_postnom = $row_t['postnom_enseignant'];
                          $t_prenom = $row_t['prenom_enseignant'];
                        ?>
                            <select type="text" name="titulaire" id="" class="form-control" required>
                                <option disabled selected><?php echo $t_nom; echo"&nbsp"; echo $t_postnom; echo"&nbsp"; echo $t_prenom ?></option>
                                <?php
                                    $get_titu =  "SELECT *FROM enseignant";
                                    $run_titu = mysqli_query($con,$get_titu);

                                    while($row_titu = mysqli_fetch_array($run_titu)) {

                                        $titu_id = $row_titu['id_enseignant'];
                                        $nom_titulaire = $row_titu['nom_enseignant'];
                                        $postnom_titulaire = $row_titu['postnom_enseignant'];
                                        $prenom_titulaire = $row_titu['prenom_enseignant'];

                                        echo "<option value='$titu_id'>$nom_titulaire $postnom_titulaire $prenom_titulaire</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="modif_classe" value="Modifier classe" class="btn btn-primary form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
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

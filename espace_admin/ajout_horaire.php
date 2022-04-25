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
                    <i class="fa fa-calendar"></i> INSERT L'HORAIRE
                </h3>
            </div>
    <div class="panel-body">
    <form action="code.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
            <label for="" class="col-md-3 control-label">Classe</label>
              <div class="col-md-6">
                <select type="text" name="classe_id" id="" class="form-control" required>
                    <option value="">Sélectionnez içi la classe</option>
                        <?php
                            $select_classe =  "SELECT *FROM classes";
                            $res_req_classe = mysqli_query($con,$select_classe);

                            while ($ligne_tableau = mysqli_fetch_array($res_req_classe)) {

                            $id_classe = $ligne_tableau['id_classe'];
                            $libelle_classe = $ligne_tableau['description'];
                            $nom_section = $ligne_tableau['section'];

                            echo "<option value='$id_classe'>$libelle_classe<sup>e</sup> $nom_section</option>";
                            }
                        ?>
                </select>
              </div>
            </div>
            <div class="form-group">
                <label for="jour" class="col-md-3 control-label">Jour</label>
                <div class="col-md-6">
                    <select type="text" name="jour" id="" class="form-control" required>
                        <option disabled selected>Sélectionnez le jour</option>
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
                    <input type="text" name="1ere_heure" id="" class="form-control" placeholder="Cours" required>
                </div>
            </div>            
            <div class="form-group">
                <label class="col-md-3 control-label">2ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="2ieme_heure" id="" class="form-control" placeholder="Cours" required>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">3ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="3ieme_heure" id="" class="form-control" placeholder="Cours" required>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">4ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="4ieme_heure" id="" class="form-control" placeholder="Cours" required>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">5ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="5ieme_heure" id="" class="form-control" placeholder="Cours">
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">6ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="6ieme_heure" id="" class="form-control" placeholder="Cours" >
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">7ième heure</label>
                    <div class="col-md-6">
                        <input type="text" name="7ieme_heure" id="" class="form-control" placeholder="Cours">
                    </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">8ième heure</label>
                    <div class="col-md-6">
                         <input type="text" name="8ieme_heure" id="" class="form-control" placeholder="Cours">
                    </div>
            </div>        
            <div class="form-group">
                <label for="" class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <input type="submit" name="insert_horaire" value="Enregistrer" class="btn btn-primary form-control">
                    </div>
            </div>
            <div class="form-group">
                <label for="" class="col-md-3 control-label"></label>
                    <div class="col-md-6">
                        <a href="index.php" class="btn btn-danger form-control">Annuler</a>
                    </div>
            </div>
        </form>   
        </div>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?> 


<?php } ?>
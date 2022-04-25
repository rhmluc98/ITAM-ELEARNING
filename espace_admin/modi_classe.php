<?php
    include("header.php");

    $code = $_GET['code'];
    $requete = "SELECT * FROM classes WHERE id_classe=$code";
    $resultat_modifi = mysqli_query($bdd,$requete);
    $parcour_table = mysqli_fetch_array($resultat_modifi);

?>

<?php
    include("sidebar.php");
?>
<div class="row" style="margin-top:5px;">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-edit"></i> Modifier classe
                </h3>
            </div>
            <div class="panel-body">
                <form action="editer_classes.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id_classe" class="col-md-3 control-label">Id</label>
                        <div class="col-md-6">
                            <input type="text" name="id_classe" value="<?php echo $parcour_table ['id_classe'] ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="libelle_classe" class="col-md-3 control-label">Libellé</label>
                        <div class="col-md-6">
                            <input type="text" name="libelle_classe" value="<?php echo $parcour_table ['libelle_classe'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_section" class="col-md-3 control-label">Section</label>
                        <div class="col-md-6">
                            <select type="text" name="id_section" class="form-control" required>
                                <option value="<?php echo $parcour_table ['id_section'] ?>" disable select><?php echo $parcour_table ['id_section'] ?></option>
                                <?php
                                    $get_section = "SELECT * FROM sections";
                                    $parcour_section = mysqli_query($bdd,$get_section);

                                    while ($ligne_tableau = mysqli_fetch_array($parcour_section)) {
                                        $id_section = $ligne_tableau['id_section'];
                                        $libelle_section = $ligne_tableau['libelle_section'];

                                        echo "<option value='$id_section'>$id_section $libelle_section</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Enregistrer la classe" class="btn btn-primary" onclick="return confirm('Etes-vous sûr de vouloir enregister ?')">
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
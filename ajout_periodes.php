<?php
    include("header.php");

    if (isset($_POST['submit'])) {
        
        $libelle_periode = $_POST['libelle_periode'];

        $recherhcher_nom_periode = "SELECT * FROM periodes WHERE libelle_periode='$libelle_periode'";
        $resultat_rechercher_nom_periode = mysqli_query($bdd,$recherhcher_nom_periode);
        $nombre_periode_rechercher = mysqli_num_rows($resultat_rechercher_nom_periode);
        
        if ($nombre_periode_rechercher==1) {
            echo"<script>alert('La période existe déjà')</script>";
            echo"<script>window.open('ajout_periodes.php','_self')</script>";
        }else {
            $inserser_periode = "INSERT INTO periodes VALUES ('','$libelle_periode')";
            $resultat_periode = mysqli_query($bdd,$inserser_periode);
    
            if ($resultat_periode==1) {
                echo"<script>alert('Enregistrement effectué')</script>";
                echo"<script>window.open('ajout_periodes.php','_self')</script>";
            }
        }
    }
?>

<?php
    include("sidebar.php");
?>
<div class="row" style="margin-top:5px;">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-bolt"></i> Insérer La Période
                </h3>
            </div>
            <div class="panel-body">
                <form action="ajout_periodes.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="libelle_periode" class="col-md-3 control-label">Libellé</label>
                        <div class="col-md-9">
                            <input type="text" name="libelle_periode" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <input type="submit" name="submit" value="Enregistrer la periode" class="btn btn-primary" onclick="return confirm('Etes-vous sûr de vouloir enregister ?')">
                            <a href="peiodes.php" class="btn btn-danger">Annuler</a>
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
<?php
    include("header.php");

    if (isset($_POST['submit'])) {

        $libelle = $_POST['libelle_annee'];

        $rechercher_nom_annee = "SELECT * FROM annee_scolaires WHERE libelle_annee='$libelle'";
        $rsultat_rechercher_nom_annee = mysqli_query($bdd,$rechercher_nom_annee);
        $nombre_ligne_annee = mysqli_num_rows($rsultat_rechercher_nom_annee);

        if ($nombre_ligne_annee==1) {
            echo "<script>alert('cette année existe déjà')</script>";
            echo "<script>window.open('ajout_annee.php','_self')</script>";
        }else {
            $inserer_annee = "INSERT INTO annee_scolaires VALUES ('','$libelle')";
            $parcour_table = mysqli_query($bdd,$inserer_annee);
    
            if ($parcour_table==1) {
                echo "<script>alert('Enregistrement effectué')</script>";
                echo "<script>window.open('annee.php','_self')</script>";
            }
        }   

    }
?>
<?php
    include("sidebar.php");
?>
<div class="row" style="margin-top:5px;">
    <div class="col-lg-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-cogs"></i> Insérer Année scolaire
                </h3>
            </div>
            <div class="panel-body">
                <form action="ajout_annee.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="libelle_annee" class="col-md-3 control-label">Libellé</label>
                        <div class="col-md-9">
                            <input type="text" name="libelle_annee" id="" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <input type="submit" name="submit" value="Enregistrer la section" class="btn btn-primary " onclick="return confirm('Etes-vous sûr de vouloir enregister ?')">
                            <a href="annee.php" class="btn btn-danger">Annuler</a>
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
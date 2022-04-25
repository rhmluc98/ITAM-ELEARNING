<?php
    include("header.php");

    $requete = "SELECT * FROM FICHIER";
    $resultat = mysqli_query($bdd,$requete);
    $nombre = mysqli_num_rows($resultat);

    $id=0;
?>
<?php
    include("sidebar.php");
?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-shopping-cart"></i> FICHIERS DE COURS (<?php echo $nombre ?>)
                </h3>
                <form action="fichier.php" method="post" class="form-inline">
                    <?php
                        $motcle = "NULL";
                        if (isset($_POST['motcle'])) {
                            $motcle = $_POST['motcle'];
                        }

                        $req = "SELECT * FROM periodes WHERE libelle_periode LIKE '%$motcle%'";
                        $res = mysqli_query($bdd,$req);
                    ?>

                    <input type="text" name="motcle" id="" class="form-control" placeholder="<--Tapez un mot clé-->" required>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-search"></i> Rechercher</button>
                    <div class="text-right" style="margin-top:-35px;">
                        <a href="ajout_periodes.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
                    </div>
                </form>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>DESCRIPTION DU FICHIER</th>
                                <th>TYPE DU FICHIER</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($ligne = mysqli_fetch_array($resultat))
                         {
                             $id++; 
                        ?>
                            <tr>
                                <td> <?php echo $id ?></td>
                                <td> <?php echo $ligne['DESCRIPTION_FICHIER']?></td>
                                <td> <?php echo $ligne['TYPE_FICHIER']; ?></td>
                                <td>
                                    <div class="button-group">
                                        <a onclick="return confirm('Etes-vous sûr de vouloir modifier ?')" href="modifier_periode.php ? code=<?php echo $ligne['ID_FICHIER']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Modifier</a>
                                        <a onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')" href="supprimer_periode.php ? code=<?php echo $ligne['ID_FICHIER']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("footer.php");
?>
<?php
    include("header.php");

    $selection_lecon = "SELECT ID_LECON, DESCRIPTION_COURS, CHAPITRE, FICHIER_TEXTE, FICHIER_AUDIO, FICHIER_VIDEO
     FROM lecon, cours WHERE cours.ID_COURS=lecon.ID_COURS";
    $execute_selection = mysqli_query($bdd,$selection_lecon);
    $nombre_execution = mysqli_num_rows($execute_selection);
    
?>

<?php
    include("sidebar.php");
?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-shopping-cart"></i> LECONS (<?php echo $nombre_execution ?>)
                </h3>
                <form action="lecon.php" method="post" class="form-inline">
                    <input type="text" name="motcle" id="" class="form-control" placeholder="Tapez un mot clé" required>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-search"></i> Rechercher</button>
                    <div class="text-right" style="margin-top:-35px;">
                        <a href="ajouter_lecon.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
                    </div>
                </form>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>COURS</th>
                                <th>SUJET DU JOUR</th>
                                <th>FICHIER TEXTE</th>
                                <th>FICHIER VIDEO</th>
                                <th>FICHIER AUDIO</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($ligne = mysqli_fetch_array($execute_selection)) { ?>
                            <tr>
                                <td> <?php echo $ligne['ID_LECON']; ?></td>
                                <td> <?php echo $ligne['DESCRIPTION_COURS']; ?></td>
                                <td> <?php echo $ligne['CHAPITRE']; ?></td>
                                <td> <?php echo $ligne['FICHIER_TEXTE']; ?></td>
                                <td> <?php echo $ligne['FICHIER_AUDIO']; ?></td>
                                <td> <?php echo $ligne['FICHIER_VIDEO']; ?></td>
                                <td>
                                    <div class="button-group">
                                        <a onclick="return confirm('Etes-vous sûr de vouloir modifier ?')" href="modifier_annee.php ? code=<?php echo $ligne['ID_LECON']; ?>" class="btn btn-success"><i class="fa fa-edit"></i> Modifier</a>
                                        <a onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')" href="supprimer_annee.php ? code=<?php echo $ligne['ID_LECON']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>
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
<?php
    include("header.php");

    $affiche_horaire = "SELECT ID_HORAIRE, DATE_C, HEUR_C, DESCRIPTION_COURS
    FROM horaire, cours
    WHERE cours.ID_COURS=horaire.ID_COURS ";
    $res_req_horaire = mysqli_query($bdd,$affiche_horaire);
    $nombre_horaire = mysqli_num_rows($res_req_horaire);
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
                    <i class="fa fa-shopping-cart"></i> AFFICHAGE HORAIRE (<?php echo $nombre_horaire ?>)
                </h3>
                <form action="horaire.php" method="post" class="form-inline">
                    <input type="text" name="motcle" id="" class="form-control" placeholder="Tapez un mot clé" required>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-search"></i> Rechercher</button>
                    <div class="text-right" style="margin-top:-35px;">
                        <a href="ajout_horaire.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
                    </div>
                </form>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CLASSE</th>
                                <th>SECTION</th>
                                <th>NOMBRE DE COURS</th>
                                <th>VISUALISER L'HORAIRE</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($ligne_horaire = mysqli_fetch_array($res_req_horaire)) { 
                            $id++;
                        ?>
                            <tr>
                                <td><?php echo $id?></td>
                                <td><?php echo $ligne_horaire['DATE_C']?></td>
                                <td><?php echo $ligne_horaire['HEUR_C']?></td>
                                <td><?php echo $ligne_horaire['DESCRIPTION_COURS']?></td>
                                <td>
                                    <div class="icon-group">
                                        <a href="modi_horaire.php ? code=<?php echo $ligne_horaire['ID_HORAIRE']?>" class="btn btn-success" onclick="return confirm('Etes-vous sûr de vouloir suivre le cours ?')"><i class="fa fa-calendar-o"></i> Horaire</a>
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
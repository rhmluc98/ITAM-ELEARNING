<?php
    include("header.php");

    $section_cours = "SELECT ID_COURS, DESCRIPTION_COURS, DESCRIPTION_CLASSE, DESCRIPTION_SECTION, NOMENSEIGNANT, POSTNOMENSEIGNANT
    FROM cours, classe, section, enseignant
    WHERE classe.ID_CLASSE=cours.ID_CLASSE AND section.ID_SECTION=classe.ID_SECTION AND enseignant.ID_ENSEIGNANT=cours.ID_ENSEIGNANT";
    $res_req_cours = mysqli_query($bdd,$section_cours);
    $nombre_cours = mysqli_num_rows($res_req_cours);
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
                    <i class="fa fa-shopping-cart"></i> Liste des cours (<?php echo $nombre_cours ?>)
                </h3>
                <form action="cours.php" method="post" class="form-inline">
                    <input type="text" name="motcle" id="" class="form-control" placeholder="Tapez un mot clé" required>
                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-search"></i> Rechercher</button>
                    <div class="text-right" style="margin-top:-35px;">
                        <a href="ajout_cours.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
                    </div>
                </form>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>COURS</th>
                                <th>CLASSE</th>
                                <th>SECTION</th>
                                <th>NOM ENSEIGNANT</th>
                                <th>POSTNOM ENSEIGNANT</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($ligne_cours = mysqli_fetch_array($res_req_cours)) { 
                            $id++;
                        ?>
                            <tr>
                                <td><?php echo $id?></td>
                                <td><?php echo $ligne_cours['DESCRIPTION_COURS']?></td>
                                <td><?php echo $ligne_cours['DESCRIPTION_CLASSE']?></td>
                                <td><?php echo $ligne_cours['DESCRIPTION_SECTION']?></td>
                                <td><?php echo $ligne_cours['NOMENSEIGNANT']?></td>
                                <td><?php echo $ligne_cours['POSTNOMENSEIGNANT']?></td>
                                <td>
                                    <div class="button-group">
                                        <a href="modi_cours.php ? code=<?php echo $ligne_cours['ID_COURS']?>" class="btn btn-success" onclick="return confirm('Etes-vous sûr de vouloir modifier ?')"><i class="fa fa-edit"></i> Modifier</a>
                                        <a href="suppri_cours.php ? code=<?php echo $ligne_cours['ID_COURS']?>" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')"><i class="glyphicon glyphicon-trash"></i> Supprimer</a>
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
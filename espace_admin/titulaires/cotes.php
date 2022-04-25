<?php
    include("headertitulaire.php");
    
    $password_titulaire = $_SESSION['password_titulaire'];

    $requete_titulair = "SELECT * FROM titulaires WHERE password_titulaire='$password_titulaire'";
    $execute_requet = mysqli_query($bdd,$requete_titulair);
    $nombre_lign = mysqli_fetch_array($execute_requet);

    $id_class = $nombre_lign['id_classe'];
?>
<?php
    include("sidebartitulaire.php");
?>
<div class="panel panel-primary" style="margin-top:20px;">
    <div class="panel-heading">
        <center>
            <h2>Espace d'encodage</h2>
        </center>
    </div>
    <div class="panel-body">
    <?php
        $selection_eleve = "SELECT * FROM eleves WHERE id_classe=$id_class order by nom_eleve ASC";
        $execute_eleve = mysqli_query($bdd,$selection_eleve);
        $i=0;
    ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOM</th>
                    <th>POSTNOM</th>
                    <th>SEXE [GENRE]</th>
                    <th>PHOTO</th>
                    <th>AJOUTER RESULTAT</th>
                    <th>VOIR RESULTAT</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($a = mysqli_fetch_array($execute_eleve)) 
            {
                $i++;  
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $a['nom_eleve']?></td>
                    <td><?php echo $a['postnom_eleve']?></td>
                    <td><?php echo $a['sexe_eleve']?></td>
                    <td><img src="img/<?php echo $a['photo_eleve']?>" width="50"></td>
                    <td>
                        <form action="publier_cote.php" method="post">
                            <input type="hidden" name="id_eleve" value="<?php echo $a['id_eleve']?>">
                            <input type="hidden" name="nom_eleve" value="<?php echo $a['nom_eleve']?>">
                            <input type="hidden" name="postnom_eleve" value="<?php echo $a['postnom_eleve']?>">
                            <input type="hidden" name="photo_eleve" value="<?php echo $a['photo_eleve']?>">
                            <button type="submit" name="submit" class="btn btn-warning">Ajouter Publication</button>
                        </form>
                    </td>
                    <td>
                        <form action="visualiser_cote.php" method="post">
                            <input type="hidden" name="id_eleve" value="<?php echo $a['id_eleve']?>">
                            <input type="hidden" name="nom_eleve" value="<?php echo $a['nom_eleve']?>">
                            <input type="hidden" name="postnom_eleve" value="<?php echo $a['postnom_eleve']?>">
                            <input type="hidden" name="photo_eleve" value="<?php echo $a['photo_eleve']?>">
                            <button type="submit" name="submit" class="btn btn-primary">Visualiser Publication</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    include("footer.php");
?>

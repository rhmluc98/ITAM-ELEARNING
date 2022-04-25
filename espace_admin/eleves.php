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

<?php 
   
   $i = 0;
   $get_eleves = "SELECT *FROM eleves ORDER BY nom_eleves";
   $run_eleves = mysqli_query($con,$get_eleves);

   $nombre_eleve = mysqli_num_rows($run_eleves);

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-users"></i> Liste des élèves (<?php echo $nombre_eleve ?>)
                </h3>
                <form action="recherche_eleve.php" method="get" class="form-inline">
                    <input type="number" name="motcle" id="" class="form-control" placeholder="Entrez matrcule...">
                    <input type="submit" name="recherche_btn" value="Recherchez" class="btn btn-warning">
        
                </form>
                <div class="text-right" style="margin-top:-35px;">
                    <a href="ajout_eleves.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Postnom</th>
                                <th>Prenom</th>
                                <th>Matricule</th>
                                <th>Sexe</th>
                                <th>Classe</th>
                                <th>Inscrit en:</th>
                                <th>Adresse</th>
                                <th>Compte</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Postnom</th>
                                <th>Prenom</th>
                                <th>Matricule</th>
                                <th>Sexe</th>
                                <th>Classe</th>
                                <th>Inscrit en:</th>
                                <th>Adresse</th>
                                <th>Compte</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_eleves) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_eleves))
                               {
                                  $i++;
                        ?>    
                        <tbody>
                            
                            <tr>
                                <td><?php echo $i ?></td>                                
                                <td><img src="img/eleves_photos/<?php echo $row['eleve_img']?>" width="70" height="70" alt="" style="border-radius: 100%"></td>
                                <td><?php echo $row['nom_eleves'] ?></td>
                                <td><?php echo $row['postnom_eleves'] ?></td>
                                <td><?php echo $row['prenom_eleves'] ?></td>
                                <td><?php echo $row['matricule'] ?></td>
                                <td><?php echo $row['Sexe'] ?></td>
                                <td>
                                <?php
                                    $id_class = $row['classe_id'];
                                    $get_classe = "SELECT *FROM classes WHERE id_classe='$id_class'";
                                    $run_classe = mysqli_query($con,$get_classe);
                                    $row_classe = mysqli_fetch_array($run_classe);

                                    $classe = $row_classe['description']; 
                                    $section = $row_classe['section'];                          
                                ?>
                                    <?php echo $classe ?><sup>e</sup><?php echo $section ?>
                                </td>
                                <td><?php echo $row['annee_insc'] ?></td>
                                <td><?php echo $row['adresse'] ?></td>
                                <td>
                                    <div class="button-group">
                                        <form action="ajout_compte_eleve.php" method="get">
                                           <input type="hidden" name="compte_id" value="<?php echo $row['id_eleves'] ?>">
                                           <button type="submit" name="creer_compte_btn" class="btn btn-warning">Créer compte</button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="button-group">
                                        <form action="modifier_eleve.php" method="get">
                                           <input type="hidden" name="modif_id" value="<?php echo $row['id_eleves'] ?>">
                                           <button type="submit" name="modifier_btn" class="btn btn-primary">Modifier</button>
                                        </form>
                                    </div>
                                </td>
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_id" value="<?php echo $row['id_eleves'] ?>">
                                           <button type="submit" name="supprimer_btn" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           }else
                           {
                             echo "<script>alert('Pas d\'eleve enregistrer pour le moment')</script>";
                             echo "<script>window.open('ajout_eleves.php','_self')</script>";
                           }
                        ?>
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

<?php } ?>
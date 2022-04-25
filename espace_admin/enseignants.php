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
   $get_ensei = "SELECT *FROM enseignant ORDER BY nom_enseignant";
   $run_ensei = mysqli_query($con,$get_ensei);

   $nombre_ensei = mysqli_num_rows($run_ensei);

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-users"></i> Liste des enseignants (<?php echo $nombre_ensei ?>)
                </h3>
                <form action="recherche_ensei.php" method="get" class="form-inline">
                    <input type="number" name="motcle" id="" class="form-control" placeholder="Entrez matrcule...">
                    <input type="submit" name="recherche_btn" value="Recherchez" class="btn btn-warning">
        
                </form>
                <div class="text-right" style="margin-top:-35px;">
                    <a href="ajout_enseignants.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
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
                                <th>Etat civile</th>
                                <th>Sexe</th>
                                <th>Telephone</th>
                                <th>Adresse</th>
                                <th>Inscrit en:</th>
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
                                <th>Etat civile</th>
                                <th>Sexe</th>
                                <th>Telephone</th>
                                <th>Adresse</th>
                                <th>Inscrit en:</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_ensei) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_ensei))
                               {
                                  $i++;
                        ?>    
                        <tbody>
                            
                            <tr>
                                <td><?php echo $i ?></td>                                
                                <td><img src="img/enseignants_photos/<?php echo $row['photo']?>" width="70" height="70" alt="" style="border-radius: 100%"></td>
                                <td><?php echo $row['nom_enseignant'] ?></td>
                                <td><?php echo $row['postnom_enseignant'] ?></td>
                                <td><?php echo $row['prenom_enseignant'] ?></td>
                                <td><?php echo $row['matricule'] ?></td>
                                <td><?php echo $row['etat_civile'] ?></td>
                                <td><?php echo $row['sexe'] ?></td>
                                <td><?php echo $row['numero_telephone'] ?></td>
                                <td><?php echo $row['addresse'] ?></td>
                                <td><?php echo $row['date_insc'] ?></td>
                                
                                <td>
                                    <div class="button-group">
                                        <form action="ajout_compte_ensei.php" method="get">
                                           <input type="hidden" name="compte_id" value="<?php echo $row['id_enseignant'] ?>">
                                           <button type="submit" name="creer_compte_btn" class="btn btn-warning">Créer compte</button>
                                        </form>
                                    </div>
                                </td>

                                <td>
                                    <div class="button-group">
                                        <form action="modifier_enseignant.php" method="get">
                                           <input type="hidden" name="modif_id" value="<?php echo $row['id_enseignant'] ?>">
                                           <button type="submit" name="modifier_btn" class="btn btn-primary">Modifier</button>
                                        </form>
                                    </div>
                                </td>
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_ensei_id" value="<?php echo $row['id_enseignant'] ?>">
                                           <button type="submit" name="supprimer_ensei" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           }else
                           {
                             echo "<script>alert('Pas d\'enseignant enregistrer pour le moment')</script>";
                             echo "<script>window.open('ajout_enseignants.php','_self')</script>";
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
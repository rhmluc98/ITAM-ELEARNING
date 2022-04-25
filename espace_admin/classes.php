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
   $get_classe = "SELECT *FROM classes ORDER BY id_classe";
   $run_classe = mysqli_query($con,$get_classe);

   $nombre_classe = mysqli_num_rows($run_classe);

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-home"></i> Toutes les classes (<?php echo $nombre_classe ?>)
                </h3>
                <div class="text-right" style="margin-top:-35px;">
                    <a href="ajout_classes.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Nom classe</th>
                                <th>Titulaire</th>
                                <th>Horaire</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Nom classe</th>
                                <th>Titulaire</th>
                                <th>Horaire</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_classe) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_classe))
                               {
                                  $i++;
                        ?>    
                        <tbody>
                            
                            <tr>
                                <td><?php echo $i ?></td>                               
                                <td>
                                <?php
                                    $id_titu = $row['id_titulaire'];
                                    $get_titu = "SELECT *FROM enseignant WHERE id_enseignant='$id_titu'";
                                    $run_titu = mysqli_query($con,$get_titu);
                                    $row_titu = mysqli_fetch_array($run_titu);                          
                                ?>
                                    <?php echo $row['description'] ?><sup>e</sup><?php echo $row['section'] ?>
                                </td>
                                <td><?php echo $row_titu['nom_enseignant'] ?> <?php echo $row_titu['postnom_enseignant'] ?> <?php echo $row_titu['prenom_enseignant'] ?></td>
                                <td>
                                    <div class="button-group">
                                        <form action="affiche_horaire.php" method="get">
                                           <input type="hidden" name="classe_id" value="<?php echo $row['id_classe'] ?>">
                                           <button type="submit" name="voir_horaire_btn" class="btn btn-warning"><i class="fa fa-calendar"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="button-group">
                                        <form action="modifier_classe.php" method="get">
                                           <input type="hidden" name="modif_id" value="<?php echo $row['id_classe'] ?>">
                                           <button type="submit" name="modifier_btn" class="btn btn-primary">Modifier</button>
                                        </form>
                                    </div>
                                </td>
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_classe_id" value="<?php echo $row['id_classe'] ?>">
                                           <button type="submit" name="supprimer_classe" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           }else
                           {
                             echo "<script>alert('Pas de classe enregistrer pour le moment')</script>";
                             echo "<script>window.open('ajout_classes.php','_self')</script>";
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
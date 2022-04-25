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
   if(isset($_GET['recherche_btn']))
   {
    $matricule = $_GET['motcle'];
    $get_eleve = "SELECT *FROM eleves WHERE matricule='$matricule'";
    $run_eleve = mysqli_query($con,$get_eleve);

    if(mysqli_num_rows($run_eleve) > 0)
    {
        while($row = mysqli_fetch_array($run_eleve))
        {

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-users"></i> Resultat
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Postnom</th>
                                <th>Prenom</th>
                                <th>Matricule</th>
                                <th>Sexe</th>
                                <th>Classe</th>
                                <th>Adresse</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Postnom</th>
                                <th>Prenom</th>
                                <th>Matricule</th>
                                <th>Sexe</th>
                                <th>Classe</th>
                                <th>Adresse</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                            
                        <tbody>
                            
                            <tr>                            
                                <td><img src="img/eleves_photos/<?php echo $row['eleve_img']?>" width="70" height="70" alt="" style="border-radius: 100%"></td>
                                <th><?php echo $row['nom_eleves'] ?></th>
                                <th><?php echo $row['postnom_eleves'] ?></th>
                                <th><?php echo $row['prenom_eleves'] ?></th>
                                <th><?php echo $row['matricule'] ?></th>
                                <th><?php echo $row['Sexe'] ?></th>
                                <th>
                                <?php
                                    $id_class = $row['classe_id'];
                                    $get_classe = "SELECT *FROM classes WHERE id_classe='$id_class'";
                                    $run_classe = mysqli_query($con,$get_classe);
                                    $row_classe = mysqli_fetch_array($run_classe);

                                    $classe = $row_classe['description']; 
                                    $section = $row_classe['section'];                          
                                ?>
                                    <?php echo $classe ?><sup>e</sup><?php echo $section ?>
                                </th>
                                <th><?php echo $row['adresse'] ?></th>
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
                        
                           }
                           else
                           {
                             echo "<script>alert('Numero matricule non reconnu')</script>";
                             echo "<script>window.open('eleves.php','_self')</script>";
                           }
                        ?>
                        </tbody>
                    </table>
                        
                    <p class="text-right"><a href="eleves.php" class="btn btn-warning">Fermer</a></a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php
    include("footer.php");
?>

<?php } ?>
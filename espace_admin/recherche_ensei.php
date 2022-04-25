
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
    $get_ensei = "SELECT *FROM enseignant WHERE matricule='$matricule'";
    $run_ensei = mysqli_query($con,$get_ensei);

    if(mysqli_num_rows($run_ensei) > 0)
    {
        while($row = mysqli_fetch_array($run_ensei))
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
                        <tbody>
                            
                    <tr>                               
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
                    echo "<script>alert('Numero matricule non reconnu')</script>";
                    echo "<script>window.open('enseignants.php','_self')</script>";
                }
            ?>
            </tbody>
        </table>
            
        <p class="text-right"><a href="enseignants.php" class="btn btn-warning">Fermer</a></a>
            
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
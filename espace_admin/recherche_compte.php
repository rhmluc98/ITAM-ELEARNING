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
    $get_compte = "SELECT *FROM comptes WHERE login='$matricule'";
    $run_compte = mysqli_query($con,$get_compte);

    if(mysqli_num_rows($run_compte) > 0)
    {
        while($row = mysqli_fetch_array($run_compte))
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
                                <th>Noms utilisateur</th>
                                <th>Type</th>
                                <th>Login</th>
                                <th>Mot de passe</th>
                                <th>Statut</th>
                                <th>Acces</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Noms utilisateur</th>
                                <th>Type</th>
                                <th>Login</th>
                                <th>Mot de passe</th>
                                <th>Statut</th>
                                <th>Acces</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>   
                        <tbody>
                            
                            <tr>
                                <td><?php echo $row['nom_utilisateur'] ?></td>
                                <td><?php echo $row['utilisateur_type'] ?></td>
                                <td><?php echo $row['login'] ?></td>
                                <td><?php echo $row['utilisateur_password'] ?></td>
                                <td>
                                    <?php 

                                        if($row['statut'] == 'conneter')
                                        {
                                            echo "<div class='online_status'><i class='fa fa-circle'></i> En ligne</div>";
                                        }
                                        else
                                        {
                                            echo "<div class='offline_status'><i class='fa fa-circle'></i> Deconneter</div>";
                                        }
                                    ?>
                                </td>
                                <td> 
                                    <?php if($row['acces'] != 'Permis')
                                    {
                                     ?>
                                    <a href="utilisateur_permission.php?id=<?php echo $row['id_compte'] ?>" class="btn btn-success" onclick="return confirm('Voulez-vous vraiment permettre l\'acces a <?php echo $row['nom_utilisateur'] ?> ?')">
                                         Permettre l'acces
                                     </a>
                                    <?php 
                                    
                                      }
                                      else
                                      {
                                        
                                    ?> 
                                     <a href="utilisateur_permission.php=<?php echo $row['id_compte'] ?>" class="btn btn-warning" onclick="return confirm('Voulez-vous vraiment interdir l\'acces a <?php echo $row['nom_utilisateur'] ?> ?')">
                                         Interdir l'acces
                                     </a>
                                     <?php } ?>
                                </td>
                                <td>
                                    <div class="button-group">
                                        <form action="modifier_compte.php" method="get">
                                           <input type="hidden" name="modif_id" value="<?php echo $row['id_compte'] ?>">
                                           <button type="submit" name="modifier_btn" class="btn btn-primary">Modifier</button>
                                        </form>
                                    </div>
                                </td>
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_id" value="<?php echo $row['id_compte'] ?>">
                                           <button type="submit" name="supprimer_btn" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           }else
                           {
                            echo "<script>alert('Ce compte n\'existe pas')</script>";
                            echo "<script>window.open('utilisateurs.php','_self')</script>";
                           }
                        ?>
                        </tbody>
                    </table>
                        
                    <p class="text-right"><a href="utilisateurs.php" class="btn btn-warning">Fermer</a></a>
                        
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
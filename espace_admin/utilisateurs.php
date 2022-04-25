
<style>

    .online_status
    {
    color: #137d25;
    font-weight: bolder;
    }

    .offline_status
    {
    color: gray;
    font-weight: bolder;
    }

</style>

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
   $get_compte = "SELECT *FROM comptes ORDER BY utilisateur_type DESC";
   $run_compte = mysqli_query($con,$get_compte);

   $nombre_comptes = mysqli_num_rows($run_compte);

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-users"></i> Liste des comptes (<?php echo $nombre_comptes ?>)
                </h3>
                <form action="recherche_compte.php" method="get" class="form-inline">
                    <input type="number" name="motcle" id="" class="form-control" placeholder="Entrez matrcule...">
                    <input type="submit" name="recherche_btn" value="Recherchez" class="btn btn-warning">
                </form>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Noms utilisateur</th>
                                <th>Type</th>
                                <th>Login</th>
                                <th>Statut</th>
                                <th>Acces</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Noms utilisateur</th>
                                <th>Type</th>
                                <th>Login</th>
                                <th>Statut</th>
                                <th>Acces</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_compte) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_compte))
                               {
                                  $i++;
                        ?>    
                        <tbody>
                            
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['nom_utilisateur'] ?></td>
                                <td><?php echo $row['utilisateur_type'] ?></td>
                                <td><?php echo $row['login'] ?></td>
                                <td>
                                    <?php 

                                        if($row['statut'] == 'connecter')
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
                                     <form action="utilisateur_permission.php" method="get">
                                        <input type="hidden" name="permission_id" value="<?php echo $row['id_compte'] ?>">
                                        <button type="submit" name="permission_btn" class="btn btn-success" onclick="return confirm('Voulez-vous vraiment permettre l\'acces a <?php echo $row['nom_utilisateur'] ?> ?')">
                                            Permettre l'acces
                                        </button>
                                    </form>    
                                    <?php 
                                    
                                      }
                                      else
                                      {
                                        
                                    ?> 
                                    <form action="utilisateur_permission.php" method="get">
                                     <input type="hidden" name="permission_id" value="<?php echo $row['id_compte'] ?>">
                                     <button type="submit" name="permission_btn" class="btn btn-warning" onclick="return confirm('Voulez-vous vraiment interdir l\'acces a <?php echo $row['nom_utilisateur'] ?> ?')">
                                         Interdir l'acces
                                     </button>
                                    </form>
                                     <?php } ?>
                                </td>
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_compte_id" value="<?php echo $row['id_compte'] ?>">
                                           <button type="submit" name="supprimer_compte_btn" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           } 
                           else
                           {
                             echo "<script>alert('Pas de compte enregistrer pour le moment')</script>";
                             echo "<script>window.open('index.php','_self')</script>";
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
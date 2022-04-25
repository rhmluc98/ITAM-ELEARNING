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
   
   $get_info = "SELECT *FROM ecole_info";
   $run_info = mysqli_query($con,$get_info);

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-users"></i> Ces informartions sont affichées dans les differentes pages du site
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nom ecole</th>
                                <th>Adresse ecole</th>
                                <th>Numero de telephone</th>
                                <th>Email</th>
                                <th>Devise</th>
                                <th>Description</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Photo</th>
                                <th>Nom ecole</th>
                                <th>Adresse ecole</th>
                                <th>Numero de telephone</th>
                                <th>Email</th>
                                <th>Devise</th>
                                <th>Description</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_info) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_info))
                               {
                        ?>    
                        <tbody>
                            
                            <tr>                              
                                <td><img src="img/admin_photos/<?php echo $row['photo_ecole']?>" width="70" height="70" alt="" style="border-radius: 100%"></td>
                                <td><?php echo $row['nom_ecole'] ?></td>
                                <td><?php echo $row['adresse_ecole'] ?></td>
                                <td><?php echo $row['numero_telephone'] ?></td>
                                <td><?php echo $row['adresse_email'] ?></td>
                                <td><?php echo $row['devise_ecole'] ?></td>
                                <td><?php echo $row['details_ecole'] ?></td>
                                <td>
                                    <div class="button-group">
                                        <form action="modifier_info.php" method="get">
                                           <input type="hidden" name="modif_info_id" value="<?php echo $row['id_info'] ?>">
                                           <button type="submit" name="modifier_info_btn" class="btn btn-primary">Modifier</button>
                                        </form>
                                    </div>
                                </td>
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_info_id" value="<?php echo $row['id_info'] ?>">
                                           <button type="submit" name="supprimer_info_btn" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           }else
                           {
                             echo "<script>alert('Pas d\'info pour le moment')</script>";
                             echo "<script>window.open('apropos_ecole.php','_self')</script>";
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

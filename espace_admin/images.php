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
   $get_images = "SELECT *FROM images ORDER BY img_nom";
   $run_images = mysqli_query($con,$get_images);

   $nombre_images = mysqli_num_rows($run_images);

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-users"></i> Toutes les images (<?php echo $nombre_images ?>)
                </h3>
                <div class="text-right" style="margin-top:-35px;">
                    <a href="ajout_image.php" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Photo</th>
                                <th>Nom image</th>
                                <th>Année</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Photo</th>
                                <th>Nom image</th>
                                <th>Année</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_images) > 0)
                            {
                      while ($row = mysqli_fetch_array($run_images))
                               {
                                  $i++;
                        ?>    
                        <tbody>
                            
                            <tr>
                                <td><?php echo $i ?></td>                                
                                <td><img src="img/admin_photos/<?php echo $row['img_fichier']?>" width="70" height="70" alt="" style="border-radius: 100%"></td>
                                <td><?php echo $row['img_nom'] ?></td>
                                <td><?php echo $row['annee_sco'] ?></td>
                                
                                <td>
                                    <div class="button-group">
                                        <form action="modif_images.php" method="post">
                                           <input type="hidden" name="modif_image_id" value="<?php echo $row['id_img'] ?>">
                                           <button type="submit" name="modif_img_btn" class="btn btn-primary">Modifier</button>
                                        </form>  
                                    </div>
                                </td>
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_image_id" value="<?php echo $row['id_img'] ?>">
                                           <button type="submit" name="supp_image_btn" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           }else
                           {
                             echo "<script>alert('Pas d\'image pour le moment')</script>";
                             echo "<script>window.open('ajout_image.php','_self')</script>";
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
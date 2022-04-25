
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
   $get_mssg = "SELECT *FROM messages_recu ORDER BY 1 DESC";
   $run_mssg = mysqli_query($con,$get_mssg);

   $nombre_mssg = mysqli_num_rows($run_mssg);

?>
<div class="row" style="margin-top:5px;">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-tittle">
                    <i class="fa fa-users"></i> Touts les messages recus à l'école (<?php echo $nombre_mssg ?>)
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Nom de l'expediteur</th>
                                <th>Email</th>
                                <th>Sujet</th>
                                <th>Message</th>
                                <th>Date d'envoi</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N<sup>o</sup></th>
                                <th>Nom de l'expediteur</th>
                                <th>Email</th>
                                <th>Sujet</th>
                                <th>Message</th>
                                <th>Date d'envoi</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <?php 
                          if(mysqli_num_rows($run_mssg) > 0)
                            {
                              while ($row = mysqli_fetch_array($run_mssg))
                               {
                                  $i++;
                        ?>    
                        <tbody>
                            
                            <tr>
                                <td><?php echo $i ?></td>                                
                                <td><?php echo $row['nom_exp'] ?></td>
                                <td><?php echo $row['email_exp'] ?></td>
                                <td><?php echo $row['sujet'] ?></td>
                                <td><?php echo $row['contenu_msg'] ?></td>
                                <td>
                                    <?php 
                                      
                                      $date = $row['date'];
                                      $create_date = date_create($date);
                                      $new_date = date_format($create_date,'d-m-Y H:i:s');

                                      echo $new_date;
                                    ?>
                                </td>
                                
                                <td>    
                                    <div class="button-group">
                                        <form action="code.php" method="post">
                                           <input type="hidden" name="supp_mssg_id" value="<?php echo $row['massage_id'] ?>">
                                           <button type="submit" name="supprimer_mssg" class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php } 
                        
                           }else
                           {
                             echo "<script>alert('Pas de message recu pour l\'instant')</script>";
                             echo "<script>window.open('index.php')</script>";
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
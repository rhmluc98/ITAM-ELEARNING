<?php
    include("header.php");
    include("connexion.php");
?>
<?php
    $requete_nombre_eleve ="SELECT * FROM eleve";
    $resultat_nombre_eleve = mysqli_query($bdd,$requete_nombre_eleve);
    $nombre_total_eleve = mysqli_num_rows($resultat_nombre_eleve);

    $requete_nombre_enseignant ="SELECT * FROM enseignant";
    $resultat_nombre_enseignant = mysqli_query($bdd,$requete_nombre_enseignant);
    $nombre_total_enseignant = mysqli_num_rows($resultat_nombre_enseignant);

    $requete_nombre_classe ="SELECT * FROM classe";
    $resultat_nombre_classe = mysqli_query($bdd,$requete_nombre_classe);
    $nombre_total_classe = mysqli_num_rows($resultat_nombre_classe);

    $requete_nombre_horaire ="SELECT * FROM HORAIRE";
    $resultat_nombre_horaire = mysqli_query($bdd,$requete_nombre_horaire);
    $nombre_total_horaire = mysqli_num_rows($resultat_nombre_horaire);

    $requete_nombre_periodes ="SELECT * FROM COURS ";
    $resultat_nombre_periodes = mysqli_query($bdd,$requete_nombre_periodes);
    $nombre_total_periodes = mysqli_num_rows($resultat_nombre_periodes);

    $requete_nombre_annee_scolaires ="SELECT * FROM LECON ";
    $resultat_nombre_annee_scolaires = mysqli_query($bdd,$requete_nombre_annee_scolaires);
    $nombre_total_annee_scolaires = mysqli_num_rows($resultat_nombre_annee_scolaires);
    
    $requete_nombre_de_fichier ="SELECT * FROM FICHIER ";
    $resultat_nombre_de_fichier = mysqli_query($bdd,$requete_nombre_de_fichier);
    $nombre_total_de_fichier = mysqli_num_rows($resultat_nombre_de_fichier);

    $requete_nombre_de_evaluation ="SELECT * FROM EVALUATION ";
    $resultat_nombre_de_evaluation = mysqli_query($bdd,$requete_nombre_de_evaluation);
    $nombre_total_de_evaluation = mysqli_num_rows($resultat_nombre_de_evaluation);

?>

<?php
    include("sidebar.php");
?>
<div class="row" style="margin-top:-40px;">
    <div class="col-lg-12">
        <h1 class="page-header">ESPACE ELEVE</h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i></li><a href="admin.php">ESPACE ELEVE</a>
            </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6"> <!-- debut panel eleve-->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $nombre_total_eleve ?></div>
                        <div>Suivre le cours</div>
                    </div>
                </div>
            </div>
            <a href="eleves.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel eleve-->

    <div class="col-lg-3 col-md-6"> <!-- debut panel enseignants-->
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $nombre_total_enseignant ?></div>
                        <div>Gerer son Profil</div>
                    </div>
                </div>
            </div>
            <a href="enseignants.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel enseignants-->

    <div class="col-lg-3 col-md-6"> <!-- debut panel classes-->
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bolt fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $nombre_total_classe ?></div>
                        <div>Resultats</div>
                    </div>
                </div>
            </div>
            <a href="classes.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel classes-->

    <div class="col-lg-3 col-md-6"> <!-- debut panel sections-->
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-cogs fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $nombre_total_horaire ?></div>
                        <div>HORAIRE DE COURS</div>
                    </div>
                </div>
            </div>
            <a href="section.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel sections-->

    <div class="col-lg-3 col-md-6"> <!-- debut panel periodes-->
        <div class="panel panel-blanc">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-folder-open fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $nombre_total_periodes ?></div>
                        <div>COURS</div>
                    </div>
                </div>
            </div>
            <a href="cours.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel periodes-->

    <div class="col-lg-3 col-md-6"> <!-- debut panel années scolaires-->
        <div class="panel panel-jaune">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-globe fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $nombre_total_annee_scolaires ?></div>
                        <div>LECON</div>
                    </div>
                </div>
            </div>
            <a href="lecon.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel années scolaires-->

    <div class="col-lg-3 col-md-6"> <!-- debut panel cotes-->
        <div class="panel panel-cote">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-archive fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $nombre_total_de_fichier ?></div>
                        <div>FICHIERS</div>
                    </div>
                </div>
            </div>
            <a href="fichier.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel cotes-->

    <div class="col-lg-3 col-md-6"> <!-- debut panel Proclamations-->
        <div class="panel panel-procl">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-archive fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $nombre_total_de_evaluation ?></div>
                        <div>EVALUATION</div>
                    </div>
                </div>
            </div>
            <a href="evaluation.php">
                <div class="panel-footer">
                    <span class="pull-left">
                        Voir les détails
                    </span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> <!-- fin panel cotes-->
</div>
<?php
    include("footer.php");
?>
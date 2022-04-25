<?php
    include("headertitulaire.php");
    include("connexion.php");
?>
<?php
    include("sidebartitulaire.php");
?>
<div class="container">
    <div class="row" style="margin-top:-40px;">
        <div class="col-lg-12">
            <h1 class="page-header">ESPACE TITULAIRES</h1>
        </div>
    </div>
</div>

<div class="row">        
    <div class="col-lg-4 col-md-6"> <!-- debut panel cotes-->
        <div class="panel panel-cote">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-archive fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">Elèves</div>
                    </div>
                </div>
            </div>
            <a href="cotes.php">
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

    <div class="col-lg-4 col-md-6"> <!-- debut panel Proclamations-->
        <div class="panel panel-jaune">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-archive fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">Resultats</div>
                    </div>
                </div>
            </div>
            <a href="proclamation.php">
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
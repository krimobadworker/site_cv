<?php include 'inc/fonctions.inc.php'; ?>
<?php 
  //EXPERIENCES  
    $sql_exp = $pdoCV->query("SELECT * FROM t_experiences");
    $sql_exp -> execute();
    $nb_exp= $sql_exp->rowCount(); 
?>
<?php 
  //FORMATION  
    $sql_forma = $pdoCV->query("SELECT * FROM t_formation");
    $sql_forma -> execute();
    $nb_forma= $sql_forma->rowCount(); 
?>
<?php 
  //LANGUES  
    $sql_lang = $pdoCV->query("SELECT * FROM t_langue");
    $sql_lang -> execute();
    $nb_lang= $sql_lang->rowCount(); 
?>
<?php 
  //LANGUES  
    $sql_lois = $pdoCV->query("SELECT * FROM t_loisir");
    $sql_lois -> execute();
    $nb_lois= $sql_lois->rowCount(); 
?>
<?php 
  //COMPETENCES  
    $sql_comp = $pdoCV->query("SELECT * FROM t_competences");
    $sql_comp -> execute();
    $nb_comp= $sql_comp->rowCount(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CV - Abdelkrim Benbakhti</title>

    <!-- Bootstrap Core CSS -->
    <link href="FRONT/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Animation CSS -->
    <link href="FRONT/css/animate.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="FRONT/css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/FRONT/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">Badwork</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#cv">Mon CV</a>
                    </li>
                    <li>
                        <a href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a href="#blog">Blog</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1><?= $resultat['prenom'].' '.$resultat['nom'] ?></h1>
                        <h3>Intégrateur / Developpeur Web</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Instagram</span></a>
                            </li>
                            <li>
                                <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">500px</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Expérience</h2>
                    <table class="table table-condensed">
                    <?php
                        while ($resultat=$sql_exp->fetch()){
                            echo '<tr><td>'.$resultat['experience'].'</td><td>'.$resultat['titre_e'].'</td><td>'.$resultat['dates'].'</td><td>'.$resultat['description'].'</td></tr>';
                        }?>
                    </table>
                    <hr class="section-heading-spacer">
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Formation</h2>
                    <table class="table table-condensed">
                    <?php
                        while ($resultat=$sql_forma->fetch()){
                            echo '<tr><td>'.$resultat['titre_f'].'</td><td>'.$resultat['sous_titre_f'].'</td><td>'.$resultat['dates_f'].'</td><td>'.$resultat['description_f'].'</td></tr>';
                        }?>
                    </table>
                    <hr class="section-heading-spacer">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Compétences</h2>
                    <table class="table">
                    <?php
                        while ($resultat=$sql_comp->fetch()){
                            echo '<tr><td>'.$resultat['competence'].' <div class="progress"><div class="progress-bar progress-bar-success" style="width: '.$resultat['niveau'].'%;"></div></div></td></tr>';
                        }?>
                    </table>
                    <hr class="section-heading-spacer">
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Langues</h2>
                    <table class="table">
                    <?php
                        while ($resultat=$sql_lang->fetch()){
                            echo '<tr><td>'.$resultat['langue'].' <div class="progress"><div class="progress-bar progress-bar-success" style="width: '.$resultat['niveau'].'%;"></div></div></td></tr>';
                        }?>
                    </table>
                    <hr class="section-heading-spacer">
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Loisirs</h2>
                    <table class="table table-condensed">
                    <?php
                        while ($resultat=$sql_lois->fetch()){
                            echo '<tr><td>'.$resultat['loisir'].'</td></tr>';
                        }?>
                    </table>
                    <hr class="section-heading-spacer">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Contactez Moi</h2>
                    <p class="lead">This template features the 'Lato' font, part of the <a target="_blank" href="http://www.google.com/fonts">Google Web Font library</a>, as well as <a target="_blank" href="http://fontawesome.io">icons from Font Awesome</a>.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <form>
                    <div class="form-group">
                        <input type="text" placeholder="Nom"><br>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="email"><br>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Message"></textarea><br>
                    </div>
                        <button type="submit" class="btn btn-default">Envoyer</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Suivez Moi</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Instagram</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">500px</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Mon CV</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">Portfolio</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Blog</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="FRONT/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="FRONT/js/bootstrap.min.js"></script>

</body>

</html>

<?php include '../inc/fonctions.inc.php'; ?>
<?php 
  //EXPERIENCES  
    $sql_exp = $pdoCV->query("SELECT * FROM t_experiences ORDER BY id_experience DESC");
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
  //COMPETENCES LANGAGE
    $sql_comp1 = $pdoCV->query("SELECT * FROM t_competences WHERE type='langage'");
    $sql_comp1 -> execute();
    $nb_comp1= $sql_comp1->rowCount(); 
?>
<?php 
  //COMPETENCES LOGICIEL
    $sql_comp2 = $pdoCV->query("SELECT * FROM t_competences WHERE type='logiciel'");
    $sql_comp2 -> execute();
    $nb_comp2= $sql_comp2->rowCount(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Abdelkrim Benbakhti | Site CV</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- ===== STYLESHEETS ===== -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Parallax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/parallax.js-1.4.2/parallax.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styleparallax.css">
    <!-- Magnific Popup -->
    <link href="css/magnific-popup.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <!-- Preloader -->
    <link href="css/preloader.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="css/theme.css" rel="stylesheet">
    <!-- Responsive styles -->
    <link href="css/responsive.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Preloader -->
<!--
    <div id="loader-wrapper">
      <div class="loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
-->
    <!-- end Preloader -->

    <header>
      <!-- Toggle Menu -->
      <button class="toggle-btn">
        <span class="lines"></span>
      </button>
      <div class="menu">
        <ul class="nav">
          <li class="active">
            <a href="#home">Home</a>
          </li>
          <li>
            <a href="#education">Experiences</a>
          </li>
          <li>
            <a href="#experience">Formations</a>
          </li>
          <li>
            <a href="#portfolio">Portfolio</a>
          </li>
          <li>
            <a href="#services">Loisirs</a>
          </li>
          <li>
            <a href="#services">Langues</a>
          </li>
          <li>
            <a href="#contact">Contact</a>
          </li>
        </ul>
      </div>
      <!-- end Toggle menu -->
    </header>

<!--        <div class="parallax-window" data-parallax="scroll" data-image-src="images/origami.png" data-z-index="500" data-position="10% 50%"></div>-->
    <!-- Home -->
    <section id="home" class="fill">
    <div class="parallax">
      <div class="home-background parallax-section">
        <div class="container-fluid">
          <div class="row">
              
            <div class="home-box col-xs-12">
                
              <div>
                <img src="images/moi1.jpg" alt="">
                <h1>Abdelkrim Benbakhti</h1>
                <p>Freelancer / Web Developer</p>
              </div>
<!--
                <div class="parallax">
                    <div class="parallax__layer parallax__layer--back">
                     <img src="home-bg-img.jpg"> 
                  </div>
                  <div class="parallax__layer parallax__layer--base">
                    <img class="origami" src="images/origami2.png">
                  </div>
                </div>    
-->
              <div class="social">
                <ul>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-500px"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
              </div>
            </div>
          </div><!-- end row -->
        </div><!-- end container -->
      </div>
    </div>
    </section>
    <!-- end Home -->

    <!-- Education -->
    
    <section id="education">
      <div class="container-fluid">
        <div class="row">
          <div class="section-background col-xs-12 col-sm-6" data-mh="match-edu">
            <h2>Experiences</h2>
              <?php
                while ($resultat=$sql_exp->fetch()){ 
              ?>
            <ul class="resume-box">
              <li>
                <div class="year" data-mh="match-edu-box-1">
                  <div>
                    <h4><?= $resultat['dates']?></h4>
                    <span><?= $resultat['titre_e']?></span>
                  </div>
                </div>
                <div class="box-content" data-mh="match-edu-box-1">
                  <h4><?= $resultat['experience']?></h4>
                  <p><?= $resultat['description']?></p>
                </div>
              </li>
            </ul>
            <?php } ?>
          </div>
          <!-- Skills -->
          <div class="skills parallax-window col-xs-12 col-sm-6" data-parallax="scroll" data-image-src="images/img8.jpg" data-mh="match-edu" id="comp1">
            <div class="black-layer newMiddleContent">
              <div class="middle-content">
                <!-- Skill 1 -->
                <?php
                    while ($resultat=$sql_comp1->fetch()){ 
                ?>
                <div class="skill-bar">
                  <input type="text" value="0" data-number="<?= $resultat['niveau'] ?>" class="dial">
                  <h4><?= $resultat['competence'] ?></h4>
                </div>
                  <?php } ?>
                <!-- end Skill 3 -->
              </div>
            </div>
          </div><!-- end Skills -->
        </div><!-- end row -->
      </div><!-- end container -->
    </section>
    <!-- end Education -->
      <div class="clearfix"></div>
    <!-- Experience -->
    <section id="experience">
      <div class="container-fluid">
        <div class="row">
          <div class="section-background col-xs-12 col-sm-6 col-sm-push-6" data-mh="match-experience">
            <h2>Formations</h2>
            <?php
                while ($resultat=$sql_forma->fetch()){
            ?>
            <ul class="resume-box">
              <li>
                <div class="year" data-mh="match-exp-box-1">
                  <div>
                    <h4><?= $resultat['dates_f'] ?></h4>
                    <span><?= $resultat['sous_titre_f'] ?></span>
                  </div>
                </div>
                <div class="box-content" data-mh="match-exp-box-1">
                  <h4><?= $resultat['titre_f'] ?></h4>
                  <p><?= $resultat['description_f'] ?></p>
                </div>
              </li>
            </ul>
            <?php } ?>
          </div>
          <!-- Skills -->
          <div class="skills parallax-window col-xs-12 col-sm-6 col-sm-pull-6" data-parallax="scroll" data-image-src="images/img5.jpg" data-mh="match-edu">
            <div class="black-layer newMiddleContent">
<!--              <div class="middle-content">-->
                <!-- Skill 1 -->
                <?php
                    while ($resultat=$sql_comp2->fetch()){ 
                ?>
                <div class="skill-bar">
                  <input type="text" value="0" data-number="<?= $resultat['niveau'] ?>" class="dial">
                  <h4><?= $resultat['competence'] ?></h4>
                </div>
                  <?php } ?>
                <!-- end Skill 3 -->
              </div>
            </div>
          </div><!-- end Skills -->
        </div><!-- end row -->
      </div><!-- end container -->
    </section>
    <!-- end Experience -->

    <!-- Portfolio -->
    <section id="portfolio">
      <div class="container-fluid">
        <div class="row">
          <div class="section-background col-xs-12 col-sm-6" data-mh="match-portfolio">
            <h2>Portfolio</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
          </div>
          <div class="portfolio-content col-xs-12 col-sm-6" data-mh="match-portfolio">
            <div id="portfolioSlider" class="owl-carousel">
              <!-- 1 -->
              <div>
                <img src="images/img9-720.jpg" alt=""><!-- image url -->
                <div class="image-layer">
                  <div class="image-title">
                    <h3>Shooting Saint Blaise</h3>
                    <a class="lightbox-popup" href="#popup-1">view detail</a>
                  </div>
                </div>
                <!-- popup content -->
                <div id="popup-1" class="mfp-hide popup-box">
                  <img src="images/img9.jpg" alt=""><!-- image url -->
                  <div class="popup-content">
                    <h3>Shooting Saint Blaise</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla consequat massa quis enim.</p>
                  </div>
                </div>
                <!-- end popup content -->
              </div>
              <!-- 2 -->
              <div>
                <img src="images/img10-720.jpg" alt=""><!-- image url -->
                <div class="image-layer">
                  <div class="image-title">
                    <h3>Shooting Passy</h3>
                    <a class="lightbox-popup" href="#popup-2">view detail</a>
                  </div>
                </div>
                <!-- popup content -->
                <div id="popup-2" class="mfp-hide popup-box">
                  <img src="images/img10.jpg" alt=""><!-- image url -->
                  <div class="popup-content">
                    <h3>Shooting Passy</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla consequat massa quis enim.</p>
                  </div>
                </div>
                <!-- end popup content -->
              </div>
              <!-- end 2 -->
            </div>
          </div>
        </div><!-- end row -->
      </div><!-- end container -->
    </section>
    <!-- end Portfolio -->

    <!-- Services -->
    <section id="services">
      <div class="container-fluid">
        <div class="row">
          <div class="section-background col-xs-12 col-sm-6 col-sm-push-6" data-mh="match-services">
            <h2>Loisirs</h2>
            <!-- Service box 1 -->
            <?php
                while ($resultat=$sql_lois->fetch()){ 
            ?>
            <div class="service-box">
              <div>
                <i class="<?= $resultat['fa_icon'] ?>"></i>
              </div>
              <div>
                <h4><?= $resultat['loisir'] ?></h4>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
              </div>
            </div>
            <?php } ?>
            
            <!-- end Service box 6 -->
          </div>
            <!-- LANGUE -->
          <div class="hire-background col-xs-12 col-sm-6 col-sm-pull-6" data-mh="match-experience">
            <div class="black-layer newMiddleContent">
              <div class="middle-content">
<!--                <p>Compétences</p>-->
<!--                <a href="#contact">Hire me</a>-->
                <!-- langue 1 -->
                <?php
                    while ($resultat=$sql_lang->fetch()){ 
                ?>
                <div class="skill-bar">
                  <input type="text" value="0" data-number="<?= $resultat['niveau'] ?>" class="dial">
                  <h4><?= $resultat['langue'] ?></h4>
                </div>
                  <?php } ?>
                <!-- end langue 3 -->  
              </div>
            </div>
          </div>
          <!-- end LANGUE -->

              </div>
            </div>
          </div><!-- end Facts -->
        </div><!-- end row -->
      </div><!-- end container -->
    </section>
    <!-- end Services -->

                  <!-- end Client box 6 -->
                </div>
              </div>
            </div>
          </div><!-- end Clients -->
        </div><!-- end row -->
      </div><!-- end container -->
    </section>
    <!-- end Testimonial -->

    <!-- Contact -->
    <section id="contact">
      <div class="container-fluid">
        <div class="row">
            <div class="black-layer parallax-window" data-parallax="scroll" data-image-src="images/home-bg-img.jpg">
              <div class="section-background col-xs-12 col-sm-6 col-sm-offset-3" data-mh="match-contact">
                <h2>Contactez-moi !</h2>
                <ul class="info">
                  <li>
                    <i class="fa fa-map-marker"></i>
                    <span>Street Road, City, 123</span>
                  </li>
                  <li>
                    <i class="fa fa-envelope"></i>
                    <span>abdelkrimbenbakhti@gmail.com</span>
                  </li>
                  <li>
                    <i class="fa fa-phone"></i>
                    <span>+33 663 853 518</span>
                  </li>
                </ul>
                <form method="post" id="contactform">
                  <div class="input-style">
                    <input type="text" id="name" name="name" placeholder="Name">
                  </div>
                  <div class="input-style">
                    <input type="email" id="email" name="email" placeholder="E-Mail">
                  </div>
                  <div class="text-style">
                    <textarea name="message" id="message" placeholder="Message"></textarea>
                  </div>
                  <input type="submit" id="submit" class="submit-style" name="submit" value="Send Message">
                  <div class="submit-result">
                    <p id="success">Your Message has been sent!</p>
                    <p id="error">Something went wrong, go back and try again!</p>
                  </div>
                </form>
              </div>
          </div>

        </div><!-- end row -->
      </div><!-- end container -->
    </section>
    <!-- end Contact -->
    <!-- Footer -->
    <footer>
      <div class="footer-background">
        <div class="container-fluid">
          <div class="row">
            <div class="col-left col-xs-6">
              <p>CV Abdelkrim Benbakhti <i class="fa fa-camera-retro fa-lg"></i> by <a href="http://badwork.tumblr.com">badwork</a></p>
            </div>
            <div class="col-right col-xs-6">
              <a href="#">
                <i class="fa fa-linkedin"></i>
              </a>
              <a href="#">
                <i class="fa fa-500px"></i>
              </a>
              <a href="#">
                <i class="fa fa-instagram"></i>
              </a>
            </div>
          </div><!-- end row -->
        </div><!-- end container -->
      </div>
    </footer>
    <!-- end Footer -->

    <!-- ===== JAVASCRIPTS ===== -->
    <!-- jQuery Library -->
    <script src="js/jquery.min.js"></script>
    <!-- Google Maps Library -->
    <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Retina Graphics -->
    <script src="js/retina.min.js"></script>
    <!-- Smooth Scroll -->
    <script src="js/smoothscroll.min.js"></script>
    <!-- Theme Plugins -->
    <script src="js/theme-plugins.min.js"></script>
    <!-- Custom Scripts -->
    <script src="js/scripts.js"></script>
  </body>
</html>
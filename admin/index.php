<?php
session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){
    $id_utilisateur=$_SESSION['id_utilisateur'];
    $prenom=$_SESSION['prenom'];
    $nom=$_SESSION['nom'];
}else{
    header('location:../admin/cbon.html');
}

if(isset($_GET['deconnect'])){
  $_SESSION['connexion']='';
  $_SESSION['id_utilisateur']='';
  $_SESSION['prenom']='';
  $_SESSION['nom']='';

  unset($_SESSION['connexion']);

}

?>



<nav class="navigation">
	<ul>
		<li><a href="#"><span>Privacy</span></a></li>
		<li><a href="#"><span>Sitemap</span></a></li>
		<li><a href="#"><span>Newsletter</span></a></li>
		<li class="account"><a href="#"><span>My Account</span></a></li>
	</ul>
</nav>

<a href="../connexion/connexion.php">s'identifier</a>



<?php require '../inc/head.inc.php'; ?>

        <body>
            <header>
              </header>

              <div id="mainContent">
              <h1 id="espaceAdmin">Espace administratif du site CV</h1>
            <?php
                  //affichage d'une seule info
            $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
            $resultat = $sql->fetch();
            echo '<div class="identite">' .$resultat['prenom'].' '.$resultat['nom'].'<br/>'.$resultat['adresse'].'<br/>'.$resultat['code_postal'].' '.$resultat['ville'].'<br/>'.'<a href="mailto:'. $resultat['email'] .'">'. $resultat['email'] .'</a><br/> '.$resultat['telephone'].' '.'<br/><br/>'.
            '<img src="../img/" alt="">
            </div>';
            ?>

        
              </div>
            
<?php require '../admin/utilisateur.php'; ?>
<?php require '../admin/experiences.php'; ?>
<?php require '../admin/formations.php'; ?>
<?php require '../admin/competences.php'; ?>
<?php require '../admin/langues.php'; ?>
<?php require '../admin/loisirs.php'; ?>

        </body>
    </html>

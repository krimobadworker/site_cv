<?php require 'pdoCV.php' ?> 
<?php

session_start();//à mettre dans toutes les pages SESSION et identification
if(isset($_POST['connexion'])){//['connexion'] du name du submit du form ci dessous

    $pseudo=addslashes($_POST['pseudo']);
    $mdp=addslashes($_POST['mdp']);

    $sql = $pdoCV->prepare("SELECT * FROM t_utilisateur WHERE pseudo='$pseudo' AND mdp='$mdp'");//On vérifie le courriel et le mdp
    $sql-> execute();
    $nbr_utilisateur=$sql->rowCount();//on compte et s'il y est, le compte répond 1 sinon le compte répond 0 (est-ce le vrai admin ou pas)

        if(isset($_SESSION['connexion'])&& $_SESSION['connexion'] == 'connecté') {
        $id_utilisateur=$_SESSION['id_utilisateur'];
        $prenom=$_SESSION['prenom'];
        $nom=$_SESSION['nom'];
        header('location:experiences.php');
    }else{
        header('location:index.php');
        echo 'Erreur id';
    }

    if (isset($_GET['deconnect'])) {
        $_SESSION['connexion']='';
        $_SESSION['id_utilisateur']='';
        $_SESSION['prenom']='';
        $_SESSION['nom']='';

        unset($_SESSION['connexion']);

        session_destroy();

        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>CONNEXION</title>
</head>
<body>


<form method="post" action="">
    <label>Pseudo</label><br>
    <input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])) {
        echo $_POST['pseudo'];
    }?>"><br><br>

    <label>Mot de passe </label><br>
    <input type="password" name="mdp" value="<?php if (isset($_POST['mdp'])) {
        echo $_POST['mdp'];
    }?>"><br><br>

    <input type="submit" value="Connexion">
</form>
<br><br>




<?= 'Fin'; ?>    

<!--<nav class="navigation">
	<ul>
		<li><a href="#"><span>Privacy</span></a></li>
		<li><a href="#"><span>Sitemap</span></a></li>
		<li><a href="#"><span>Newsletter</span></a></li>
		<li class="account"><a href="#"><span>My Account</span></a></li>
	</ul>
</nav> -->




<?php require '../inc/head.inc.php'; ?>



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
            
<!-- DECONNEXION -->
            <form method="post" action="">
                <input type="submit" value="deconnect">
            </form>
            
            
<?php // require '../admin/utilisateur.php'; ?>
<?php // require '../admin/experiences.php'; ?>
<?php // require '../admin/formations.php'; ?>
<?php // require '../admin/competences.php'; ?>
<?php // require '../admin/langues.php'; ?>
<?php // require '../admin/loisirs.php'; ?>

        </body>
    </html>

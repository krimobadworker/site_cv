<?php
$pdoCV = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));
?>
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
        header('location:loisirs.php');
    }else{
        header('location:../index.php');
        echo 'Erreur id';
    }

    if (isset($_GET['deconnect'])) {
        $_SESSION['connexion']='';
        $_SESSION['id_utilisateur']='';
        $_SESSION['prenom']='';
        $_SESSION['nom']='';

        unset($_SESSION['connexion']);

        session_destroy();

        header('location:../index.php');
    }exit(); }
?>   

<?php 

    if(isset($_POST['loisir'])){
        
        if($_POST['loisir']!=''){
        
        $loisir = addslashes($_POST['loisir']);
        $fa_icon = addslashes($_POST['fa_icon']);
        $id_loisir = $_POST['id_loisir'];
        $pdoCV->exec("INSERT INTO t_loisir VALUES(NULL, '$loisir', '1')");
        
            header("location:../admin/loisirs.php");
                    exit();
                }//on ferme le if
            }//on ferme le ifisset

//suppression d'un loisir
    if(isset($_GET['id_loisir'])){
        $supprimer= $_GET['id_loisir'];
        $sql= " DELETE FROM t_loisir WHERE id_loisir='$supprimer' ";
        $pdoCV->query($sql);
        header("location:../admin/loisirs.php");
        exit();
        
    }//ferme ifisset suppr

      // $ligne_loisir = $sql->fetch();
?>

<?php require '../inc/head.inc.php'; ?>

        <body>
            <header>
              </header>

              <div id="mainContent">
              <h1 id="espaceAdmin">Espace administratif du site CV: loisirs</h1>
            <?php
                  //affichage d'une seule info
            $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
            $resultat = $sql->fetch();
            echo '<div class="identite"> Bonjour ' .$resultat['prenom'].' '.$resultat['nom'].'<br/>
            </div>';
            ?>

        
              </div><br><br>
            
<?php 
              //recherche de plusieurs infos  
            $sql = $pdoCV->query("SELECT * FROM t_loisir");
            $sql -> execute();
            $nb_loisir= $sql->rowCount(); 
            ?>
            
            <?php
            while ($resultat=$sql->fetch()){
                echo $resultat['loisir'].' '.$resultat['fa_icon']. '<a href="modif_loisirs.php?id_loisir='. $resultat['id_loisir'].'">modifier</a> <a href="loisirs.php?id_loisir='. $resultat['id_loisir'].'">supprimer</a> <br>';
            }
            
            ?>
            
<!--Formulaire d'insertion de loisir-->
            
            
            <form method="POST" action="loisirs.php">
                
                    <input type="text" name="loisir" size="20"  maxlength="35">
                    <input type="text" name="fa_icon" size="20"  maxlength="35"><br>
                    
                    <input type="submit" value="Envoyer" name="envoyer">
                
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['loisir']))      $loisir=$_POST['loisir'];
                else      $loisir="";

                if(isset($_POST['fa_icon']))      $fa_icon=$_POST['fa_icon'];
                else      $fa_icon="";



                // On vérifie si les champs sont vides
                if(empty($loisir) && empty($fa_icon)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
            
            
            
         

            
        </body>
    </html>
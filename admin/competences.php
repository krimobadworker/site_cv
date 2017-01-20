<?php //require '../connexion/connexion.php'; ?>

<?php
$pdoCV = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));
?>
<?php 
session_start();
if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){//si la personne est connecté 
    //et la valeur est bien celle de la page authentification
        $id_utilisateur=$_SESSION['id_utilisateur'];
        $prenom=$_SESSION['prenom'];
        $nom=$_SESSION['nom'];
        //echo $_SESSION['connexion']; vérification de la connexion
}else{//l'utilisateur n'est pas connecté
        header('location:authentification.php');
}

//pour se déconnecter
if(isset($_GET['deconnect'])){
    $_SESSION['connexion'] = ''; //on vide les variables de session
    $_SESSION['id_utilisateur'] = '';
    $_SESSION['prenom'] = '';
    $_SESSION['nom'] = '';

    unset($_SESSION['connexion']);//on supprime cette variable

    session_destroy();//on detruit la session

    header('location:../index.php');
}

?>

<?php 

    if(isset($_POST['competence'])){
        
        if($_POST['competence']!=''){
        
        $competence = addslashes($_POST['competence']);
        $niveau = addslashes($_POST['niveau']);
        $id_competence = $_POST['id_competence'];
        $pdoCV->exec("INSERT INTO t_competences VALUES(NULL, '$competence', '$niveau')");
        
            header("location:../admin/competences.php");
                    exit();
                }//on ferme le if
            }//on ferme le ifisset

//suppression d'une competence
    if(isset($_GET['id_competence'])){
        $supprimer= $_GET['id_competence'];
        $sql= " DELETE FROM t_competences WHERE id_competence='$supprimer' ";
        $pdoCV->query($sql);
        header("location:../admin/competences.php");
        exit();
        
    }//ferme ifisset suppr
?>

<?php require '../inc/head.inc.php'; ?>

        <body>
            <header>
              </header>

              <div id="mainContent">
              <h1 id="espaceAdmin">Espace administratif du site CV: competences</h1>
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
            $sql = $pdoCV->query("SELECT * FROM t_competences");
            $sql -> execute();
            $nb_comp= $sql->rowCount(); 
            ?>
            
            <?php
            while ($resultat=$sql->fetch()){
                echo $resultat['competence'].' '.$resultat['niveau'].' <a href="modif_competences.php?id_competence='. $resultat['id_competence'].'">modifier</a> <a href="competences.php?id_competence='. $resultat['id_competence'].'">supprimer</a> <br>';
            }
            
            ?>
            
<!--Formulaire d'insertion de competence-->
            
            
            <form method="POST" action="competences.php">
                
                    <input type="text" name="competence" size="20"  maxlength="35">
                    <input type="text" name="niveau" size="5"  maxlength="35"><br>
                    
                    <input type="submit" value="Envoyer" name="envoyer">
              
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['competence']))      $competence=$_POST['competence'];
                else      $competence="";
            
                if(isset($_POST['niveau']))      $niveau=$_POST['niveau'];
                else      $niveau="";



                // On vérifie si les champs sont vides
                if(empty($competence) OR empty($niveau)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
            
            
            
         

            
        </body>
    </html>
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
// INSERT EXPERIENCE          
            // On commence par récupérer les champs
                if(isset($_POST['experience'])){
                    if($_POST['experience']!='' && $_POST['titre_e']!='' && $_POST['dates']!='' && $_POST['description']!=''){
                    
                    $experience = addslashes($_POST['experience']);
                    $titre_e = addslashes($_POST['titre_e']);
                    $dates = addslashes($_POST['dates']);
                    $description = addslashes($_POST['description']);
                        
             // on insert une nouvelle exp       
                    $pdoCV->exec("INSERT INTO t_experiences VALUES (NULL, '$experience', '$titre_e', '$dates', '$description', '$competence_id', '1')");
                    header("location:../admin/experiences.php");
                    exit();
                    }//on ferme le if
            }//on ferme le ifisset

//suppression d'une experience
    if(isset($_GET['id_experience'])){
        $supprimer= $_GET['id_experience'];
        $sql= " DELETE FROM t_experiences WHERE id_experience='$supprimer' ";
        $pdoCV->query($sql);
        header("location:../admin/experiences.php");
        exit();
        
    }//ferme ifisset suppr
?>

<?php require '../inc/head.inc.php'; ?>

        <body>
            <header>
              </header>

              <div id="mainContent">
              <h1 id="espaceAdmin">Espace administratif du site CV: experience</h1>
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
            $sql = $pdoCV->query("SELECT * FROM t_experiences");
            $sql -> execute();
            $nb_exp= $sql->rowCount(); 
            ?>
            
            <?php
            while ($resultat=$sql->fetch()){
                echo $resultat['experience'].' '.$resultat['titre_e'].' '.$resultat['dates'].' '.$resultat['description'].' <a href="modif_experiences.php?id_experience='. $resultat['id_experience'].'">modifier</a> <a href="experiences.php?id_experience='. $resultat['id_experience'].'">supprimer</a> <br>';
            }
            
//            echo '<pre>';
//            print_r($experience);
//            echo'</pre>';
            
            ?>
            
<!--Formulaire d'insertion d'exp-->
            
            
            <form method="POST" action="experiences.php">
                
                    <input type="text" name="experience" size="20"  maxlength="35">
                    <input type="text" name="titre_e" size="20"  maxlength="35"><br>
                    <input type="text" name="dates" size="20"  maxlength="70">
                    <input type="text" name="description" size="20"  maxlength="70"><br>
                    <input type="submit" value="Envoyer" name="envoyer">
                
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['experience']))      $nom=$_POST['experience'];
                else      $experience="";

                if(isset($_POST['titre_e']))      $prenom=$_POST['titre_e'];
                else      $titre_e="";

                if(isset($_POST['dates']))      $email=$_POST['dates'];
                else      $dates="";

                if(isset($_POST['description']))      $icq=$_POST['description'];
                else      $description="";

                // On vérifie si les champs sont vides
                if(empty($experience) OR empty($titre_e) OR empty($dates) OR empty($description)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
            
            
            
         

            
        </body>
    </html>











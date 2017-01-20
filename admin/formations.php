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
  // INSERT FORMATION 
            // On commence par récupérer les champs
                if(isset($_POST['titre_f'])){
                    if($_POST['titre_f']!='' && $_POST['sous_titre_f']!='' && $_POST['dates_f']!='' && $_POST['description_f']!=''){
                    
                    $titre_f = addslashes($_POST['titre_f']);
                    $sous_titre_f = addslashes($_POST['sous_titre_f']);
                    $dates_f = addslashes($_POST['dates_f']);
                    $description_f = addslashes($_POST['description_f']);
                    $utilisateur_id = addslashes($_POST['utilisateur_id']);
                        
             // on insert une nouvelle formation       
                    $pdoCV->exec("INSERT INTO t_formation VALUES (NULL, '$titre_f', '$sous_titre_f', '$dates_f', '$description_f', '1')");
                    header("location:../admin/formations.php");
                    exit();
                    }//on ferme le if
            }//on ferme le ifisset

//suppression d'une formation
    if(isset($_GET['id_formation'])){
        $supprimer= $_GET['id_formation'];
        $sql= " DELETE FROM t_formation WHERE id_formation='$supprimer' ";
        $pdoCV->query($sql);
        header("location:../admin/formations.php");
        exit();
        
    }//ferme ifisset suppr
?>

<?php require '../inc/head.inc.php'; ?>

        <body>
            <header>
              </header>

              <div id="mainContent">
              <h1 id="espaceAdmin">Espace administratif du site CV: formation</h1>
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
            $sql = $pdoCV->query("SELECT * FROM t_formation");
            $sql -> execute();
            $nb_exp= $sql->rowCount(); 
            ?>
            
            <?php
            while ($resultat=$sql->fetch()){
                echo $resultat['titre_f'].' '.$resultat['sous_titre_f'].' '.$resultat['dates_f'].' '.$resultat['description_f'].' <a href="modif_formations.php?id_formation='. $resultat['id_formation'].'">modifier</a> <a href="formations.php?id_formation='. $resultat['id_formation'].'">supprimer</a> <br>';
            }
            
            ?>
            

<!--Formulaire d'insertion de formation-->
            
            
            <form method="POST" action="formations.php">
                
                    <input type="text" name="titre_f" size="20"  maxlength="35">
                    <input type="text" name="sous_titre_f" size="20"  maxlength="35"><br>
                    <input type="text" name="dates_f" size="20"  maxlength="70">
                    <input type="text" name="description_f" size="20"  maxlength="70"><br>
                    <input type="submit" value="Envoyer" name="envoyer">
               
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['titre_f']))      $nom=$_POST['titre_f'];
                else      $titre_f="";

                if(isset($_POST['sous_titre_f']))      $prenom=$_POST['sous_titre_f'];
                else      $sous_titre_f="";

                if(isset($_POST['dates_f']))      $email=$_POST['dates_f'];
                else      $dates_f="";

                if(isset($_POST['description_f'])) $description_f=$_POST['description_f'];
                else      $description_f="";

            // On vérifie si les champs sont vides
                if(empty($titre_f) OR empty($sous_titre_f) OR empty($dates_f) OR empty($description_f)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
            
            
            
         

            
        </body>
    </html>




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
     
     // UPDATE t_langue SET langue = $langue WHERE id_langue = $_GET['id_langue']
//modif d'une langue

    if(isset($_GET['id_langue'])){
        $id_langue = $_GET['id_langue'];
        $query = $pdoCV->query("SELECT langue, niveau FROM t_langue WHERE id_langue = $id_langue");
        
        $resultat2 = $query->fetch();
        
        
    
    if($_POST){
        $id_langue= $_GET['id_langue'];
        $langue = addslashes($_POST['langue']);
        $niveau = addslashes($_POST['niveau']);
        
        $sql= " UPDATE t_langue SET langue = '$langue',
                                    niveau = '$niveau'
                                    WHERE id_langue = '$id_langue' ";
        
        $pdoCV->query($sql);
        header("location:../admin/langues.php");
        exit();
        
    }//ferme ifisset suppr
}
?>
<?php require '../inc/head.inc.php'; ?>

            

            
<!--Formulaire d'insertion de langue-->
            
            
            <form method="POST" action="">
                
                    <input type="text" name="langue" size="20"  maxlength="35" value="<?php echo $resultat2['langue'] ?>">
                    <input type="text" name="niveau" size="20"  maxlength="35" value="<?php echo $resultat2['niveau'] ?>"><br>
                    <input type="submit" value="Envoyer" name="envoyer">
                
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['langue']))      $langue=$_POST['langue'];
                else      $langue="";
            
                if(isset($_POST['niveau']))      $niveau=$_POST['niveau'];
                else      $niveau="";         



                // On vérifie si les champs sont vides
                if(empty($langue) OR empty($niveau)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
            
            
            
         

            
        </body>
    </html>
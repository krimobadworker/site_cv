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
     
     // UPDATE t_loisir SET loisir = $loisir WHERE id_loisir = $_GET['id_loisir']
//modif d'une loisir

    if(isset($_GET['id_loisir'])){
        $id_loisir = $_GET['id_loisir'];
        $query = $pdoCV->query("SELECT loisir FROM t_loisir WHERE id_loisir = $id_loisir");
        
        $resultat2 = $query->fetch();
        
        
    
    if($_POST){
        $id_loisir= $_GET['id_loisir'];
        $loisir = addslashes($_POST['loisir']);
        
        $sql= " UPDATE t_loisir SET loisir = '$loisir'
                                    WHERE id_loisir = '$id_loisir' ";
        
        $pdoCV->query($sql);
        header("location:../admin/loisirs.php");
        exit();
        
    }//ferme ifisset suppr
}
?>
<?php require '../inc/head.inc.php'; ?>

            

            
<!--Formulaire d'insertion de loisir-->
            
            
            <form method="POST" action="">
                
                    <input type="text" name="loisir" size="20"  maxlength="35" value="<?php echo $resultat2['loisir'] ?>"><br>
                    <input type="submit" value="Envoyer" name="envoyer">
                
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['loisir']))      $loisir=$_POST['loisir'];
                else      $loisir="";
            
                // On vérifie si les champs sont vides
                if(empty($loisir)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
            
            
            
         

            
        </body>
    </html>
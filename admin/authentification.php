<?php include '../inc/fonctions.inc.php'; ?>
<?php require 'pdoCV.php'; ?> 
<?php

session_start();//à mettre dans toutes les pages SESSION et identification
if(isset($_POST['connexion'])){//['connexion'] du name du submit du form ci dessous

    $pseudo=addslashes($_POST['pseudo']);
    $mdp=addslashes($_POST['mdp']);

    $sql = $pdoCV->prepare("SELECT * FROM t_utilisateur WHERE pseudo='$pseudo' AND mdp='$mdp'");//On vérifie le courriel et le mdp
    $sql-> execute();
    $nbr_utilisateur=$sql->rowCount();//on compte et s'il y est, le compte répond 1 sinon le compte répond 0 (est-ce le vrai admin ou pas)

       if($nbr_utilisateur==0){
            $msg_connexion_err="Erreur d'authentification !";
        }else{
            $utilisateur = $sql->fetch();
            echo $pseudo;
            $_SESSION['connexion']='connecté';
            $_SESSION['id_utilisateur']=$utilisateur['id_utilisateur'];
            $_SESSION['prenom']=$utilisateur['prenom'];
            $_SESSION['nom']=$utilisateur['nom'];

            header('location:../admin/index.php');

        }
}

?>


<?php
$sql = $pdoCV->query("SELECT * FROM t_utilisateur");
                $resultat = $sql->fetch();
?>
 
 
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">   
        <script src="https://use.fontawesome.com/30a190e011.js"></script>
    <!--	<script src="../ckeditor/ckeditor.js"></script>-->
        <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title><?php echo $resultat['prenom'].' '.$resultat['nom'];?> - Developpeur & Integrateur Web</title>
    </head>

    <body>
    
         <div class="row">
            <form class="form-horizontal" method="POST" action="">
                <input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])) {
                    echo $_POST['pseudo']; }?>" placeholder="Pseudo"><br>
                <input type="password" name="mdp" value="<?php if (isset($_POST['mdp'])) {
                    echo $_POST['mdp']; }?>" placeholder="Mot de passe"><br>
                <input type="submit" name="connexion" value="Connexion">
            </form>
        </div>
    </body>
</html>

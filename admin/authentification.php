<?php include '../inc/fonctions.inc.php'; ?>
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
        header('location:langues.php');
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
     <form method="post" action="">
            <input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])) {
                echo $_POST['pseudo']; }?>" placeholder="Pseudo"><br>
            <input type="password" name="mdp" value="<?php if (isset($_POST['mdp'])) {
                echo $_POST['mdp']; }?>" placeholder="Mot de passe"><br>
            <input type="submit" value="Connexion">
        </form>
    </body>
</html>

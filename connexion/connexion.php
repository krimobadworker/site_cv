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
            header('location:../index.php');
        }else{
            header('location:connexion.php');
        }

        if (isset($_GET['deconnect'])) {
            $_SESSION['connexion']='';
            $_SESSION['id_utilisateur']='';
            $_SESSION['prenom']='';
            $_SESSION['nom']='';

            unset($_SESSION['connexion']);

            session_destroy();

            header('location:../index.php');
            
        }exit();}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>CONNEXION</title>
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



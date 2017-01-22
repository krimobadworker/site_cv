<?php include '../inc/fonctions.inc.php'; ?>
<?php require '../connexion/connexion.php'; ?>


<?php 	

// MOI

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
        header('location:authentification.php');
    }

    if (isset($_GET['deconnect'])) {
        $_SESSION['connexion']='';
        $_SESSION['id_utilisateur']='';
        $_SESSION['prenom']='';
        $_SESSION['nom']='';

        unset($_SESSION['connexion']);

        session_destroy();

        header('location:../index.php');
    }
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
    <title><?php echo $_SESSION['prenom'].' '.$_SESSION['nom'];?> - Developpeur & Integrateur Web</title>

</head>

<body id="bodyAuthentif">
	<div><p>Bonjour Abdelkrim, Veuillez vous identifier.</p></div>
	<div id="formAuthentif">
<!--	<div id="img">
		<img id="avatar" src="../img/avatar.png" width="100" height="100">
	</div> -->
				
		<form  action="authentification.php" method="POST">
			
				<legend>Je m'identifie</legend>
					
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" placeholder="Rentrez votre pseudo" tabindex="1" size="35" aria-requierd="true">
				<label for="mdp">Mot de passe</label>
				<input type="password" name="mdp" required tabindex="2" size="10" maxlength="50">
				
				<?= $msg_connexion_err; ?>
				
			<input type="reset" tabindex="3" value="Effacer" >
			<input name="connexion" type="submit" tabindex="4" value="Me connecter" >
			<p><a href="#">J'ai oublier mon mot de passe</a></p>
		</form>	

		
	</div>

</body>
</html>

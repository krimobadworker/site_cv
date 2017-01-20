
<?php require '../admin/pdoCV.php' ?> 

<?php


if ($_POST) {
	//debug($_POST);

	$resultat = $pdoCV -> prepare("SELECT * FROM t_utilisateur WHERE pseudo = :pseudo");
	$resultat -> bindParam(':pseudo',$_POST['pseudo'],PDO::PARAM_STR);
	$resultat ->execute();

    $msg='';

	if ($resultat -> rowCount() !=0 ) {//si le resultat est different de 0 cela signifie que lutilisateur existe bien.
		$membre = $resultat -> fetch(PDO::FETCH_ASSOC);
		if($membre['mdp'] == ($_POST['mdp'])){// Si le MDP du membre correspond MDP //sans md5 ('md5 ') qu'il ma envoyé dans le formulaire
			/*$_SESSION['membre']['pseudo'] = $membre['pseudo'];
			$_SESSION['membre']['prenom'] = $membre['prenom'];
			$_SESSION['membre']['email'] = $membre['email'];
			Plus simple avec un boucle :*/

			foreach ($pseudo as $indice => $valeur) {
				if($indice !='mdp'){
					$_SESSION['pseudo'][$indice] = $valeur;
				}
				
			}
			//On enregistre dans la superglobale $_SESSION à l'indice Membre (tableau multidimentionelle ) toutes les infos de notre membre qui se connecte sauf mdp.
			//debug($_SESSION);

			header('location:../admin/index.php');
		}else{
			$msg .='<div class="erreur">Erreur de mot de passe! </div>';
		}

	}else{
		$msg .= '<div class="erreur">Erreur de pseudo !</div>';

	}
}


$page="Connexion";
?>

<form method="post" action="">
	<label>Pseudo</label><br>
	<input type="text" name="pseudo" value="<?php if (isset($_POST['pseudo'])) {
		echo $_POST['pseudo'];
	}?>"><br><br>

	<label>Mot de passe </label><br>
	<input type="password" name="mdp" value="<?php if (isset($_POST['mdp'])) {
		echo $_POST['mdp'];
	}?>"><br><br>

	<input type="submit" value="Connexion">
</form>




<!--<a href="../admin/index.php">HOME</a>-->



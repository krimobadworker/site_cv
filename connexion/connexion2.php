
<?php


$pdoCV = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
))

;
?>
<?php


//Fonction debug()

function debug($var,$mode = 1){
	echo '<div style="color:white;padding:5px;background : #' . rand(111111,999999).'"
	>';
	$trace = debug_backtrace();//retourne des infos sous forme de tableau sur lendroit ou a ete executer la fonction
	$trace = array_shift($trace);//Me retourne la premiere valeur qui sera eqalement un array

	echo 'Ce debug a ete demande dans le fichier' . $trace['file'] . ' a la ligne' . $trace['line'] . '</hr>' ;

	if ($mode===1) {
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	}else{
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}


	echo '</div>';
}
?>

<?php
// L'utilisateur est connecté ?

function userConnecte(){
	// Cette fonction m'indique si l'utilisateur est connecté. Elle me permettra de gérer les droits d'accesibilité.

	if (isset($_SESSION['membre'])) {
		return true;
	}else{
		return false;
	}
}





?>
<?php
// Deconnexion

if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
	unset($_SESSION['membre']);
	session_destroy();
	header('location:connexion.php');
}



if (userConnecte()) {
	header('location:index.php');
}

if ($_POST) {
	debug($_POST);

	$resultat = $pdoCV -> prepare("SELECT * FROM t_utilisateur WHERE membre = :membre");
	$resultat -> bindParam(':membre',$_POST['membre'],PDO::PARAM_STR);
	$resultat ->execute();



	if ($resultat -> rowCount() !=0 ) {//si le resultat est different de 0 cela signifie que lutilisateur existe bien.
		$membre = $resultat -> fetch(PDO::FETCH_ASSOC);
		if($membre['mdp'] == ($_POST['mdp'])){// Si le MDP du membre correspond MDP //sans md5 ('md5 ') qu'il ma envoyé dans le formulaire
			/*$_SESSION['membre']['pseudo'] = $membre['pseudo'];
			$_SESSION['membre']['prenom'] = $membre['prenom'];
			$_SESSION['membre']['email'] = $membre['email'];
			Plus simple avec un boucle :*/

			foreach ($membre as $indice => $valeur) {
				if($indice !='mdp'){
					$_SESSION['membre'][$indice] = $valeur;
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

$msg='';
$page="Connexion";
echo $msg;
?>

<form method="post" action="">
	<label>Membre</label><br>
	<input type="text" name="membre" value="<?php if (isset($_POST['membre'])) {
		echo $_POST['membre'];
	}?>"><br><br>

	<label>Mot de passe </label><br>
	<input type="password" name="mdp" value="<?php if (isset($_POST['mdp'])) {
		echo $_POST['mdp'];
	}?>"><br><br>

	<input type="submit" value="Connexion">
</form>



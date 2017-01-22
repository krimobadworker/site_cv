if($nbr_utilisateur==0){//on ne le trouve pas
    	$msg_connexion_err="Erreur d'authentification !";
    	}else{//on trouve l'email et le mdp c'estbien il est bien inscrit
    		$ligne = $sql->fetch();//pour retrouver son nom et prenom
    		
		$_SESSION['connexion'] = 'connecté';
		$_SESSION['id_utilisateur'] = $ligne['id_utilisateur'];
		$_SESSION['prenom'] = $ligne['prenom'];
		$_SESSION['nom'] = $ligne['nom'];

		header('location:index.php');//vers la page d'accueil de l'admin
<?php require '../connexion/connexion.php'; ?>
  
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

<?php require '../inc/head.inc.php'; ?>

    <body>
            <header>
                <h1>Site CV - Abdelkrim Benbakhti</h1>
                <h2>Projet professionel: Intégrateur/Développeur Web</h2>
              </header>

              <div id="mainContent">
                  <h1 id="espaceAdmin">Espace administratif du site CV</h1>
                    <?php
                    $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
                    $resultat = $sql->fetch();
                    ?>

                <table>
                    <tr>
                        <td><?= '<div class="identite">'; ?></td>
                          <tr><?= $resultat['etat_civil'].' '.$resultat['prenom'].' '.$resultat['nom'].'<br/>'; ?></tr>
                          <tr><?= $resultat['adresse'].'<br/>'; ?></tr>
                          <tr><?= $resultat['ville'].'<br/>'; ?></tr>
                          <tr><?= $resultat['code_postal'].'<br/>'; ?></tr>
                          <tr><?= $resultat['email'].'<br/>'; ?></tr>
                          <tr><?= $resultat['telephone'].'<br/>'; ?></tr>
                          <tr><?= $resultat['age'].' ans'.'<br/>'; ?></tr>
                          <tr><?= $resultat['mdp'].'<br/>'; ?></tr>
                          <tr><?= $resultat['sexe'].'<br/>'; ?></tr>
                          <tr><?= $resultat['statut_marital'].'<br/>'; ?></tr>
                          <tr><?= $resultat['date_de_naissance'].'<br/>'; ?></tr>
                          <tr><?= $resultat['avatar'].'<br/>'; ?></tr>
                        <td><?= '<img src="../img/" alt=""></div>'; ?></td>
                    </tr>
                </table> 
                <a href="modif_utilisateur.php?id_utilisateur=1">modif</a>
              </div>

        </body>
    </html>
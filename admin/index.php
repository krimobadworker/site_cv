<?php require 'pdoCV.php' ?> 
<?php

//session_start();//à mettre dans toutes les pages SESSION et identification
//if(isset($_POST['connexion'])){//['connexion'] du name du submit du form ci dessous
//
//    $pseudo=addslashes($_POST['pseudo']);
//    $mdp=addslashes($_POST['mdp']);
//
//    $sql = $pdoCV->prepare("SELECT * FROM t_utilisateur WHERE pseudo='$pseudo' AND mdp='$mdp'");//On vérifie le courriel et le mdp
//    $sql-> execute();
//    $nbr_utilisateur=$sql->rowCount();//on compte et s'il y est, le compte répond 1 sinon le compte répond 0 (est-ce le vrai admin ou pas)
//
//        if(isset($_SESSION['connexion'])&& $_SESSION['connexion'] == 'connecté') {
//        $id_utilisateur=$_SESSION['id_utilisateur'];
//        $prenom=$_SESSION['prenom'];
//        $nom=$_SESSION['nom'];
//        header('location:cbon.html');
//    }else{
//        echo 'Erreur id';
//    }
//
//    if (isset($_GET['deconnect'])) {
//        $_SESSION['connexion']='';
//        $_SESSION['id_utilisateur']='';
//        $_SESSION['prenom']='';
//        $_SESSION['nom']='';
//
//        unset($_SESSION['connexion']);
//
//        session_destroy();
//
//        
//        echo 'Erreur id';
//    }exit(); }
 ?>

<?php   
    
session_start();//à mettre dans toutes les pages SESSION et identification
if(isset($_POST['connexion'])){//['connexion'] du name du submit du form ci dessous

class connexion{       
  public function login($pseudo, $mdp)
  {
    if (!empty($pseudo) && !empty($mdp))
    {    
      //$pseudo=addslashes($_POST['pseudo']);
      $mdp=addslashes($_POST['mdp']);
      $sql = $pdoCV->prepare("SELECT * FROM t_utilisateur WHERE pseudo=:pseudo AND mdp=:mdp");
      $sql->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
      $sql->bindValue(':mdp', $mdp, PDO::PARAM_STR);
      $sql->execute();
      $nbr_utilisateur = $sql->rowCount();

      if ($nbr_utilisateur > 0)      
      {    
        $results_login = $sql->fetch(PDO::FETCH_ASSOC);
        $_SESSION['pseudo'] = $results_login['pseudo'];
        $_SESSION['id_utilisateur'] = $results_login['id_utilisateur'];  
        return true;
        echo 'OK';
      }
      else
      {
        return false;
        echo 'pas OK nbr_ut';
      }
    }
    else
    {
      return false;
      echo 'pas OK empty';
    }
  }}
    
class connecte{    
    public function isLogged()
  {
    return (!empty($_SESSION['id_utilisateur']) && !empty($_SESSION['pseudo']));
    echo 'deja connecté';
  }}

    
class deconnexion{
    public function logout()
  { 
      unset($_SESSION['id_utilisateur']);
      unset($_SESSION['pseudo']); 
      header('location:../index.php');
            
}}}
    
?>





<?php require '../inc/head.inc.php'; ?>

<!-- CONNEXION

        <form method="post" action="">
            <input type="text" name="pseudo" value="<?php //if (isset($_POST['pseudo'])) {
                //echo $_POST['pseudo']; }?>" placeholder="Pseudo"><br>
            <input type="password" name="mdp" value="<?php //if (isset($_POST['mdp'])) {
                //echo $_POST['mdp']; }?>" placeholder="Mot de passe"><br>
            <input type="submit" value="Connexion">
        </form>

-->

<!-- DECONNEXION -->
            <form method="post" action="">
                <input type="submit" value="deconnect">
            </form>

              <div id="mainContent">
              <h1 id="espaceAdmin">Espace administratif du site CV</h1>
            <?php
                  //affichage d'une seule info
				$sql = $pdoCV->query("SELECT * FROM t_utilisateur");
                $resultat = $sql->fetch();
                echo '<div class="identite">' .$resultat['prenom'].' '.$resultat['nom'].'<br/>'.$resultat['adresse'].'<br/>'.$resultat['code_postal'].' '.$resultat['ville'].'<br/>'.'<a href="mailto:'. $resultat['email'] .'">'. $resultat['email'] .'</a><br/> '.$resultat['telephone'].' '.'<br/><br/>'.
                '<img src="../img/" alt="">
                </div>';
            ?>
              </div>
            

            
            
<?php require '../admin/utilisateur.php'; ?>
<?php require '../admin/experiences.php'; ?>
<?php require '../admin/formations.php'; ?>
<?php require '../admin/competences.php'; ?>
<?php require '../admin/langues.php'; ?>
<?php require '../admin/loisirs.php'; ?>

        </body>
    </html>

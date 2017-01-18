<?php require '../connexion/connexion.php'; ?>

<?php
     
     // UPDATE t_langue SET langue = $langue WHERE id_langue = $_GET['id_langue']
//modif d'une langue

    if(isset($_GET['id_utilisateur'])){
        $id_utilisateur = $_GET['id_utilisateur'];
        $query = $pdoCV->query("SELECT etat_civil, prenom, nom, email, telephone, mdp, pseudo, avatar, age, date_de_naissance, sexe, statut_marital, adresse, code_postal, ville, pays FROM t_utilisateur WHERE id_utilisateur = $id_utilisateur");
        
        $resultat2 = $query->fetch();
        
        
    
    if($_POST){
        $id_utilisateur= $_GET['id_utilisateur'];
        $etat_civil = addslashes($_POST['etat_civil']);
        $prenom = addslashes($_POST['prenom']);
        $nom = addslashes($_POST['nom']);
        $adresse = addslashes($_POST['adresse']);
        $ville = addslashes($_POST['ville']);
        $email = addslashes($_POST['email']);
        $telephone = addslashes($_POST['telephone']);
        $age = addslashes($_POST['age']);
        $mdp = addslashes($_POST['mdp']);
        $sexe = addslashes($_POST['sexe']);
        $statut_marital = addslashes($_POST['statut_marital']);
        $date_de_naissance = addslashes($_POST['date_de_naissance']);
        
        $sql= " UPDATE t_utilisateur SET etat_civil = '$etat_civil',
                                    prenom = '$prenom',
                                    nom = '$nom',
                                    adresse = '$adresse',
                                    ville = '$ville',
                                    email = '$email',
                                    telephone = '$telephone',
                                    age = '$age',
                                    mdp = '$mdp',
                                    sexe = '$sexe',
                                    statut_marital = '$statut_marital',
                                    date_de_naissance = '$date_de_naissance'
                                    WHERE id_utilisateur = '$id_utilisateur' ";
        
        $pdoCV->query($sql);

        
       // header("location:../admin/utilisateur.php");
        exit();
        
    }//ferme ifisset suppr
}
?>
<?php require '../inc/head.inc.php'; ?>

<body>
    <header>
        <h1>Site CV - Abdelkrim Benbakhti</h1>
        <h2>Projet professionel: Intégrateur/Développeur Web</h2>
      </header>

      <div id="mainContent">
          <h1 id="espaceAdmin">Espace administratif du site CV-MODIFS IDENTITé</h1>
            <?php
            $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
            $resultat = $sql->fetch();
            ?>

          <?= '<div class="identite">'; ?>
        <form method="post">
              <?= ' <input type="text" name="etat_civil" size="20" maxlenght="35" value="'.$resultat['etat_civil'].'"><br/>'; ?>
              <?= ' <input type="text" name="prenom" size="20" maxlenght="35" value="'.$resultat['prenom'].'"><br/>'; ?>
              <?= ' <input type="text" name="nom" size="20" maxlenght="35" value="'.$resultat['nom'].'"><br/>'; ?>
              <?='<input type="text" name="adresse" size="35" maxlenght="35" value="'.$resultat['adresse'].'"><br/>'; ?>
              <?=' <input type="text" name="ville" size="20" maxlenght="35" value="'.$resultat['ville'].'"><br/>'; ?>
              <?='<input type="text" name="code_postal" size="20" maxlenght="35" value="'.$resultat['code_postal'].'"><br/>';?>
              <?=' <input type="text" name="email" size="20" maxlenght="35" value="'.$resultat['email'].'"><br/>'; ?>
              <?= ' <input type="text" name="telephone" size="20" maxlenght="35" value="'.$resultat['telephone'].'"><br/>'; ?>
              <?=' <input type="text" name="age" size="20" maxlenght="35" value="'.$resultat['age'].'"><br/>'; ?>
              <?= ' <input type="text" name="mdp" size="20" maxlenght="35" value="'.$resultat['mdp'].'"><br/>'; ?>
              <?= ' <input type="text" name="sexe" size="20" maxlenght="35" value="'.$resultat['sexe'].'"><br/>'; ?>
              <?= ' <input type="text" name="statut_marital" size="20" maxlenght="35" value="'.$resultat['statut_marital'].'"><br/>'; ?>
              <?= ' <input type="text" name="date_de_naissance" size="20" maxlenght="35" value="'.$resultat['date_de_naissance'].'"><br/>'; ?>
              <?= ' <input type="submit" value="Envoyer" name="envoyer">'; ?>
            
              <?= $resultat['avatar'].'<br/>'; ?>
            <?= '<img src="../img/" alt=""></div>'; ?>
        </form>
          
          <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['civilite']))      $civilite=$_POST['civilite'];
                else      $civilite="";
          
                if(isset($_POST['prenom']))      $prenom=$_POST['prenom'];
                else      $prenom="";
          
                if(isset($_POST['nom']))      $nom=$_POST['nom'];
                else      $nom="";
          
                if(isset($_POST['adresse']))      $adresse=$_POST['adresse'];
                else      $adresse="";
          
                if(isset($_POST['ville']))      $ville=$_POST['ville'];
                else      $ville="";
          
                if(isset($_POST['code_postal']))      $code_postal=$_POST['code_postal'];
                else      $code_postal="";
          
                if(isset($_POST['email']))      $email=$_POST['email'];
                else      $email="";
          
                if(isset($_POST['telephone']))      $telephone=$_POST['telephone'];
                else      $telephone="";
          
                if(isset($_POST['age']))      $age=$_POST['age'];
                else      $age="";
          
                if(isset($_POST['mdp']))      $mdp=$_POST['mdp'];
                else      $mdp="";
          
                if(isset($_POST['sexe']))      $sexe=$_POST['sexe'];
                else      $sexe="";
          
                if(isset($_POST['statut_marital']))      $statut_marital=$_POST['statut_marital'];
                else      $statut_marital="";
          
                if(isset($_POST['date_de_naissance']))      $date_de_naissance=$_POST['date_de_naissance'];
                else      $date_de_naissance="";

                

                // On vérifie si les champs sont vides
                if(empty($civilite) OR empty($prenom) OR empty($nom) OR empty($adresse) OR empty($ville) OR empty($code_postal) OR empty($email) OR empty($telephone) OR empty($age) OR empty($mdp) OR empty($sexe) OR empty($statut_marital) OR empty($date_de_naissance)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
    

    
    
              </div>

        </body>
    </html>
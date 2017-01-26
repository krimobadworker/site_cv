<?php include 'top.php'; ?>    

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
        header("location:utilisateur.php");
        exit();
        
    }//ferme ifisset suppr
}
?>

<?php require 'nav.html'; ?>

        <?php
              //affichage d'une seule info
        $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
        $resultat = $sql->fetch();
        echo '<div class="identite"> Bonjour ' .$resultat['prenom'].' '.$resultat['nom'].'<br/>
        </div><br><br>';
        ?>
         

 <!-- FORMULAIRE -->
            <div class="row">
                <form class="form-horizontal" method="POST" action="">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Civilité</label>
                    <div class="col-sm-6">
                      <input type="text" name="etat_civil" class="form-control" id="inputEmail3" value="<?= isset($resultat['etat_civil']) ? $resultat['etat_civil'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Prénom</label>
                    <div class="col-sm-6">
                      <input type="text" name="prenom" class="form-control" id="inputEmail3" value="<?= isset($resultat['prenom']) ? $resultat['prenom'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
                    <div class="col-sm-6">
                      <input type="text" name="nom" class="form-control" id="inputEmail3" value="<?= isset($resultat['nom']) ? $resultat['nom'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Adresse</label>
                    <div class="col-sm-6">
                      <input type="text" name="adresse" class="form-control" id="inputEmail3" value="<?= isset($resultat['adresse']) ? $resultat['adresse'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Ville</label>
                    <div class="col-sm-6">
                      <input type="text" name="ville" class="form-control" id="inputEmail3" value="<?= isset($resultat['ville']) ? $resultat['ville'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Code postal</label>
                    <div class="col-sm-6">
                      <input type="text" name="code_postal" class="form-control" id="inputEmail3" value="<?= isset($resultat['code_postal']) ? $resultat['code_postal'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6">
                      <input type="text" name="email" class="form-control" id="inputEmail3" value="<?= isset($resultat['email']) ? $resultat['email'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Téléphone</label>
                    <div class="col-sm-6">
                      <input type="text" name="telephone" class="form-control" id="inputEmail3" value="<?= isset($resultat['telephone']) ? $resultat['telephone'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Age</label>
                    <div class="col-sm-6">
                      <input type="text" name="age" class="form-control" id="inputEmail3" value="<?= isset($resultat['age']) ? $resultat['age'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">mdp</label>
                    <div class="col-sm-6">
                      <input type="text" name="mdp" class="form-control" id="inputEmail3" value="<?= isset($resultat['mdp']) ? $resultat['mdp'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Sexe</label>
                    <div class="col-sm-6">
                      <input type="text" name="sexe" class="form-control" id="inputEmail3" value="<?= isset($resultat['sexe']) ? $resultat['sexe'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Statut marital</label>
                    <div class="col-sm-6">
                      <input type="text" name="statut_marital" class="form-control" id="inputEmail3" value="<?= isset($resultat['statut_marital']) ? $resultat['statut_marital'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Date de naissance</label>
                    <div class="col-sm-6">
                      <input type="text" name="date_de_naissance" class="form-control" id="inputEmail3" value="<?= isset($resultat['date_de_naissance']) ? $resultat['date_de_naissance'] : null; ?>">
                    </div>
                  </div>
                    
                 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-default"></input>
                    </div>
                  </div>
                </form>
            </div><!-- end row -->      

         

          
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
//                if(empty($civilite) OR empty($prenom) OR empty($nom) OR empty($adresse) OR empty($ville) OR empty($code_postal) OR empty($email) OR empty($telephone) OR empty($age) OR empty($mdp) OR empty($sexe) OR empty($statut_marital) OR empty($date_de_naissance)){
//                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
//                    }

            ?>
          
<?php include 'bottom.php'; ?>

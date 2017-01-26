<?php include 'top.php'; ?>

<?php require 'nav.html'; ?>

        <?php
              //affichage d'une seule info
        $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
        $resultat = $sql->fetch();
        echo '<div class="identite"> Bonjour ' .$resultat['prenom'].' '.$resultat['nom'].'<br/>
        </div><br><br>';
        ?>
         


                <table class="table">
                        <td>
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
                        </td>
                  <a class="btn btn-default" role="button" href="modif_utilisateur.php?id_utilisateur=1">Modifier</a>
                </table>
  
<?php include 'bottom.php'; ?>
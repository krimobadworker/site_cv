<?php require '../connexion/connexion.php'; ?>

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
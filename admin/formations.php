<?php include 'top.php'; ?>

<?php 

    if(isset($_POST['titre_f'])){
        
        if($_POST['titre_f']!=''){
        
        $titre_f = addslashes($_POST['titre_f']);
        $sous_titre_f = addslashes($_POST['sous_titre_f']);
        $dates_f = addslashes($_POST['dates_f']);
        $description_f = addslashes($_POST['description_f']);
        $id_formation = $_POST['id_formation'];
        $pdoCV->exec("INSERT INTO t_formation VALUES(NULL, '$titre_f', '$sous_titre_f', '$dates_f', '$description_f', 1)");
        
            header("location:../admin/formations.php");
                    exit();
                }//on ferme le if
            }//on ferme le ifisset

//suppression d'une formation
    if(isset($_GET['id_formation'])){
        $supprimer= $_GET['id_formation'];
        $sql= " DELETE FROM t_formation WHERE id_formation='$supprimer' ";
        $pdoCV->query($sql);
        header("location:../admin/formations.php");
        exit();
        
    }//ferme ifisset suppr
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Formation</label>
                    <div class="col-sm-6">
                      <input type="text" name="titre_f" class="form-control" id="inputEmail3" value="<?= isset($resultat2['titre_f']) ? $resultat2['titre_f'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Titre</label>
                    <div class="col-sm-6">
                      <input type="text" name="sous_titre_f" class="form-control" id="inputEmail3" value="<?= isset($resultat2['sous_titre_f']) ? $resultat2['sous_titre_f'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-6">
                      <input type="text" name="dates_f" class="form-control" id="inputEmail3" value="<?= isset($resultat2['dates_f']) ? $resultat2['dates_f'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-6">
                      <input type="text" name="description_f" class="form-control" id="inputEmail3" value="<?= isset($resultat2['description_f']) ? $resultat2['description_f'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-default"></input>
                    </div>
                  </div>
                </form>

            <div class="row">
                <?php 
                  //recherche de plusieurs infos  
                $sql = $pdoCV->query("SELECT * FROM t_formation");
                $sql -> execute();
                $nb_comp= $sql->rowCount(); 
                ?>
                <div class="col-lg-6 col-lg-offset-2">
                    <table class="table table-bordered">
                        <tr>
                            <th>Formation</th>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <?php while ($resultat=$sql->fetch()){ ?>
                        <tr>
                            <td><?= $resultat['titre_f'] ?></td>
                            <td><?= $resultat['sous_titre_f'] ?></td>
                            <td><?= $resultat['dates_f'] ?></td>
                            <td><?= $resultat['description_f'] ?></td>
                            <td><a href="modif_formations.php?id_formation=<?= $resultat['id_formation']?>">modifier</a></td>
                            <td><a href="formations.php?id_formation=<?= $resultat['id_formation']?>">supprimer</a></td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
            </div><!-- end row -->
        </div><!-- end wrapper -->

            
<!-- FIN PAGE D'ACCUEIL -->


        <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['titre_f']))      $competence=$_POST['titre_f'];
                else      $titre_f="";
            
                if(isset($_POST['sous_titre_f']))      $niveau=$_POST['sous_titre_f'];
                else      $sous_titre_f="";

                if(isset($_POST['dates_f']))      $dates_f=$_POST['dates_f'];
                else      $dates_f="";

                if(isset($_POST['description_f']))      $description_f=$_POST['description_f'];
                else      $description_f="";

                // On vérifie si les champs sont vides
                //if(empty($competence) OR empty($niveau) OR empty($type)){
                    //echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    //}
            ?>

<?php include 'bottom.php'; ?> 


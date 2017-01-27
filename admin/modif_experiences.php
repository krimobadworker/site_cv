<?php include 'top.php'; ?>

  <?php
// UPDATE t_langue SET langue = $langue WHERE id_langue = $_GET['id_langue']
//modif d'une langue
    if(isset($_GET['id_experience'])){
        $id_experience = $_GET['id_experience'];
        $query = $pdoCV->query("SELECT experience, titre_e, dates, description FROM t_experiences WHERE id_experience = $id_experience");

        $resultat2 = $query->fetch();



    if($_POST){
        $id_experience= $_GET['id_experience'];
        $experience = addslashes($_POST['experience']);
        $titre_e = addslashes($_POST['titre_e']);
        $dates = addslashes($_POST['dates']);
        $description = addslashes($_POST['description']);

        $sql= " UPDATE t_experiences SET experience = '$experience',
                                    titre_e = '$titre_e',
                                    dates = '$dates',
                                    description = '$description'
                            WHERE id_experience = '$id_experience' ";

        $pdoCV->query($sql);
        header("location:experiences.php");
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Expérience</label>
                    <div class="col-sm-6">
                      <input type="text" name="experience" class="form-control" id="inputEmail3" value="<?= isset($resultat2['experience']) ? $resultat2['experience'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Titre</label>
                    <div class="col-sm-6">
                      <input type="text" name="titre_e" class="form-control" id="inputEmail3" value="<?= isset($resultat2['titre_e']) ? $resultat2['titre_e'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Dates</label>
                    <div class="col-sm-6">
                      <input type="text" name="dates" class="form-control" id="inputEmail3" value="<?= isset($resultat2['dates']) ? $resultat2['dates'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-6">
                      <input type="text" name="description" class="form-control" id="inputEmail3" value="<?= isset($resultat2['description']) ? $resultat2['description'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-default"></input>
                    </div>
                  </div>
                </form>

            </div><!-- end row -->
        
    
    <div class="row">
                <?php 
                  //recherche de plusieurs infos  
                $sql = $pdoCV->query("SELECT * FROM t_experiences");
                $sql -> execute();
                $nb_comp= $sql->rowCount(); 
                ?>
                <div class="col-lg-6 col-lg-offset-2">
                    <table class="table table-bordered">
                        <tr>
                            <th>Expérience</th>
                            <th>Titre</th>
                            <th>Dates</th>
                            <th>Description</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <?php while ($resultat=$sql->fetch()){ ?>
                        <tr>
                            <td><?= $resultat['experience'] ?></td>
                            <td><?= $resultat['titre_e'] ?></td>
                            <td><?= $resultat['dates'] ?></td>
                            <td><?= $resultat['description'] ?></td>
                            <td><a href="modif_experiences.php?id_experience=<?= $resultat['id_experience']?>">modifier</a></td>
                            <td><a href="experiences.php?id_experience=<?= $resultat['id_experience']?>">supprimer</a></td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
            </div><!-- end row -->
        </div><!-- end wrapper -->

            
<!-- FIN PAGE D'ACCUEIL -->


        <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['experience']))      $competence=$_POST['experience'];
                else      $experience="";
            
                if(isset($_POST['titre_e']))      $niveau=$_POST['titre_e'];
                else      $titre_e="";

                if(isset($_POST['dates']))      $type=$_POST['dates'];
                else      $dates="";

                if(isset($_POST['description']))      $type=$_POST['description'];
                else      $description="";

                // On vérifie si les champs sont vides
                //if(empty($competence) OR empty($niveau) OR empty($type)){
                    //echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    //}
            ?>
<?php include 'bottom.php'; ?>

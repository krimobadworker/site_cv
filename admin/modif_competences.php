<?php include 'top.php'; ?>

  <?php
// UPDATE t_langue SET langue = $langue WHERE id_langue = $_GET['id_langue']
//modif d'une langue
    if(isset($_GET['id_competence'])){
        $id_competence = $_GET['id_competence'];
        $query = $pdoCV->query("SELECT competence, niveau, type FROM t_competences WHERE id_competence = $id_competence");

        $resultat2 = $query->fetch();



    if($_POST){
        $id_competence= $_GET['id_competence'];
        $competence = addslashes($_POST['competence']);
        $niveau = addslashes($_POST['niveau']);
        $type = addslashes($_POST['type']);

        $sql= " UPDATE t_competences SET competence = '$competence',
                                    niveau = '$niveau',
                                    type = '$type'
                            WHERE id_competence = '$id_competence' ";

        $pdoCV->query($sql);
        header("location:competences.php");
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Compétence</label>
                    <div class="col-sm-6">
                      <input type="text" name="competence" class="form-control" id="inputEmail3" value="<?= isset($resultat2['competence']) ? $resultat2['competence'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="type">
                          <option disabled selected>-- Type --</option>
                          <option value="langage">Langage</option>
                          <option value="logiciel">Logiciel</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Niveau</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="niveau">
                          <option disabled selected>-- Niveau --</option>
                          <option value="10">10</option>
                          <option value="20">20</option>
                          <option value="30">30</option>
                          <option value="40">40</option>
                          <option value="50">50</option>
                          <option value="60">60</option>
                          <option value="70">70</option>
                          <option value="80">80</option>
                          <option value="90">90</option>
                          <option value="100">100</option>
                        </select>
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
                $sql = $pdoCV->query("SELECT * FROM t_competences");
                $sql -> execute();
                $nb_comp= $sql->rowCount(); 
                ?>
                <div class="col-lg-6 col-lg-offset-2">
                    <table class="table table-bordered">
                        <tr>
                            <th>Compétence</th>
                            <th>Type</th>
                            <th>Niveau</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <?php while ($resultat=$sql->fetch()){ ?>
                        <tr>
                            <td><?= $resultat['competence'] ?></td>
                            <td><?= $resultat['type'] ?></td>
                            <td><?= $resultat['niveau'] ?></td>
                            <td><a href="modif_competences.php?id_competence=<?= $resultat['id_competence']?>">modifier</a></td>
                            <td><a href="competences.php?id_competence=<?= $resultat['id_competence']?>">supprimer</a></td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
            </div><!-- end row -->
        </div><!-- end wrapper -->

            
<!-- FIN PAGE D'ACCUEIL -->


        <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['competence']))      $competence=$_POST['competence'];
                else      $competence="";
            
                if(isset($_POST['niveau']))      $niveau=$_POST['niveau'];
                else      $niveau="";

                if(isset($_POST['type']))      $type=$_POST['type'];
                else      $type="";

                // On vérifie si les champs sont vides
                //if(empty($competence) OR empty($niveau) OR empty($type)){
                    //echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    //}
            ?>

<?php include 'bottom.php'; ?>

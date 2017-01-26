<?php include 'top.php'; ?>
<?php 

    if(isset($_POST['competence'])){
        
        if($_POST['competence']!=''){
        
        $competence = addslashes($_POST['competence']);
        $niveau = addslashes($_POST['niveau']);
        $type = addslashes($_POST['type']);
        $id_competence = $_POST['id_competence'];
        $pdoCV->exec("INSERT INTO t_competences VALUES(NULL, '$competence', '$niveau', '$type')");
        
            header("location:../admin/competences.php");
                    exit();
                }//on ferme le if
            }//on ferme le ifisset

//suppression d'une competence
    if(isset($_GET['id_competence'])){
        $supprimer= $_GET['id_competence'];
        $sql= " DELETE FROM t_competences WHERE id_competence='$supprimer' ";
        $pdoCV->query($sql);
        header("location:../admin/competences.php");
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
                <form class="form-horizontal" method="POST" action="competences2.php">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Compétence</label>
                    <div class="col-sm-6">
                      <input type="text" name="competence" class="form-control" id="inputEmail3" placeholder="Compétence">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Type (langage ou logiciel)</label>
                    <div class="col-sm-6">
                      <input type="text" name="type" class="form-control" id="inputEmail3" placeholder="Type">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Niveau</label>
                    <div class="col-sm-6">
                      <input type="text" name="niveau" class="form-control" id="inputEmail3" placeholder="Niveau">
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
//                if(empty($competence) OR empty($niveau) OR empty($type)){
//                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
//                    }
            ?>

<?php include 'bottom.php'; ?>
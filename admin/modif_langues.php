<?php include 'top.php'; ?>

  <?php
// UPDATE t_langue SET langue = $langue WHERE id_langue = $_GET['id_langue']
//modif d'une langue
    if(isset($_GET['id_langue'])){
        $id_langue = $_GET['id_langue'];
        $query = $pdoCV->query("SELECT langue, niveau FROM t_langue WHERE id_langue = $id_langue");

        $resultat2 = $query->fetch();



    if($_POST){
        $id_langue= $_GET['id_langue'];
        $langue = addslashes($_POST['langue']);
        $niveau = addslashes($_POST['niveau']);

        $sql= " UPDATE t_langue SET langue = '$langue',
                                    niveau = '$niveau'
                            WHERE id_langue = '$id_langue' ";

        $pdoCV->query($sql);
        header("location:modif_langues.php");
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Langue</label>
                    <div class="col-sm-6">
                      <input type="text" name="langue" class="form-control" id="inputEmail3" value="<?= isset($resultat2['langue']) ? $resultat2['langue'] : null; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Niveau</label>
                    <div class="col-sm-6">
                      <input type="text" name="niveau" class="form-control" id="inputEmail3" value="<?= isset($resultat2['niveau']) ? $resultat2['niveau'] : null; ?>">
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
                $sql = $pdoCV->query("SELECT * FROM t_langue");
                $sql -> execute();
                $nb_lang= $sql->rowCount(); 
                ?>
                <div class="col-lg-6 col-lg-offset-2">
                    <table class="table table-bordered">
                        <tr>
                            <th>Langue</th>
                            <th>Niveau</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <?php while ($resultat=$sql->fetch()){ ?>
                        <tr>
                            <td><?= $resultat['langue'] ?></td>
                            <td><?= $resultat['niveau'] ?></td>
                            <td><a href="modif_langue.php?id_langue=<?= $resultat['id_langue']?>">modifier</a></td>
                            <td><a href="langues.php?id_langue=<?= $resultat['id_langue']?>">supprimer</a></td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
            </div><!-- end row -->
        </div><!-- end wrapper -->

            
<!-- FIN PAGE D'ACCUEIL -->


        <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['langue']))      $competence=$_POST['langue'];
                else      $langue="";
            
                if(isset($_POST['niveau']))      $niveau=$_POST['niveau'];
                else      $niveau="";

                // On vérifie si les champs sont vides
                //if(empty($competence) OR empty($niveau) OR empty($type)){
                    //echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    //}
            ?>

<?php include 'bottom.php'; ?>
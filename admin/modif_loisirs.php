<?php include 'top.php'; ?>

  <?php
// UPDATE t_langue SET langue = $langue WHERE id_langue = $_GET['id_langue']
//modif d'une langue
    if(isset($_GET['id_loisir'])){
        $id_loisir = $_GET['id_loisir'];
        $query = $pdoCV->query("SELECT loisir, fa_icon FROM t_loisir WHERE id_loisir = $id_loisir");

        $resultat2 = $query->fetch();



    if($_POST){
        $id_loisir= $_GET['id_loisir'];
        $loisir = addslashes($_POST['loisir']);
        $fa_icon = addslashes($_POST['fa_icon']);
        
        $sql= " UPDATE t_loisir SET loisir = '$loisir',
                                    fa_icon = '$fa_icon'
                            WHERE id_loisir = '$id_loisir' ";

        $pdoCV->query($sql);
        header("location:loisirs.php");
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Loisir</label>
                    <div class="col-sm-6">
                      <input type="text" name="loisir" class="form-control" id="inputEmail3" value="<?= isset($resultat2['loisir']) ? $resultat2['loisir'] : null; ?>">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Icon (font-awesome)</label>
                    <div class="col-sm-6">
                      <input type="text" name="fa_icon" class="form-control" id="inputEmail3" value="<?= isset($resultat2['fa_icon']) ? $resultat2['fa_icon'] : null; ?>">
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
                $sql = $pdoCV->query("SELECT * FROM t_loisir");
                $sql -> execute();
                $nb_comp= $sql->rowCount(); 
                ?>
                <div class="col-lg-6 col-lg-offset-2">
                    <table class="table table-bordered">
                        <tr>
                            <th>Loisir</th>
                            <th>Icon</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <?php while ($resultat=$sql->fetch()){ ?>
                        <tr>
                            <td><?= $resultat['loisir'] ?></td>
                            <td><?= $resultat['fa_icon'] ?></td>
                            <td><a href="modif_loisirs.php?id_loisir=<?= $resultat['id_loisir']?>">modifier</a></td>
                            <td><a href="loisirs.php?id_loisir=<?= $resultat['id_loisir']?>">supprimer</a></td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
            </div><!-- end row -->
        </div><!-- end wrapper -->

            
<!-- FIN PAGE D'ACCUEIL -->


        <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['loisir']))      $loisir=$_POST['loisir'];
                else      $loisir="";
    
                if(isset($_POST['fa_icon']))      $fa_icon=$_POST['fa_icon'];
                else      $fa_icon="";
            
            

                // On vérifie si les champs sont vides
//                if(empty($competence) OR empty($niveau) OR empty($type)){
//                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
//                    }
            ?>

<?php include 'bottom.php'; ?>

<?php require '../connexion/connexion.php'; ?>

<?php 

    if(isset($_POST['loisir'])){
        
        if($_POST['loisir']!=''){
        
        $loisir = addslashes($_POST['loisir']);
        $id_loisir = $_POST['id_loisir'];
        $pdoCV->exec("INSERT INTO t_loisir VALUES(NULL, '$loisir', '1')");
        
            header("location:../admin/loisirs.php");
                    exit();
                }//on ferme le if
            }//on ferme le ifisset

//suppression d'un loisir
    if(isset($_GET['id_loisir'])){
        $supprimer= $_GET['id_loisir'];
        $sql= " DELETE FROM t_loisir WHERE id_loisir='$supprimer' ";
        $pdoCV->query($sql);
        header("location:../admin/loisirs.php");
        exit();
        
    }//ferme ifisset suppr

      $ligne_loisir = $sql->fetch();
?>

<?php require '../inc/head.inc.php'; ?>

        <body>
            <header>
              </header>

              <div id="mainContent">
              <h1 id="espaceAdmin">Espace administratif du site CV: loisirs</h1>
            <?php
                  //affichage d'une seule info
            $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
            $resultat = $sql->fetch();
            echo '<div class="identite"> Bonjour ' .$resultat['prenom'].' '.$resultat['nom'].'<br/>
            </div>';
            ?>

        
              </div><br><br>
            
<?php 
              //recherche de plusieurs infos  
            $sql = $pdoCV->query("SELECT * FROM t_loisir");
            $sql -> execute();
            $nb_loisir= $sql->rowCount(); 
            ?>
            
            <?php
            while ($resultat=$sql->fetch()){
                echo $resultat['loisir'].' <a href="modif_loisirs.php?id_loisir='. $resultat['id_loisir'].'">modifier</a> <a href="loisirs.php?id_loisir='. $resultat['id_loisir'].'">supprimer</a> <br>';
            }
            
            ?>
            
<!--Formulaire d'insertion de loisir-->
            
            
            <form method="POST" action="loisirs.php">
                
                    <input type="text" name="loisir" size="20"  maxlength="35"><br>
                    
                    <input type="submit" value="Envoyer" name="envoyer">
                
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['loisir']))      $loisir=$_POST['loisir'];
                else      $loisir="";



                // On vérifie si les champs sont vides
                if(empty($loisir)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
            
            
            
         

            
        </body>
    </html>
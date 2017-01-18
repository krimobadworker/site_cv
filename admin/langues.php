<?php require '../connexion/connexion.php'; ?>

<?php 
//insertion d'une nouvelle langue
    if(isset($_POST['langue'])){//premier name du formulaire
        
        if($_POST['langue']!='' && $_POST['niveau']!=''){// n'est pas vide
        
        $langue = addslashes($_POST['langue']);
        $niveau = addslashes($_POST['niveau']);
        $pdoCV->exec("INSERT INTO t_langue VALUES (NULL, '$langue', '$niveau')");
        
            header("location:../admin/langues.php");
                    exit();
                }//on ferme le if
            }//on ferme le ifisset

//suppression d'une langue
    if(isset($_GET['id_langue'])){
        $supprimer= $_GET['id_langue'];
        $sql= " DELETE FROM t_langue WHERE id_langue='$supprimer' ";
        $pdoCV->query($sql);
        header("location:../admin/langues.php");
        exit();
        
    }//ferme ifisset suppr

?>




<?php require '../inc/head.inc.php'; ?>

        <body>
            <header>
              </header>

              <div id="mainContent">
              <h1 id="espaceAdmin">Espace administratif du site CV: langues</h1>
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
            $sql = $pdoCV->query("SELECT * FROM t_langue");
            $sql -> execute();
            $nb_lang= $sql->rowCount(); 
            ?>
            
            <?php
            while ($resultat=$sql->fetch()){
                echo $resultat['langue'].' '.$resultat['niveau'].' <a href="modif_langues.php?id_langue='. $resultat['id_langue'].'">modifier</a> <a href="langues.php?id_langue='. $resultat['id_langue'].'">supprimer</a> <br>';
            }
            
            ?>
            
<!--Formulaire d'insertion de langue-->
            
            
            <form method="POST" action="langues.php">
                
                    <input type="text" name="langue" size="20"  maxlength="35">
                    <input type="text" name="niveau" size="20"  maxlength="35"><br>
                    <input type="submit" value="Envoyer" name="envoyer">
                
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['langue']))      $langue=$_POST['langue'];
                else      $langue="";
            
                if(isset($_POST['niveau']))      $niveau=$_POST['niveau'];
                else      $niveau="";



                // On vérifie si les champs sont vides
                if(empty($langue) OR empty($niveau)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
            
            
            
         

            
        </body>
    </html>
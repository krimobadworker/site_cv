<?php require '../connexion/connexion.php'; ?>

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
        header("location:../admin/langues.php");
        exit();
        
    }//ferme ifisset suppr
}
?>
<?php require '../inc/head.inc.php'; ?>

            

            
<!--Formulaire d'insertion de langue-->
            
            
            <form method="POST" action="">
                
                    <input type="text" name="langue" size="20"  maxlength="35" value="<?php echo $resultat2['langue'] ?>">
                    <input type="text" name="niveau" size="20"  maxlength="35" value="<?php echo $resultat2['niveau'] ?>"><br>
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
<?php require '../connexion/connexion.php'; ?>

<?php
     
     // UPDATE t_langue SET langue = $langue WHERE id_langue = $_GET['id_langue']
//modif d'une langue

    if(isset($_GET['id_formation'])){
        $id_formation = $_GET['id_formation'];
        $query = $pdoCV->query("SELECT titre_f, sous_titre_f, dates_f, description_f FROM t_formation WHERE id_formation = $id_formation");
        
        $resultat2 = $query->fetch();
        
        
    
    if($_POST){
        $id_formation= $_GET['id_formation'];
        $titre_f = addslashes($_POST['titre_f']);
        $sous_titre_f = addslashes($_POST['sous_titre_f']);
        $dates_f = addslashes($_POST['dates_f']);
        $description_f = addslashes($_POST['description_f']);
        
        $sql= " UPDATE t_formation SET titre_f = '$titre_f',
                                    sous_titre_f = '$sous_titre_f',
                                    dates_f = '$dates_f',
                                    description_f = '$description_f'
                                    WHERE id_formation = '$id_formation' ";
        
        $pdoCV->query($sql);
        header("location:../admin/formations.php");
        exit();
        
    }//ferme ifisset suppr
}
?>
<?php require '../inc/head.inc.php'; ?>

            

            
<!--Formulaire d'insertion de langue-->
            
            
            <form method="POST" action="">
                
                    <input type="text" name="titre_f" size="20"  maxlength="35" value="<?php echo $resultat2['titre_f'] ?>">
                    <input type="text" name="sous_titre_f" size="20"  maxlength="35" value="<?php echo $resultat2['sous_titre_f'] ?>"><br>
                    <input type="text" name="dates_f" size="20"  maxlength="70" value="<?php echo $resultat2['dates_f'] ?>">
                    <input type="text" name="description_f" size="20"  maxlength="70" value="<?php echo $resultat2['description_f'] ?>"><br>
                    <input type="submit" value="Envoyer" name="envoyer">
                
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['titre_f']))      $nom=$_POST['titre_f'];
                else      $titre_f="";

                if(isset($_POST['sous_titre_f']))      $prenom=$_POST['sous_titre_f'];
                else      $sous_titre_f="";

                if(isset($_POST['dates_f']))      $email=$_POST['dates_f'];
                else      $dates_f="";

                if(isset($_POST['description_f']))      $icq=$_POST['description_f'];
                else      $description_f="";

                // On vérifie si les champs sont vides
                if(empty($titre_f) OR empty($sous_titre_f) OR empty($dates_f) OR empty($description_f)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
 
            
            
         

            
        </body>
    </html>



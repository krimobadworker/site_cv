<?php require '../connexion/connexion.php'; ?>

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
        header("location:../admin/experiences.php");
        exit();
        
    }//ferme ifisset suppr
}
?>
<?php require '../inc/head.inc.php'; ?>

            

            
<!--Formulaire d'insertion de langue-->
            
            
            <form method="POST" action="">
                
                    <input type="text" name="experience" size="20"  maxlength="35" value="<?php echo $resultat2['experience'] ?>">
                    <input type="text" name="titre_e" size="20"  maxlength="35" value="<?php echo $resultat2['titre_e'] ?>"><br>
                    <input type="text" name="dates" size="20"  maxlength="70" value="<?php echo $resultat2['dates'] ?>">
                    <input type="text" name="description" size="20"  maxlength="70" value="<?php echo $resultat2['description'] ?>"><br>
                    <input type="submit" value="Envoyer" name="envoyer">
                
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['experience']))      $nom=$_POST['experience'];
                else      $experience="";

                if(isset($_POST['titre_e']))      $prenom=$_POST['titre_e'];
                else      $titre_e="";

                if(isset($_POST['dates']))      $email=$_POST['dates'];
                else      $dates="";

                if(isset($_POST['description']))      $icq=$_POST['description'];
                else      $description="";

                // On vérifie si les champs sont vides
                if(empty($experience) OR empty($titre_e) OR empty($dates) OR empty($description)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
 
            
            
         

            
        </body>
    </html>








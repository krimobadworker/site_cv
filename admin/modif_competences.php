<?php require '../connexion/connexion.php'; ?>

<?php
     
     // UPDATE t_langue SET langue = $langue WHERE id_langue = $_GET['id_langue']
//modif d'une langue

    if(isset($_GET['id_competence'])){
        $id_competence = $_GET['id_competence'];
        $query = $pdoCV->query("SELECT competence, niveau FROM t_competences WHERE id_competence = $id_competence");
        
        $resultat2 = $query->fetch();
        
        
    
    if($_POST){
        $id_competence= $_GET['id_competence'];
        $competence = addslashes($_POST['competence']);
        $niveau = addslashes($_POST['niveau']);
        
        $sql= " UPDATE t_competences SET competence = '$competence',
                                    niveau = '$niveau'
                                    WHERE id_competence = '$id_competence' ";
        
        $pdoCV->query($sql);
        header("location:../admin/competences.php");
        exit();
        
    }//ferme ifisset suppr
}
?>
<?php require '../inc/head.inc.php'; ?>

            

            
<!--Formulaire d'insertion de langue-->
            
            
            <form method="POST" action="">
                
                    <input type="text" name="competence" size="20"  maxlength="35" value="<?php echo $resultat2['competence'] ?>">
                    <input type="text" name="niveau" size="20"  maxlength="35" value="<?php echo $resultat2['niveau'] ?>"><br>
                    <input type="submit" value="Envoyer" name="envoyer">
                
            </form>
            
            <?php
            
            // On commence par récupérer les champs
                if(isset($_POST['competence']))      $langue=$_POST['competence'];
                else      $competence="";
            
                if(isset($_POST['niveau']))      $niveau=$_POST['niveau'];
                else      $niveau="";         



                // On vérifie si les champs sont vides
                if(empty($competence) OR empty($niveau)){
                    echo '<font color="red">Attention, aucun champ ne peut rester vide !</font>';
                    }

            ?>
            
            
            
            
         

            
        </body>
    </html>
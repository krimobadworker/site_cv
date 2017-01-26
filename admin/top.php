<?php
    $pdoCV = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ));
?>
<?php

    session_start();

    if(isset($_SESSION['connexion'])&& $_SESSION['connexion'] == 'connecté') {
        $id_utilisateur=$_SESSION['id_utilisateur'];
        $prenom=$_SESSION['prenom'];
        $nom=$_SESSION['nom'];
    }else{
        header('location:authentification.php');
    }

    if (isset($_GET['deconnect'])) {
        $_SESSION['connexion']='';
        $_SESSION['id_utilisateur']='';
        $_SESSION['prenom']='';
        $_SESSION['nom']='';

        unset($_SESSION['connexion']);

        session_destroy();

        header('location:../front/index.php');
    }
?>

<?php 
  //EXPERIENCE  
    $sql_exp = $pdoCV->query("SELECT * FROM t_experiences");
    $sql_exp -> execute();
    $nb_exp= $sql_exp->rowCount(); 
?>
<?php 
  //FORMATION  
    $sql_forma = $pdoCV->query("SELECT * FROM t_formation");
    $sql_forma -> execute();
    $nb_forma= $sql_forma->rowCount(); 
?>
<?php 
  //LANGUES  
    $sql_lang = $pdoCV->query("SELECT * FROM t_langue");
    $sql_lang -> execute();
    $nb_lang= $sql_lang->rowCount(); 
?>
<?php 
  //LANGUES  
    $sql_lois = $pdoCV->query("SELECT * FROM t_loisir");
    $sql_lois -> execute();
    $nb_lois= $sql_lois->rowCount(); 
?>
<?php 
  //COMPETENCES LANGAGE
    $sql_comp1 = $pdoCV->query("SELECT * FROM t_competences WHERE type='langage'");
    $sql_comp1 -> execute();
    $nb_comp1= $sql_comp1->rowCount(); 
?>
<?php 
  //COMPETENCES LOGICIEL
    $sql_comp2 = $pdoCV->query("SELECT * FROM t_competences WHERE type='logiciel'");
    $sql_comp2 -> execute();
    $nb_comp2= $sql_comp2->rowCount(); 
?>


<?php
$pdoCV = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));
?>

<?php 

//affichage d'une seule info
$sql = $pdoCV->query("SELECT * FROM t_utilisateur");
            $resultat = $sql->fetch();

?>
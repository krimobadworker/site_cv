<a href="../admin/index.php">HOME</a>


<?php


$pdoCV = new PDO('mysql:host=localhost;dbname=site_cv', 'root', '', array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
))

;
?>


<?php require '../connexion/connexion2.php'; ?>

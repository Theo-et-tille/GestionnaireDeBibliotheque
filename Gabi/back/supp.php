<?php
echo "test valide";
$bdd = new PDO('mysql:host=localhost:8889;dbname=tp1;charset=utf8'
    ,
    'root',
    'root');
session_start();
$reqSup = $bdd->prepare("DELETE FROM inscrit WHERE id_inscrit = :id_inscrit");
$reqSup->execute(array(
    "id_inscrit" => $_SESSION['id_user']));

session_destroy();
header("Location: ../front/inscription.php");
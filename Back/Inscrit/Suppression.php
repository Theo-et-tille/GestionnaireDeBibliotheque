<?php

$bdd = include "../../BDD/BDD.php";

session_start();


$reqSup = $bdd->prepare("DELETE FROM inscrit WHERE id_inscrit = :id_inscrit");
$reqSup->execute(array(
    "id_inscrit" => $_SESSION['id_user']
));
session_destroy();
header("Location: ../../index.php?supp=ok");

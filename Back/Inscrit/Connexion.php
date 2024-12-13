<?php
$bdd = include "../../BDD/BDD.php";
session_start();

if ($_POST != NULL) {
    $email = $_POST['emailc'];
    $mdp = $_POST['mdpc'];

    $reqConnexion = $bdd->prepare('SELECT id_inscrit,prenom,role FROM inscrit WHERE email = :email AND mdp = :mdp');
    $reqConnexion->execute(array('email' => $email, 'mdp' => $mdp));
    $resConnexion = $reqConnexion->fetch();

    if (!$resConnexion) {
        header("Location:../Front/PageConnexion.php?error= Fail");
    }else {
        $_SESSION['id_user'] = $resConnexion['id_inscrit'];
        $_SESSION['role'] = $resConnexion['role'];
        $_SESSION['user'] = $resConnexion['prenom'];
        header("Location: ../../Front/PageMembre.php");
    }
}

if (isset($_POST['Deconnexion'])){
    session_destroy();
    header("Location: ../../index.php");
}
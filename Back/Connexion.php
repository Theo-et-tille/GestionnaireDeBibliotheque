<?php
//$bdd = include "../BDD/BDD.php";
$bdd = new PDO('mysql:host=localhost;dbname=sle_biblio_structure;charset=utf8', 'root');
session_start();

if ($_POST != NULL) {
    $email = $_POST['emailc'];
    $mdp = $_POST['mdpc'];

    $reqConnexion = $bdd->prepare('SELECT * FROM inscrit WHERE email = :email AND mdp = :mdp');
    $reqConnexion->execute(array('email' => $email, 'mdp' => $mdp));
    $resConnexion = $reqConnexion->fetch();

    if (!$resConnexion) {
        header("Location:../Front/PageConnexion.php?error= Fail");
    }else {
        $_SESSION['id_user'] = $resConnexion['id_inscrit'];
        $_SESSION['user'] = $resConnexion['prenom'];
        header("Location: ../Front/PageMembre.php");
    }
}

if (isset($_POST['Deconnexion'])){
    session_destroy();
    header("Location: ../index.php");
}




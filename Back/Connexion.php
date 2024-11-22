<?php

$bdd = new PDO('mysql:host=localhost;dbname=sle_biblio_structure;charset=utf8', 'root');

$email = $_POST['emailc'];
$mdp = $_POST['mdpc'];

$reqConnexion = $bdd->prepare('SELECT * FROM inscrit WHERE email = :email AND mdp = :mdp');
$reqConnexion->execute(array('email' => $email, 'mdp' => $mdp));
$resConnexion = $reqConnexion->fetch();


if (!$resConnexion) {
    echo "rater";
}else{
    session_start();
    $_SESSION['user'] = $resConnexion['email'];
    header("Location: ../HTML/PageMembre.html");
}
<?php

$bdd = new PDO('mysql:host=localhost:8889;dbname=tp1;charset=utf8'
    ,
    'root',
    'root');
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$tel_fixe = $_POST['tel_fixe'];
$tel_portable = $_POST['tel_portable'];
$rue = $_POST['rue'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];
$mdp = $_POST['mdp'];

$reqModif = $bdd->prepare('UPDATE inscrit SET nom = :nom, prenom = :prenom, email = :email, tel_fixe = :tel_fixe, tel_portable = :tel_portable, rue = :rue, cp = :cp, ville = :ville, mdp = :mdp WHERE id_inscrit = :id_inscrit');
$reqModif->execute(array(
    "nom" => $nom,
    "prenom" => $prenom,
    "email" => $email,
    "tel_fixe" => $tel_fixe,
    "tel_portable" => $tel_portable,
    "rue" => $rue,
    "cp" => $cp,
    "ville" => $ville,
    "mdp" => $mdp,
    "id_inscrit" => $_SESSION['id_user']
));
header('Location: ../front/modification.php');


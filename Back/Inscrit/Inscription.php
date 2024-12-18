<?php
$bdd = include "../../BDD/BDD.php";

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['emaili'];
$tel_fixe = $_POST['tel_fixe'];
$tel_portable = $_POST['tel_portable'];
$rue = $_POST['rue'];
$cp = $_POST['cp'];
$ville = $_POST['ville'];
$mdp = $_POST['mdpi'];

$reqVerif = $bdd->prepare('SELECT * FROM inscrit WHERE email = :email');
$reqVerif->execute(array('email' => $email));
$resVerif = $reqVerif->fetch();

if (!$resVerif) {
    $req = $bdd->prepare('INSERT INTO inscrit(nom,prenom,email,tel_fixe,tel_portable,rue,cp,ville,mdp) VALUES(:nom,:prenom,:email,:tel_fixe,:tel_portable,:rue,:cp,:ville,:mdp)');
    $req->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'tel_fixe' => $tel_fixe,
        'tel_portable' => $tel_portable,
        'rue' => $rue,
        'cp' => $cp,
        'ville' => $ville,
        'mdp' => $mdp
    ));
    header('Location: ../../Front/PageConnexion.php?Inscrit=true');
}else{
    header("Location: ../../Front/PageInscription.php?error= Email Deja Cree");
}
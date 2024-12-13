<?php
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: ../../index.php');
    if (!isset($_POST)) {
        header('Location: ../../index.php');
    }
}

$bdd = include "../../BDD/BDD.php";

if (isset($_POST['id'])){
    $_SESSION['idModifAdmin'] = $_POST['id'];
}

if (isset($_POST['ModificationP'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel_fixe = $_POST['tel_fixe'];
    $tel_portable = $_POST['tel_portable'];
    $rue = $_POST['rue'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];

    $reqVerif = $bdd->prepare('SELECT email FROM inscrit WHERE email = :email');
    $reqVerif->execute(array('email' => $email));
    $resVerif = $reqVerif->fetch();

    $reqEmail = $bdd->prepare('SELECT email FROM inscrit WHERE id_inscrit = :id_inscrit');
    $reqEmail->execute(array('id_inscrit' => $_POST['id']));
    $resEmail = $reqEmail->fetch();

    if ($resEmail['email'] == $email || !$resVerif) {
        $reqModif = $bdd->prepare('UPDATE inscrit SET nom = :nom, prenom = :prenom, email = :email, tel_fixe = :tel_fixe, tel_portable = :tel_portable, rue = :rue, cp = :cp, ville = :ville WHERE id_inscrit = :id_inscrit');
        $reqModif->execute(array(
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "tel_fixe" => $tel_fixe,
            "tel_portable" => $tel_portable,
            "rue" => $rue,
            "cp" => $cp,
            "ville" => $ville,
            "id_inscrit" => $_POST['id']
        ));
        header('Location: ../../Front/PageModificationAdmin.php?Modif=1');
    } else {
        echo "rater";
        header('Location: ../../Front/PageModificationAdmin.php?error=1');
    }
}

if (isset($_POST['ModificationMDP'])) {
    $ancienMdp = $_POST['Ancienmdp'];
    $NouveauMdp = $_POST['Nouveaumdp'];

    $reqMdp = $bdd->prepare('SELECT mdp FROM inscrit WHERE id_inscrit = :id_inscrit');
    $reqMdp->execute(array('id_inscrit' => $_POST['id']));
    $resMdp = $reqMdp->fetch();

    if ($resMdp['mdp'] == $ancienMdp) {
        $reqModif = $bdd->prepare('UPDATE inscrit SET mdp = :mdp WHERE id_inscrit = :id_inscrit');
        $reqModif->execute(array(
            "mdp" => $NouveauMdp,
            "id_inscrit" => $_POST['id']
        ));
        header('Location: ../../Front/PageModification.php?ModifMDP=1');
    } else {
        header('Location: ../../Front/PageModification.php?errorMDP=1');
    }
}


if(isset($_POST['Supp'])) {
    $reqSup = $bdd->prepare("DELETE FROM inscrit WHERE id_inscrit = :id_inscrit");
    $reqSup->execute(array(
        "id_inscrit" => $_POST['id']
    ));
    header('Location: ../../Front/PageAdmin.php?Supp=1');
}
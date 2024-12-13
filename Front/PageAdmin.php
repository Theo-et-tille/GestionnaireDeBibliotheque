<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Admin</title>
</head>
<body>
<form action="PageMembre.php">
    <input type="submit" value="Page Membre">
</form>
<?php
session_start();
$bdd = include "../BDD/BDD.php";

if(isset($_SESSION['role'])) {
    $reqAllProfil = $bdd->prepare('SELECT * FROM inscrit');
    $reqAllProfil->execute();
    $tabAllProfil = $reqAllProfil->fetchall();
    echo "<table>";
    foreach ($tabAllProfil as $profil) {
        echo "
            <tr>
                <td>$profil[id_inscrit]</td>
                <td>$profil[nom]</td>
                <td>$profil[prenom]</td>
                <td>$profil[email]</td>
                <td>$profil[tel_fixe]</td>
                <td>$profil[tel_portable]</td>
                <td>$profil[rue], $profil[cp], $profil[ville]</td>
                <td><form action='../Back/Inscrit/ModifSuppProfilAdmin.php' method='post'><input type='submit' name='Supp' value='Suppression'><input type='hidden' name='id' value='$profil[id_inscrit]'></form></td>
                <td><form action='PageModificationAdmin.php' method='post'><input type='submit' name='Modif' value='Modification'><input type='hidden' name='id' value='$profil[id_inscrit]'></form></td>
            </tr>    
            ";
    }
    echo "</table>";
    if (isset($_GET['Supp'])) {
        echo "La suppresion du profil ID:", $_SESSION['idModifAdmin'], " a été executer";
    }
}else{
    header('location: ../index.php');
}?>
</body>
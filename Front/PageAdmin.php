<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['mode'])) {
    $_SESSION['mode'] = 0;
}
if ($_SESSION['mode'] == 0) {
    echo '<html lang="fr" data-bs-theme="dark">';
}else{
    echo '<html lang="fr">';
} ?>
<head>
    <meta charset="UTF-8">
    <title>Page Admin</title>
    <?php require "../Back/import.html"?>
</head>
<body>
<form action="PageMembre.php">
    <input type="submit" value="Page Membre">
</form>
<?php
$bdd = include "../BDD/BDD.php";

if(isset($_SESSION['role'])) {
    $reqAllProfil = $bdd->prepare('SELECT * FROM inscrit');
    $reqAllProfil->execute();
    $tabAllProfil = $reqAllProfil->fetchall();
    $reqAllProfil->closeCursor();

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

    $reqAllAuteur = $bdd->prepare('SELECT * FROM auteur');
    $reqAllAuteur->execute();
    $tabAllAuteur = $reqAllAuteur->fetchall();
    $reqAllAuteur->closeCursor();

    echo "
    <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search for names..' title='Type in a name'>
    <table id='myTable'>";
    foreach ($tabAllAuteur as $auteur) {
        echo "
            <tr>
                <td>$auteur[id_auteur]</td>
                <td>$auteur[nom]</td>
                <td>$auteur[prenom]</td>
                <td>$auteur[date_naissance]</td>
                <td>$auteur[ref_pays]</td>
                <td><form action='../Back/Auteur/Suppression.php' method='post'><input type='submit' name='Supp' value='Suppression'><input type='hidden' name='id' value='$profil[id_inscrit]'></form></td>
                <td><form action='PageAjoutModifAuteur.php' method='post'><input type='submit' name='Modif' value='Modification'><input type='hidden' name='id' value='$profil[id_inscrit]'></form></td>
            </tr>    
            ";
    }
    if (isset($_GET['Supp'])) {
        echo "La suppresion du profil ID:", $_SESSION['idModifAdmin'], " a été executer";
    }
}else{
    header('location: ../index.php');
}?>
<script>
    function myFunction() {
        var input, filter, table, tr, id, nom, prenom, dateNaissance, i, idValue,nomValue, prenomValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            id = tr[i].getElementsByTagName("td")[0];
            nom = tr[i].getElementsByTagName("td")[1];
            prenom = tr[i].getElementsByTagName("td")[2];
            if (id && nom && prenom) {
                idValue = id.textContent || id.innerText;
                nomValue = nom.textContent || nom.innerText;
                prenomValue = prenom.textContent || prenom.innerText;
                if (idValue.toUpperCase().indexOf(filter) > -1 || nomValue.toUpperCase().indexOf(filter) > -1 || prenomValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
</html>
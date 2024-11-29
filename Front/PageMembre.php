<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Membre</title>
</head>
<?php
// role admin = 0 role membre = 1
session_start();
?>
<body>
<p>Bienvenue <?=$_SESSION['user']?></p>
<form action="../Back/Connexion.php" method="post">
    <input type="submit" name="Deconnexion" value="Déconnexion">
</form>
<br>
<form action="../index.php">
    <input type="submit" value="Page d'accueil">
</form>
<br>
<form action="../Back/ModificationProfil.php" method="post">
<table>
    <tr>
        <th>
            <h3>Modifie ton profil</h3>
        </th>
    </tr>
    <tr>
        <td>
            <label for="nom"> Nom : </label>
            <input type="text" id="nom" name="nom" max="50">
        </td>
    </tr>
    <tr>
        <td>
            <label for="prenom"> Prenom : </label>
            <input type="text" id="prenom" name="prenom" max="50">
        </td>
    </tr>
    <tr>
        <td>
            <label for="emaili"> Mail : </label>
            <input type="email" id="emaili" name="emaili" max="100">
        </td>
    </tr>
    <tr>
        <td>
            <label for="tel_fixe"> Téléphone fixe : </label>
            <input type="text" id="tel_fixe" name="tel_fixe" max="15">
        </td>
    </tr>
    <tr>
        <td>
            <label for="tel_portable"> Téléphone portable : </label>
            <input type="text" id="tel_portable" name="tel_portable" max="15">
        </td>
    </tr>
    <tr>
        <td>
            <label for="rue">Rue : </label>
            <input type="text" id="rue" name="rue" max="80">
        </td>
    </tr>
    <tr>
        <td>
            <label for="cp">Code postal : </label>
            <input type="text" id="cp" name="cp" max="5">
        </td>
    </tr>
    <tr>
        <td>
            <label for="ville">Ville : </label>
            <input type="text" id="ville" name="ville" max="50">
        </td>
    </tr>
    <tr>
        <td>
            <label for="mdpi">Mot de passe : </label>
            <input type="password" id="mdpi" name="mdpi" max="50" required>
        </td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="Modification" value="Modifier">
        </td>
    </tr>
</table>
</form>
</body>
</html>
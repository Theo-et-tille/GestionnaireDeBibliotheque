<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Inscription</h2>
<form action="../back/insc.php" method="post">
    <table>
        <tr>
            <td>Prénom :</td>
            <td><input type="text" name="prenom" required></td>
        </tr>
        <tr>
            <td>Nom :</td>
            <td><input type="text" name="nom" required></td>
        </tr>
        <tr>
            <td>Email :</td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>Téléphone fixe :</td>
            <td><input type="text" name="fixe" required></td>
        </tr>
        <tr>
            <td>Téléphone portable :</td>
            <td><input type="text" name="portable" required></td>
        </tr>
        <tr>
            <td>Rue :</td>
            <td><input type="text" name="rue" required></td>
        </tr>
        <tr>
            <td>Code postal :</td>
            <td><input type="text" name="cp" required></td>
        </tr>
        <tr>
            <td>Ville :</td>
            <td><input type="text" name="ville" required></td>
        </tr>
        <tr>
            <td>Mot de passe :</td>
            <td><input type="password" name="mdp" required></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Inscription"></td>
        </tr>
    </table>
</form>
</body>
</html>

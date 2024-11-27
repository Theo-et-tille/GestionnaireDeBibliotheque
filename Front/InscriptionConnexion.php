<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<?php
session_start();
if (isset($_SESSION['id_user'])) {
    header('Location: Back/PageMembre.php');
}
?>
<body>
<form action="../Back/Inscription.php" method="post">
    <table>
        <tr>
            <td>
                <label for="nom"> Nom : </label>
                <input type="text" id="nom" name="nom" max="50" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="prenom"> Prenom : </label>
                <input type="text" id="prenom" name="prenom" max="50" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="emaili"> Mail : </label>
                <input type="email" id="emaili" name="emaili" max="100" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="tel_fixe"> Téléphone fixe : </label>
                <input type="text" id="tel_fixe" name="tel_fixe" max="15" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="tel_portable"> Téléphone portable : </label>
                <input type="text" id="tel_portable" name="tel_portable" max="15" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="rue">Rue : </label>
                <input type="text" id="rue" name="rue" max="80" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="cp">Code postal : </label>
                <input type="text" id="cp" name="cp" max="5" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="ville">Ville : </label>
                <input type="text" id="ville" name="ville" max="50" required>
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
                <?php
                if (isset($_GET['error'])) {
                    echo"<p>Le compte existe déjà</p>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="Inscription" value="S'inscire">
            </td>
        </tr>
    </table>
</form>
<hr>
<form action="../Back/Connexion.php" method="post">
    <table>
        <tr>
            <td>
                <label for="emailc"> Mail : </label>
                <input type="email" id="emailc" name="emailc" max="100" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="mdpc">Mot de passe : </label>
                <input type="password" id="mdpc" name="mdpc" max="50" required>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                if (isset($_GET['error'])) {
                    echo"<p>Email ou Mot de Passe Incorrect ou compte inexistant</p>";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="Connection" value="Connexion">
            </td>
        </tr>
    </table>
</form>

</body>
</html>
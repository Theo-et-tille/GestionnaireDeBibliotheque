<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<?php
session_start();
if (isset($_SESSION['id_user'])) {
    header('Location: ../Front/PageMembre.php');
}
?>
<body>
<form action="../Back/Inscrit/Connexion.php" method="post">
    <table>
        <tr>
            <td>
                <?php
                if (isset($_GET['Inscrit'])) {
                    echo "
                    <p>Tu t'es bien inscrit tu peux, tu peux te connecter</p>
                    ";
                }
                ?>
            </td>
        </tr>
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
<br>
<form action="../index.php">
    <input type="submit" value="Page d'accueil">
</form>
</body>
</html>
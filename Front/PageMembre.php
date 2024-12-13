<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Membree</title>
</head>
<?php
session_start();
?>
<body>
<p>Bienvenue <?=$_SESSION['user']?></p>
<table>
    <tr>
        <td>
            <form action="../Back/Inscrit/Connexion.php" method="post">
                <input type="submit" name="Deconnexion" value="Déconnexion">
            </form>
        </td>
        <td>
            <form action="../Back/Inscrit/Suppression.php" method="post">
                <input type="submit" name="sup" value="Supprimmer mon compte">
            </form>

        </td>
    </tr>
    <tr>
        <td>
            <form action="../index.php">
                <input type="submit" value="Page d'accueil">
            </form>
        </td>
        <td>
            <form action="PageModification.php">
                <input type="submit" value="Modification de votre profil">
            </form>
        </td>
    </tr>
    <?php
    if(isset($_SESSION['role'])){
        echo '
        <tr>
            <td>
                <form action="PageAdmin.php">
                    <input type="submit" value="Page Admin">
                </form>
            </td>
        </tr>
        ';
    }
    ?>
</table>
</body>
</html>
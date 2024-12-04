<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
</head>
<body>
<?php
if (isset($_GET['supp'])) {
    echo "<p>Vous avez sup votre compte</p>";
}
session_start();
if (isset($_SESSION['id_user'])) {
    echo '
    <form action="Front/PageMembre.php">
        <input type="submit" value="Page Membre">
    </form>  
    <br>
    <form action="Back/Connexion.php" method="post">
        <input type="submit" name="Deconnexion" value="Déconnexion">
    </form>
  
    ';
}else{
    echo '
    <form action="Front/PageInscription.php">
        <input type="submit" name="Inscription" value="Inscription">
    </form>
    <br>
    <form action="Front/PageConnexion.php">
        <input type="submit" name="Connexion" value="Connexion">
    </form>
    ';
}
?>
</body>
</html>
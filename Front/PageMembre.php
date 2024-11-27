<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Membre</title>
</head>
<?php
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
</body>
</html>
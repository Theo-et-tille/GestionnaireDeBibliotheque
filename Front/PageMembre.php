<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Membre</title>
</head>
<?php
session_start();
var_dump($_SESSION);
?>
<body>
<p>Bienvenue <?php echo $_SESSION['user']?></p>
<form action="../Back/Connexion.php" method="post">
    <input type="submit" name="Deconnexion" value="Deconnexion">
</form>
</body>
</html>
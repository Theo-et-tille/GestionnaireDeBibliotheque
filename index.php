<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['id_user'])) {
    echo '
    <form action="PageMembre.php">
        <input type="submit" value="Page Membre">
    </form>    
    ';
}else{
    echo '
    <form action="Front/InscriptionConnexion.php">
        <input type="submit" name="InsCon" value="Inscription / Connexion">
    </form>
    ';
}
?>
<br>
<form action="Back/Connexion.php" method="post">
    <input type="submit" name="Deconnexion" value="Déconnexion">
</form>

</body>
</html>
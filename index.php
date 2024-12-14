<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
    <?php require "Back/bootstrap.html"?>
</head>
<body>
<nav class="navbar fixed-top navbar-expand bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Gestinonnaire de Bibliothèque</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Liste des livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liste des auteurs</a>
                </li>
            </ul>
            <ul class="navbar-nav">
            <?php
            session_start();
            if (isset($_SESSION['id_user'])) {
                echo '
                <li class="nav-item"><form action="Front/PageMembre.php"><input type="submit" class="btn" value="Page Membre"></form></li>
                <li class="nav-item"><form action="Back/Inscrit/Connexion.php" method="post"><input class="btn" type="submit" name="Deconnexion" value="Déconnexion"></form></li>
                ';
            }else{
                echo '
                <li class="nav-item"><form action="Front/PageInscription.php"><input class="btn" type="submit" name="Inscription" value="Inscription"></form></li>
                <li class="nav-item"><form action="Front/PageConnexion.php"><input class="btn" type="submit" name="Connexion" value="Connexion"></form>
                ';
            }
            ?>
            </ul>
        </div>
    </div>
</nav>
<?php
if (isset($_GET['supp'])) {
    echo "<p>Vous avez sup votre compte</p>";
}?>
</body>
</html>
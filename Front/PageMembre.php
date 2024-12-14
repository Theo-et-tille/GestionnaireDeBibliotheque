<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['mode'])) {
    $_SESSION['mode'] = 0;
}
if ($_SESSION['mode'] == 0) {
    echo '<html lang="fr" data-bs-theme="dark">';
}else{
    echo '<html lang="fr">';
} ?>
<head>
    <meta charset="UTF-8">
    <title>Page Membree</title>
    <?php require "../Back/import.html"?>
</head>
<body>
<nav class="navbar fixed top navbar-expand bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Gestinonnaire de Bibliothèque</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liste des livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liste des auteurs</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php
                if ($_SESSION['mode'] == 0) {
                    echo '<li class="nav-item"><form action="../Back/Mode.php" method="post"><input class="btn btn-outline-light" type="submit" name="Light" value="Light"><input type="hidden" name="location" value="../Front/PageMembre"></form></li>';
                }else{
                    echo '<li class="nav-item"><form action="../Back/Mode.php" method="post"><input class="btn btn-outline-dark" type="submit" name="Dark" value="Dark"><input type="hidden" name="location" value="../Front/PageMembre"></form></li>';
                }
                ?>
                <li class="nav-item"><form action="../Back/Inscrit/Connexion.php" method="post"><input class="btn" type="submit" name="Deconnexion" value="Déconnexion"></form></li>
            </ul>
        </div>
    </div>
</nav>
<h2>Bienvenue <?=$_SESSION['user']?></h2>
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
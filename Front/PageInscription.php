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
    <title>Page d'Inscription</title>
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
                    echo '<li class="nav-item"><form action="../Back/Mode.php" method="post"><input class="btn btn-outline-light" type="submit" name="Light" value="Light"><input type="hidden" name="location" value="../Front/PageInscription"></form></li>';
                }else{
                    echo '<li class="nav-item"><form action="../Back/Mode.php" method="post"><input class="btn btn-outline-dark" type="submit" name="Dark" value="Dark"><input type="hidden" name="location" value="../Front/PageInscription"></form></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="taille">
        <form action="../Back/Inscrit/Inscription.php" method="post">
            <div class="input-group">
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="nom" name="nom" max="50" placeholder="" required>
                    <label for="nom">Nom</label>
                </div>
            </div>
            <div class="input-group">
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="prenom" name="prenom" max="50" placeholder="" required>
                    <label for="prenom">Prenom</label>
                </div>
            </div>
            <div class="input-group">
                <div class="form-floating mb-3">
                    <input class="form-control" type="email" id="emaili" name="emaili" max="100" placeholder="" required>
                    <label for="emaili">Mail</label>
                </div>
            </div>
            <div class="input-group">
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="tel_fixe" name="tel_fixe" max="15" placeholder="" required>
                    <label for="tel_fixe">Téléphone fixe</label>
                </div>
            </div>
            <div class="input-group">
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="tel_portable" name="tel_portable" max="15" placeholder="" required>
                    <label for="tel_portable">Téléphone portable</label>
                </div>
            </div>
            <div class="input-group">
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="rue" name="rue" max="80" placeholder="" required>
                    <label for="rue">Rue</label>
                </div>
            </div>
            <div class="input-group">
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="cp" name="cp" max="5" placeholder="" required>
                    <label for="cp">Code postal</label>
                </div>
            </div>
            <div class="input-group">
                <div class="form-floating mb-3">
                    <input class="form-control" type="text" id="ville" name="ville" max="50" placeholder="" required>
                    <label for="ville">Ville</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="form-floating mb-3">
                    <input class="form-control" type="password" id="mdpi" name="mdpi" max="50" placeholder="" required>
                    <label for="mdpi">Mot de passe</label>
                </div>
            </div>
            <?php
            if (isset($_GET['error'])) {
                echo"<p>Le compte existe déjà</p>";
            }
            if ($_SESSION['mode'] == 0) {
                echo "<input class='btn btn-outline-light' type='submit' name='Inscription' value=S'inscire>";
            }else{
                echo "<input class='btn btn-outline-dark' type='submit' name='Inscription' value=S'inscire>";
            }
            ?>
        </form>
        <br>
        <div>
            <a href="PageConnexion.php">J'ai déjà un compte</a>
        </div>
    </div>
</div>
</body>
</html>
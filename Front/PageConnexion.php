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
    <title>Page de Connexion</title>
    <?php require "../Back/import.html"?>
</head>
<?php
if (isset($_SESSION['id_user'])) {
    header('Location: ../Front/PageMembre.php');
}
?>
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
                            echo '<li class="nav-item"><form action="../Back/Mode.php" method="post"><input class="btn btn-outline-light" type="submit" name="Light" value="Light"><input type="hidden" name="location" value="../Front/PageConnexion"></form></li>';
                        }else{
                            echo '<li class="nav-item"><form action="../Back/Mode.php" method="post"><input class="btn btn-outline-dark" type="submit" name="Dark" value="Dark"><input type="hidden" name="location" value="../Front/PageConnexion"></form></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="taille">
                <form action="../Back/Inscrit/Connexion.php" method="post">
                    <?php
                    if (isset($_GET['Inscrit'])) {
                        echo "
                            <p>Tu t'es bien inscrit tu peux, tu peux te connecter</p>
                            ";
                    }
                    ?>
                    <div class="input-group mb-3 ">
                        <div class="form-floating">
                            <input class="form-control form-control-sm" type="email" id="emailc" name="emailc" placeholder="votre@email.com" max="100" required>
                            <label for="emailc">Email</label>
                        </div>
                    </div>
                    <div class="input-group mb-3 ">
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" id="mdpc" name="mdpc" placeholder="" max="50" required>
                            <label for="mdpc">Mot de passe</label>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['error'])) {
                        echo"<p>Email ou Mot de Passe Incorrect ou compte inexistant</p>";
                    }
                    if ($_SESSION['mode'] == 0) {
                        echo '<input class="btn btn-outline-light" type="submit" name="Connection" value="Connexion">';
                    }else{
                        echo '<input class="btn btn-outline-dark" type="submit" name="Connection" value="Connexion">';
                    }
                    ?>

                </form>
                <br>
                <div>
                    <a href="PageInscription.php">Je n'ai pas de compte</a>
                </div>
            </div>
        </div>
</body>
</html>
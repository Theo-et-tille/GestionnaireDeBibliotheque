<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de Connexion</title>
    <?php require "../Back/import.html"?>
</head>
<?php
session_start();
if (isset($_SESSION['id_user'])) {
    header('Location: ../Front/PageMembre.php');
}
?>
<body>
        <nav class="navbar fixed top navbar-expand bg-body-tertiary" data-bs-theme="dark">
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
                </div>
            </div>
        </nav>
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
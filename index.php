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
    <title>Page d'accueil</title>
    <?php require "Back/import.html"?>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar fixed-top navbar-expand bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Gestinonnaire de Bibliothèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Accueil</a>
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
                        echo '<li class="nav-item"><form action="Back/Mode.php" method="post"><input class="btn btn-outline-light" type="submit" name="Light" value="Light"><input type="hidden" name="location" value="../index.php"></form></li>';
                    }else{
                        echo '<li class="nav-item"><form action="Back/Mode.php" method="post"><input class="btn btn-outline-dark" type="submit" name="Dark" value="Dark"><input type="hidden" name="location" value="../index.php"></form></li>';
                    }
                    if (isset($_SESSION['id_user'])) {
                        echo '
                <li class="nav-item"><form action="Front/PageMembre.php"><input type="submit" class="btn" value="Page Membre"></form></li>
                <li class="nav-item"><form action="Back/Inscrit/Connexion.php" method="post"><input class="btn" type="submit" name="Deconnexion" value="Déconnexion"></form></li>
                ';
                    }else{
                        echo '
                <li class="nav-item"><form action="Front/PageInscription.php"><input class="btn" type="submit" value="Inscription"></form></li>
                <li class="nav-item"><form action="Front/PageConnexion.php"><input class="btn" type="submit" value="Connexion"></form>
                ';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <p class="taille">Hello</p>
</div>
<div class='modal fade' id=suppCompteModal>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h3 class='modal-title'>Vous avez supprimé votre compte</h3>
            </div>
            <div class='modal-body'>
                <p>Si vous voulez réemprunter des livres vous devez vous réinscrire, cepandant vous pouvez toujours acceder à la liste des livres et des auteurs</p>
            </div>
            <div class='modal-footer'>
                <form action="index.php"><button type='submit' class='btn' data-dismiss='modal'>Ok</button></form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET['supp'])) {
    echo "<script>let supp = 1
if (supp === 1) {
    $(document).ready(function(){
        $('#suppCompteModal').modal('show');
    })
}
    </script>" ;
}?>
</body>
</html>
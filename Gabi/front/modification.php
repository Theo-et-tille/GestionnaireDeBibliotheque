<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Principale</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
$bdd = new PDO('mysql:host=localhost:8889;dbname=tp1;charset=utf8'
    , 'root'
    , 'root');
session_start();
$reqVerif = $bdd->prepare('SELECT * FROM inscrit WHERE id_inscrit = :id_inscrit');
$reqVerif->execute(['id_inscrit' => $_SESSION['id_user']]);
$resVerif = $reqVerif->fetch();
?>

<p>Bienvenue <?= $_SESSION['user'] ?></p>

<table>
    <tr>
        <td>
            <form action="../front/inscription.php" method="post">
                <input type="submit" name="Deconnexion" value="Déconnexion">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="../back/supp.php" method="post">
                <input type="submit" name="sup" value="Supprimer mon compte">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <form action="../front/acceuil.php">
                <input type="submit" value="Page d'accueil">
            </form>
        </td>
    </tr>
</table>

<h2>Modifie ton profil</h2>
<form action="../back/modifBack.php" method="post">
    <table>
        <tr>
            <td><label for="nom">Nom :</label></td>
            <td>   <input type="text" id="nom" name="nom" value="<?= $resVerif['nom'] ?>"></td>
        </tr>
        <tr>
            <td><label for="prenom">Prénom :</label></td>
            <td>  <input type="text" id="prenom" name="prenom" value="<?= $resVerif['prenom'] ?>"></td>

        </tr>
        <tr>
            <td><label for="email">Email :</label></td>
            <td>  <input type="email" id="email" name="email" value="<?= $resVerif['email'] ?>"></td>

        </tr>
        <tr>
            <td><label for="tel_fixe">Téléphone fixe :</label></td>
            <td>  <input type="text" id="tel_fixe" name="tel_fixe" value="<?= $resVerif['tel_fixe'] ?>"></td>

        </tr>
        <tr>
            <td><label for="tel_portable">Téléphone portable :</label></td>
            <td>  <input type="text" id="tel_portable" name="tel_portable" value="<?= $resVerif['tel_portable'] ?>"></td>

        </tr>
        <tr>
            <td><label for="rue">Rue :</label></td>
            <td>  <input type="text" id="rue" name="rue" value="<?= $resVerif['rue'] ?>"></td>

        </tr>
        <tr>
            <td><label for="cp">Code postal :</label></td>
            <td>  <input type="text" id="cp" name="cp" value="<?= $resVerif['cp'] ?>">
            </td>
        </tr>
        <tr>
            <td><label for="ville">Ville :</label></td>
            <td>  <input type="text" id="ville" name="ville" value="<?= $resVerif['ville'] ?>">
            </td>
        </tr>
        <tr>
            <td><label for="mdp">mots de pass :</label></td>
            <td>  <input type="text" id="mdp" name="mdp" value="<?= $resVerif['mdp'] ?>">
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="Modification" value="Modifier"></td>
        </tr>
        <tr>
            <td>
                <?php if (isset($_GET['Modif'])): ?>
                    Compte bien modifié.
                <?php endif; ?>
            </td>
        </tr>
    </table>
</form>
</body>
</html>

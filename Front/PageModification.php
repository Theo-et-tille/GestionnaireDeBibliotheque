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
}
if (!isset($_SESSION)) {
    header("Location: ../index.php");
}
?>
<head>
    <meta charset="UTF-8">
    <title>Page de Modification</title>
    <?php require "../Back/import.html"?>
</head>

<?php
$bdd = include "../BDD/BDD.php";
$reqVerif = $bdd->prepare('SELECT * FROM inscrit WHERE id_inscrit = :id_inscrit');
$reqVerif->execute(array('id_inscrit' => $_SESSION['id_user']));
$resVerif = $reqVerif->fetch();


?>

<body>
<table>
    <tr>
        <td>
            <form action="PageMembre.php">
                <input type="submit" value="Page Membre">
            </form>
        </td>
    </tr>
</table>
<br>
<form action="../Back/Inscrit/ModificationProfil.php" method="post">
    <table>
        <tr>
            <th>
                <h3>Modifie ton profil <?=$_SESSION['user']?></h3>
            </th>
        </tr>
        <tr>
            <td>
                <label for="nom"> Nom : </label>
                <input type="text" id="nom" name="nom" max="50" value=<?= $resVerif['nom'] ?>>
            </td>
        </tr>
        <tr>
            <td>
                <label for="prenom"> Prenom : </label>
                <input type="text" id="prenom" name="prenom" max="50" value=<?= $resVerif['prenom'] ?>>
            </td>
        </tr>
        <tr>
            <td>
                <label for="emaili"> Mail : </label>
                <input type="email" id="email" name="email" max="100" value=<?= $resVerif['email'] ?>>
            </td>
        </tr>
        <tr>
            <td>
                <label for="tel_fixe"> Téléphone fixe : </label>
                <input type="text" id="tel_fixe" name="tel_fixe" max="15" value=<?= $resVerif['tel_fixe'] ?>>
            </td>
        </tr>
        <tr>
            <td>
                <label for="tel_portable"> Téléphone portable : </label>
                <input type="text" id="tel_portable" name="tel_portable" max="15" value=<?= $resVerif['tel_portable'] ?>>
            </td>
        </tr>
        <tr>
            <td>
                <label for="rue">Rue : </label>
                <input type="text" id="rue" name="rue" max="80" value="<?= $resVerif['rue'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="cp">Code postal : </label>
                <input type="text" id="cp" name="cp" max="5" value=<?= $resVerif['cp'] ?>>
            </td>
        </tr>
        <tr>
            <td>
                <label for="ville">Ville : </label>
                <input type="text" id="ville" name="ville" max="50" value=<?= $resVerif['ville'] ?>>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="ModificationP" value="Modifier">
            </td>
        </tr>
        <tr>
            <td>
                <?php
                if (isset($_GET['Modif'])) {
                    echo "
                Vos modification ont bien été pris en compte.
                ";
                }
                if (isset($_GET['error'])) {
                    echo "
                L'addresse email que vous voulez existe déjà. 
                ";
                }
                ?>
            </td>
        </tr>
    </table>
</form>
<form action="../Back/Inscrit/ModificationProfil.php" method="post">
    <table>
        <tr>
            <th>Modifier Ton Mot de Passe</th>
        </tr>
        <tr>
            <td>
                <label for="mdp">Ancien Mot de passe : </label>
                <input type="password" id="mdp" name="Ancienmdp" max="50">
            </td>
        </tr>
        <tr>
            <td>
                <label for="mdp">Nouveau Mot de passe : </label>
                <input type="password" id="mdp" name="Nouveaumdp" max="50">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="ModificationMDP" value="Modifier">
            </td>
        </tr>
        <tr>
            <td>
                <?php
                if (isset($_GET['ModifMDP'])) {
                    echo "
                Vos modification ont bien été pris en compte.
                ";
                }
                if (isset($_GET['errorMDP'])) {
                    echo "
                Votre mot de passe actuel n'est pas le même que vous avez saisi.  
                ";
                }
                ?>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
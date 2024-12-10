<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page Membree</title>
</head>
<?php
$bdd = include "../BDD/BDD.php";
// role admin = 0 role membre = NULL
session_start();
$reqVerif = $bdd->prepare('SELECT * FROM inscrit WHERE id_inscrit = :id_inscrit');
$reqVerif->execute(array('id_inscrit' => $_SESSION['id_user']));
$resVerif = $reqVerif->fetch();
if(isset($resVerif['role'])){
    $reqAllProfil = $bdd->prepare('SELECT * FROM inscrit');
    $reqAllProfil->execute();
    $tabAllProfil = $reqAllProfil->fetchall();
}
?>
<body>
<p>Bienvenue <?=$_SESSION['user']?></p>
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
            <form action="../index.php">
                <input type="submit" value="Page d'accueil">
            </form>
        </td>
    </tr>
</table>

<br>
<form action="../Back/Inscrit/ModificationProfil.php" method="post">
<table>
    <tr>
        <th>
            <h3>Modifie ton profil</h3>
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
            <input type="text" id="rue" name="rue" max="80" value=<?= $resVerif['rue'] ?>>
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
            <label for="mdpi">Mot de passe : </label>
            <input type="password" id="mdp" name="mdp" max="50" value=<?= $resVerif['mdp'] ?>>
        </td>
    </tr>
    <tr>
        <td>
            <input type="submit" name="Modification" value="Modifier">
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
            <?php
            if (isset($resVerif['role'])) {
                echo "<table>";
                foreach ($tabAllProfil as $profil) {
                    echo "
            <tr>
                <td>$profil[id_inscrit]</td>
                <td>$profil[nom]</td>
                <td>$profil[prenom]</td>
                <td>$profil[email]</td>
                <td>$profil[tel_fixe]</td>
                <td>$profil[tel_portable]</td>
                <td>$profil[rue], $profil[cp], $profil[ville]</td>
            </tr>    
            ";
                }
                echo "</table>";
                var_dump($tabAllProfil);
            }
            ?>
</form>
<label for="test">test</label>
<select id="test" name="test">
    <?php
    foreach ($tabAllProfil as $profil) {
        $i=0;
        echo "<option value='$i'>$profil[1]</option>";
        $i++;
    }

    ?>
</select>
</body>
</html>
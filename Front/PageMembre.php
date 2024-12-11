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
        <td>
            <form action="PageModification.php">
                <input type="submit" value="Modification de votre profil">
            </form>
        </td>
    </tr>
</table>

<br>
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
                <td><form action='../Back/Inscrit/ModificationProfilAdmin.php' method='post'><input type='submit' name='$profil[id_inscrit]' value='Supp'></td>
                <td><input type='submit' name='$profil[id_inscrit]' value='Modif'></form></td>
            </tr>    
            ";
                }
                echo "</table>";

                var_dump($tabAllProfil);
                echo '
                <label for="test">test</label>
<select id="test" name="test">';
    foreach ($tabAllProfil as $profil) {
        $i=0;
        echo "<option value=`$i`>$profil[1]</option>";
        $i++;
    }
echo '</select>';

            }
            ?>

</body>
</html>
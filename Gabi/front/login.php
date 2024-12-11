<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>connexion</title>
</head>
<link href="../style.css" rel="stylesheet" >

<body>
<form action="../back/connex.php" method="post">
<table>

    <h3>Email
 <input type="email" name="email" required></h3>
    <h3>Mot de passe
        <input type="password" name="mdp" required></h3>
        <tr>
            <td>
         <input type="submit" value="login">
            </td>
            <td>
       <a href="inscription.php"><input type="submit" value="inscription"></a>
            </td>
        </tr>
</table>
</form>
</body>
</html>
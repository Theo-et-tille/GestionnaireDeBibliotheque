<link href="deTouteBeautééééééé.css" rel="stylesheet" >
<table>
    <form  method="post">
    <body>
    <H2>inscription</H2>
    <br>

    <tr>
        <td>prénom</td>
        <td><input type="text" name="prenom" required></td>
    </tr>
    <tr>
        <td>nom</td>
        <td><input type="text" name="nom" required></td>
    </tr>
    <tr>
        <td>email</td>
        <td><input type="email" name="email" required></td>
    </tr>
    <tr>
        <td>tel_fixe</td>
        <td><input type="text" name="fixe" required></td>
    </tr>
    <tr>
        <td>tel_portable</td>
        <td><input type="text" name="portable" required></td>
    </tr>
    <tr>
        <td>rue</td>
        <td><input type="text" name="rue" required></td>
    </tr>
    <tr>
        <td>code postal</td>
        <td> <input type="text" name="cp" required></td>
    </tr>
    <tr>
        <td>ville</td>
        <td><input type="text" name="ville" required></td>
    </tr>
    <tr>
        <td>mot de passe</td>
        <td><input type="password" name="mdp" required></td>
    </tr>
    <tr>
        <td>
            inscription
        </td>
        <td><input type="submit"  value="connexion"></td>
    </tr>
    <tr><td></td>
       <td><a href="login.html"><button></button></a></td>
    </tr>
    </form>
</table>
</body>

<?php

$bdd = new PDO('mysql:host=localhost:8889;dbname=tp1;charset=utf8'
    ,
    'root',
    'root');
$nom=$_POST['nom'];$prenom=$_POST['prenom'];$email=$_POST['email'];
$fix=$_POST['fixe'];$portable=$_POST['portable'];$rue=$_POST['rue'];
$cp=$_POST['cp'];$ville=$_POST['ville'];$mdp=$_POST['mdp'];

$req = $bdd->prepare('INSERT INTO inscrit(nom,prenom,email,tel_fixe,tel_portable,rue,cp,ville,mdp) VALUES (:nom,:prenom,:email,:fix,:portable,:rue,:cp,:ville,:mdp)');
$req ->execute(array(
        'nom' => $nom, 'prenom' => $prenom, 'email'=> $email, 'fix'=>$fix, 'portable'=>$portable, 'rue'=>$rue, 'cp'=>$cp, 'ville'=>$ville, 'mdp'=>$mdp
));
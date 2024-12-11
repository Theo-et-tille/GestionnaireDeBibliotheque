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
if($req){
    header("location: ../Front/login.php");
}
else{
    echo "erreur veuillez ressayer";
}
?>
<a href="insc.php">Erreur 404  :/ </a>

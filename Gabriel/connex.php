<?php

$bdd = new PDO('mysql:host=localhost:8889;dbname=tp1;charset=utf8'
    ,
    'root',
    'root');

$email = $_POST['email'];
$mdp = $_POST['mdp'];

$reqConnexion = $bdd->prepare('SELECT * FROM inscrit WHERE email = :email AND mdp = :mdp');
$reqConnexion->execute(array('email' => $email, 'mdp' => $mdp));
$resConnexion = $reqConnexion->fetch();
var_dump($resConnexion);
var_dump($email, $mdp);
if ($resConnexion==null) {
    echo "t nul ff15, nice tuto";
}
else{
    session_start();
    $_SESSION['user'] = $resConnexion['email'];
    header("Location: acceuil.php");

}
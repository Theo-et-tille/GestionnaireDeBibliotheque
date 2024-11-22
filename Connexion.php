<?php

$bdd = new PDO('mysql:host=localhost;dbname=sle_biblio_structure;charset=utf8', 'root');

$email = $_POST['email'];
$mdp = $_POST['mdp'];

$req = $bdd->prepare('SELECT * FROM inscrit WHERE email = :email AND mdp = :mdp');
$req->execute(array('email' => $email, 'mdp' => $mdp));
$res = $req->fetch();

var_dump($res);
if (!$res){
    echo "rater";
}else{
    session_start();
    header("Location: PageMembre.html");
}
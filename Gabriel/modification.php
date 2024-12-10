<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
$bdd = new PDO('mysql:host=localhost:8889;dbname=tp1;charset=utf8',
    'root',
    'root');
$req= $bdd->prepare('SELECT id_inscrit FROM inscrit');
$req->execute();
$user = $req->fetchAll();
$arr =array(count($user));
var_dump(count($user));
?>
<html>
<link href="deTouteBeautééééééé.css" rel="stylesheet" >
<body>
<table>
    <tr>
        <td>
            <select>
<? foreach ($arr as $user){
    
}    ?>
</select>
        </td>
    </tr>
</table>
</body>
</html>

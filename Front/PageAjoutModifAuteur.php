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
} ?>
<head>
    <meta charset="UTF-8">
    <title>Page de Modif Auteur</title>
    <?php require "../Back/import.html"?>
</head>
<body>
<?php ?>

</body>
</html>
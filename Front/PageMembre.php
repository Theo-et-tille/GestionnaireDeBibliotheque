<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Membre</title>
</head>
<?php
session_start();
?>
<body>
<p>Bienvenue <?php echo $_SESSION['user']?></p>
</body>
</html>
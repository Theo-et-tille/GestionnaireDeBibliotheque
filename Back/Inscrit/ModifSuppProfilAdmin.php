<?php
session_start();
if (!isset($_SESSION['role'])) {
    header('Location: ../../index.php');
    if (!isset($_POST)) {
        header('Location: ../../index.php');
    }
}


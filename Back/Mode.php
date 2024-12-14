<?php
session_start();
$location = $_POST["location"];
if(isset($_POST['Light'])){
    $_SESSION['mode'] = 1;
    header('Location: '.$location);
}
if(isset($_POST['Dark'])){
    $_SESSION['mode'] = 0;
    header('Location: '.$location);
}
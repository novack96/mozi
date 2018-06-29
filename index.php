<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: loginForm.php');
    exit();
}
header('Location: addFilm.php');
?>
<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: loginForm.php');
    exit();
}
if(!isset($_POST['termekFilm'])){
    header('Location: filmTermek.php');
    exit();
}
$termekFilm=$_POST['termekFilm'];
$mysqli= new mysqli('localhost','root','','mozi');
$mysqli->set_charset('utf8');
foreach ($termekFilm as $termekID => $filmID) {
    $sql= "UPDATE termek SET filmID=$filmID WHERE id=$termekID";
    if( !($mysqli->query($sql)) ){
        header("Location: filmTermek.php?flag=sqlError&msg=".urlencode("Error: $mysqli->error"));
        exit();
    }
}
header("Location: filmTermek.php?flag=success");
?>
<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: loginForm.php');
    exit();
}
if(!isset($_POST['submit'])){
    header('Location: addTermekForm.php');
    exit();    
}

$mysqli = new mysqli('localhost','root','','mozi');
$mysqli->set_charset('utf8');
$nev = $mysqli->real_escape_string($_POST['nev']);
$darabszam= $mysqli->real_escape_string($_POST['darabszam']);
$ar = $mysqli->real_escape_string($_POST['ar']);

$sql= "INSERT INTO termek(nev,darabszam,ar) VALUES('$nev',$darabszam,'$ar');";
if(!$mysqli->query($sql)){
    $msg= "Error: $mysqli->error";
    header('Location: addTermekForm.php?flag=sqlError&msg='.urlencode($msg));
    $mysqli->close();
    exit();
}
header('Location: addTermekForm.php?flag=success');
$mysqli->close();
?>
<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: loginForm.php');
    exit();
}
if(!isset($_POST['submit'])){
    header('Location: addKombMusorForm.php');
    exit();
}
if($_POST['elsofilm'] === "" || $_POST['masodikfilm'] === ""){
    header('Location: addKombMusorForm.php?flag=failed&msg='.urlencode('Nincs kiválasztva az első és/vagy a második film!'));
    exit();
}
if($_POST['elsofilm'] === $_POST['masodikfilm']){
    header('Location: addKombMusorForm.php?flag=failed&msg='.urlencode("Nem lehet ugyanaz az első és a második film!"));
    exit();
}
 $mysqli=new mysqli('localhost','root','','mozi');
 $mysqli->set_charset('utf8');
 $elsofilm= $mysqli->real_escape_string($_POST['elsofilm']);
 $masodikfilm= $mysqli->real_escape_string($_POST['masodikfilm']);

 $sql="INSERT INTO kombinaltMusor(elsoFilmID,masodikFilmID) VALUES($elsofilm,$masodikfilm);";
 if(!($mysqli->query($sql))){
    $msg="Error: $mysqli->error";
    header('Location: addKombMusorForm.php?flag=sqlError&msg='.urlencode($msg));
    $mysqli->close();
    exit();
 }
 header('Location: addKombMusorForm.php?flag=success');
 $mysqli->close();
?>
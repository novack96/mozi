<?php
require_once('utils.php');
session_start();
if(!isset($_POST['submit'])){
    header('Location: loginForm.php');
    exit();
}
$user = $_POST['username'];
$pwd = $_POST['pwd'];
$mysqli = new mysqli('localhost','root','','mozi');
$mysqli->set_charset('utf8');
if($mysqli->connect_errno){
    $msg= "Error: $mysqli->error";
    header('Location: loginForm.php?flag=serverError&msg='.urlencode($msg));
    $mysqli->close();
    exit();
}
$user=$mysqli->real_escape_string($user);
if( !($res = $mysqli->query("SELECT pwd FROM felhasznalo WHERE nev='$user';")) ){
    header('Location: loginForm.php?flag=sqlError');
    $mysqli->close();
    exit();
}
if($res->num_rows ==0){
    header('Location: loginForm.php?flag=usernameError');    
    $mysqli->close();
    exit();
}
$result=$res->fetch_assoc();
if($result['pwd'] === $pwd ){
header('Location: addFilmForm.php');
$_SESSION['username'] = $user;
$mysqli->free();
$mysqli->close();
exit();
}
header('Location: loginForm.php?flag=pwdError');
$mysqli->free();
$mysqli->close();
exit();
?>
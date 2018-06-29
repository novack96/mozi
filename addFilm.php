<?php
if(!isset($_POST['submit'])){
    header('Location: addFilmForm.php');
    exit();    
}
$mysqli = new mysqli('localhost','root','','mozi');
$mysqli->set_charset('utf8');
$cim= $mysqli->real_escape_string($_POST['cim']);
$sql="INSERT INTO film(cim) VALUES('$cim')";

if( !($mysqli->query($sql)) ){
    $msg= "Error: $mysqli->error";
    header('Location: addFilmForm.php?flag=sqlError&msg='.urlencode($msg));
    $mysqli->close();
    exit();
}
header('Location: addFilmForm.php?flag=success');
$mysqli->close();
?>
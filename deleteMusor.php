<?php
require_once('utils.php');
$db= new mysqli('localhost','root','','mozi');
$db->set_charset('utf8');

$elsoFilmID= $db->real_escape_string($_GET['elsofilmid']);
$masodikFilmID= $db->real_escape_string($_GET['masodikfilmid']);

$sql="DELETE FROM kombinaltMusor WHERE elsoFilmID = $elsoFilmID AND masodikFilmID = $masodikFilmID;";
if(!($db->query($sql))){
    $msg= "Error: $db->errno. $db->error";
    header('Location: musorok.php?flag=sqlError&msg='.urlencode($msg));
    $db->close();
    exit();
}
header('Location: musorok.php?flag=success');
$db->close();
?>
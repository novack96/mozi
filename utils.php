<?php
function hideMusor(){
    $ret='';
    $mysqli = new mysqli('localhost', 'root','', 'mozi');
    $mysqli->set_charset('utf8');
    if($mysqli->connect_errno) return $ret; 
    $result= $mysqli->query("SELECT * FROM kombinaltMusor;");
    if($result->num_rows === 0){
        $ret= 'invisible';
        $mysqli->close();
        return $ret;
    } 

    $result->free();
    $mysqli->close();
    return $ret;
} 
function generateAlert(string $flag,string $msg =null){
    switch ($flag) {
        case 'sqlError':
            $head='SQL hiba!';
            break;
        case 'usernameError':
            $head='Sikertelen bejelentkezés!';
            $msg="Hibás felhasználónév!";
            break;
        case 'pwdError':
            $head='Sikertelen bejelentkezés!';
            $msg='Hibás jelszó!';
            break;
        case 'success':
            $head='Sikeres művelet!';
            break;
        default:
            $head= 'Hiba!';
            break;
    }
    alert($head,$msg);
}
function alert(string $msgHead,string $msg){
    echo '<script language="javascript">';
    echo 'alert("'.$msgHead.'\\n'.$msg.'");';
    echo '</script>';
}
?>
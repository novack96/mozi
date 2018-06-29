<?php
require_once('utils.php');
session_start();
if(!isset($_SESSION['username'])){
    header('Location: loginForm.php');
    exit();
}

$mysqli = new mysqli('localhost','root','','mozi');
$mysqli->set_charset('utf8');
$res= $mysqli->query("SELECT * FROM film;");
$filmek= $res->fetch_all(MYSQLI_ASSOC);
$count=count($filmek);
$res->free();
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <?php include 'head.htm';?>
    <title>Kombinált műsor hozzáadása</title>
</head>
<body>
    <?php include 'menu.php';
    if(isset($_GET['flag'])){
        generateAlert($_GET['flag'], isset($_GET['msg'])? $_GET['msg'] : '' );
    }
    
    ?>
    <div class="container main-content  justify-content-center mt-5 pt-5 w-50">

        <div class="card px-3">
            <div class="card-body py-0 my-0">
                <form action="addKombMusor.php" method="post">

                    <div class="form-group my-4">
                            <select class="form-control form-control-lg mb-4 border-dark" name="elsofilm" >
                                <option value="" selected>Első film</option>
                                <?php for($i=0;$i< $count; $i++ ) : ?>
                                <option value="<?=$filmek[$i]['id']?>"><?=$filmek[$i]['cim']?></option>
                                <?php endfor; ?>
                            </select>

                        

                    </div>
                    <div class="form-group my-4">
                        <select class="form-control form-control-lg mb-4 border-dark" name="masodikfilm" >
                            <option value="" selected>Második film</option>
                            <?php for($i=0;$i< $count; $i++ ) : ?>
                            <option value="<?=$filmek[$i]['id']?>"><?=$filmek[$i]['cim']?></option>
                            <?php endfor; ?>
                        </select>

                    </div>
                    <div class="form-group my-4">
                        <input class="form-control btn btn-lg btn-dark" type="submit" name="submit" value="Hozzáadás" />

                    </div>
                </form>

            </div> 
        </div>
    </div>

</body>
</html>
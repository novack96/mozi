<?php
require_once('utils.php');
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <?php include 'head.htm';?>
    <title>Bejelentkezés</title>
</head>
<body>
    <?php include 'menu.php';
    if(isset($_GET['flag'])){
        generateAlert($_GET['flag'], isset($_GET['msg'])? $_GET['msg'] : '' );
    }
    ?>
        <div class="container main-content justify-content-center mt-5 pt-5 w-50">

            <div class="card px-3">
                <div class="card-body py-0 my-0">
                    <form action="login.php" method="post">

                        <div class="form-group my-4">
                        <input class=" form-control form-control-lg border-dark" type="text" name="username" id="username" placeholder="Felhasználónév" required/>

                        </div>
                        
                        <div class="form-group my-4">
                        <input class=" form-control form-control-lg border-dark" type="password" name="pwd" id="pwd" placeholder="Jelszó" />

                        </div>
                        <div class="form-group my-4">
                        <input class="form-group form-control btn btn-lg btn-dark" type="submit" name="submit" value="Bejelentkezés" />

                        </div>
                    </form>

                </div> 
                

            </div>
        </div>

    
</body>
</html>
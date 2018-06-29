<?php 
require_once('utils.php');
session_start();
if(!isset($_SESSION['username'])){
    header('Location: loginForm.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <?php include 'head.htm';?>
    <title>Film hozzáadása</title>
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
                <form action="addFilm.php" method="post">

                    <div class="form-group my-4">
                        <input class=" form-control form-control-lg border-dark" type="text" name="cim" placeholder="Film címe" required/>

                    </div>
                    <div class="form-group my-4">
                        <input class="form-control btn btn-lg btn-dark border-dark" type="submit" name="submit" value="Hozzáadás" />

                    </div>
                </form>

            </div> 
        </div>
    </div>

</body>
</html>
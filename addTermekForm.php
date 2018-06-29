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
    <title>Termék felvétele</title>
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
            <form action="addTermek.php" method="post">

                <div class="form-group my-4">
                    <input class=" form-control form-control-lg mb-4 border-dark" type="text" name="nev" placeholder="Név (pl. Pop Corn)" required/>
                    <input class=" form-control form-control-lg mb-4 border-dark" type="text" name="darabszam" placeholder="Darabszám (pl. 800)" required/>
                    <input class=" form-control form-control-lg mb-4 border-dark" type="text" name="ar" placeholder="Ár (pl. 15 $)" required/>

                </div>
                <div class="form-group my-4">
                    <input class="form-group form-control btn btn-dark btn-lg" type="submit" name="submit" value="Hozzáadás" />

                </div>
            </form>
        </div> 
    </div>
</div>

</body>
</html>
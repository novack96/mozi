<?php
require_once('utils.php');
session_start();
if(!isset($_SESSION['username'])){
    header('Location: loginForm.php');
    exit();
}
if(hideMusor()){
    header('Location: addKombMusorForm.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <?php include 'head.htm';?>
   
    <title>Műsorok listája</title>
</head>
<body>
    <?php include 'menu.php';
    if(isset($_GET['flag'])){
        generateAlert($_GET['flag'], isset($_GET['msg'])? $_GET['msg'] : '' );
    }    
    ?>
    <div class="container main-content mt-5 pt-5">
        
        
        <div class="card">
            <div class="card-body">
                
                <?php
                $mysqli= new mysqli('localhost','root','','mozi');
                $mysqli->set_charset('utf8');
                $sql="SELECT * FROM kombinaltMusor;";
                if( !($resMusorok=$mysqli->query($sql)) ){
                    echo $mysqli->error;
                    exit();
                }
                while($aktMusor=$resMusorok->fetch_assoc()): ?>
                
                    <?php 
                    $sqlElsoFilm= 'SELECT cim FROM film WHERE id='.$aktMusor['elsoFilmID'].';';
                    $sqlMasodikFilm= 'SELECT cim FROM film WHERE id='.$aktMusor['masodikFilmID'].';';
                    if( !($res = $mysqli->query($sqlElsoFilm)) ){
                        echo $mysqli->error;
                        exit();
                    }
                    $aktElsoFilm = $res->fetch_assoc();
                
                    $res->free();
                    if(!($res=$mysqli->query($sqlMasodikFilm))){
                    }
                    $aktMasodikFilm = $res->fetch_assoc();
                    $res->free();
                    ?>

                <!-- Minden egyes műsort egy ilyen táblázatba listázunk ki  -->
                <div class="table mt-5 border">
                    <div class="row text-center text-color-gray font-weight-bold" style="height: 5em;">
                        <div class="col " ><?php echo $aktElsoFilm['cim']?></div>
                        <div class="col "><?php echo $aktMasodikFilm['cim']?></div>
                    </div>
                    <div class="row" >
                        <div class="col">
                        <?php
                        $res= $mysqli->query('SELECT nev FROM termek WHERE filmID='. $aktMusor['elsoFilmID'] .';');
                        while($aktTermek=$res->fetch_assoc()): ?>
                            <div class="text-color-gray row justify-content-center " style="height: 3em;">
                                <?= $aktTermek['nev']?>
                            </div>
                        <?php endwhile;?>
                        </div>
                        
                        <div class="col">
                        <?php
                        $res->free();
                        if( !( $res=$mysqli->query('SELECT nev FROM termek WHERE filmID=' . $aktMusor['masodikFilmID'] . ';'))){
                            echo $mysqli->error;
                            exit();
                        }
                        while($aktTermek= $res->fetch_assoc()): ?>
                            <div class="row justify-content-center text-color-gray" style="height: 3em;">
                                <?= $aktTermek['nev']?>
                            </div>
                        <?php endwhile;
                            $res->free();
                        ?>
                        </div>
                    </div>
                    <!-- Műsorhoz tartozó törlés gomb létrehozása -->
                    <div class="row">
                        <div class="col">
                            <a class="btn btn btn-dark" role="button" href="deleteMusor.php?elsofilmid=<?php echo $aktMusor['elsoFilmID']?>&masodikfilmid=<?php echo $aktMusor['masodikFilmID']?>">Műsor törlése</a>
                        </div>
                    </div>
                </div>

                <?php
                endwhile;
                $resMusorok->free();
                $mysqli->close();
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
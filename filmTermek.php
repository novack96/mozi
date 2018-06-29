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
    <?php include 'head.htm'; ?>
    <link rel="stylesheet" type="text/css" href="customRadio.css" />    
    <title>Document</title>
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
                
            <form class="form" action="hozzarendel.php" method="post" id="form">
                <table class="table table-borderless">
                    <?php
                    $mysqli = new mysqli('localhost','root','','mozi');
                    $mysqli->set_charset('utf8');
                    $filmRes= $mysqli->query("SELECT id, cim FROM film;");
                    $filmek= $filmRes->fetch_all(MYSQLI_ASSOC);
                    $termekRes= $mysqli->query("SELECT id, nev, filmID FROM termek;");
                    $termekek = $termekRes->fetch_all(MYSQLI_ASSOC); 
                    ?>
                    <tr class="row text-center text-color-gray">
                        <td class="col ">&nbsp;</td>
                        <?php for($i=0;$i< count($filmek);$i++):?>
                        <td class="col "><?= $filmek[$i]['cim']?></td>
                        <?php endfor;?>
                    </tr>
                    <?php
                    for ($i=0; $i < count($termekek); $i++) { 
                        echo "<tr class=\"row\">";
                        echo "<td class=\"col text-color-gray\">".$termekek[$i]['nev']."</td>";
                        for ($j=0; $j < count($filmek); $j++) { 
                            echo "<td class=\"col d-flex justify-content-center\">\n";

                            echo "<label class=\"custom-container\">";
                            echo "<input type=\"radio\" "; 
                            echo "name=\"termekFilm[". $termekek[$i]['id'] ."]\" ";
                            echo "value=\"". $filmek[$j]['id'] ."\" ";
                            if($termekek[$i]['filmID'] == $filmek[$j]['id']) echo "checked ";
                            echo "onclick=\"document.getElementById('form').submit()\" />";
                            echo "<span class=\"checkmark\"></span>";
                            echo "</label>";
                            echo "</td>\n";
                        }
                        echo '</tr>';
                    } 
                    ?>
                </table>
                <?php 
                ?>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
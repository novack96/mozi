<?php
//session_start();
$pages=array();

$pages['addFilmForm.php']='Film hozzáadása';
$pages['addTermekForm.php']='Termék hozzáadása';
$pages['filmTermek.php']='Film-Termék hozzárendelés';
$pages['addKombMusorForm.php']='Kombinált műsor készítés';
$pages['musorok.php']='Műsorok';
$pages['logout.php']='Kijelentkezés';

$current_url=$_SERVER['REQUEST_URI'];

if( ($pos= strpos($current_url,"?")) !== false){
    $current_url = substr($current_url,0,$pos);
}
$current_url=explode('/',$current_url);
$current_url=end($current_url);
?>
<div class="navbar navbar-expand-lg d-flex" style="background-color:rgb(54,64,74); height: 3.5em;">
    <nav class="navbar-nav nav nav-fill flex-fill" >
        <?php if(isset($_SESSION['username'])): ?>
        <?php foreach($pages as $url=>$cim):?>
        <a href="<?php echo $url?>" class="nav-item nav-link text-white <?php echo ($url === $current_url? 'font-weight-bold ': ''); echo $url == 'musorok.php'? hideMusor() : ''; ?>"> <?php echo $cim ?> </a>
        <?php endforeach; ?>
        
        <?php endif; ?>
    </nav>
</div>


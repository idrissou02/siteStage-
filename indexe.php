<?php  ob_start();
session_start(); ?>
<?php 
include_once('\laragon\www\stage\site\includes\db.php');


$uc =empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch ($uc) {
case 'accueil':
include('\laragon\www\stage\site\pages\accueil.php');
}

?>
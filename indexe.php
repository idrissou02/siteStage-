<?php  ob_start();
session_start(); ?>
<?php


$uc =empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch ($uc) {
case 'accueil':
include('\laragon\www\stage\site\pages/accueil.php');
}
?>
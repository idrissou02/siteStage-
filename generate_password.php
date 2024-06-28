<?php
$plain_password = '123';
$hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);
echo 'Mot de passe haché : ' . $hashed_password;
?>

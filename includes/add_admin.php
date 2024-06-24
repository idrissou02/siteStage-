<?php
include_once('\laragon\www\stage\site\includes\db.php');


$plain_password = '123';


$hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

try {
    
    $insertAdmin = $connexion->prepare("INSERT INTO admins (username, password) VALUES (:username, :password)");
    $insertAdmin->bindParam(':username', $username);
    $insertAdmin->bindParam(':password', $hashed_password);
    $username = 'issou'; 
    $insertAdmin->execute();

    echo "Administrateur ajouté avec succès!";
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>

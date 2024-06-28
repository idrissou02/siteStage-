<?php
include_once('\laragon\www\stage\site\includes\db.php');

$username = 'votre_nom_utilisateur';
$plain_password = 'votre_mot_de_passe';

// Hacher le mot de passe
$hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

try {
    // Préparer la requête d'insertion
    $insertAdmin = $connexion->prepare("INSERT INTO admins (username, password) VALUES (:username, :password)");
    $insertAdmin->bindParam(':username', $username);
    $insertAdmin->bindParam(':password', $hashed_password);
    
    // Exécuter la requête
    $insertAdmin->execute();

    echo "Administrateur ajouté avec succès!";
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>

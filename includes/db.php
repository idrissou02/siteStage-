<?php
$host = "btssio.dedyn.io"; // Adresse du serveur 
$username = "SOUHILM"; // Nom d'utilisateur
$password = "05102005"; // Mot de passe
$dbname = "SOUHILM_mon_site"; // Nom de la base de données

try {
    // Création de la connexion PDO
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configuration des options PDO
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Gestion des erreurs de connexion
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit; // Arrête le script en cas d'erreur de connexion
}
?>


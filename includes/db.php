<?php
$servername = ""; // Adresse du serveur 
$username = ""; // Nom d'utilisateur
$password = ""; // Mot de passe
$dbname = ""; // Nom de la base de données

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
?>

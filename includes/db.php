<?php
try {
    $host = "btssio.dedyn.io"; 
    $username = "SOUHILM"; 
    $password = "05102005"; 
    $dbname = "SOUHILM_mon_site"; 

    // Création de la connexion PDO
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Configuration des options PDO
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Suppression de l'affichage de la connexion réussie pour éviter d'afficher ce message à chaque inclusion
    // echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage(); 
    exit; // Arrête le script en cas d'erreur de connexion
}
?>

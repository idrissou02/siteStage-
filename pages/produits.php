<?php
include('\laragon\www\stage\site\includes\header.php'); 
include_once '\laragon\www\stage\site\includes\db.php';
?>

<h2>Nos Produits</h2>

<?php
try {
    // Récupérer les produits publiés
    $resultat = $connexion->query('SELECT * FROM produits WHERE publier = 1');

    if ($resultat->rowCount() > 0) {
        // Afficher chaque produit
        echo '<ul>';
        while ($produit = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo '<li>';
            echo '<h3>' . htmlspecialchars($produit['titre']) . '</h3>';
            echo '<p>' . htmlspecialchars($produit['description']) . '</p>';
            echo '<p>Prix : ' . htmlspecialchars($produit['prix']) . ' €</p>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Aucun produit disponible pour le moment.</p>';
    }
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>

<?php
include('\laragon\www\stage\site\includes\footer.php');
?>
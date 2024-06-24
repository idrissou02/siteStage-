<?php
include('\laragon\www\stage\site\includes\header.php'); 
include_once('\laragon\www\stage\site\includes\db.php');
?>
<a href="accueil.php">Retour à la liste</a>
<h2>Nos Produits</h2>

<?php
try {
    // Récupérer les produits publiés
    $resultat = $connexion->query('SELECT * FROM produits WHERE publier = 1');

    if ($resultat->rowCount() > 0) {
        // Afficher chaque produit dans un conteneur flex
        echo '<div class="produits-container">';
        while ($produit = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="produit">';
            echo '<h3>' . htmlspecialchars($produit['titre']) . '</h3>';
            echo '<p>' . htmlspecialchars($produit['description']) . '</p>';
            echo '<p>Prix : ' . htmlspecialchars($produit['prix']) . ' €</p>';
            // Si l'image est disponible, l'afficher
            if (!empty($produit['image'])) {
                echo '<img src="chemin/vers/votre/image/' . htmlspecialchars($produit['image']) . '" alt="' . htmlspecialchars($produit['titre']) . '">';
            }
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p style="text-align: center;">Aucun produit disponible pour le moment.</p>';
    }
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}


include('\laragon\www\stage\site\includes\footer.php');
?>
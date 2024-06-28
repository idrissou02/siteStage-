<?php 
include('\laragon\www\stage\site\includes\header.php'); 
include_once('\laragon\www\stage\site\includes\db.php');
?>
<a href="accueil.php">Retour à la liste</a>
<?php
if (isset($_GET['id'])) {
    $id_produit = $_GET['id'];

    try {
        // Préparer la requête pour obtenir les détails du produit
        $stmt = $connexion->prepare('SELECT * FROM produits WHERE id_produit = :id_produit AND publier = 1');
        $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
        $stmt->execute();
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($produit) {
            // Afficher les détails du produit
            echo '<div class="product-details">';
            echo '<h2>' . htmlspecialchars($produit['titre']) . '</h2>';
            echo '<p>Description : ' . htmlspecialchars($produit['description']) . '</p>';
            echo '<p>Prix : ' . htmlspecialchars($produit['prix']) . ' €</p>';

            // Si vous avez une table d'images, vous pouvez ajouter une requête pour récupérer et afficher les images du produit ici.
            // Exemple pour afficher une image principale :
            // echo '<img src="path/to/image/' . htmlspecialchars($produit['image']) . '" alt="' . htmlspecialchars($produit['titre']) . '">';

            echo '</div>';
        } else {
            echo '<p>Produit non trouvé ou non disponible.</p>';
        }
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
} else {
    echo '<p>ID de produit non fourni.</p>';
}

include('\laragon\www\stage\site\includes\footer.php');
?>
<?php 
include('\laragon\www\stage\site\includes\header.php');
include_once('\laragon\www\stage\site\includes\db.php');

try {
    // Récupérer les informations de la page de présentation
    $stmt = $connexion->prepare('SELECT * FROM pages WHERE id_page = 1 AND publier = 1');
    $stmt->execute();
    $page = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($page) {
        echo '<div class="company-presentation">';
        echo '<h1>' . htmlspecialchars($page['titre']) . '</h1>';
        echo '<h2>' . htmlspecialchars($page['accroche']) . '</h2>';
        echo '<p>' . nl2br(htmlspecialchars($page['texte'])) . '</p>';

        // Récupérer et afficher les images associées
        $stmt_images = $connexion->prepare('SELECT * FROM images_pages WHERE id_page = :id_page AND publier = 1');
        $stmt_images->bindParam(':id_page', $page['id_page'], PDO::PARAM_INT);
        $stmt_images->execute();
        $images = $stmt_images->fetchAll(PDO::FETCH_ASSOC);

        if ($images) {
            echo '<div class="image-gallery">';
            foreach ($images as $image) {
                echo '<div class="image">';
                echo '<img src="images/' . htmlspecialchars($image['illustration']) . '" alt="' . htmlspecialchars($image['titre']) . '">';
                echo '<p>' . htmlspecialchars($image['titre']) . '</p>';
                echo '</div>';
            }
            echo '</div>';
        }
        echo '</div>';
    } 
    
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}
?>

<body>

    <div class="company-presentation">
        <!-- Titre -->
        <h1>Bienvenue chez .......</h1>
        
        <!-- Accroche -->
        <h2>Innovations pour un futur meilleur</h2>
        
        <!-- Texte -->
        <p>
            ...................................................................
        </p>
        
        <!-- Galerie d'images -->
        <div class="image-gallery">
            <div class="image">
                <img src="images/office.jpg" alt="Bureau de ......">
                <p>Notre siège social</p>
            </div>
            <div class="image">
                <img src="images/team.jpg" alt="Équipe de ......">
                <p>Notre équipe</p>
            </div>
            <div class="image">
                <img src="images/products.jpg" alt="Produits de ......">
                <p>Nos produits innovants</p>
            </div>
        </div>
    </div>

</body>

<?php
include('\laragon\www\stage\site\includes\footer.php'); 
?>c

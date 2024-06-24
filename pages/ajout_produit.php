<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

include('\laragon\www\stage\site\includes\header.php'); 
include_once('\laragon\www\stage\site\includes\db.php');
?>

<h2>Ajouter un Produit</h2>

<?php
if ($_POST) {
    try {
        // Préparer la requête d'insertion
        $insertSQL = $connexion->prepare("INSERT INTO produits (categorie, titre, description, prix, publier) VALUES (:categorie, :titre, :description, :prix, :publier)");

        // Lier les paramètres
        $insertSQL->bindParam(':categorie', $_POST['categorie']);
        $insertSQL->bindParam(':titre', $_POST['titre']);
        $insertSQL->bindParam(':description', $_POST['description']);
        $insertSQL->bindParam(':prix', $_POST['prix']);
        $insertSQL->bindParam(':publier', $_POST['publier']);

        // Exécuter la requête
        $insertSQL->execute();

        echo "<p>Produit ajouté avec succès!</p>";
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>

<form method="post" action="ajout_produit.php">
    <div class="formfield">
        <label for="categorie">Catégorie</label>
        <input type="text" name="categorie" id="categorie" placeholder="Catégorie" required>
    </div>
    <div class="formfield">
        <label for="titre">Titre du produit</label>
        <input type="text" name="titre" id="titre" placeholder="Titre du produit" required>
    </div>
    <div class="formfield">
        <label for="description">Description du produit</label>
        <textarea name="description" id="description" placeholder="Description du produit" required></textarea>
    </div>
    <div class="formfield">
        <label for="prix">Prix</label>
        <input type="number" name="prix" id="prix" placeholder="Prix" required step="0.01">
    </div>
    <div class="formfield">
        <label for="publier">Publier le produit</label>
        <select id="publier" name="publier">
            <option value="0">NON</option>
            <option value="1">OUI</option>
        </select>
    </div>
    <input type="submit" value="Ajouter le produit">
</form>

<?php
include('\laragon\www\stage\site\includes\footer.php'); 
?>

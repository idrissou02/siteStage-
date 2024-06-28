<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
include_once('\laragon\www\stage\site\includes\db.php');
include('\laragon\www\stage\site\includes\header.php'); 

if ($_POST) {
    // Traitement de l'ajout de produit
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $publier = $_POST['publier'];

    try {
        $insertProduit = $connexion->prepare("INSERT INTO produits (titre, description, prix, publier) VALUES (:titre, :description, :prix, :publier)");
        $insertProduit->bindParam(':titre', $titre);
        $insertProduit->bindParam(':description', $description);
        $insertProduit->bindParam(':prix', $prix);
        $insertProduit->bindParam(':publier', $publier);
        $insertProduit->execute();

        echo "Produit ajouté avec succès!";
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajout de Produit</title>
</head>
<body>
    <h2>Ajout de Produit</h2>
    <form method="post" action="ajout_produit.php">
        <div>
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <label for="prix">Prix</label>
            <input type="number" step="0.01" name="prix" id="prix" required>
        </div>
        <div>
            <label for="publier">Publier</label>
            <select name="publier" id="publier">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        </div>
        <input type="submit" value="Ajouter le produit">
    </form>
</body>
</html>

<?php
include('\laragon\www\stage\site\includes\footer.php');
?>

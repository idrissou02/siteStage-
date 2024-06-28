<?php 
include('\laragon\www\stage\site\includes\header.php'); 
include_once('\laragon\www\stage\site\includes\db.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si $connexion est bien défini et non null
    if (isset($connexion) && $connexion !== null) {
        try {
            // Prépare la requête SQL 
            $insertSQL = $connexion->prepare("INSERT INTO categories (`titre`, `description`, `publier`) VALUES (:titre, :description, :publier)");

            // Lie les paramètres aux valeurs POST du formulaire
            $insertSQL->bindParam(':titre', $_POST['titre']);
            $insertSQL->bindParam(':description', $_POST['description']);
            $insertSQL->bindParam(':publier', $_POST['publier']);

            // Exécute la requête
            $insertSQL->execute();

            // Redirige vers la même page avec un paramètre de succès
            header("Location: categorie.php?OK");
            exit; // Assure que le script s'arrête après la redirection
        } catch (PDOException $e) {
            echo 'Erreur lors de l\'insertion : ' . $e->getMessage();
        }
    } else {
        echo 'Erreur : Connexion à la base de données non établie.';
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Administration de votre site internet | Ajout de catégorie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="accueil.php">Retour à la liste</a>
    <h2>Ajouter une catégorie</h2>

    <?php
    if (isset($_GET['OK'])) {
        echo "<p>Enregistrement effectué</p>";
    }
    ?>

    <form method="post" action="categorie.php">
        <div class="formfield">
            <label for="titre">Titre de la catégorie</label>
            <input type="text" name="titre" id="titre" placeholder="Ici mon titre" value="" required>
        </div>
        <div class="formfield">
            <label for="description">Description de la catégorie</label>
            <textarea name="description" id="description" placeholder="Description de la catégorie" required></textarea>
        </div>
        <div class="formfield">
            <label for="publier">Publier la catégorie</label>
            <select id="publier" name="publier">
                <option value="0">NON</option>
                <option value="1">OUI</option>
            </select>
        </div>
        <input type="submit" value="Valider le formulaire" id="valider" name="valider">
    </form>
</body>
</html>

<?php
include('\laragon\www\stage\site\includes\footer.php');
?>

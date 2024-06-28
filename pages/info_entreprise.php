<?php
session_start();
require_once '/laragon/www/stage/site/includes/db.php';

function ajouterEntreprise($pdo, $nom, $email, $tel, $facebook, $instagram, $linkedin, $logo, $description, $administration) {
    try {
        $sql = "INSERT INTO entreprises (nom, email, tel, facebook, instagram, linkedin, logo, description, administration) 
                VALUES (:nom, :email, :tel, :facebook, :instagram, :linkedin, :logo, :description, :administration)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':tel' => $tel,
            ':facebook' => $facebook,
            ':instagram' => $instagram,
            ':linkedin' => $linkedin,
            ':logo' => $logo,
            ':description' => $description,
            ':administration' => $administration
        ]);
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'entreprise : " . $e->getMessage() . "<br>";
    }
}

// Fonction pour mettre à jour une entreprise
function mettreAJourEntreprise($pdo, $id, $nom, $email, $tel, $facebook, $instagram, $linkedin, $logo, $description, $administration) {
    try {
        $sql = "UPDATE entreprises 
                SET nom = :nom, email = :email, tel = :tel, facebook = :facebook, instagram = :instagram, linkedin = :linkedin, 
                    logo = :logo, description = :description, administration = :administration
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':email' => $email,
            ':tel' => $tel,
            ':facebook' => $facebook,
            ':instagram' => $instagram,
            ':linkedin' => $linkedin,
            ':logo' => $logo,
            ':description' => $description,
            ':administration' => $administration
        ]);
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour de l'entreprise : " . $e->getMessage() . "<br>";
    }
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    
    // Passer l'objet PDO à chaque fonction
    if ($action === 'ajouter') {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $linkedin = $_POST['linkedin'];
        $logo = $_POST['logo'];
        $description = $_POST['description'];
        $administration = $_POST['administration'];
        
        ajouterEntreprise($connexion, $nom, $email, $tel, $facebook, $instagram, $linkedin, $logo, $description, $administration);
        
        $_SESSION['entreprise'] = [
            'nom' => $nom,
            'email' => $email,
            'tel' => $tel,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'linkedin' => $linkedin,
            'logo' => $logo,
            'description' => $description,
            'administration' => $administration
        ];
    } elseif ($action === 'mettreAJour') {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $linkedin = $_POST['linkedin'];
        $logo = $_POST['logo'];
        $description = $_POST['description'];
        $administration = $_POST['administration'];
        
        mettreAJourEntreprise($connexion, $id, $nom, $email, $tel, $facebook, $instagram, $linkedin, $logo, $description, $administration);
        
        $_SESSION['entreprise'] = [
            'id' => $id,
            'nom' => $nom,
            'email' => $email,
            'tel' => $tel,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'linkedin' => $linkedin,
            'logo' => $logo,
            'description' => $description,
            'administration' => $administration
        ];
    }
    
    // Rediriger vers la page d'affichage
    header("Location: /stage/site/pages/afficher.php");
    exit();
}
?>

<body>
    <header>
        <h1>Gestion des entreprises</h1>
    </header>
    
    <div class="container">
        <form action="info_entreprise.php" method="post">
            <h2>Ajouter une entreprise</h2>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="tel">Téléphone:</label>
            <input type="text" id="tel" name="tel" required>
            
            <label for="facebook">Facebook:</label>
            <input type="text" id="facebook" name="facebook">
            
            <label for="instagram">Instagram:</label>
            <input type="text" id="instagram" name="instagram">
            
            <label for="linkedin">LinkedIn:</label>
            <input type="text" id="linkedin" name="linkedin">
            
            <label for="logo">Logo:</label>
            <input type="text" id="logo" name="logo">
            
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
            
            <label for="administration">Administration:</label>
            <textarea id="administration" name="administration"></textarea>
            
            <button type="submit" name="action" value="ajouter">Ajouter</button>
        </form>
        
        <form action="info_entreprise.php" method="post">
            <h2>Mettre à jour une entreprise</h2>
            <label for="id">ID:</label>
            <input type="number" id="id" name="id" required>
            
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="tel">Téléphone:</label>
            <input type="text" id="tel" name="tel" required>
            
            <label for="facebook">Facebook:</label>
            <input type="text" id="facebook" name="facebook">
            
            <label for="instagram">Instagram:</label>
            <input type="text" id="instagram" name="instagram">
            
            <label for="linkedin">LinkedIn:</label>
            <input type="text" id="linkedin" name="linkedin">
            
            <label for="logo">Logo:</label>
            <input type="text" id="logo" name="logo">
            
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
            
            <label for="administration">Administration:</label>
            <textarea id="administration" name="administration"></textarea>
            
            <button type="submit" name="action" value="mettreAJour">Mettre à


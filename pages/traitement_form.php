<?php
include_once('\laragon\www\stage\site\includes\db.php');

// Fonction pour ajouter une entreprise
function ajouterEntreprise($nom, $email, $tel, $facebook, $instagram, $linkedin, $logo, $description, $administration) {
    try {
        $pdo = MonPdo::getInstance();
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
        echo "Entreprise ajoutée : $nom<br>";
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'entreprise : " . $e->getMessage() . "<br>";
    }
}

// Fonction pour mettre à jour une entreprise
function mettreAJourEntreprise($id, $nom, $email, $tel, $facebook, $instagram, $linkedin, $logo, $description, $administration) {
    try {
        $pdo = MonPdo::getInstance();
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
        echo "Entreprise mise à jour : $nom<br>";
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour de l'entreprise : " . $e->getMessage() . "<br>";
    }
}

// Créer la table si elle n'existe pas déjà
createTable();

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    
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
        
        ajouterEntreprise($nom, $email, $tel, $facebook, $instagram, $linkedin, $logo, $description, $administration);
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
        
        mettreAJourEntreprise($id, $nom, $email, $tel, $facebook, $instagram, $linkedin, $logo, $description, $administration);
    }
}

echo "Opérations terminées.";
?>
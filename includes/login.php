<?php
session_start();
include_once('\laragon\www\stage\site\includes\db.php');

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Rechercher l'utilisateur
        $stmt = $connexion->prepare("SELECT * FROM admins WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier le mot de passe
        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: ajout_produit.php");
            exit;
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect";
        }
    } catch (PDOException $e) {
        $error = 'Erreur : ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion Admin</title>
</head>
<body>
    <h2>Connexion Admin</h2>
    <a href="accueil.php">Retour à la liste</a>
    <?php if (isset($error)) { echo '<p style="color:red;">' . $error . '</p>'; } ?>
    <form method="post" action="login.php">
        <div>
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
        </div>
        <input type="submit" value="Connexion">
    </form>
</body>
</html>

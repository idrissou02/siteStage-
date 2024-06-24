<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Présentation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <h1>Bienvenue sur notre site</h1>
    <nav>
        <a href="/stage/site/pages/accueil.php">Accueil</a>
        <a href="/stage/site/pages/presentation.php">Présentation</a>
        <a href="/stage/site/pages/categorie.php">categorie</a>
        <a href="/stage/site/pages/contact.php">Contact</a>
        <a href="/stage/site/pages/produits.php">Produit</a>
        <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) { ?>
        <a href="/stage/site/pages/ajout_produit.php">ajout produit</a>
        <a href="/stage/site/includes/logout.php">Déconnexion</a>
        <?php } else ?>
        <a href="/stage/site/includes/login.php">Admin Connexion</a>
    </nav>
</header>
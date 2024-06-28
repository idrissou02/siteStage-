<?php
session_start();


// Vérifiez si les informations d'entreprise sont disponibles dans la session
if (!isset($_SESSION['info_entreprise'])) {
    echo "Aucune information d'entreprise disponible.";
    exit();
}

$entreprise = $_SESSION['info_entreprise'];
?>

<body>
    <header>
        <h1><?php echo htmlspecialchars($entreprise['nom']); ?></h1>
        <p>Email: <?php echo htmlspecialchars($entreprise['email']); ?></p>
        <p>Téléphone: <?php echo htmlspecialchars($entreprise['tel']); ?></p>
    </header>
    
    <div class="container">
        <h2>Détails de l'entreprise</h2>
        <p>Facebook: <a href="<?php echo htmlspecialchars($entreprise['facebook']); ?>" target="_blank"><img src="facebook.png" alt="Facebook" class="social-icon"></a></p>
        <p>Instagram: <a href="<?php echo htmlspecialchars($entreprise['instagram']); ?>" target="_blank"><img src="instagram.png" alt="Instagram" class="social-icon"></a></p>
        <p>LinkedIn: <a href="<?php echo htmlspecialchars($entreprise['linkedin']); ?>" target="_blank"><img src="linkedin.png" alt="LinkedIn" class="social-icon"></a></p>
        <p>Logo: <img src="<?php echo htmlspecialchars($entreprise['logo']); ?>" alt="Logo" class="company-logo"></p>
        <p>Description: <?php echo nl2br(htmlspecialchars($entreprise['description'])); ?></p>
        <p>Administration: <?php echo nl2br(htmlspecialchars($entreprise['administration'])); ?></p>
    </div>
    
    
    
    <footer>
        <p>Nom: <?php echo htmlspecialchars($entreprise['nom']); ?></p>
        <p>Email: <?php echo htmlspecialchars($entreprise['email']); ?></p>
        <p>Téléphone: <?php echo htmlspecialchars($entreprise['tel']); ?></p>
    </footer>
</body>
</html>
<?php
include('\laragon\www\stage\site\includes\footer.php');
?>
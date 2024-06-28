<?php
include('\laragon\www\stage\site\includes\header.php'); 
?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contactez-nous</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $subject = htmlspecialchars($_POST['subject']);
            $message = htmlspecialchars($_POST['message']);
            
            $to = "votre.email@example.com"; // Remplacez par votre adresse email
            $headers = "From: " . $email . "\r\n" .
                       "Reply-To: " . $email . "\r\n" .
                       "X-Mailer: PHP/" . phpversion();
            $body = "Nom: $tel\nTél: $name\nEmail: $email\Objet: $subject\n\nMessage:\n$message";

            if (mail($to, $subject, $body, $headers)) {
                echo "<p style='color:green;'>Merci pour votre message. Nous vous répondrons dès que possible.</p>";
            } else {
                echo "<p style='color:red;'>Une erreur s'est produite. Veuillez réessayer plus tard.</p>";
            }
        }
        ?>
        <form method="post" action="contact.php">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" required>

            <label for="name">Tél</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="subject">Objet</label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>
<?php include('\laragon\www\stage\site\includes\header.php'); ?>
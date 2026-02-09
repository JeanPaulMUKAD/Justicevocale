<?php
// newsletter-handler.php
session_start();

// Configuration
$admin_email = 'justiciakilipunda@gmail.com';
$site_name = 'La Justice Vocale';

// Fonction pour valider l'email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Fonction pour envoyer l'email
function sendNewsletterEmail($email, $admin_email, $site_name) {
    $subject = "Nouvel abonné à la newsletter - $site_name";
    
    $message = "
    <html>
    <head>
        <title>Nouvel abonné newsletter</title>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #4f46e5; color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
            .content { background: #f9fafb; padding: 30px; border-radius: 0 0 10px 10px; }
            .email { background: #e5e7eb; padding: 10px; border-radius: 5px; font-weight: bold; }
            .footer { margin-top: 30px; text-align: center; color: #6b7280; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>🎉 Nouvel abonné à la newsletter</h2>
            </div>
            <div class='content'>
                <p>Bonjour,</p>
                <p>Une nouvelle personne s'est abonnée à la newsletter de <strong>$site_name</strong>.</p>
                <p><strong>Email de l'abonné :</strong></p>
                <div class='email'>$email</div>
                <p><strong>Date d'inscription :</strong> " . date('d/m/Y H:i') . "</p>
                <p><strong>IP :</strong> " . $_SERVER['REMOTE_ADDR'] . "</p>
                <p>Cet email a été envoyé automatiquement depuis le formulaire de newsletter du site.</p>
            </div>
            <div class='footer'>
                <p>© " . date('Y') . " $site_name - Tous droits réservés</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Headers pour email HTML
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Newsletter <noreply@justicevocale.com>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    
    return mail($admin_email, $subject, $message, $headers);
}

// Gestion de la requête AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    
    $email = trim($_POST['email'] ?? '');
    $response = [
        'success' => false,
        'message' => '',
        'email' => $email
    ];
    
    // Validation
    if (empty($email)) {
        $response['message'] = 'Veuillez entrer votre adresse email';
    } elseif (!validateEmail($email)) {
        $response['message'] = 'Adresse email invalide';
    } else {
        // Envoyer l'email
        if (sendNewsletterEmail($email, $admin_email, $site_name)) {
            $response['success'] = true;
            $response['message'] = 'Merci pour votre inscription ! Vous recevrez bientôt nos actualités.';
            
            // Sauvegarder dans un fichier log (optionnel)
            $log_entry = date('Y-m-d H:i:s') . " - $email\n";
            file_put_contents('newsletter_subscribers.log', $log_entry, FILE_APPEND);
            
            // Sauvegarder en session pour éviter les doubles inscriptions
            $_SESSION['newsletter_subscribed'] = true;
            $_SESSION['subscribed_email'] = $email;
        } else {
            $response['message'] = 'Une erreur est survenue. Veuillez réessayer plus tard.';
        }
    }
    
    echo json_encode($response);
    exit;
}
?>
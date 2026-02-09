<?php
include('assets/includes/header.php');

// Traitement du formulaire
$messageSent = false;
$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Récupération des données
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $honeypot = isset($_POST['honeypot']) ? trim($_POST['honeypot']) : '';
    
    // Debug: voir ce qui est reçu
    error_log("Formulaire soumis: name=$name, email=$email, message=" . substr($message, 0, 50) . "...");
    
    // Si le honeypot est rempli, c'est un bot
    if (!empty($honeypot)) {
        // Ne rien faire, mais afficher un succès factice
        $messageSent = true;
        $successMessage = "Votre message a été envoyé avec succès !";
    } else {
        // Validation des champs
        $errors = [];
        
        if (empty($name) || strlen($name) < 2) {
            $errors[] = "Le nom doit contenir au moins 2 caractères.";
        }
        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Une adresse email valide est requise.";
        }
        
        if (empty($message) || strlen($message) < 10) {
            $errors[] = "Le message doit contenir au moins 10 caractères.";
        }
        
        if (empty($errors)) {
            // Email de destination
            $to = "justiciakilipunda@gmail.com";
            $subject = "Nouveau message de contact - Justice Vocale";
            
            // Construction du message HTML
            $emailMessage = "
            <html>
            <head>
                <title>Nouveau message de contact</title>
            </head>
            <body style='font-family: Arial, sans-serif; line-height: 1.6;'>
                <div style='max-width: 600px; margin: 0 auto;'>
                    <div style='background: linear-gradient(135deg, #2F1C6A 0%, #4f46e5 100%); color: white; padding: 20px; border-radius: 10px 10px 0 0;'>
                        <h2>Nouveau message de contact</h2>
                        <p>Justice Vocale - Plateforme de Défense des Droits Humains</p>
                    </div>
                    <div style='background: #f8f9fa; padding: 20px; border-radius: 0 0 10px 10px; border: 1px solid #dee2e6;'>
                        <div style='margin-bottom: 15px; padding: 10px; background: white; border-radius: 5px; border-left: 4px solid #4f46e5;'>
                            <div style='font-weight: bold; color: #2F1C6A;'>Expéditeur :</div>
                            <div>$name</div>
                        </div>
                        <div style='margin-bottom: 15px; padding: 10px; background: white; border-radius: 5px; border-left: 4px solid #4f46e5;'>
                            <div style='font-weight: bold; color: #2F1C6A;'>Email :</div>
                            <div>$email</div>
                        </div>
                        <div style='margin-bottom: 15px; padding: 10px; background: white; border-radius: 5px; border-left: 4px solid #4f46e5;'>
                            <div style='font-weight: bold; color: #2F1C6A;'>Date :</div>
                            <div>" . date('d/m/Y à H:i') . "</div>
                        </div>
                        <div style='margin-bottom: 15px; padding: 10px; background: white; border-radius: 5px; border-left: 4px solid #4f46e5;'>
                            <div style='font-weight: bold; color: #2F1C6A;'>Message :</div>
                            <div>" . nl2br(htmlspecialchars($message)) . "</div>
                        </div>
                    </div>
                </div>
            </body>
            </html>
            ";
            
            // En-têtes de l'email
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= "From: \"Justice Vocale\" <contact@justicevocale.com>\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            
            // Envoyer l'email
            error_log("Tentative d'envoi d'email à: $to");
            $mailSent = mail($to, $subject, $emailMessage, $headers);
            
            if ($mailSent) {
                error_log("Email envoyé avec succès");
                $messageSent = true;
                $successMessage = "Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.";
            } else {
                error_log("Échec de l'envoi d'email");
                $errorMessage = "Une erreur s'est produite lors de l'envoi du message. Veuillez réessayer.";
            }
        } else {
            $errorMessage = implode("<br>", $errors);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Justice Vocale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animations pour la page contact */
        .contact-container {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .contact-container.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .contact-title {
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.6s ease 0.2s;
        }
        
        .contact-container.visible .contact-title {
            opacity: 1;
            transform: translateY(0);
        }
        
        .contact-info {
            opacity: 0;
            transform: translateX(-20px);
            transition: all 0.6s ease 0.4s;
        }
        
        .contact-container.visible .contact-info {
            opacity: 1;
            transform: translateX(0);
        }
        
        .contact-form {
            opacity: 0;
            transform: translateX(20px);
            transition: all 0.6s ease 0.6s;
        }
        
        .contact-container.visible .contact-form {
            opacity: 1;
            transform: translateX(0);
        }
        
        /* Animation pour les champs du formulaire */
        .form-field {
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.4s ease;
        }
        
        .contact-container.visible .form-field {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Animation en cascade pour les champs */
        .contact-container.visible .form-field:nth-child(1) { transition-delay: 0.7s; }
        .contact-container.visible .form-field:nth-child(2) { transition-delay: 0.8s; }
        .contact-container.visible .form-field:nth-child(3) { transition-delay: 0.9s; }
        .contact-container.visible .form-field:nth-child(4) { transition-delay: 1.0s; }
        
        /* Animation pour les icônes de contact */
        .contact-icon {
            transition: all 0.3s ease;
        }
        
        .contact-item:hover .contact-icon {
            transform: scale(1.2) rotate(10deg);
        }
        
        /* Animation pour le bouton d'envoi */
        .submit-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }
        
        .submit-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }
        
        .submit-btn:hover::after {
            width: 300px;
            height: 300px;
        }
        
        /* Animation pour les champs de saisie */
        .input-field {
            transition: all 0.3s ease;
            border-width: 2px;
        }
        
        .input-field:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.2);
            border-color: #4f46e5;
        }
        
        /* Animation pour la carte de contact */
        @keyframes floatCard {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .float-card {
            animation: floatCard 6s ease-in-out infinite;
        }
        
        /* Animation pour le background */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #dbeafe 0%, #f0f9ff 50%, #f5f3ff 100%);
            background-size: 200% 200%;
            animation: gradientShift 15s ease infinite;
        }
        
        /* Styles pour les messages d'alerte */
        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            animation: slideIn 0.5s ease;
        }
        
        .alert-success {
            background-color: #d1fae5;
            border: 1px solid #10b981;
            color: #065f46;
        }
        
        .alert-error {
            background-color: #fee2e2;
            border: 1px solid #ef4444;
            color: #7f1d1d;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .field-error {
            color: #ef4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body class="bg-gray-50">
<div class="min-h-screen flex flex-col justify-center items-center gradient-bg py-8 px-4">
    <div class="contact-container max-w-lg w-full bg-white/90 p-6 md:p-8 rounded-2xl shadow-2xl border border-blue-100 transition-all duration-500 float-card">
        
        <!-- Messages d'alerte -->
        <?php if ($messageSent && $successMessage): ?>
            <div class="alert alert-success mb-6">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3 text-xl"></i>
                    <span><?php echo $successMessage; ?></span>
                </div>
            </div>
        <?php elseif ($errorMessage): ?>
            <div class="alert alert-error mb-6">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
                    <span><?php echo $errorMessage; ?></span>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Titre avec animation -->
        <h1 class="contact-title text-2xl md:text-3xl font-extrabold text-blue-900 text-center mb-6 tracking-tight">
            Contactez
            <span class="text-purple-700 relative inline-block">
                JusticeVocale
                <span class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full transform scale-x-0 transition-transform duration-500 group-hover:scale-x-100"></span>
            </span>
        </h1>
        
        <!-- Informations de contact avec animation -->
        <div class="contact-info mb-6 text-gray-700 space-y-3">
            <!-- Email -->
            <div class="contact-item flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 transition-all duration-300">
                <div class="contact-icon w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-envelope text-blue-600"></i>
                </div>
                <div>
                    <span class="font-semibold block text-sm text-gray-600">Email</span>
                    <a href="mailto:justiciakilipunda@gmail.com?subject=Contact%20Justice%20Vocale&body=Bonjour,%0D%0A%0D%0AJe%20vous%20contacte%20au%20sujet%20de..."
                       class="hover:underline text-blue-700 font-medium hover:text-blue-800 transition-colors"
                       id="contact-email">
                       justiciakilipunda@gmail.com
                    </a>
                </div>
            </div>
            
            <!-- Téléphone/WhatsApp -->
            <div class="contact-item flex items-center gap-3 p-3 rounded-lg hover:bg-green-50 transition-all duration-300">
                <div class="contact-icon w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-phone text-green-600"></i>
                </div>
                <div>
                    <span class="font-semibold block text-sm text-gray-600">Téléphone / WhatsApp</span>
                    <a href="https://wa.me/243993373550?text=Bonjour%20Justice%20Vocale,%20je%20vous%20contacte%20au%20sujet%20de..."
                       target="_blank"
                       class="hover:underline text-green-700 font-medium hover:text-green-800 transition-colors"
                       id="contact-phone">
                        +243 993 373 550
                    </a>
                </div>
            </div>
            
            <!-- Adresse -->
            <div class="contact-item flex items-center gap-3 p-3 rounded-lg hover:bg-purple-50 transition-all duration-300">
                <div class="contact-icon w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-location-dot text-purple-600"></i>
                </div>
                <div>
                    <span class="font-semibold block text-sm text-gray-600">Adresse</span>
                    <span class="text-purple-700 font-medium" id="contact-address">Lubumbashi, République Démocratique du Congo</span>
                </div>
            </div>
        </div>
        
        <!-- Formulaire avec animation -->
        <form action="" method="post" class="contact-form space-y-4" id="contact-form" novalidate>
            <!-- Champ Nom -->
            <div class="form-field">
                <label for="name" class="block text-gray-700 mb-2 font-medium flex items-center">
                    <i class="fas fa-user mr-2 text-blue-500"></i>
                    Nom complet *
                </label>
                <input type="text" id="name" name="name" required
                    value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"
                    class="input-field w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 bg-white/80 shadow-sm transition-all duration-300"
                    placeholder="Votre nom et prénom"
                    minlength="2"
                    maxlength="100">
                <div class="h-1 w-0 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mt-1 transition-all duration-300"></div>
            </div>
            
            <!-- Champ Email -->
            <div class="form-field">
                <label for="email" class="block text-gray-700 mb-2 font-medium flex items-center">
                    <i class="fas fa-envelope mr-2 text-blue-500"></i>
                    Adresse email *
                </label>
                <input type="email" id="email" name="email" required
                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                    class="input-field w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 bg-white/80 shadow-sm transition-all duration-300"
                    placeholder="votre@email.com">
                <div class="h-1 w-0 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mt-1 transition-all duration-300"></div>
            </div>
            
            <!-- Champ Message -->
            <div class="form-field">
                <label for="message" class="block text-gray-700 mb-2 font-medium flex items-center">
                    <i class="fas fa-comment-dots mr-2 text-blue-500"></i>
                    Votre message *
                </label>
                <textarea id="message" name="message" required rows="5"
                    class="input-field w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 bg-white/80 shadow-sm transition-all duration-300 resize-none"
                    placeholder="Décrivez votre demande..."
                    minlength="10"
                    maxlength="2000"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                <div class="h-1 w-0 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mt-1 transition-all duration-300"></div>
                <div class="flex justify-between items-center mt-1">
                    <div class="text-xs text-gray-500" id="message-hint"></div>
                    <div class="text-xs text-gray-400" id="char-count">0/2000</div>
                </div>
            </div>
            
            <!-- Protection anti-spam invisible -->
            <div style="display: none;">
                <input type="text" name="honeypot" id="honeypot" tabindex="-1" autocomplete="off">
            </div>
            
            <!-- Bouton d'envoi -->
            <div class="form-field pt-2">
                <button type="submit" name="submit" id="submit-btn"
                    class="submit-btn w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3.5 rounded-lg font-semibold text-lg shadow-lg hover:shadow-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300">
                    <span class="relative z-10" id="submit-text">
                        <i class="fa-solid fa-paper-plane mr-2"></i>
                        Envoyer mon message
                    </span>
                </button>
            </div>
        </form>
        
        <!-- Note additionnelle -->
        <div class="mt-6 text-center text-gray-500 text-sm">
            <p class="flex items-center justify-center">
                <i class="fas fa-clock mr-2"></i>
                Nous répondons généralement dans les 24 heures
            </p>
            <p class="mt-2 text-xs text-gray-400">
                * Champs obligatoires
            </p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM chargé - Initialisation du formulaire de contact');
    
    // 1. Activer l'animation du conteneur principal
    const contactContainer = document.querySelector('.contact-container');
    if (contactContainer) {
        setTimeout(() => {
            contactContainer.classList.add('visible');
            console.log('Conteneur contact animé');
        }, 300);
    }
    
    // 2. Gestion du compteur de caractères
    const messageTextarea = document.getElementById('message');
    const charCount = document.getElementById('char-count');
    
    if (messageTextarea && charCount) {
        messageTextarea.addEventListener('input', function() {
            const length = this.value.length;
            charCount.textContent = `${length}/2000`;
            
            if (length > 1800) {
                charCount.className = 'text-xs text-red-500';
            } else if (length > 1500) {
                charCount.className = 'text-xs text-orange-500';
            } else {
                charCount.className = 'text-xs text-gray-400';
            }
        });
        
        // Initialiser le compteur
        charCount.textContent = `${messageTextarea.value.length}/2000`;
    }
    
    // 3. Animation des champs de formulaire au focus
    const inputFields = document.querySelectorAll('.input-field');
    inputFields.forEach(field => {
        field.addEventListener('focus', function() {
            const progressBar = this.nextElementSibling;
            if (progressBar && progressBar.classList.contains('h-1')) {
                progressBar.style.width = '100%';
            }
        });
        
        field.addEventListener('blur', function() {
            if (!this.value) {
                const progressBar = this.nextElementSibling;
                if (progressBar && progressBar.classList.contains('h-1')) {
                    progressBar.style.width = '0';
                }
            }
        });
    });
    
    // 4. Gestion de la soumission du formulaire
    const contactForm = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');
    const submitText = document.getElementById('submit-text');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            // Validation côté client
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const message = document.getElementById('message').value.trim();
            
            let isValid = true;
            
            // Supprimer les anciennes erreurs
            document.querySelectorAll('.field-error').forEach(error => error.remove());
            
            // Validation du nom
            if (name.length < 2) {
                showFieldError('name', 'Le nom doit contenir au moins 2 caractères');
                isValid = false;
            }
            
            // Validation de l'email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showFieldError('email', 'Veuillez entrer une adresse email valide');
                isValid = false;
            }
            
            // Validation du message
            if (message.length < 10) {
                showFieldError('message', 'Le message doit contenir au moins 10 caractères');
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
                showNotification('Veuillez corriger les erreurs dans le formulaire', 'error');
                return false;
            }
            
            // Si validation OK, animer le bouton
            submitBtn.disabled = true;
            const originalHTML = submitText.innerHTML;
            submitText.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Envoi en cours...';
            
            // Le formulaire se soumettra normalement
            // Après soumission, la page se rechargera avec le message
            
            return true;
        });
    }
    
    // Fonctions utilitaires
    function showFieldError(fieldId, message) {
        const field = document.getElementById(fieldId);
        if (field) {
            field.classList.add('border-red-500');
            
            // Ajouter le message d'erreur
            const errorDiv = document.createElement('div');
            errorDiv.className = 'field-error';
            errorDiv.textContent = message;
            field.parentNode.appendChild(errorDiv);
        }
    }
    
    function showNotification(message, type = 'info') {
        // Créer la notification
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300 ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'error' ? 'bg-red-500 text-white' :
            'bg-blue-500 text-white'
        }`;
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} mr-2"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Afficher la notification
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 10);
        
        // Masquer après 3 secondes
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    }
});

// Écran de chargement simplifié
window.addEventListener('load', function() {
    console.log('Page complètement chargée');
    const loadingMask = document.getElementById('loading-mask');
    if (loadingMask) {
        setTimeout(() => {
            loadingMask.style.opacity = '0';
            setTimeout(() => {
                loadingMask.style.display = 'none';
            }, 500);
        }, 500);
    }
});
</script>

</body>
</html>
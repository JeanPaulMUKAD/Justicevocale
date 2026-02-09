<?php
session_start();
include('config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username === 'JusticeVocale' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $error = "Identifiants incorrects";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - JusticeVocale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            animation: slideUp 0.5s ease-out;
        }
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .input-group {
            position: relative;
        }
        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
        }
        .input-group input {
            padding-left: 45px;
        }
    </style>
</head>
<body>
    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden login-card">
                <!-- En-tête -->
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-8 text-center">
                    <div class="w-20 h-20 mx-auto mb-4 bg-white/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-lock text-white text-3xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-white">JusticeVocale</h1>
                    <p class="text-indigo-100 mt-2">Administration du Blog</p>
                </div>
                
                <!-- Formulaire -->
                <div class="p-8">
                    <?php if (isset($error)): ?>
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 animate-pulse">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                                <p class="text-red-700"><?php echo htmlspecialchars($error); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="">
                        <div class="space-y-6">
                            <!-- Nom d'utilisateur -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user mr-2 text-indigo-500"></i>
                                    Nom d'utilisateur
                                </label>
                                <div class="input-group">
                                    <i class="fas fa-user-circle"></i>
                                    <input type="text" 
                                           name="username" 
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                           placeholder="Entrez votre nom d'utilisateur">
                                </div>
                            </div>
                            
                            <!-- Mot de passe -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-lock mr-2 text-indigo-500"></i>
                                    Mot de passe
                                </label>
                                <div class="input-group">
                                    <i class="fas fa-key"></i>
                                    <input type="password" 
                                           name="password" 
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                           placeholder="Entrez votre mot de passe">
                                </div>
                            </div>
                            
                            <!-- Bouton de connexion -->
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-3 px-4 rounded-lg font-semibold hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200 transform hover:-translate-y-1">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Se connecter
                            </button>
                            
                            
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="text-center mt-8">
                <p class="text-white/80 text-sm">
                    © <?php echo date('Y'); ?> JusticeVocale. Tous droits réservés.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
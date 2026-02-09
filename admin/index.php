<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

include('config/database.php');

// Récupérer les articles
$stmt = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC");
$articles = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - JusticeVocale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar {
            transition: all 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
        }
        .stat-card {
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="sidebar fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-indigo-800 to-purple-900 text-white">
        <!-- Logo -->
        <div class="p-6 border-b border-white/10">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-gavel"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold">JusticeVocale</h2>
                    <p class="text-sm text-indigo-200">Administration</p>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="p-4 space-y-2">
            <a href="index.php" class="flex items-center space-x-3 px-4 py-3 bg-white/10 rounded-lg">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="articles.php" class="flex items-center space-x-3 px-4 py-3 hover:bg-white/10 rounded-lg transition">
                <i class="fas fa-newspaper"></i>
                <span>Articles</span>
            </a>
            <a href="add_article.php" class="flex items-center space-x-3 px-4 py-3 hover:bg-white/10 rounded-lg transition">
                <i class="fas fa-plus-circle"></i>
                <span>Nouvel Article</span>
            </a>
           
        </nav>
        
        <!-- User Info -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-white/10">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-indigo-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-user"></i>
                </div>
                <div class="flex-1">
                    <p class="font-medium"><?php echo $_SESSION['admin_username']; ?></p>
                    <p class="text-xs text-indigo-200">Administrateur</p>
                </div>
                <a href="logout.php" class="p-2 hover:bg-white/10 rounded-lg" title="Déconnexion">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="ml-0 md:ml-64 min-h-screen">
        <!-- Top Bar -->
        <header class="bg-white shadow-sm border-b">
            <div class="flex justify-between items-center px-6 py-4">
                <!-- Menu Toggle for Mobile -->
                <button id="menuToggle" class="md:hidden text-gray-600 hover:text-indigo-600">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <!-- Title -->
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
                
                <!-- Stats -->
                <div class="flex items-center space-x-4">
                    <span class="hidden md:inline text-sm text-gray-600">
                        <?php echo date('d/m/Y H:i'); ?>
                    </span>
                </div>
            </div>
        </header>
        
        <!-- Main -->
        <main class="p-6">
            <!-- Welcome -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl p-6 text-white mb-8 shadow-lg">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold mb-2">Bonjour, <?php echo $_SESSION['admin_username']; ?>! 👋</h2>
                        <p class="text-indigo-100">Bienvenue dans le panneau d'administration de JusticeVocale</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="add_article.php" 
                           class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition inline-flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Nouvel Article
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="stat-card bg-white rounded-xl p-6 shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Articles</p>
                            <p class="text-3xl font-bold text-gray-800"><?php echo count($articles); ?></p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-newspaper text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card bg-white rounded-xl p-6 shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Dernier Article</p>
                            <p class="text-lg font-bold text-gray-800">
                                <?php echo isset($articles[0]) ? substr($articles[0]['title'], 0, 30) . '...' : 'Aucun'; ?>
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-calendar-check text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card bg-white rounded-xl p-6 shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Catégories</p>
                            <p class="text-3xl font-bold text-gray-800">
                                <?php 
                                $categories = array_column($articles, 'category');
                                echo count(array_unique(array_filter($categories)));
                                ?>
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-tags text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Recent Articles -->
            <div class="bg-white rounded-xl shadow overflow-hidden">
                <div class="p-6 border-b">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-gray-800">Articles Récents</h2>
                        <a href="articles.php" class="text-indigo-600 hover:text-indigo-800 font-medium">
                            Voir tout →
                        </a>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach(array_slice($articles, 0, 5) as $article): ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <?php if ($article['image_path']): ?>
                                        <div class="w-10 h-10 rounded overflow-hidden mr-3">
                                            <img src="../<?php echo $article['image_path']; ?>" alt="" class="w-full h-full object-cover">
                                        </div>
                                        <?php endif; ?>
                                        <div>
                                            <p class="font-medium text-gray-900"><?php echo htmlspecialchars($article['title']); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs rounded-full bg-indigo-100 text-indigo-800">
                                        <?php echo htmlspecialchars($article['category'] ?? 'Non catégorisé'); ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <?php echo date('d/m/Y', strtotime($article['created_at'])); ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="edit_article.php?id=<?php echo $article['id']; ?>" 
                                           class="text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="delete_article.php?id=<?php echo $article['id']; ?>" 
                                           class="text-red-600 hover:text-red-800"
                                           onclick="return confirm('Supprimer cet article?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    <?php if (empty($articles)): ?>
                    <div class="text-center py-12">
                        <i class="fas fa-newspaper text-gray-300 text-5xl mb-4"></i>
                        <p class="text-gray-500">Aucun article pour le moment</p>
                        <a href="add_article.php" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800">
                            Créer votre premier article →
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
    
    <script>
        // Menu Toggle
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
        
        // Auto-hide menu on mobile when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const menuToggle = document.getElementById('menuToggle');
            
            if (window.innerWidth <= 768 && 
                sidebar.classList.contains('active') &&
                !sidebar.contains(event.target) && 
                event.target !== menuToggle) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>
</html>
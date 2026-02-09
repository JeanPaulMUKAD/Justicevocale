<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

include('config/database.php');

// Récupérer tous les articles
$stmt = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC");
$articles = $stmt->fetchAll();

// Pagination (optionnel)
$per_page = 10;
$total = count($articles);
$total_pages = ceil($total / $per_page);
$current_page = $_GET['page'] ?? 1;
$offset = ($current_page - 1) * $per_page;
$articles_paginated = array_slice($articles, $offset, $per_page);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles - JusticeVocale Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <?php include('partials/header.php'); ?>
    
    <div class="ml-0 md:ml-64 min-h-screen p-4 md:p-6">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Gestion des Articles</h1>
                <p class="text-gray-600"><?php echo $total; ?> articles au total</p>
            </div>
            <div class="flex space-x-4">
                <a href="add_article.php" 
                   class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-indigo-600 hover:to-purple-700 transition flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Nouvel Article
                </a>
                <a href="index.php" 
                   class="bg-gradient-to-r from-green-500 to-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-green-600 hover:to-blue-700 transition flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Retour au Dashboard
                </a>
            </div>
        </div>
        
        <!-- Table des articles -->
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Article</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach($articles_paginated as $article): ?>
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <?php if ($article['image_path']): ?>
                                    <div class="w-12 h-12 rounded overflow-hidden mr-4 flex-shrink-0">
                                        <img src="../<?php echo $article['image_path']; ?>" 
                                             alt="<?php echo htmlspecialchars($article['title']); ?>"
                                             class="w-full h-full object-cover">
                                    </div>
                                    <?php endif; ?>
                                    <div>
                                        <p class="font-medium text-gray-900"><?php echo htmlspecialchars($article['title']); ?></p>
                                        <p class="text-sm text-gray-500 mt-1"><?php echo substr($article['description'], 0, 100); ?>...</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs rounded-full bg-indigo-100 text-indigo-800 font-medium">
                                    <?php echo htmlspecialchars($article['category'] ?? 'Non catégorisé'); ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                <?php echo date('d/m/Y', strtotime($article['created_at'])); ?>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800 font-medium">
                                    Publié
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="../article-detail.php?id=<?php echo $article['id']; ?>"
                                       target="_blank"
                                       class="text-blue-600 hover:text-blue-800 p-2 rounded hover:bg-blue-50 transition"
                                       title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="edit_article.php?id=<?php echo $article['id']; ?>"
                                       class="text-indigo-600 hover:text-indigo-800 p-2 rounded hover:bg-indigo-50 transition"
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete_article.php?id=<?php echo $article['id']; ?>"
                                       class="text-red-600 hover:text-red-800 p-2 rounded hover:bg-red-50 transition"
                                       title="Supprimer"
                                       onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article?')">
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
                    <p class="text-gray-500 text-lg">Aucun article pour le moment</p>
                    <a href="add_article.php" class="mt-4 inline-block text-indigo-600 hover:text-indigo-800 font-medium">
                        Créer votre premier article →
                    </a>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex justify-between items-center">
                    <p class="text-sm text-gray-700">
                        Affichage de <span class="font-medium"><?php echo $offset + 1; ?></span> à 
                        <span class="font-medium"><?php echo min($offset + $per_page, $total); ?></span> sur 
                        <span class="font-medium"><?php echo $total; ?></span> articles
                    </p>
                    <div class="flex space-x-2">
                        <?php if ($current_page > 1): ?>
                            <a href="?page=<?php echo $current_page - 1; ?>"
                               class="px-3 py-2 border border-gray-300 rounded text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Précédent
                            </a>
                        <?php endif; ?>
                        
                        <?php for($i = 1; $i <= $total_pages; $i++): ?>
                            <a href="?page=<?php echo $i; ?>"
                               class="px-3 py-2 border border-gray-300 rounded text-sm font-medium <?php echo $i == $current_page ? 'bg-indigo-50 text-indigo-600 border-indigo-500' : 'text-gray-700 hover:bg-gray-50'; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php endfor; ?>
                        
                        <?php if ($current_page < $total_pages): ?>
                            <a href="?page=<?php echo $current_page + 1; ?>"
                               class="px-3 py-2 border border-gray-300 rounded text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Suivant
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <script>
        // Recherche en temps réel (optionnel)
        const searchInput = document.createElement('input');
        searchInput.type = 'text';
        searchInput.placeholder = 'Rechercher un article...';
        searchInput.className = 'px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition mb-4';
        
        // Ajouter la barre de recherche
        document.querySelector('.bg-white').parentNode.insertBefore(searchInput, document.querySelector('.bg-white'));
    </script>
</body>
</html>
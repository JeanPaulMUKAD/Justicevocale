<?php
include('admin/config/database.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: blog.php');
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->execute([$id]);
    $article = $stmt->fetch();
    
    if (!$article) {
        header('Location: blog.php');
        exit;
    }
} catch(PDOException $e) {
    die("Erreur: " . $e->getMessage());
}

include('assets/includes/header.php');
?>

<style>
    .article-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .article-content {
        line-height: 1.8;
    }
    
    .article-content h2 {
        color: #4f46e5;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    
    .article-content p {
        margin-bottom: 1.5rem;
    }
    
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 2rem 0;
    }
</style>

<main class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="article-hero py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <span class="inline-block px-4 py-1 mb-4 rounded-full bg-white/20 text-white font-semibold">
                <?php echo htmlspecialchars($article['category']); ?>
            </span>
            <h1 class="text-4xl md:text-5xl font-bold mb-6"><?php echo htmlspecialchars($article['title']); ?></h1>
            <div class="flex justify-center items-center gap-4 text-white/80">
                <span><?php echo date('d/m/Y', strtotime($article['created_at'])); ?></span>
                <span>•</span>
                <span>JusticeVocale</span>
            </div>
        </div>
    </section>
    
    <!-- Article Image -->
    <?php if(!empty($article['image_path'])): ?>
    <div class="max-w-4xl mx-auto px-4 -mt-12">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <img src="<?php echo htmlspecialchars($article['image_path']); ?>" 
                 alt="<?php echo htmlspecialchars($article['title']); ?>"
                 class="w-full h-64 md:h-96 object-cover">
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Article Content -->
    <section class="max-w-3xl mx-auto px-4 py-12">
        <div class="bg-white rounded-2xl shadow-lg p-8 article-content">
            <p class="text-lg text-gray-700 mb-8 font-medium"><?php echo htmlspecialchars($article['description']); ?></p>
            
            <div class="prose prose-lg max-w-none">
                <?php echo nl2br(htmlspecialchars($article['content'])); ?>
            </div>
            
            <!-- Actions -->
            <div class="mt-12 pt-8 border-t border-gray-200 flex justify-between items-center">
                <a href="blog.php" class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-2">
                    <i class="fas fa-arrow-left"></i>
                    Retour au blog
                </a>
                
                <!-- Partage -->
                <div class="flex items-center gap-4">
                    <span class="text-gray-600">Partager:</span>
                    <div class="flex gap-2">
                        <a href="#" class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center hover:bg-blue-200">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-blue-50 text-blue-400 flex items-center justify-center hover:bg-blue-100">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center hover:bg-red-200">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Articles Similaires -->
    <?php
    try {
        $stmt = $pdo->prepare("SELECT * FROM articles WHERE category = ? AND id != ? ORDER BY created_at DESC LIMIT 3");
        $stmt->execute([$article['category'], $article['id']]);
        $related_articles = $stmt->fetchAll();
        
        if(!empty($related_articles)):
    ?>
    <section class="max-w-7xl mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Articles similaires</h2>
        <div class="grid md:grid-cols-3 gap-6">
            <?php foreach($related_articles as $related): ?>
            <article class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">
                <?php if(!empty($related['image_path'])): ?>
                <img src="<?php echo htmlspecialchars($related['image_path']); ?>" 
                     alt="<?php echo htmlspecialchars($related['title']); ?>"
                     class="w-full h-48 object-cover">
                <?php endif; ?>
                <div class="p-6">
                    <span class="inline-block px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold mb-3">
                        <?php echo htmlspecialchars($related['category']); ?>
                    </span>
                    <h3 class="text-lg font-bold text-gray-800 mb-2"><?php echo htmlspecialchars($related['title']); ?></h3>
                    <a href="article-detail.php?id=<?php echo $related['id']; ?>" 
                       class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">
                        Lire l'article →
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; } catch(PDOException $e) { } ?>
</main>

<script>
// Animation pour l'article
document.addEventListener('DOMContentLoaded', function() {
    // Animation progressive du contenu
    const content = document.querySelector('.article-content');
    if (content) {
        content.style.opacity = '0';
        content.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            content.style.transition = 'all 0.6s ease';
            content.style.opacity = '1';
            content.style.transform = 'translateY(0)';
        }, 300);
    }
});
</script>

<?php
include('assets/includes/footer.php');
?>
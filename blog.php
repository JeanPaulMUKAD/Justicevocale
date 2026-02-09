<?php
// Inclure la configuration de la base de données
include('admin/config/database.php');

// Récupérer les articles depuis la base de données
try {
    $stmt = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC");
    $articles = $stmt->fetchAll();
} catch(PDOException $e) {
    $articles = [];
    $error = "Erreur lors du chargement des articles";
}

include('assets/includes/header.php');
?>

<style>
    /* Animations pour le blog */
    .blog-hero {
        opacity: 0;
        transform: translateY(-30px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .blog-hero.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Animation pour les articles */
    .article-card {
        opacity: 0;
        transform: translateY(40px) scale(0.95);
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .article-card.visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    
    /* Animation pour les icônes des articles */
    .article-icon {
        transform: scale(0.8);
        transition: all 0.5s ease 0.2s;
    }
    
    .article-card.visible .article-icon {
        transform: scale(1);
    }
    
    /* Animation pour les badges */
    .article-badge {
        opacity: 0;
        transform: translateX(-20px);
        transition: all 0.4s ease 0.3s;
    }
    
    .article-card.visible .article-badge {
        opacity: 1;
        transform: translateX(0);
    }
    
    /* Animation pour les titres */
    .article-title {
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.4s ease 0.4s;
    }
    
    .article-card.visible .article-title {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Animation pour les descriptions */
    .article-description {
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.4s ease 0.5s;
    }
    
    .article-card.visible .article-description {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Animation pour les liens */
    .article-link {
        opacity: 0;
        transform: translateX(-10px);
        transition: all 0.4s ease 0.6s;
    }
    
    .article-card.visible .article-link {
        opacity: 1;
        transform: translateX(0);
    }
    
    /* Animation au survol des articles */
    .article-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 40px rgba(99, 102, 241, 0.15);
    }
    
    .article-card:hover .article-icon {
        transform: scale(1.1) rotate(5deg);
    }
    
    /* Animation pour le badge principal */
    .main-badge {
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.5s ease 0.2s;
    }
    
    .blog-hero.visible .main-badge {
        opacity: 1;
        transform: scale(1);
    }
    
    /* Animation pour le titre principal */
    .main-title {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease 0.3s;
    }
    
    .blog-hero.visible .main-title {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Animation pour la description principale */
    .main-description {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease 0.4s;
    }
    
    .blog-hero.visible .main-description {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Effet de brillance sur les titres */
    .title-glow {
        position: relative;
        overflow: hidden;
    }
    
    .title-glow::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.7s ease;
    }
    
    .article-card:hover .title-glow::after {
        left: 100%;
    }
    
    /* Animation pour les gradients des articles */
    .article-gradient {
        position: relative;
        overflow: hidden;
    }
    
    .article-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 0%, rgba(255, 255, 255, 0.1) 50%, transparent 100%);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }
    
    .article-card:hover .article-gradient::before {
        transform: translateX(100%);
    }
    
    /* Ajustement pour les images */
    .article-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .article-card:hover .article-image {
        transform: scale(1.05);
    }
    
    /* Message quand il n'y a pas d'articles */
    .no-articles {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
    }
    
    .no-articles i {
        font-size: 4rem;
        margin-bottom: 20px;
    }
    
    /* Admin link */
    .admin-link {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }
</style>

<!-- Blog Content -->
<main class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-purple-100 py-12 px-2">
    <!-- Hero Section Blog -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12 blog-hero">
        <div class="flex flex-col items-center justify-center text-center">
            <span
                class="main-badge inline-block px-4 py-1 mb-4 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white font-semibold shadow transform hover:scale-105 transition-transform duration-300">
                Le Blog
            </span>
            <h2 class="main-title text-4xl md:text-5xl font-extrabold text-blue-900 mb-4 drop-shadow">Blog de 
                <span class="text-purple-700 title-glow">JusticeVocale</span>
            </h2>
            <p class="main-description text-lg md:text-xl text-gray-700 max-w-2xl">Retrouvez ici nos derniers articles, analyses et
                conseils pour mieux comprendre vos droits et l'actualité juridique.</p>
            
            <!-- Lien admin (visible seulement si connecté) -->
            <?php if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
            <div class="mt-4">
                <a href="admin/index.php" 
                   class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    <i class="fas fa-cog"></i>
                    Administration
                </a>
            </div>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- Articles Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if(!empty($articles)): ?>
            <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach($articles as $index => $article): 
                    // Définir des couleurs par catégorie
                    $category_colors = [
                        'Droit du travail' => ['from-indigo-400', 'to-purple-400'],
                        'Procédure civile' => ['from-purple-400', 'to-indigo-400'],
                        'Droit numérique' => ['from-blue-400', 'to-purple-400'],
                        'Immobilier' => ['from-indigo-400', 'to-blue-400'],
                        'Droit pénal' => ['from-red-400', 'to-orange-400'],
                        'Droit de la famille' => ['from-pink-400', 'to-rose-400'],
                        'Droit commercial' => ['from-green-400', 'to-teal-400']
                    ];
                    
                    $from_color = $category_colors[$article['category']][0] ?? 'from-indigo-400';
                    $to_color = $category_colors[$article['category']][1] ?? 'to-purple-400';
                    
                    // Couleur du badge
                    $badge_colors = [
                        'Droit du travail' => 'bg-indigo-100 text-indigo-700',
                        'Procédure civile' => 'bg-purple-100 text-purple-700',
                        'Droit numérique' => 'bg-blue-100 text-blue-700',
                        'Immobilier' => 'bg-indigo-100 text-indigo-700',
                        'Droit pénal' => 'bg-red-100 text-red-700',
                        'Droit de la famille' => 'bg-pink-100 text-pink-700',
                        'Droit commercial' => 'bg-green-100 text-green-700'
                    ];
                    
                    $badge_class = $badge_colors[$article['category']] ?? 'bg-gray-100 text-gray-700';
                ?>
                <article
                    class="article-card bg-white/95 rounded-2xl shadow-xl border border-blue-100 hover:shadow-indigo-200 transition-all duration-500 flex flex-col overflow-hidden group"
                    data-category="<?php echo htmlspecialchars($article['category']); ?>">
                    <div class="article-gradient h-40 bg-gradient-to-br <?php echo $from_color . ' ' . $to_color; ?> relative overflow-hidden">
                        <?php if(!empty($article['image_path'])): ?>
                            <img src="<?php echo htmlspecialchars($article['image_path']); ?>" 
                                 alt="<?php echo htmlspecialchars($article['title']); ?>"
                                 class="article-image w-full h-full object-cover">
                        <?php else: ?>
                            <!-- Icône par défaut selon la catégorie -->
                            <?php 
                            $category_icons = [
                                'Droit du travail' => 'fa-briefcase',
                                'Procédure civile' => 'fa-gavel',
                                'Droit numérique' => 'fa-shield-alt',
                                'Immobilier' => 'fa-building',
                                'Droit pénal' => 'fa-balance-scale',
                                'Droit de la famille' => 'fa-users',
                                'Droit commercial' => 'fa-chart-line'
                            ];
                            $icon = $category_icons[$article['category']] ?? 'fa-newspaper';
                            ?>
                            <div class="w-full h-full flex items-center justify-center">
                                <i class="fas <?php echo $icon; ?> text-white text-5xl drop-shadow article-icon"></i>
                            </div>
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <span class="article-badge inline-block mb-2 px-3 py-1 rounded-full <?php echo $badge_class; ?> text-xs font-semibold group-hover:scale-105 transition-all duration-300">
                            <?php echo htmlspecialchars($article['category']); ?>
                        </span>
                        <h3 class="article-title text-2xl font-bold text-indigo-700 mb-2 title-glow group-hover:text-indigo-800 transition-colors duration-300">
                            <?php echo htmlspecialchars($article['title']); ?>
                        </h3>
                        <p class="article-description text-gray-600 mb-4 flex-1 text-justify group-hover:text-gray-700 transition-colors duration-300">
                            <?php echo htmlspecialchars($article['description']); ?>
                        </p>
                        <div class="flex justify-between items-center mt-auto">
                            <a href="article-detail.php?id=<?php echo $article['id']; ?>"
                                class="article-link text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                                Lire l'article 
                                <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform duration-300"></i>
                            </a>
                            <span class="text-xs text-gray-400">
                                <?php echo date('d/m/Y', strtotime($article['created_at'])); ?>
                            </span>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- Message quand il n'y a pas d'articles -->
            <div class="no-articles bg-white/80 rounded-2xl shadow-lg p-8">
                <div class="max-w-lg mx-auto">
                    <i class="fas fa-newspaper text-gray-300"></i>
                    <h3 class="text-2xl font-bold text-gray-700 mb-4">Aucun article disponible</h3>
                    <p class="text-gray-600 mb-6">Notre équipe prépare du contenu passionnant pour vous. Revenez bientôt!</p>
                    
                    <!-- Lien vers l'admin pour ajouter des articles -->
                    <?php if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
                    <a href="admin/add_article.php" 
                       class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-lg hover:from-indigo-600 hover:to-purple-600 transition">
                        <i class="fas fa-plus"></i>
                        Créer votre premier article
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </section>
    
    <!-- Filtres par catégorie (optionnel) -->
    <?php if(!empty($articles)): ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
        <div class="flex flex-wrap justify-center gap-3">
            <button class="filter-btn px-4 py-2 rounded-full bg-indigo-500 text-white text-sm font-medium hover:bg-indigo-600 transition" data-category="all">
                Tous les articles
            </button>
            <?php 
            // Récupérer toutes les catégories uniques
            $categories = [];
            foreach($articles as $article) {
                if(!in_array($article['category'], $categories)) {
                    $categories[] = $article['category'];
                }
            }
            
            foreach($categories as $category): 
                $category_class = str_replace(' ', '-', strtolower($category));
            ?>
            <button class="filter-btn px-4 py-2 rounded-full bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition" data-category="<?php echo htmlspecialchars($category_class); ?>">
                <?php echo htmlspecialchars($category); ?>
            </button>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</main>

<!-- Lien admin flottant -->
<?php if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
<div class="admin-link">
    <a href="admin/index.php" 
       class="flex items-center justify-center w-12 h-12 bg-indigo-600 text-white rounded-full shadow-lg hover:bg-indigo-700 hover:shadow-xl transition-all"
       title="Administration">
        <i class="fas fa-cog"></i>
    </a>
</div>
<?php endif; ?>

<script>
// Animation au défilement pour le blog
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser les animations
    function animateOnScroll() {
        const windowHeight = window.innerHeight;
        const windowTop = window.scrollY;
        const windowBottom = windowTop + windowHeight;
        
        // Animer la section hero du blog
        const blogHero = document.querySelector('.blog-hero');
        if (blogHero) {
            const heroTop = blogHero.getBoundingClientRect().top + windowTop;
            
            if (heroTop < windowBottom - 100) {
                blogHero.classList.add('visible');
            }
        }
        
        // Animer les articles
        document.querySelectorAll('.article-card').forEach((article, index) => {
            const articleTop = article.getBoundingClientRect().top + windowTop;
            
            if (articleTop < windowBottom - 100) {
                // Ajouter un délai pour l'animation en cascade
                setTimeout(() => {
                    article.classList.add('visible');
                }, index * 100);
            }
        });
    }
    
    // Ajouter des animations CSS supplémentaires
    const style = document.createElement('style');
    style.textContent = `
        @keyframes floatArticle {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }
        
        @keyframes iconBounce {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }
        
        @keyframes badgePulse {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(99, 102, 241, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(99, 102, 241, 0);
            }
        }
        
        .article-card:hover {
            animation: floatArticle 3s ease-in-out infinite;
        }
        
        .article-card:hover .article-icon {
            animation: iconBounce 0.6s ease;
        }
        
        .article-badge:hover {
            animation: badgePulse 1.5s infinite;
        }
        
        /* Effet de séparation des articles */
        .article-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #4f46e5, #8b5cf6, #4f46e5);
            background-size: 200% 100%;
            border-radius: 2px 2px 0 0;
            opacity: 0;
            transform: scaleX(0);
            transform-origin: left;
            transition: all 0.5s ease;
        }
        
        .article-card:hover::before {
            opacity: 1;
            transform: scaleX(1);
            animation: gradientShift 2s linear infinite;
        }
        
        @keyframes gradientShift {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }
    `;
    document.head.appendChild(style);
    
    // Initialiser l'animation
    animateOnScroll();
    
    // Écouter le défilement
    window.addEventListener('scroll', animateOnScroll);
    
    // Animation au chargement
    window.addEventListener('load', function() {
        animateOnScroll();
        
        // Animation des articles avec délai
        setTimeout(() => {
            document.querySelectorAll('.article-card').forEach((article, index) => {
                setTimeout(() => {
                    if (!article.classList.contains('visible')) {
                        article.classList.add('visible');
                    }
                }, index * 200 + 300);
            });
        }, 500);
    });
    
    // Animation des liens des articles
    document.querySelectorAll('.article-link').forEach(link => {
        link.addEventListener('mouseenter', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'translateX(5px) rotate(45deg)';
                icon.style.transition = 'all 0.3s ease';
            }
        });
        
        link.addEventListener('mouseleave', function() {
            const icon = this.querySelector('i');
            if (icon) {
                icon.style.transform = 'translateX(0) rotate(0)';
            }
        });
    });
    
    // Animation pour les badges
    document.querySelectorAll('.article-badge').forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(5deg)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0)';
        });
    });
    
    // Animation pour les icônes des articles
    document.querySelectorAll('.article-icon').forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2) rotate(15deg)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0)';
        });
    });
    
    // Effet parallaxe pour le background
    document.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;
        
        const bg = document.querySelector('main');
        if (bg) {
            bg.style.backgroundPosition = `center ${rate}px`;
        }
    });
    
    // Filtrage par catégorie
    const filterButtons = document.querySelectorAll('.filter-btn');
    const articles = document.querySelectorAll('.article-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Mettre à jour le bouton actif
            filterButtons.forEach(btn => {
                btn.classList.remove('bg-indigo-500', 'text-white');
                btn.classList.add('bg-gray-100', 'text-gray-700');
            });
            this.classList.remove('bg-gray-100', 'text-gray-700');
            this.classList.add('bg-indigo-500', 'text-white');
            
            // Filtrer les articles
            articles.forEach(article => {
                if (category === 'all') {
                    article.style.display = 'block';
                    setTimeout(() => {
                        article.classList.add('visible');
                    }, 100);
                } else {
                    const articleCategory = article.getAttribute('data-category');
                    const formattedCategory = articleCategory.toLowerCase().replace(/\s+/g, '-');
                    
                    if (formattedCategory === category) {
                        article.style.display = 'block';
                        setTimeout(() => {
                            article.classList.add('visible');
                        }, 100);
                    } else {
                        article.classList.remove('visible');
                        setTimeout(() => {
                            article.style.display = 'none';
                        }, 300);
                    }
                }
            });
        });
    });
});

// Animation de chargement améliorée
let a = 0;
let masque = document.createElement('div');
let cercle = document.createElement('div');
let angle = 0;

window.addEventListener('load', () => {
    a = 1;
    
    // Animation améliorée du cercle
    anime = setInterval(() => {
        angle += 12;
        cercle.style.transform = `translate(-50%, -50%) rotate(${angle}deg) scale(${1 + Math.sin(angle * Math.PI / 180) * 0.1})`;
    }, 16);
    
    // Texte de chargement pour le blog
    const loadingText = document.createElement('div');
    loadingText.textContent = 'Chargement du Blog...';
    loadingText.style.color = 'white';
    loadingText.style.fontFamily = 'Verdana, Geneva, Tahoma, sans-serif';
    loadingText.style.fontSize = '20px';
    loadingText.style.fontWeight = 'bold';
    loadingText.style.marginTop = '20px';
    loadingText.style.textAlign = 'center';
    loadingText.style.opacity = '0.9';
    masque.appendChild(loadingText);
    
    // Faire disparaître le masque
    setTimeout(() => {
        clearInterval(anime);
        masque.style.opacity = '0';
        masque.style.transform = 'scale(1.05)';
    }, 1200);
    
    setTimeout(() => {
        masque.style.visibility = 'hidden';
    }, 1800);
});

// Création du masque pour le blog
masque.style.width = '100%';
masque.style.height = '100vh';
masque.style.zIndex = '100000';
masque.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
masque.style.position = 'fixed';
masque.style.top = '0';
masque.style.left = '0';
masque.style.opacity = '1';
masque.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
masque.style.display = 'flex';
masque.style.justifyContent = 'center';
masque.style.alignItems = 'center';
masque.style.flexDirection = 'column';
document.body.appendChild(masque);

// Création du cercle amélioré
cercle.style.width = '60px';
cercle.style.height = '60px';
cercle.style.border = '3px solid rgba(255, 255, 255, 0.2)';
cercle.style.borderTop = '3px solid white';
cercle.style.borderRadius = '50%';
cercle.style.position = 'absolute';
cercle.style.top = '50%';
cercle.style.left = '50%';
cercle.style.transform = 'translate(-50%, -50%)';
cercle.style.boxSizing = 'border-box';
cercle.style.zIndex = '1';
cercle.style.boxShadow = '0 0 20px rgba(255, 255, 255, 0.3)';
masque.appendChild(cercle);

let anime;
</script>

<?php
include('assets/includes/footer.php');
?>
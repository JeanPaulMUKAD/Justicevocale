<?php
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
    
    /* Animation en cascade pour les articles */
    .article-card:nth-child(1) { transition-delay: 0.1s; }
    .article-card:nth-child(2) { transition-delay: 0.2s; }
    .article-card:nth-child(3) { transition-delay: 0.3s; }
    .article-card:nth-child(4) { transition-delay: 0.4s; }
    
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
        </div>
    </section>
    
    <!-- Articles Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3">
            <!-- Article 1 -->
            <article
                class="article-card bg-white/95 rounded-2xl shadow-xl border border-blue-100 hover:shadow-indigo-200 transition-all duration-500 flex flex-col overflow-hidden group">
                <div class="article-gradient h-40 bg-gradient-to-br from-indigo-400 to-purple-400 flex items-center justify-center relative overflow-hidden">
                    <i class="fas fa-briefcase text-white text-5xl drop-shadow article-icon"></i>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <span
                        class="article-badge inline-block mb-2 px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold group-hover:bg-indigo-200 group-hover:scale-105 transition-all duration-300">
                        Droit du travail
                    </span>
                    <h3 class="article-title text-2xl font-bold text-indigo-700 mb-2 title-glow group-hover:text-indigo-800 transition-colors duration-300">
                        Comprendre le droit du travail en RDC
                    </h3>
                    <p class="article-description text-gray-600 mb-4 flex-1 text-justify group-hover:text-gray-700 transition-colors duration-300">
                        Un guide pratique pour connaître vos droits et obligations en tant que salarié ou employeur en République Démocratique du Congo.
                    </p>
                    <a href="article-travail.php"
                        class="article-link mt-auto text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                        Lire l'article 
                        <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>
            </article>
            
            <!-- Article 2 -->
            <article
                class="article-card bg-white/95 rounded-2xl shadow-xl border border-blue-100 hover:shadow-indigo-200 transition-all duration-500 flex flex-col overflow-hidden group">
                <div class="article-gradient h-40 bg-gradient-to-br from-purple-400 to-indigo-400 flex items-center justify-center relative overflow-hidden">
                    <i class="fas fa-gavel text-white text-5xl drop-shadow article-icon"></i>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <span
                        class="article-badge inline-block mb-2 px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold group-hover:bg-purple-200 group-hover:scale-105 transition-all duration-300">
                        Procédure civile
                    </span>
                    <h3 class="article-title text-2xl font-bold text-indigo-700 mb-2 title-glow group-hover:text-indigo-800 transition-colors duration-300">
                        Les étapes d'un procès civil expliqué simplement
                    </h3>
                    <p class="article-description text-gray-600 mb-4 flex-1 text-justify group-hover:text-gray-700 transition-colors duration-300">
                        Découvrez les différentes phases d'un procès civil, de la saisine du tribunal au jugement, en langage accessible à tous.
                    </p>
                    <a href="article-proces.php"
                        class="article-link mt-auto text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                        Lire l'article 
                        <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>
            </article>
            
            <!-- Article 3 -->
            <article
                class="article-card bg-white/95 rounded-2xl shadow-xl border border-blue-100 hover:shadow-indigo-200 transition-all duration-500 flex flex-col overflow-hidden group">
                <div class="article-gradient h-40 bg-gradient-to-br from-blue-400 to-purple-400 flex items-center justify-center relative overflow-hidden">
                    <i class="fas fa-shield-alt text-white text-5xl drop-shadow article-icon"></i>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <span
                        class="article-badge inline-block mb-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold group-hover:bg-blue-200 group-hover:scale-105 transition-all duration-300">
                        Droit numérique
                    </span>
                    <h3 class="article-title text-2xl font-bold text-indigo-700 mb-2 title-glow group-hover:text-indigo-800 transition-colors duration-300">
                        Droit numérique : protéger ses données personnelles
                    </h3>
                    <p class="article-description text-gray-600 mb-4 flex-1 text-justify group-hover:text-gray-700 transition-colors duration-300">
                        Conseils et bonnes pratiques pour sécuriser vos informations à l'ère du numérique et comprendre la législation sur la protection des données.
                    </p>
                    <a href="article-numerique.php"
                        class="article-link mt-auto text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                        Lire l'article 
                        <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>
            </article>
            
            <!-- Article 4 -->
            <article
                class="article-card bg-white/95 rounded-2xl shadow-xl border border-blue-100 hover:shadow-indigo-200 transition-all duration-500 flex flex-col overflow-hidden group md:col-span-2 lg:col-span-1">
                <div class="article-gradient h-40 bg-gradient-to-br from-indigo-400 to-blue-400 flex items-center justify-center relative overflow-hidden">
                    <i class="fas fa-building text-white text-5xl drop-shadow article-icon"></i>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <span
                        class="article-badge inline-block mb-2 px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold group-hover:bg-indigo-200 group-hover:scale-105 transition-all duration-300">
                        Immobilier
                    </span>
                    <h3 class="article-title text-2xl font-bold text-indigo-700 mb-2 title-glow group-hover:text-indigo-800 transition-colors duration-300">
                        Questions fréquentes sur le droit immobilier
                    </h3>
                    <p class="article-description text-gray-600 mb-4 flex-1 text-justify group-hover:text-gray-700 transition-colors duration-300">
                        Réponses claires aux interrogations les plus courantes concernant l'achat, la vente ou la location d'un bien immobilier.
                    </p>
                    <a href="article-immobilier.php"
                        class="article-link mt-auto text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all duration-300">
                        Lire l'article 
                        <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>
            </article>
        </div>
    </section>
</main>

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
        
        /* Animation pour le contenu des articles */
        .article-content {
            position: relative;
            z-index: 1;
        }
        
        /* Effet de profondeur */
        .article-card {
            perspective: 1000px;
        }
        
        .article-card > div {
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }
        
        .article-card:hover > div:first-child {
            transform: translateZ(20px);
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
        
        // Animation au clic
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const href = this.getAttribute('href');
            
            // Animation de clic
            this.style.transform = 'scale(0.95)';
            
            // Restaurer et naviguer
            setTimeout(() => {
                this.style.transform = '';
                window.location.href = href;
            }, 200);
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
<?php
// Déterminer le chemin actuel pour activer le lien correspondant
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>La Justice Vocale — Vulgarisation du droit</title>
    <meta name="description"
        content="Justice Vocale : rendre le droit accessible aux entrepreneurs et curieux. Articles, guides, contrats, numérique, immobilier." />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Animations pour le menu mobile */
        #mobile-menu {
            max-height: 0;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            transform: translateY(-10px);
        }
        
        #mobile-menu.open {
            max-height: 500px;
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Animation pour les liens du menu mobile */
        .mobile-menu-item {
            opacity: 0;
            transform: translateX(-20px);
            transition: all 0.3s ease;
        }
        
        #mobile-menu.open .mobile-menu-item {
            opacity: 1;
            transform: translateX(0);
        }
        
        /* Délais pour l'animation en cascade */
        #mobile-menu.open .mobile-menu-item:nth-child(1) { transition-delay: 0.1s; }
        #mobile-menu.open .mobile-menu-item:nth-child(2) { transition-delay: 0.2s; }
        #mobile-menu.open .mobile-menu-item:nth-child(3) { transition-delay: 0.3s; }
        #mobile-menu.open .mobile-menu-item:nth-child(4) { transition-delay: 0.4s; }
        #mobile-menu.open .mobile-menu-item:nth-child(5) { transition-delay: 0.5s; }
        
        /* Animation pour l'icône hamburger */
        .hamburger-line {
            transition: all 0.3s ease;
        }
        
        #btn-mobile.open .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }
        
        #btn-mobile.open .hamburger-line:nth-child(2) {
            opacity: 0;
        }
        
        #btn-mobile.open .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }
    </style>
</head>

<body class="antialiased bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800"
    style="font-family: Verdana, Geneva, Tahoma, sans-serif; scroll-behavior: smooth;">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <a href="/" class="flex items-center gap-3 transition-transform hover:scale-105">
                    <div
                        class="w-12 h-12 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-md">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div>
                        <h1
                            class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            La Justice Vocale</h1>
                        <p class="text-sm text-gray-500">Le droit expliqué
                            simplement</p>
                    </div>
                </a>
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="index.php"
                        class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600'; ?> font-medium flex items-center gap-1 transition-colors">
                        <i class="fas fa-home w-4"></i> Accueil
                    </a>
                    <a href="blog.php"
                        class="<?php echo ($current_page == 'blog.php') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600'; ?> font-medium flex items-center gap-1 transition-colors">
                        <i class="fas fa-newspaper w-4"></i> Blog
                    </a>
                    <a href="domaines.php"
                        class="<?php echo ($current_page == 'domaines.php') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600'; ?> font-medium flex items-center gap-1 transition-colors">
                        <i class="fas fa-tags w-4"></i> Domaines
                    </a>
                    <a href="about.php"
                        class="<?php echo ($current_page == 'about.php') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600'; ?> font-medium flex items-center gap-1 transition-colors">
                        <i class="fas fa-info-circle w-4"></i> À propos
                    </a>
                    <a href="contact.php"
                        class="<?php echo ($current_page == 'contact.php') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600'; ?> font-medium flex items-center gap-1 transition-colors">
                        <i class="fas fa-envelope w-4"></i> Contact
                    </a>
                </nav>
                <div class="md:hidden">
                    <button id="btn-mobile" class="p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-300 text-gray-700 transition-all duration-300">
                        <!-- Icône hamburger animée -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path class="hamburger-line" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16" />
                            <path class="hamburger-line" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 12h16" />
                            <path class="hamburger-line" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- mobile menu avec animation -->
        <div id="mobile-menu" class="md:hidden bg-white border-t border-gray-200 shadow-lg">
            <a href="index.php"
                class="mobile-menu-item block px-6 py-4 flex items-center gap-3 border-b border-gray-100 transition-all duration-300 hover:bg-indigo-50 <?php echo ($current_page == 'index.php' || $current_page == '') ? 'bg-indigo-50 text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600'; ?>">
                <i class="fas fa-home w-5 text-indigo-500"></i>
                <span>Accueil</span>
            </a>
            <a href="blog.php"
                class="mobile-menu-item block px-6 py-4 flex items-center gap-3 border-b border-gray-100 transition-all duration-300 hover:bg-indigo-50 <?php echo ($current_page == 'blog.php') ? 'bg-indigo-50 text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600'; ?>">
                <i class="fas fa-newspaper w-5 text-indigo-500"></i>
                <span>Blog</span>
            </a>
            <a href="domaines.php"
                class="mobile-menu-item block px-6 py-4 flex items-center gap-3 border-b border-gray-100 transition-all duration-300 hover:bg-indigo-50 <?php echo ($current_page == 'domaines.php') ? 'bg-indigo-50 text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600'; ?>">
                <i class="fas fa-tags w-5 text-indigo-500"></i>
                <span>Domaines</span>
            </a>
            <a href="about.php"
                class="mobile-menu-item block px-6 py-4 flex items-center gap-3 border-b border-gray-100 transition-all duration-300 hover:bg-indigo-50 <?php echo ($current_page == 'about.php') ? 'bg-indigo-50 text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600'; ?>">
                <i class="fas fa-info-circle w-5 text-indigo-500"></i>
                <span>À propos</span>
            </a>
            <a href="contact.php"
                class="mobile-menu-item block px-6 py-4 flex items-center gap-3 transition-all duration-300 hover:bg-indigo-50 <?php echo ($current_page == 'contact.php') ? 'bg-indigo-50 text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600'; ?>">
                <i class="fas fa-envelope w-5 text-indigo-500"></i>
                <span>Contact</span>
            </a>
        </div>
    </header>

    <script>
    // Animation du menu mobile
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('btn-mobile');
        const mobileMenu = document.getElementById('mobile-menu');
        let isMenuOpen = false;
        
        // Fonction pour ouvrir/fermer le menu
        function toggleMobileMenu() {
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                // Ouvrir le menu avec animation
                mobileMenu.classList.remove('hidden');
                setTimeout(() => {
                    mobileMenu.classList.add('open');
                    mobileMenuButton.classList.add('open');
                }, 10);
                
                // Empêcher le défilement de la page
                document.body.style.overflow = 'hidden';
                
                // Animation de l'icône hamburger
                mobileMenuButton.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path class="hamburger-line" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                `;
                
            } else {
                // Fermer le menu avec animation
                mobileMenu.classList.remove('open');
                mobileMenuButton.classList.remove('open');
                
                // Rétablir le défilement
                document.body.style.overflow = '';
                
                // Animation de l'icône hamburger
                setTimeout(() => {
                    mobileMenuButton.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path class="hamburger-line" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16" />
                            <path class="hamburger-line" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16" />
                            <path class="hamburger-line" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 18h16" />
                        </svg>
                    `;
                    
                    // Masquer complètement après l'animation
                    setTimeout(() => {
                        if (!isMenuOpen) {
                            mobileMenu.classList.add('hidden');
                        }
                    }, 500);
                }, 300);
            }
        }
        
        // Événement click sur le bouton
        mobileMenuButton.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleMobileMenu();
        });
        
        // Fermer le menu en cliquant sur un lien
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                if (isMenuOpen) {
                    toggleMobileMenu();
                }
            });
        });
        
        // Fermer le menu en cliquant en dehors
        document.addEventListener('click', function(e) {
            if (isMenuOpen && 
                !mobileMenu.contains(e.target) && 
                !mobileMenuButton.contains(e.target)) {
                toggleMobileMenu();
            }
        });
        
        // Fermer le menu avec la touche Échap
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMenuOpen) {
                toggleMobileMenu();
            }
        });
        
        // Animation au survol des liens du menu mobile
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
                this.style.transition = 'all 0.2s ease';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
    });
    </script>
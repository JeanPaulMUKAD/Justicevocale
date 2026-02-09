<!-- Footer -->
<footer class="bg-gray-800 text-white pt-12 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <!-- Logo et description -->
            <div class="footer-item" data-animate="fade-up">
                <div class="flex items-center gap-3 mb-4">
                    <div
                        class="w-10 h-10 bg-indigo-500 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <span class="text-xl font-bold hover:text-indigo-300 transition-colors">Justice Vocale</span>
                </div>
                <p class="text-gray-400 leading-relaxed">Rendre le droit accessible à tous grâce à des analyses sur les
                    différentes questions de Droit.</p>
            </div>

            <!-- Navigation -->
            <div class="footer-item" data-animate="fade-up" data-delay="100">
                <h3 class="font-semibold mb-4 text-lg border-l-4 border-indigo-500 pl-3">Navigation</h3>
                <ul class="space-y-2">
                    <li><a href="index.php"
                            class="footer-link text-gray-400 hover:text-white transition-all duration-300 flex items-center group">
                            <i
                                class="fas fa-chevron-right text-xs mr-2 group-hover:mr-3 transition-all duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Accueil</span>
                        </a></li>
                    <li><a href="blog.php"
                            class="footer-link text-gray-400 hover:text-white transition-all duration-300 flex items-center group">
                            <i
                                class="fas fa-chevron-right text-xs mr-2 group-hover:mr-3 transition-all duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Blog</span>
                        </a></li>
                    <li><a href="domaines.php"
                            class="footer-link text-gray-400 hover:text-white transition-all duration-300 flex items-center group">
                            <i
                                class="fas fa-chevron-right text-xs mr-2 group-hover:mr-3 transition-all duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Domaines</span>
                        </a></li>
                    <li><a href="about.php"
                            class="footer-link text-gray-400 hover:text-white transition-all duration-300 flex items-center group">
                            <i
                                class="fas fa-chevron-right text-xs mr-2 group-hover:mr-3 transition-all duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">À propos</span>
                        </a></li>
                    <li><a href="contact.php"
                            class="footer-link text-gray-400 hover:text-white transition-all duration-300 flex items-center group">
                            <i
                                class="fas fa-chevron-right text-xs mr-2 group-hover:mr-3 transition-all duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Contact</span>
                        </a></li>
                </ul>
            </div>

            <!-- Domaines juridiques -->
            <div class="footer-item" data-animate="fade-up" data-delay="200">
                <h3 class="font-semibold mb-4 text-lg border-l-4 border-purple-500 pl-3">Domaines juridiques</h3>
                <ul class="space-y-2">
                    <?php
                    $domaines = [
                        'Loi' => 'fas fa-book-law',
                        'Immobilier' => 'fas fa-home',
                        'Numérique' => 'fas fa-laptop-code',
                        'Contrat' => 'fas fa-file-signature',
                        'Entreprise' => 'fas fa-building',
                        'Avocat' => 'fas fa-user-tie'
                    ];

                    foreach ($domaines as $domaine => $icon):
                        ?>
                        <li>
                            <a href="domaines.php#<?php echo strtolower($domaine); ?>"
                                class="footer-link text-gray-400 hover:text-white transition-all duration-300 flex items-center group">
                                <i
                                    class="fas fa-chevron-right text-xs mr-2 group-hover:mr-3 transition-all duration-300"></i>
                                <span
                                    class="group-hover:translate-x-1 transition-transform duration-300"><?php echo $domaine; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contact -->
            <div class="footer-item" data-animate="fade-up" data-delay="300">
                <h3 class="font-semibold mb-4 text-lg border-l-4 border-blue-500 pl-3">Contact</h3>
                <ul class="space-y-3">
                    <li>
                        <a href="mailto:justiciakilipunda@gmail.com?subject=Contact%20Justice%20Vocale&body=Bonjour,%0D%0A%0D%0AJe%20vous%20contacte%20au%20sujet%20de..."
                            class="contact-item flex items-center text-gray-400 hover:text-white group transition-all duration-300 transform hover:translate-x-2">
                            <div
                                class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center mr-3 group-hover:bg-indigo-600 transition-colors duration-300">
                                <i class="fas fa-envelope text-sm"></i>
                            </div>
                            <span>justiciakilipunda@gmail.com</span>
                            <i
                                class="fas fa-external-link-alt ml-2 text-xs opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://wa.me/243993373550?text=Bonjour%20Justice%20Vocale,%20je%20vous%20contacte%20au%20sujet%20de..."
                            target="_blank"
                            class="contact-item flex items-center text-gray-400 hover:text-white group transition-all duration-300 transform hover:translate-x-2">
                            <div
                                class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center mr-3 group-hover:bg-green-600 transition-colors duration-300">
                                <i class="fab fa-whatsapp text-sm"></i>
                            </div>
                            <span>+243 993 373 550</span>
                            <i
                                class="fas fa-external-link-alt ml-2 text-xs opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                        </a>
                    </li>
                    <li class="flex items-center text-gray-400">
                        <div class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-map-marker-alt text-sm"></i>
                        </div>
                        <span>Lubumbashi, RD.Congo</span>
                    </li>
                </ul>

                <!-- Réseaux sociaux -->
                <div class="flex space-x-3 mt-6">

                    <a href="www.linkedin.com/in/justicia-kilipunda-352367309" target="_blank"
                        class="social-icon w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-[#0077B5] transition-all duration-300 transform hover:-translate-y-1 hover:scale-110 hover:shadow-lg">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://x.com" target="_blank"
                        class="social-icon w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-black transition-all duration-300 transform hover:-translate-y-1 hover:scale-110 hover:shadow-lg">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="pt-8 border-t border-gray-700 text-center text-gray-400 text-sm footer-item" data-animate="fade-up"
            data-delay="400">
            <p class="mb-2">&copy; <?php echo date('Y'); ?> Justice Vocale. Tous droits réservés.</p>
            <p class="text-xs">Conçu avec <i class="fas fa-heart text-red-500 mx-1"></i> pour la vulgarisation du droit
            </p>
        </div>
    </div>
</footer>

<!-- Bouton retour en haut -->
<button id="back-to-top"
    class="fixed bottom-8 right-8 w-12 h-12 bg-indigo-600 text-white rounded-full shadow-lg hover:bg-indigo-700 transition-all duration-300 opacity-0 transform translate-y-10 hidden md:flex items-center justify-center z-40">
    <i class="fas fa-arrow-up"></i>
</button>

<style>
    /* Animations pour le footer */
    .footer-item {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .footer-item.animated {
        opacity: 1;
        transform: translateY(0);
    }

    /* Animation pour les liens */
    .footer-link {
        position: relative;
        overflow: hidden;
    }

    .footer-link::before {
        content: '';
        position: absolute;
        left: -100%;
        bottom: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, transparent, #4f46e5, transparent);
        transition: left 0.4s ease;
    }

    .footer-link:hover::before {
        left: 100%;
    }

    /* Animation pour les icônes sociales */
    .social-icon {
        position: relative;
        overflow: hidden;
    }

    .social-icon::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transform: translate(-50%, -50%);
        transition: width 0.3s ease, height 0.3s ease;
    }

    .social-icon:hover::after {
        width: 100%;
        height: 100%;
    }

    /* Animation pour les contacts */
    .contact-item {
        position: relative;
        padding-left: 5px;
    }

    .contact-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        width: 3px;
        height: 0;
        background: #4f46e5;
        transform: translateY(-50%);
        transition: height 0.3s ease;
    }

    .contact-item:hover::before {
        height: 70%;
    }

    /* Animation du bouton retour en haut */
    #back-to-top.show {
        opacity: 1;
        transform: translateY(0);
    }

    #back-to-top:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
    }

    /* Effet de vague sur le footer */
    footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, #4f46e5, #8b5cf6, #4f46e5);
        background-size: 200% 100%;
        animation: wave 3s linear infinite;
    }

    @keyframes wave {
        0% {
            background-position: 200% 0;
        }

        100% {
            background-position: -200% 0;
        }
    }
</style>

<script>
    // Animation du footer au défilement
    document.addEventListener('DOMContentLoaded', function () {
        // Animer les éléments du footer
        function animateFooterItems() {
            const footerItems = document.querySelectorAll('.footer-item');
            const windowHeight = window.innerHeight;

            footerItems.forEach(item => {
                const itemTop = item.getBoundingClientRect().top;
                const delay = item.getAttribute('data-delay') || 0;

                if (itemTop < windowHeight - 100) {
                    setTimeout(() => {
                        item.classList.add('animated');
                    }, delay);
                }
            });
        }

        // Bouton retour en haut
        const backToTopBtn = document.getElementById('back-to-top');

        function toggleBackToTop() {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        }

        // Aller en haut de la page
        backToTopBtn.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Effet de vibration sur les icônes sociales
        document.querySelectorAll('.social-icon').forEach(icon => {
            icon.addEventListener('mouseenter', function () {
                this.style.animation = 'vibrate 0.3s linear';
            });

            icon.addEventListener('animationend', function () {
                this.style.animation = '';
            });
        });

        // Confirmation de clic sur les contacts
        document.querySelectorAll('.contact-item').forEach(item => {
            item.addEventListener('click', function (e) {
                // Petite animation de confirmation
                const icon = this.querySelector('i:last-child');
                if (icon) {
                    icon.style.transform = 'scale(1.5)';
                    setTimeout(() => {
                        icon.style.transform = 'scale(1)';
                    }, 300);
                }
            });
        });

        // Animation au chargement
        window.addEventListener('load', function () {
            animateFooterItems();
            toggleBackToTop();
        });

        // Animation au défilement
        window.addEventListener('scroll', function () {
            animateFooterItems();
            toggleBackToTop();
        });

        // Ajouter des styles d'animation supplémentaires
        const style = document.createElement('style');
        style.textContent = `
        @keyframes vibrate {
            0%, 100% { transform: translateX(0) translateY(-1px) scale(1.1); }
            25% { transform: translateX(-2px) translateY(-1px) scale(1.1); }
            75% { transform: translateX(2px) translateY(-1px) scale(1.1); }
        }
        
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(79, 70, 229, 0.7); }
            50% { box-shadow: 0 0 20px 10px rgba(79, 70, 229, 0); }
        }
        
        .pulse-glow {
            animation: pulse-glow 2s infinite;
        }
        
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    `;
        document.head.appendChild(style);

        // Ajouter l'animation de flottement à l'icône Justice Vocale
        const logoIcon = document.querySelector('.fa-balance-scale').parentElement;
        if (logoIcon) {
            logoIcon.classList.add('float-animation');
        }
    });

    // Animation pour le lien WhatsApp avec confirmation
    function sendWhatsAppMessage() {
        const phone = '243993373550';
        const message = encodeURIComponent('Bonjour Justice Vocale, je vous contacte au sujet de...');
        window.open(`https://wa.me/${phone}?text=${message}`, '_blank');

        // Petite animation de confirmation
        const whatsappBtn = document.querySelector('[href*="wa.me"]');
        if (whatsappBtn) {
            whatsappBtn.classList.add('pulse-glow');
            setTimeout(() => {
                whatsappBtn.classList.remove('pulse-glow');
            }, 2000);
        }
    }

    // Remplacer le lien WhatsApp par la fonction
    document.addEventListener('DOMContentLoaded', function () {
        const whatsappLink = document.querySelector('[href*="wa.me"]');
        if (whatsappLink) {
            whatsappLink.addEventListener('click', function (e) {
                e.preventDefault();
                sendWhatsAppMessage();
            });
        }
    });
</script>
<?php
include('assets/includes/header.php');
?>


<style>
    /* Animations pour les sections */
    .section-animate {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .section-animate.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Animation pour la Hero Section */
    .hero-content {
        opacity: 0;
        transform: translateX(-30px);
        transition: all 0.8s ease 0.3s;
    }

    .hero-image {
        opacity: 0;
        transform: translateX(30px);
        transition: all 0.8s ease 0.5s;
    }

    .hero-visible .hero-content,
    .hero-visible .hero-image {
        opacity: 1;
        transform: translateX(0);
    }

    /* Animation pour les cartes */
    .card-animate {
        opacity: 0;
        transform: scale(0.9);
        transition: all 0.6s ease;
    }

    .card-animate.visible {
        opacity: 1;
        transform: scale(1);
    }

    /* Animation pour les domaines */
    .domaine-item {
        opacity: 0;
        transform: translateY(20px) rotateX(-10deg);
        transition: all 0.5s ease;
    }

    .domaine-item.visible {
        opacity: 1;
        transform: translateY(0) rotateX(0);
    }

    /* Animation pour la newsletter */
    .newsletter-animate {
        opacity: 0;
        transform: scale(0.95);
        transition: all 0.7s ease;
    }

    .newsletter-animate.visible {
        opacity: 1;
        transform: scale(1);
    }

    /* Animation en cascade pour les cartes */
    .card-animate:nth-child(1) {
        transition-delay: 0.1s;
    }

    .card-animate:nth-child(2) {
        transition-delay: 0.2s;
    }

    .card-animate:nth-child(3) {
        transition-delay: 0.3s;
    }

    /* Animation en cascade pour les domaines */
    .domaine-item:nth-child(1) {
        transition-delay: 0.1s;
    }

    .domaine-item:nth-child(2) {
        transition-delay: 0.2s;
    }

    .domaine-item:nth-child(3) {
        transition-delay: 0.3s;
    }

    .domaine-item:nth-child(4) {
        transition-delay: 0.4s;
    }

    .domaine-item:nth-child(5) {
        transition-delay: 0.5s;
    }

    .domaine-item:nth-child(6) {
        transition-delay: 0.6s;
    }

    /* Animation pour le bouton Voir tous les domaines */
    .btn-animate {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease 0.8s;
    }

    .btn-animate.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Effet de parallaxe pour les cercles de la hero */
    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    .float-animation {
        animation: float 6s ease-in-out infinite;
    }

    /* Animation pour les liens */
    .animated-link {
        position: relative;
        overflow: hidden;
    }

    .animated-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, #fff, transparent);
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }

    .animated-link:hover::after {
        transform: translateX(100%);
    }

    /* Style pour l'écran de chargement */
    #loading-mask {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        z-index: 99999;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        transition: opacity 0.8s ease, visibility 0.8s ease;
    }

    /* Pour mobile - optimisation */
    @media (max-width: 768px) {
        .hero-section .flex {
            flex-direction: column !important;
        }

        .hero-content,
        .hero-image {
            width: 100% !important;
            text-align: center;
        }

        .grid {
            grid-template-columns: 1fr !important;
        }

        .float-animation {
            animation: none !important;
        }
    }
</style>

<!-- Écran de chargement simple -->
<div id="loading-mask">
    <div
        style="color: white; font-family: Verdana; font-size: 24px; font-weight: bold; margin-bottom: 20px; text-align: center;">
        Justice Vocale
    </div>
    <div
        style="width: 60px; height: 60px; border: 3px solid rgba(255,255,255,0.3); border-top: 3px solid white; border-radius: 50%; animation: spin 1s linear infinite;">
    </div>
    <div
        style="color: rgba(255,255,255,0.8); font-family: Verdana; font-size: 14px; margin-top: 10px; text-align: center;">
        Chargement...
    </div>
</div>

<main class="mt-8 mb-16">
    <!-- Hero Section avec animation -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12 hero-section">
        <div
            class="bg-gradient-to-r from-indigo-600 to-purple-700 rounded-2xl p-8 shadow-xl text-white overflow-hidden relative">
            <!-- Cercles animés -->
            <div
                class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -translate-y-32 translate-x-32 float-animation hidden md:block">
            </div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white opacity-10 rounded-full translate-y-24 -translate-x-24 float-animation hidden md:block"
                style="animation-delay: 2s;"></div>

            <div class="flex flex-col lg:flex-row gap-8 items-center relative z-10">
                <div class="lg:w-1/2 hero-content">
                    <h1 class="text-3xl md:text-4xl font-bold mb-4 animate-text">La Justice Vocale — Le droit à la
                        portée de tous</h1>
                    <p class="text-lg opacity-90 mb-6 text-justify leading-relaxed">Un espace d'information et de
                        vulgarisation du droit. Nos articles expliquent clairement les notions juridiques à l'intention de tout entrepreneur, 
                        juriste ou toute personne curieuse souhaitant mieux appréhender la loi ainsi que les thématiques juridiques.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="domaines.php"
                            class="animated-link inline-flex items-center justify-center px-5 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow-md hover:bg-gray-100 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-book-open mr-2"></i> Découvrir nos domaines
                        </a>
                        <a href="about.php"
                            class="animated-link inline-flex items-center justify-center px-5 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-indigo-600 transition-all duration-300 transform hover:-translate-y-1">
                            <i class="fas fa-play-circle mr-2"></i> En savoir plus
                        </a>
                    </div>
                </div>
                <div class="lg:w-1/2 flex justify-center hero-image">
                    <div class="relative">
                        <img src="images/juriste.png" alt="Justice"
                            class="rounded-xl shadow-2xl w-full max-w-md transform transition-transform duration-700 hover:scale-105" />
                        <div class="absolute -bottom-4 -right-4 bg-yellow-400 text-gray-900 p-3 rounded-lg shadow-lg">
                            <i class="fas fa-gavel text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section avec animation -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16 section-animate">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Pourquoi choisir Justice Vocale ?</h2>
            <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">Nous transformons le jargon juridique en
                informations accessibles et pratiques pour votre quotidien professionnel et personnel.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                class="card-animate bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-indigo-500 transform hover:-translate-y-2">
                <div
                    class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-4 hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-graduation-cap text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Pédagogique</h3>
                <p class="text-gray-600 text-justify leading-relaxed">Des explications et analyses juridiques pour une
                    meilleure assimilation du Droit.</p>
            </div>

            <div
                class="card-animate bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-purple-500 transform hover:-translate-y-2">
                <div
                    class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mb-4 hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-briefcase text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Pratique</h3>
                <p class="text-gray-600 text-justify leading-relaxed">Des suggestions et avis éclairés et orientés pour
                    une meilleure compréhension de l'univers juridique.</p>
            </div>

            <div
                class="card-animate bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 border-l-4 border-blue-500 transform hover:-translate-y-2">
                <div
                    class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mb-4 hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-clock text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Actualisé</h3>
                <p class="text-gray-600 text-justify leading-relaxed">Un contenu régulièrement mis à jour selon
                    l'évolution de la législation et de la jurisprudence.</p>
            </div>
        </div>
    </section>

    <!-- Newsletter avec animation -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16 newsletter-animate" id="newsletter-section">
        <div
            class="bg-gradient-to-r from-indigo-500 to-blue-600 rounded-2xl p-8 text-white text-center shadow-xl transform hover:scale-[1.02] transition-transform duration-500 relative overflow-hidden">
            <!-- Effets d'arrière-plan -->
            <div
                class="absolute top-0 left-0 w-32 h-32 bg-white opacity-10 rounded-full -translate-x-16 -translate-y-16">
            </div>
            <div
                class="absolute bottom-0 right-0 w-40 h-40 bg-white opacity-10 rounded-full translate-x-20 translate-y-20">
            </div>

            <h2 class="text-2xl font-bold mb-2 relative z-10">Restez informé</h2>
            <p class="mb-6 max-w-2xl mx-auto opacity-90 leading-relaxed relative z-10">
                Abonnez-vous à notre newsletter pour recevoir nos derniers articles
                et des conseils juridiques pratiques directement dans votre boîte mail.
            </p>

            <!-- Formulaire de newsletter -->
            <form id="newsletter-form" class="max-w-md mx-auto flex flex-col sm:flex-row gap-3 relative z-10">
                <div class="flex-grow relative">
                    <input type="email" id="newsletter-email" name="email" placeholder="Votre adresse email"
                        class="w-full px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-300 transition-all duration-300 focus:transform focus:scale-105"
                        required>
                    <div
                        class="absolute bottom-0 left-0 w-0 h-1 bg-gradient-to-r from-green-400 to-blue-500 rounded-full transition-all duration-500">
                    </div>
                </div>
                <button type="submit" id="newsletter-submit"
                    class="bg-white text-indigo-600 font-semibold px-6 py-3 rounded-lg hover:bg-gray-100 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg whitespace-nowrap flex items-center justify-center min-w-[140px]">
                    <i class="fas fa-paper-plane mr-2"></i>
                    <span>S'abonner</span>
                </button>
            </form>

            <!-- Message de confirmation -->
            <div id="newsletter-message" class="mt-4 text-sm opacity-0 transition-opacity duration-300"></div>

            <!-- Statistiques (optionnel) -->
            <div class="mt-6 pt-4 border-t border-white/20 text-xs opacity-80">
                <p><i class="fas fa-shield-alt mr-1"></i> Vos données sont confidentielles</p>
            </div>
        </div>
    </section>

    <script>
        // Gestion simplifiée de la newsletter
        document.addEventListener('DOMContentLoaded', function () {
            const newsletterForm = document.getElementById('newsletter-form');
            const newsletterEmail = document.getElementById('newsletter-email');
            const newsletterSubmit = document.getElementById('newsletter-submit');
            const newsletterMessage = document.getElementById('newsletter-message');
            const progressBar = document.querySelector('#newsletter-form .absolute.bottom-0');

            if (newsletterForm) {
                // Vérifier si déjà inscrit
                if (localStorage.getItem('newsletter_subscribed') === 'true') {
                    const savedEmail = localStorage.getItem('newsletter_email');
                    newsletterEmail.value = savedEmail || '';
                    newsletterEmail.disabled = true;
                    newsletterSubmit.innerHTML = '<i class="fas fa-check mr-2"></i> Déjà inscrit';
                    newsletterSubmit.disabled = true;
                    newsletterSubmit.classList.add('bg-green-100', 'text-green-800');

                    if (progressBar) {
                        progressBar.style.width = '100%';
                        progressBar.style.background = 'linear-gradient(to right, #10b981, #34d399)';
                    }

                    // Ajouter un bouton pour changer d'email
                    const changeEmailBtn = document.createElement('button');
                    changeEmailBtn.type = 'button';
                    changeEmailBtn.className = 'mt-2 text-sm text-white/80 hover:text-white transition-colors';
                    changeEmailBtn.innerHTML = '<i class="fas fa-edit mr-1"></i> Utiliser un autre email';
                    changeEmailBtn.addEventListener('click', function () {
                        // Réactiver le formulaire
                        newsletterEmail.value = '';
                        newsletterEmail.disabled = false;
                        newsletterEmail.focus();

                        newsletterSubmit.innerHTML = '<i class="fas fa-paper-plane mr-2"></i> S\'abonner';
                        newsletterSubmit.disabled = false;
                        newsletterSubmit.classList.remove('bg-green-100', 'text-green-800');

                        if (progressBar) {
                            progressBar.style.width = '0';
                            progressBar.style.background = 'linear-gradient(to right, #4f46e5, #8b5cf6)';
                        }

                        // Supprimer les données de localStorage
                        localStorage.removeItem('newsletter_subscribed');
                        localStorage.removeItem('newsletter_email');

                        // Supprimer le bouton "changer d'email"
                        this.remove();

                        showMessage('Vous pouvez maintenant utiliser une nouvelle adresse email', 'info');
                    });

                    newsletterForm.parentNode.insertBefore(changeEmailBtn, newsletterMessage);
                }

                // Animation de la barre de progression
                newsletterEmail.addEventListener('focus', function () {
                    if (progressBar) {
                        progressBar.style.width = '100%';
                    }
                });

                newsletterEmail.addEventListener('blur', function () {
                    if (!this.value && progressBar) {
                        progressBar.style.width = '0';
                    }
                });

                // Gestion de la soumission
                newsletterForm.addEventListener('submit', async function (e) {
                    e.preventDefault();

                    const email = newsletterEmail.value.trim();

                    // Validation simple
                    if (!validateEmail(email)) {
                        showMessage('Veuillez entrer une adresse email valide', 'error');
                        newsletterEmail.focus();
                        return;
                    }

                    // Désactiver le bouton pendant l'envoi
                    const originalText = newsletterSubmit.innerHTML;
                    newsletterSubmit.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Envoi...';
                    newsletterSubmit.disabled = true;

                    try {
                        // Envoyer les données au serveur
                        const formData = new FormData();
                        formData.append('email', email);

                        const response = await fetch('assets/includes/newsletter-handler.php', {
                            method: 'POST',
                            body: formData
                        });

                        const data = await response.json();

                        if (data.success) {
                            showMessage(data.message, 'success');

                            // Sauvegarder dans localStorage
                            localStorage.setItem('newsletter_subscribed', 'true');
                            localStorage.setItem('newsletter_email', email);

                            // Désactiver le formulaire après inscription
                            newsletterEmail.disabled = true;
                            newsletterSubmit.innerHTML = '<i class="fas fa-check mr-2"></i> Inscrit !';
                            newsletterSubmit.classList.add('bg-green-100', 'text-green-800');

                            if (progressBar) {
                                progressBar.style.width = '100%';
                                progressBar.style.background = 'linear-gradient(to right, #10b981, #34d399)';
                            }

                            // Animation de célébration
                            celebrateSubscription();

                            // Ajouter le bouton pour changer d'email si pas déjà présent
                            if (!document.querySelector('button[type="button"].mt-2')) {
                                const changeEmailBtn = document.createElement('button');
                                changeEmailBtn.type = 'button';
                                changeEmailBtn.className = 'mt-2 text-sm text-white/80 hover:text-white transition-colors';
                                changeEmailBtn.innerHTML = '<i class="fas fa-edit mr-1"></i> Utiliser un autre email';
                                changeEmailBtn.addEventListener('click', function () {
                                    // Réactiver le formulaire
                                    newsletterEmail.value = '';
                                    newsletterEmail.disabled = false;
                                    newsletterEmail.focus();

                                    newsletterSubmit.innerHTML = '<i class="fas fa-paper-plane mr-2"></i> S\'abonner';
                                    newsletterSubmit.disabled = false;
                                    newsletterSubmit.classList.remove('bg-green-100', 'text-green-800');

                                    if (progressBar) {
                                        progressBar.style.width = '0';
                                        progressBar.style.background = 'linear-gradient(to right, #4f46e5, #8b5cf6)';
                                    }

                                    // Supprimer les données de localStorage
                                    localStorage.removeItem('newsletter_subscribed');
                                    localStorage.removeItem('newsletter_email');

                                    // Supprimer le bouton "changer d'email"
                                    this.remove();

                                    showMessage('Vous pouvez maintenant utiliser une nouvelle adresse email', 'info');
                                });

                                newsletterForm.parentNode.insertBefore(changeEmailBtn, newsletterMessage);
                            }

                        } else {
                            showMessage(data.message, 'error');
                            newsletterSubmit.innerHTML = originalText;
                            newsletterSubmit.disabled = false;
                        }

                    } catch (error) {
                        console.error('Erreur:', error);
                        showMessage('Une erreur est survenue. Veuillez réessayer.', 'error');
                        newsletterSubmit.innerHTML = originalText;
                        newsletterSubmit.disabled = false;
                    }
                });

                // Fonction de validation d'email
                function validateEmail(email) {
                    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return re.test(email);
                }

                // Fonction pour afficher les messages
                function showMessage(message, type = 'info') {
                    newsletterMessage.textContent = message;
                    newsletterMessage.className = 'mt-4 text-sm transition-opacity duration-300 opacity-100 ';

                    switch (type) {
                        case 'success':
                            newsletterMessage.classList.add('text-green-300');
                            break;
                        case 'error':
                            newsletterMessage.classList.add('text-red-300');
                            break;
                        default:
                            newsletterMessage.classList.add('text-white');
                    }

                    // Masquer le message après 5 secondes
                    setTimeout(() => {
                        newsletterMessage.style.opacity = '0';
                    }, 5000);
                }

                // Animation de célébration
                function celebrateSubscription() {
                    const section = document.getElementById('newsletter-section');

                    // Confettis
                    for (let i = 0; i < 50; i++) {
                        createConfetti(section);
                    }

                    // Animation du bouton
                    newsletterSubmit.classList.add('animate-pulse');
                    setTimeout(() => {
                        newsletterSubmit.classList.remove('animate-pulse');
                    }, 2000);
                }

                // Créer des confettis
                function createConfetti(container) {
                    const confetti = document.createElement('div');
                    const colors = ['#4f46e5', '#8b5cf6', '#ec4899', '#10b981', '#f59e0b'];

                    confetti.style.cssText = `
                    position: absolute;
                    width: ${Math.random() * 10 + 5}px;
                    height: ${Math.random() * 10 + 5}px;
                    background: ${colors[Math.floor(Math.random() * colors.length)]};
                    border-radius: ${Math.random() > 0.5 ? '50%' : '0'};
                    top: -20px;
                    left: ${Math.random() * 100}%;
                    opacity: ${Math.random() * 0.5 + 0.5};
                    z-index: 1;
                    animation: fall ${Math.random() * 2 + 2}s linear forwards;
                `;

                    container.appendChild(confetti);

                    // Supprimer après animation
                    setTimeout(() => {
                        confetti.remove();
                    }, 3000);
                }

                // Ajouter l'animation des confettis au CSS
                const confettiStyle = document.createElement('style');
                confettiStyle.textContent = `
                @keyframes fall {
                    0% {
                        transform: translateY(0) rotate(0deg);
                        opacity: 1;
                    }
                    100% {
                        transform: translateY(500px) rotate(${Math.random() * 360}deg);
                        opacity: 0;
                    }
                }
            `;
                document.head.appendChild(confettiStyle);
            }
        });
    </script>

    <!-- Domaines de spécialité avec animation -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16 section-animate">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold mb-4">Nos domaines juridiques</h2>
            <p class="text-gray-600 max-w-3xl mx-auto leading-relaxed">Découvrez nos articles classés par domaines :
                Loi, Immobilier, Numérique, Contrat, Entreprise, Avocat.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php
            $domaines = [
                ['nom' => 'La Loi', 'icon' => 'gavel', 'color' => 'yellow', 'link' => 'domaines.php#loi'],
                ['nom' => "L'Immobilier", 'icon' => 'home', 'color' => 'purple', 'link' => 'domaines.php#immobilier'],
                ['nom' => 'Le Numérique', 'icon' => 'laptop-code', 'color' => 'green', 'link' => 'domaines.php#numerique'],
                ['nom' => 'Le Contrat', 'icon' => 'file-signature', 'color' => 'indigo', 'link' => 'domaines.php#contrat'],
                ['nom' => "L'Entreprise", 'icon' => 'building', 'color' => 'blue', 'link' => 'domaines.php#entreprise'],
                ['nom' => "L'Avocat", 'icon' => 'user-tie', 'color' => 'red', 'link' => 'domaines.php#avocat']
            ];

            foreach ($domaines as $domaine):
                ?>
                <a href="<?php echo $domaine['link']; ?>"
                    class="domaine-item bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 text-center group transform hover:-translate-y-2">
                    <div
                        class="w-16 h-16 bg-<?php echo $domaine['color']; ?>-100 text-<?php echo $domaine['color']; ?>-700 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-<?php echo $domaine['color']; ?>-500 group-hover:text-white transition-all duration-300 transform group-hover:scale-110 group-hover:rotate-12">
                        <i class="fas fa-<?php echo $domaine['icon']; ?> text-2xl"></i>
                    </div>
                    <h3
                        class="font-semibold text-gray-800 group-hover:text-<?php echo $domaine['color']; ?>-600 transition-colors duration-300">
                        <?php echo $domaine['nom']; ?>
                    </h3>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-8 btn-animate">
            <a href="domaines.php"
                class="inline-flex items-center justify-center px-5 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                <i class="fas fa-tags mr-2"></i> Voir tous les domaines
            </a>
        </div>
    </section>
</main>

<script>
    // SIMPLIFIÉ - Animation au défilement optimisée pour mobile
    document.addEventListener('DOMContentLoaded', function () {
        console.log('DOM chargé - Justice Vocale');

        // 1. MASQUER L'ÉCRAN DE CHARGEMENT IMMÉDIATEMENT
        const loadingMask = document.getElementById('loading-mask');
        if (loadingMask) {
            setTimeout(() => {
                loadingMask.style.opacity = '0';
                setTimeout(() => {
                    loadingMask.style.display = 'none';
                }, 800);
            }, 300);
        }

        // 2. ANIMATION DE LA HERO SECTION
        const heroSection = document.querySelector('.hero-section');
        if (heroSection) {
            setTimeout(() => {
                heroSection.classList.add('hero-visible');
            }, 500);
        }

        // 3. FONCTION SIMPLIFIÉE POUR LES ANIMATIONS AU SCROLL
        function animateOnScroll() {
            const elements = document.querySelectorAll('.section-animate, .card-animate, .domaine-item, .newsletter-animate, .btn-animate');

            elements.forEach(element => {
                const rect = element.getBoundingClientRect();
                const windowHeight = window.innerHeight;

                // Si l'élément est visible dans la fenêtre
                if (rect.top < windowHeight - 100 && rect.bottom > 0) {
                    element.classList.add('visible');
                }
            });
        }

        // 4. INITIALISER LES ANIMATIONS
        animateOnScroll();

        // 5. ÉCOUTER LE SCROLL (mais limiter pour mobile)
        let scrollTimeout;
        window.addEventListener('scroll', function () {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(animateOnScroll, 50); // Délai pour performance mobile
        });

        // 6. ANIMATION DU FORMULAIRE NEWSLETTER
        const newsletterForm = document.querySelector('form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const button = this.querySelector('button');
                const originalText = button.innerHTML;

                // Animation de soumission
                button.innerHTML = '<i class="fas fa-check mr-2"></i> Inscription envoyée!';
                button.classList.add('bg-green-500', 'hover:bg-green-600');

                // Réinitialiser après 3 secondes
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.classList.remove('bg-green-500', 'hover:bg-green-600');
                    this.reset();
                }, 3000);
            });
        }

        // 7. OPTIMISATION POUR MOBILE - DÉSACTIVER CERTAINES ANIMATIONS
        if (window.innerWidth <= 768) {
            // Désactiver les animations 3D sur mobile
            document.querySelectorAll('.domaine-item').forEach(item => {
                item.style.transform = 'translateY(20px)';
            });

            // Désactiver le hover scale sur mobile
            document.querySelectorAll('.hover\\:scale-105').forEach(el => {
                el.classList.remove('hover:scale-105');
            });
        }

        // 8. AJOUTER L'ANIMATION SPIN AU CSS
        const style = document.createElement('style');
        style.textContent = `
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        @keyframes textReveal {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        /* Optimisations pour mobile */
        @media (max-width: 768px) {
            .float-animation {
                display: none !important;
            }
            
            .transform {
                transition: none !important;
            }
            
            .hover\\:scale-105 {
                transform: none !important;
            }
        }
    `;
        document.head.appendChild(style);
    });

    // GARDE-FOU - Masquer l'écran de chargement même en cas d'erreur
    window.addEventListener('error', function () {
        const loadingMask = document.getElementById('loading-mask');
        if (loadingMask) {
            loadingMask.style.display = 'none';
        }
    });

    // Si la page est déjà chargée
    if (document.readyState === 'complete') {
        const loadingMask = document.getElementById('loading-mask');
        if (loadingMask) {
            loadingMask.style.display = 'none';
        }
    }
</script>

<?php
include('assets/includes/footer.php');
?>
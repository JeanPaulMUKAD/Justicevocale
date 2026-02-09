<?php
include('assets/includes/header.php');
?>

<style>
    /* Animations personnalisées */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .animate-on-scroll.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .animate-fade-in {
        animation: fadeIn 1s ease forwards;
    }
    
    .animate-slide-up {
        animation: slideUp 0.8s ease forwards;
    }
    
    .animate-scale-in {
        animation: scaleIn 0.6s ease forwards;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
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
    
    @keyframes scaleIn {
        from { 
            opacity: 0;
            transform: scale(0.9);
        }
        to { 
            opacity: 1;
            transform: scale(1);
        }
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 20px rgba(99, 102, 241, 0.3); }
        50% { box-shadow: 0 0 40px rgba(99, 102, 241, 0.6); }
    }
    
    /* Styles spécifiques */
    .hero-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #6b46c1 100%);
    }
    
    .card-hover {
        transition: all 0.3s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .mission-icon {
        transition: all 0.4s ease;
    }
    
    .mission-icon:hover {
        transform: rotateY(180deg) scale(1.1);
    }
    
    .highlight-text {
        position: relative;
        display: inline-block;
    }
    
    .highlight-text::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, #667eea, #8b5cf6);
        opacity: 0.3;
        border-radius: 3px;
        z-index: -1;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(to bottom, #667eea, #8b5cf6);
    }
</style>

<main class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative overflow-hidden">
        <div class="hero-gradient text-white py-20 md:py-32 relative">
            <!-- Éléments décoratifs -->
            <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-40 h-40 bg-purple-300/20 rounded-full blur-xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/4 w-20 h-20 bg-indigo-300/30 rounded-full blur-lg animate-bounce" style="animation-delay: 0.5s;"></div>
            
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <!-- Texte -->
                    <div class="lg:w-1/2 animate-fade-in">
                        <div class="mb-6">
                            <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-4">
                                <i class="fas fa-scale-balanced mr-2"></i> Vulgarisation Juridique
                            </span>
                            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                                La Justice <span class="highlight-text">Vocale</span>
                            </h1>
                            <p class="text-xl opacity-90 mb-8 leading-relaxed">
                                Rendre le droit accessible, compréhensible et utile pour tous.
                            </p>
                        </div>
                        
                        <div class="flex flex-wrap gap-4">
                            <a href="#notre-mission" 
                               class="px-6 py-3 bg-white text-indigo-700 font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex items-center group">
                                <i class="fas fa-bullseye mr-2 group-hover:rotate-90 transition-transform"></i>
                                Notre mission
                            </a>
                            <a href="#nos-valeurs" 
                               class="px-6 py-3 bg-transparent border-2 border-white text-white font-semibold rounded-lg hover:bg-white/10 transition-all duration-300 transform hover:-translate-y-1 flex items-center group">
                                <i class="fas fa-heart mr-2 group-hover:scale-125 transition-transform"></i>
                                Nos valeurs
                            </a>
                        </div>
                    </div>
                    
                    <!-- Image -->
                    <div class="lg:w-1/2 animate-scale-in">
                        <div class="relative">
                            <div class="absolute -inset-4 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-3xl blur-lg opacity-30"></div>
                            <img src="images/juriste.png" 
                                 alt="Justice Vocale" 
                                 class="relative rounded-2xl shadow-2xl border-8 border-white transform hover:scale-105 transition-transform duration-500">
                            <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center shadow-2xl border-4 border-white animate-float">
                                <i class="fas fa-gavel text-white text-3xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Vague décorative -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" 
                      opacity=".25" fill="currentColor" class="text-white"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" 
                      opacity=".5" fill="currentColor" class="text-white"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" 
                      fill="currentColor" class="text-white"></path>
            </svg>
        </div>
    </section>

    <!-- Notre Mission -->
    <section id="notre-mission" class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <span class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold mb-4">
                    <i class="fas fa-star mr-2"></i> Notre Raison d'Être
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Notre <span class="text-indigo-600">Mission</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Briser les barrières de la complexité juridique pour rendre le droit accessible à tous.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Mission 1 -->
                <div class="animate-on-scroll card-hover bg-white rounded-2xl p-8 shadow-xl border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 mission-icon">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Éduquer & Former</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Proposer des contenus pédagogiques qui simplifient les concepts juridiques complexes pour une meilleure compréhension.
                    </p>
                </div>
                
                <!-- Mission 2 -->
                <div class="animate-on-scroll card-hover bg-white rounded-2xl p-8 shadow-xl border border-gray-100" style="transition-delay: 0.1s">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 mission-icon">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Accompagner</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Guider les entrepreneurs et particuliers dans leurs démarches juridiques avec des outils pratiques.
                    </p>
                </div>
                
                <!-- Mission 3 -->
                <div class="animate-on-scroll card-hover bg-white rounded-2xl p-8 shadow-xl border border-gray-100" style="transition-delay: 0.2s">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 mission-icon">
                        <i class="fas fa-bullhorn text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Informer</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Tenir nos lecteurs informés des dernières évolutions législatives et jurisprudentielles.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Nos Valeurs -->
    <section id="nos-valeurs" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Image -->
                <div class="animate-on-scroll">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-indigo-200 to-purple-200 rounded-3xl blur-xl opacity-50"></div>
                        <div class="relative bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-8 shadow-2xl">
                            <div class="aspect-video rounded-xl overflow-hidden">
                                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                                    <i class="fas fa-scale-balanced text-white text-8xl opacity-80"></i>
                                </div>
                            </div>
                            <div class="mt-8 flex justify-center space-x-4">
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-lightbulb text-white text-xl"></i>
                                </div>
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-shield-alt text-white text-xl"></i>
                                </div>
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-users text-white text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Valeurs -->
                <div class="animate-on-scroll">
                    <span class="inline-block px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold mb-4">
                        <i class="fas fa-heart mr-2"></i> Nos Fondements
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">
                        Nos <span class="text-purple-600">Valeurs</span>
                    </h2>
                    
                    <div class="space-y-8">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-indigo-100 to-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-circle text-indigo-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Exactitude</h4>
                                <p class="text-gray-600">Garantir l'exactitude et la fiabilité de toutes nos informations juridiques.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-green-100 to-teal-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-eye text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Transparence</h4>
                                <p class="text-gray-600">Être transparent sur nos sources et méthodologies.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-orange-100 to-red-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-900 mb-2">Accessibilité</h4>
                                <p class="text-gray-600">Rendre le droit compréhensible pour tous, sans jargon superflu.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pour qui ? -->
    <section class="py-20 bg-gradient-to-br from-indigo-50 to-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <span class="inline-block px-4 py-2 bg-indigo-100 text-indigo-700 rounded-full text-sm font-semibold mb-4">
                    <i class="fas fa-user-check mr-2"></i> Notre Public
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Pour <span class="text-indigo-600">Qui</span> ?
                </h2>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <?php
                $publics = [
                    [
                        'title' => 'Entrepreneurs',
                        'icon' => 'fa-briefcase',
                        'color' => 'from-blue-500 to-indigo-600',
                        'description' => 'Protégez votre entreprise avec une compréhension claire du droit des affaires.'
                    ],
                    [
                        'title' => 'Étudiants',
                        'icon' => 'fa-graduation-cap',
                        'color' => 'from-purple-500 to-pink-600',
                        'description' => 'Approfondissez vos connaissances juridiques avec des explications accessibles.'
                    ],
                    [
                        'title' => 'Particuliers',
                        'icon' => 'fa-user-friends',
                        'color' => 'from-green-500 to-teal-600',
                        'description' => 'Comprenez vos droits au quotidien dans tous les domaines de la vie.'
                    ]
                ];
                
                foreach ($publics as $index => $public):
                ?>
                <div class="animate-on-scroll card-hover bg-white rounded-2xl p-8 shadow-xl border border-gray-100" style="transition-delay: <?php echo $index * 0.1; ?>s">
                    <div class="w-20 h-20 bg-gradient-to-br <?php echo $public['color']; ?> rounded-2xl flex items-center justify-center mb-6 mx-auto transform hover:scale-110 transition-transform duration-300">
                        <i class="fas <?php echo $public['icon']; ?> text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 text-center"><?php echo $public['title']; ?></h3>
                    <p class="text-gray-600 text-center leading-relaxed">
                        <?php echo $public['description']; ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Notre Vision -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-3xl p-10 md:p-16 text-white shadow-2xl relative overflow-hidden animate-on-scroll">
                <!-- Éléments décoratifs -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full translate-y-24 -translate-x-24"></div>
                
                <div class="relative z-10">
                    <span class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-6">
                        <i class="fas fa-eye mr-2"></i> Notre Ambition
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold mb-8">
                        Notre <span class="text-yellow-300">Vision</span>
                    </h2>
                    
                    <div class="prose prose-lg prose-invert max-w-none">
                        <p class="text-xl mb-8 leading-relaxed">
                            Devenir la <strong>référence incontournable</strong> de la vulgarisation juridique francophone, 
                            en Afrique et particulièrement en République Démocratique du Congo.
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-8 mt-12">
                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                                <i class="fas fa-globe-africa text-3xl mb-4 text-yellow-300"></i>
                                <h4 class="text-lg font-bold mb-2">Influence Africaine</h4>
                                <p>Promouvoir une vision africaine du droit accessible à tous.</p>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                                <i class="fas fa-rocket text-3xl mb-4 text-yellow-300"></i>
                                <h4 class="text-lg font-bold mb-2">Innovation Continue</h4>
                                <p>Adapter constamment nos méthodes pour rester à la pointe.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Call to Action -->
            <div class="text-center mt-16 animate-on-scroll">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Prêt à mieux comprendre le droit ?</h3>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="contact.php"
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 group">
                        <i class="fas fa-envelope mr-3 text-xl group-hover:rotate-12 transition-transform"></i>
                        Nous contacter
                    </a>
                    <a href="blog.php"
                       class="inline-flex items-center px-8 py-4 bg-white text-indigo-700 font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 border-2 border-indigo-200 group">
                        <i class="fas fa-newspaper mr-3 text-xl group-hover:scale-110 transition-transform"></i>
                        Lire nos articles
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// Animation au défilement
document.addEventListener('DOMContentLoaded', function() {
    // Observer pour les animations au scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);
    
    // Observer tous les éléments avec la classe animate-on-scroll
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
        observer.observe(el);
    });
    
    // Animation pour les éléments avec délai
    setTimeout(() => {
        document.querySelectorAll('.animate-fade-in').forEach(el => {
            el.classList.add('visible');
        });
    }, 300);
    
    // Animation fluide pour les ancres
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Animation au survol des cartes
    document.querySelectorAll('.card-hover').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Effet de particules pour la section hero (optionnel)
    function createParticles() {
        const heroSection = document.querySelector('.hero-gradient');
        if (!heroSection) return;
        
        for (let i = 0; i < 15; i++) {
            const particle = document.createElement('div');
            particle.style.position = 'absolute';
            particle.style.width = Math.random() * 10 + 5 + 'px';
            particle.style.height = particle.style.width;
            particle.style.background = 'rgba(255, 255, 255, 0.3)';
            particle.style.borderRadius = '50%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animation = `float ${Math.random() * 3 + 2}s infinite ease-in-out`;
            particle.style.animationDelay = Math.random() * 2 + 's';
            heroSection.appendChild(particle);
        }
    }
    
    createParticles();
    
    // Ajouter l'animation float au CSS
    const floatStyle = document.createElement('style');
    floatStyle.textContent = `
        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            25% { transform: translateY(-20px) translateX(10px); }
            50% { transform: translateY(-10px) translateX(-10px); }
            75% { transform: translateY(-30px) translateX(5px); }
        }
    `;
    document.head.appendChild(floatStyle);
});

// Écran de chargement amélioré
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
    
    // Texte de chargement
    const loadingText = document.createElement('div');
    loadingText.textContent = 'Justice Vocale';
    loadingText.style.color = '#2F1C6A';
    loadingText.style.fontFamily = 'Verdana, Geneva, sans-serif';
    loadingText.style.fontSize = '24px';
    loadingText.style.fontWeight = 'bold';
    loadingText.style.marginBottom = '20px';
    loadingText.style.opacity = '0';
    loadingText.style.transition = 'opacity 0.5s ease';
    loadingText.style.textAlign = 'center';
    masque.appendChild(loadingText);
    
    // Faire apparaître le texte
    setTimeout(() => {
        loadingText.style.opacity = '1';
    }, 300);
    
    // Disparition progressive
    setTimeout(() => {
        clearInterval(anime);
        masque.style.opacity = '0';
        masque.style.transform = 'scale(1.1)';
        loadingText.style.opacity = '0';
    }, 1500);
    
    setTimeout(() => {
        masque.style.visibility = 'hidden';
    }, 2000);
});

// Création du masque
masque.style.width = '100%';
masque.style.height = '100vh';
masque.style.zIndex = '100000';
masque.style.background = 'linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%)';
masque.style.position = 'fixed';
masque.style.top = '0';
masque.style.left = '0';
masque.style.opacity = '1';
masque.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
masque.style.display = 'flex';
masque.style.flexDirection = 'column';
masque.style.justifyContent = 'center';
masque.style.alignItems = 'center';
document.body.appendChild(masque);

// Cercle de chargement
cercle.style.width = '60px';
cercle.style.height = '60px';
cercle.style.border = '3px solid #e2e8f0';
cercle.style.borderTop = '3px solid #2F1C6A';
cercle.style.borderRadius = '50%';
cercle.style.position = 'absolute';
cercle.style.top = '50%';
cercle.style.left = '50%';
cercle.style.transform = 'translate(-50%, -50%)';
cercle.style.boxSizing = 'border-box';
cercle.style.zIndex = '1';
cercle.style.boxShadow = '0 0 20px rgba(47, 28, 106, 0.1)';
masque.appendChild(cercle);

// Cercle interne
const innerCircle = document.createElement('div');
innerCircle.style.width = '40px';
innerCircle.style.height = '40px';
innerCircle.style.border = '2px solid rgba(47, 28, 106, 0.1)';
innerCircle.style.borderRadius = '50%';
innerCircle.style.position = 'absolute';
innerCircle.style.top = '50%';
innerCircle.style.left = '50%';
innerCircle.style.transform = 'translate(-50%, -50%)';
innerCircle.style.boxSizing = 'border-box';
cercle.appendChild(innerCircle);

let anime;
</script>

<?php
include('assets/includes/footer.php');
?>
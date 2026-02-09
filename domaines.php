<?php
include('assets/includes/header.php');
?>

<style>
    /* Animations générales */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .animate-on-scroll.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Animation du titre */
    .title-animate {
        opacity: 0;
        transform: translateY(-30px);
        animation: titleReveal 1s ease forwards 0.3s;
    }
    
    @keyframes titleReveal {
        0% {
            opacity: 0;
            transform: translateY(-30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Animation des cartes de domaine */
    .domaine-card {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .domaine-card.visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    
    /* Effets de survol améliorés */
    .domaine-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }
    
    /* Animation des icônes */
    .domaine-icon {
        transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
    
    .domaine-card:hover .domaine-icon {
        transform: scale(1.2) rotate(10deg);
    }
    
    /* Animation du bouton retour */
    .btn-animate {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease 0.8s;
    }
    
    .btn-animate.visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Animation du fond dégradé */
    @keyframes gradient-shift {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }
    
    .gradient-animation {
        background: linear-gradient(-45deg, #e0e7ff, #f3e8ff, #e0f2fe, #f0f9ff);
        background-size: 400% 400%;
        animation: gradient-shift 15s ease infinite;
    }
    
    /* Effet de vague sur les bordures */
    .wave-border::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent, currentColor, transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .domaine-card:hover .wave-border::before {
        opacity: 1;
    }
    
    /* Animation de pulsation pour les badges */
    @keyframes badge-pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    
    .badge-animate {
        animation: badge-pulse 2s infinite;
    }
</style>

<main class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 min-h-screen overflow-x-hidden">
    <!-- Animated background amélioré -->
    <div class="absolute inset-0 -z-10 pointer-events-none gradient-animation opacity-50"></div>
    
    <!-- Particules flottantes -->
    <div class="absolute inset-0 -z-10 pointer-events-none overflow-hidden">
        <?php for($i = 1; $i <= 20; $i++): ?>
        <div class="absolute w-4 h-4 rounded-full bg-gradient-to-r from-indigo-300/30 to-purple-300/30 animate-float"
             style="
                 top: <?php echo rand(5, 95); ?>%;
                 left: <?php echo rand(5, 95); ?>%;
                 animation-delay: <?php echo $i * 0.2; ?>s;
                 animation-duration: <?php echo rand(15, 25); ?>s;
             "></div>
        <?php endfor; ?>
    </div>
    
    <h1 class="title-animate text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-700 via-blue-600 to-purple-600 text-center mb-12 drop-shadow-lg tracking-tight select-none">
        <span class="inline-block align-middle animate-bounce"><i class="fas fa-balance-scale mr-3 text-indigo-600"></i></span>
        Nos domaines juridiques
        <div class="mt-4 w-24 h-1 bg-gradient-to-r from-indigo-600 to-purple-600 mx-auto rounded-full"></div>
    </h1>
    
    <p class="text-center text-gray-600 text-lg mb-12 max-w-3xl mx-auto animate-on-scroll">
        Découvrez nos différentes spécialités juridiques. Chaque domaine représente une expertise spécifique 
        pour répondre à vos besoins avec précision et professionnalisme.
    </p>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
        <?php
        $domaines = [
            [
                'id' => 'avocat',
                'nom' => 'Avocat',
                'icon' => 'user-tie',
                'color' => 'red',
                'description' => 'Rôle de l\'avocat, conseils juridiques, défense des droits, accompagnement et représentation en justice.',
                'delay' => 0.1
            ],
            [
                'id' => 'loi',
                'nom' => 'Loi',
                'icon' => 'gavel',
                'color' => 'yellow',
                'description' => 'Explication des lois, décryptage des textes législatifs et réglementaires, veille juridique.',
                'delay' => 0.2
            ],
            [
                'id' => 'immobilier',
                'nom' => 'Immobilier',
                'icon' => 'home',
                'color' => 'purple',
                'description' => 'Achat, vente, location, copropriété : tout savoir sur les droits et obligations liés à l\'immobilier.',
                'delay' => 0.3
            ],
            [
                'id' => 'numerique',
                'nom' => 'Numérique',
                'icon' => 'laptop-code',
                'color' => 'green',
                'description' => 'Protection des données, cybersécurité, contrats informatiques, droits et responsabilités sur Internet.',
                'delay' => 0.4
            ],
            [
                'id' => 'contrat',
                'nom' => 'Contrat',
                'icon' => 'file-signature',
                'color' => 'indigo',
                'description' => 'Rédaction, analyse et gestion des contrats civils, commerciaux et numériques.',
                'delay' => 0.5
            ],
            [
                'id' => 'entreprise',
                'nom' => 'Entreprise',
                'icon' => 'building',
                'color' => 'blue',
                'description' => 'Création, gestion, fiscalité, responsabilité et vie juridique de l\'entreprise.',
                'delay' => 0.6
            ],
        ];
        
        foreach ($domaines as $domaine):
        ?>
        <div id="<?php echo $domaine['id']; ?>"
             class="domaine-card relative bg-white/90 backdrop-blur-sm rounded-3xl shadow-xl border border-<?php echo $domaine['color']; ?>-100 p-8 flex flex-col items-center text-center group overflow-hidden transition-all duration-500 hover:shadow-2xl"
             style="animation-delay: <?php echo $domaine['delay']; ?>s;"
             data-delay="<?php echo $domaine['delay']; ?>">
            
            <!-- Effet de vague coloré -->
            <div class="wave-border absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-<?php echo $domaine['color']; ?>-400 to-<?php echo $domaine['color']; ?>-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            
            <!-- Badge animé -->
            <span class="absolute top-0 right-0 m-4 px-3 py-1 rounded-full bg-<?php echo $domaine['color']; ?>-500 text-white text-xs font-semibold shadow-lg badge-animate transform transition-transform duration-300 group-hover:scale-110">
                <?php echo $domaine['nom']; ?>
            </span>
            
            <!-- Icône avec animation -->
            <div class="domaine-icon w-24 h-24 bg-gradient-to-br from-<?php echo $domaine['color']; ?>-400 to-<?php echo $domaine['color']; ?>-200 text-<?php echo $domaine['color']; ?>-700 rounded-full flex items-center justify-center mb-6 text-4xl shadow-lg transition-all duration-500 group-hover:shadow-xl">
                <i class="fas fa-<?php echo $domaine['icon']; ?>"></i>
            </div>
            
            <!-- Titre -->
            <h2 class="text-2xl font-extrabold mb-3 text-<?php echo $domaine['color']; ?>-700 transition-colors duration-300 group-hover:text-<?php echo $domaine['color']; ?>-800">
                <?php echo $domaine['nom']; ?>
            </h2>
            
            <!-- Description -->
            <p class="text-gray-600 leading-relaxed text-justify transition-colors duration-300 group-hover:text-gray-800">
                <?php echo $domaine['description']; ?>
            </p>
            
            <!-- Indicateur de survol -->
            <div class="mt-6 opacity-0 group-hover:opacity-100 transition-all duration-500 transform translate-y-4 group-hover:translate-y-0">
                <div class="flex items-center justify-center text-<?php echo $domaine['color']; ?>-500 text-sm font-medium">
                    <span class="mr-2">En savoir plus</span>
                    <i class="fas fa-arrow-right transform transition-transform duration-300 group-hover:translate-x-2"></i>
                </div>
            </div>
            
            <!-- Effet de lumière au survol -->
            <div class="absolute inset-0 bg-gradient-to-br from-<?php echo $domaine['color']; ?>-500/0 via-transparent to-transparent opacity-0 group-hover:opacity-10 transition-opacity duration-500 pointer-events-none"></div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <div class="text-center mt-12 btn-animate">
        <a href="index.php"
           class="group inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 text-lg transform hover:-translate-y-2">
            <i class="fas fa-arrow-left mr-3 transform transition-transform duration-300 group-hover:-translate-x-1"></i>
            Retour à l'accueil
            <i class="fas fa-home ml-3 transform transition-transform duration-300 group-hover:scale-110"></i>
        </a>
    </div>
</main>

<!-- Script d'animation au défilement -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des particules flottantes
    const style = document.createElement('style');
    style.textContent = `
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            33% {
                transform: translateY(-20px) rotate(120deg);
            }
            66% {
                transform: translateY(20px) rotate(240deg);
            }
        }
        
        .animate-float {
            animation: float linear infinite;
        }
        
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        
        .animate-bounce {
            animation: bounce 2s infinite;
        }
    `;
    document.head.appendChild(style);
    
    // Animation au défilement
    function animateOnScroll() {
        const windowHeight = window.innerHeight;
        const windowTop = window.scrollY;
        const windowBottom = windowTop + windowHeight;
        
        // Animer les cartes de domaine
        document.querySelectorAll('.domaine-card').forEach(card => {
            const cardTop = card.getBoundingClientRect().top + windowTop;
            
            if (cardTop < windowBottom - 100) {
                setTimeout(() => {
                    card.classList.add('visible');
                }, parseFloat(card.getAttribute('data-delay')) * 1000);
            }
        });
        
        // Animer les éléments généraux
        document.querySelectorAll('.animate-on-scroll').forEach(element => {
            const elementTop = element.getBoundingClientRect().top + windowTop;
            
            if (elementTop < windowBottom - 100) {
                element.classList.add('visible');
            }
        });
        
        // Animer le bouton
        const btn = document.querySelector('.btn-animate');
        if (btn) {
            const btnTop = btn.getBoundingClientRect().top + windowTop;
            
            if (btnTop < windowBottom - 100) {
                btn.classList.add('visible');
            }
        }
    }
    
    // Initialiser l'animation
    animateOnScroll();
    
    // Écouter le défilement
    window.addEventListener('scroll', animateOnScroll);
    
    // Animation au chargement
    window.addEventListener('load', function() {
        animateOnScroll();
        
        // Animation en cascade pour les cartes
        setTimeout(() => {
            document.querySelectorAll('.domaine-card').forEach((card, index) => {
                setTimeout(() => {
                    card.classList.add('visible');
                }, index * 100);
            });
        }, 500);
    });
    
    // Effet de clic sur les cartes
    document.querySelectorAll('.domaine-card').forEach(card => {
        card.addEventListener('click', function(e) {
            if (!e.target.closest('a')) {
                // Animation de clic
                this.style.transform = 'scale(0.98)';
                
                setTimeout(() => {
                    this.style.transform = '';
                }, 300);
                
                // Faire défiler vers le haut de la carte
                const cardTop = this.offsetTop - 100;
                window.scrollTo({
                    top: cardTop,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Animation de survol améliorée pour les icônes
    document.querySelectorAll('.domaine-icon').forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2) rotate(10deg)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    });
    
    // Animation pour les badges
    document.querySelectorAll('.badge-animate').forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    });
});

// Animation de chargement améliorée
let a = 0;
let masque = document.createElement('div');
let cercle = document.createElement('div');
let angle = 0;
let scale = 1;

window.addEventListener('load', () => {
    a = 1;
    
    // Animation du cercle avec effet de pulsation
    anime = setInterval(() => {
        angle += 12;
        scale = 1 + Math.sin(angle * Math.PI / 180) * 0.1;
        cercle.style.transform = `translate(-50%, -50%) rotate(${angle}deg) scale(${scale})`;
    }, 16);
    
    // Ajouter du texte de chargement
    const loadingText = document.createElement('div');
    loadingText.textContent = 'Justice Vocale - Domaines';
    loadingText.style.cssText = `
        color: white;
        font-family: Verdana, Geneva, sans-serif;
        font-size: 20px;
        font-weight: bold;
        margin-top: 80px;
        text-align: center;
        opacity: 0.9;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
    `;
    masque.appendChild(loadingText);
    
    // Faire disparaître le masque avec une animation fluide
    setTimeout(() => {
        clearInterval(anime);
        masque.style.opacity = '0';
        masque.style.transform = 'scale(1.1)';
        loadingText.style.opacity = '0';
        loadingText.style.transform = 'translate(-50%, -50%) translateY(-20px)';
    }, 1200);
    
    setTimeout(() => {
        masque.style.visibility = 'hidden';
    }, 1800);
});

// Création du masque avec dégradé
masque.style.cssText = `
    width: 100%;
    height: 100vh;
    z-index: 100000;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: fixed;
    top: 0;
    left: 0;
    opacity: 1;
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
`;
document.body.appendChild(masque);

// Création du cercle avec effet de profondeur
cercle.style.cssText = `
    width: 80px;
    height: 80px;
    border: 4px solid rgba(255, 255, 255, 0.2);
    border-top: 4px solid white;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
    z-index: 1;
    box-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
`;

// Cercle interne
const innerCircle = document.createElement('div');
innerCircle.style.cssText = `
    width: 60px;
    height: 60px;
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
`;

cercle.appendChild(innerCircle);
masque.appendChild(cercle);

// Points tournants autour du cercle
for (let i = 0; i < 8; i++) {
    const dot = document.createElement('div');
    const angle = (i * 45) * Math.PI / 180;
    const radius = 50;
    
    dot.style.cssText = `
        width: 8px;
        height: 8px;
        background: white;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(${i * 45}deg) translate(${radius}px) rotate(-${i * 45}deg);
        opacity: ${0.3 + i * 0.1};
    `;
    
    cercle.appendChild(dot);
}

let anime;
</script>

<?php
include('assets/includes/footer.php');
?>
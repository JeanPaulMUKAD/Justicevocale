<?php
include('assets/includes/header.php');
?>

<!-- Article detail -->
<main
  class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-br from-blue-100 via-white to-purple-100 min-h-screen">
  <article class="bg-white/95 rounded-2xl shadow-xl border border-blue-100 p-8">
    <div class="flex items-center gap-3 mb-4">
      <span class="inline-block px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold">Procédure
        civile</span>
      <span class="text-gray-400 text-xs">Publié le 14 octobre 2025</span>
    </div>
    <h1 class="text-3xl md:text-4xl font-extrabold text-indigo-800 mb-6">Les étapes d’un procès civil expliqué
      simplement</h1>
    <p class="text-lg text-gray-700 mb-6">Découvrez les différentes phases d’un procès civil, de la saisine du tribunal
      au jugement, en langage accessible à tous.</p>
    <img src="https://newscd.net/wp-content/uploads/2025/08/IMG-20250816-WA0013.jpg" alt="Procès civil"
      class="rounded-xl w-full mb-8 shadow-md">
    <div class="prose max-w-none text-gray-800">
      <h2 class="font-bold">INTRODUCTION</h2>
      <p class="text-justify">Un procès civil suit des étapes précises, de l’introduction de l’instance à l’exécution du
        jugement. Comprendre ce parcours aide à mieux défendre ses droits.</p>
      <h2 class="font-bold">Les grandes étapes</h2>
      <ol class="list-disc pl-6">
        <li><strong>Saisine du tribunal</strong> : dépôt de la requête ou assignation.</li>
        <li><strong>Instruction</strong> : échanges d’arguments et de preuves entre les parties.</li>
        <li><strong>Audience</strong> : présentation orale devant le juge.</li>
        <li><strong>Délibéré</strong> : le juge prend sa décision.</li>
        <li><strong>Jugement</strong> : notification et possibilité de recours.</li>
      </ol>
      <h2 class="font-bold">Conseils pratiques</h2>
      <ul class="list-disc pl-6">
        <li>Préparer un dossier complet et clair.</li>
        <li>Respecter les délais de procédure.</li>
        <li>Se faire assister par un professionnel si besoin.</li>
      </ul>
      <h2 class="font-bold">CONCLUSION</h2>
      <p class="text-justify">Un procès civil n’est pas forcément complexe si l’on connaît les étapes et ses droits.
        N’hésitez pas à consulter un avocat pour vous accompagner.</p>
    </div>
    <a href="blog.php" class="inline-flex items-center mt-8 text-indigo-700 hover:underline font-semibold"><i
        class="fas fa-arrow-left mr-2"></i> Retour au blog</a>
  </article>
</main>

 <!-- SEARCH LOGO -->
 <script>

let a = 0;
let masque = document.createElement('div');
let cercle = document.createElement('div');

let angle = 0;

window.addEventListener('load', () => {
    a = 1;

    // Le cercle commence à tourner immédiatement
    anime = setInterval(() => {
        angle += 10; // Vitesse de rotation du cercle
        cercle.style.transform = `translate(-50%, -50%) rotate(${angle}deg)`;
    }, 20);

    // Après 1 seconde, on arrête l'animation et on fait disparaître le masque
    setTimeout(() => {
        clearInterval(anime);
        masque.style.opacity = '0';
    }, 1000);

    setTimeout(() => {
        masque.style.visibility = 'hidden';
    }, 1500);
});

// Création du masque
masque.style.width = '100%';
masque.style.height = '100vh';
masque.style.zIndex = 100000;
masque.style.background = '#ffffff';
masque.style.position = 'fixed';
masque.style.top = '0';
masque.style.left = '0';
masque.style.opacity = '1';
masque.style.transition = '0.5s ease';
masque.style.display = 'flex';
masque.style.justifyContent = 'center';
masque.style.alignItems = 'center';
document.body.appendChild(masque);

// Création du cercle (réduit)
cercle.style.width = '40px';  // Au lieu de 15vh
cercle.style.height = '40px'; // Au lieu de 15vh
cercle.style.border = '2px solid #f3f3f3'; // Bordure plus fine
cercle.style.borderTop = '2px solid #2F1C6A';
cercle.style.borderRadius = '50%';
cercle.style.position = 'absolute';
cercle.style.top = '50%';
cercle.style.left = '50%';
cercle.style.transform = 'translate(-50%, -50%)';
cercle.style.boxSizing = 'border-box';
cercle.style.zIndex = '1';
masque.appendChild(cercle);

// Variable de l'animation
let anime;

</script>

<?php
include('assets/includes/footer.php');
?>
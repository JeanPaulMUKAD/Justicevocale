<?php
include('assets/includes/header.php');
?>

<!-- Article detail -->
<main
  class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-br from-blue-100 via-white to-purple-100 min-h-screen">
  <article class="bg-white/95 rounded-2xl shadow-xl border border-blue-100 p-8">
    <div class="flex items-center gap-3 mb-4">
      <span class="inline-block px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold">Droit du
        travail</span>
      <span class="text-gray-400 text-xs">Publié le 14 octobre 2025</span>
    </div>
    <h1 class="text-3xl md:text-4xl font-extrabold text-indigo-800 mb-6">Comprendre le droit du travail en RDC</h1>
    <p class="text-lg text-gray-700 mb-6 text-justify">Un guide pratique pour connaître vos droits et obligations en
      tant que salarié ou employeur en République Démocratique du Congo.</p>
    <img src="https://pbs.twimg.com/media/G0WSEr7WgAAUous?format=jpg&name=4096x4096" alt="Droit du travail en RDC"
      class="rounded-xl w-full mb-8 shadow-md">
    <div class="prose max-w-none text-gray-800">
      <h2 class="font-bold">INTRODUCTION</h2>
      <p class="text-justify">Le droit du travail en RDC encadre les relations entre employeurs et salariés. Il vise à
        protéger les droits des travailleurs tout en définissant les obligations de chaque partie.</p>
      <h2 class="font-bold">Les droits fondamentaux</h2>
      <ul class="list-disc pl-6">
        <li>Contrat de travail écrit obligatoire</li>
        <li>Respect du salaire minimum légal</li>
        <li>Protection contre le licenciement abusif</li>
        <li>Droit à la sécurité sociale</li>
      </ul>
      <h2 class="font-bold">Obligations de l’employeur</h2>
      <ul class="list-disc pl-6">
        <li>Déclarer les salariés à la CNSS</li>
        <li>Respecter la durée légale du travail</li>
        <li>Assurer la sécurité et la santé au travail</li>
      </ul>
      <h2 class="font-bold">CONCLUSION</h2>
      <p class="text-justify">Comprendre le droit du travail permet de mieux défendre ses droits et d’éviter les
        litiges. Pour toute question spécifique, consultez un professionnel du droit.</p>
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
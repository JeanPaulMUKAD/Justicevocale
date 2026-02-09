<?php
include('assets/includes/header.php');
?>
<!-- Article detail -->
<main
  class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gradient-to-br from-blue-100 via-white to-purple-100 min-h-screen">
  <article class="bg-white/95 rounded-2xl shadow-xl border border-blue-100 p-8">
    <div class="flex items-center gap-3 mb-4">
      <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">Droit
        numérique</span>
      <span class="text-gray-400 text-xs">Publié le 14 octobre 2025</span>
    </div>
    <h1 class="text-3xl md:text-4xl font-extrabold text-indigo-800 mb-6 text-justify">Droit numérique : protéger ses
      données personnelles</h1>
    <p class="text-lg text-gray-700 mb-6 text-justify">Conseils et bonnes pratiques pour sécuriser vos informations à
      l’ère du numérique et comprendre la législation sur la protection des données.</p>
    <img src="https://www.minesu.gouv.cd/images/WhatsApp%20Image%202025-09-14%20at%2023.14.16.jpeg"
      alt="Protection des données personnelles" class="rounded-xl w-full mb-8 shadow-md">
    <div class="prose max-w-none text-gray-800">
      <h2 class="font-bold">Pourquoi protéger ses données ?</h2>
      <p class="text-justify">À l’ère du numérique, la protection des données personnelles est essentielle pour
        préserver sa vie privée et éviter les abus.</p>
      <h2 class="font-bold">Bonnes pratiques</h2>
      <ul class="list-disc pl-6">
        <li>Utiliser des mots de passe forts et uniques</li>
        <li>Ne jamais partager d’informations sensibles par email</li>
        <li>Vérifier les paramètres de confidentialité sur les réseaux sociaux</li>
        <li>Mettre à jour régulièrement ses logiciels</li>
      </ul>
      <h2 class="font-bold">La législation</h2>
      <p class="text-justify">La RDC, comme de nombreux pays, met en place des lois pour encadrer la collecte et
        l’utilisation des données personnelles. Il est important de connaître ses droits et les recours possibles.</p>
      <h2 class="font-bold">CONCLUSION</h2>
      <p class="text-justify">Protéger ses données est un réflexe à adopter au quotidien. En cas de doute, n’hésitez pas
        à consulter un spécialiste du droit numérique.</p>
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
<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

include('config/database.php');

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $content = trim($_POST['content'] ?? '');
    
    // Validation
    if (empty($title)) $errors[] = "Le titre est requis";
    if (empty($description)) $errors[] = "La description est requise";
    if (empty($category)) $errors[] = "La catégorie est requise";
    
    // Gestion de l'upload de l'image
    $image_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $file_type = mime_content_type($_FILES['image']['tmp_name']);
        
        if (!in_array($file_type, $allowed_types)) {
            $errors[] = "Type de fichier non autorisé. Utilisez JPEG, PNG, GIF ou WebP";
        } elseif ($_FILES['image']['size'] > 5 * 1024 * 1024) { // 5MB
            $errors[] = "L'image ne doit pas dépasser 5MB";
        } else {
            // Créer le dossier uploads s'il n'existe pas
            $upload_dir = '../assets/uploads/articles/';
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            // Générer un nom unique
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $image_path = 'assets/uploads/articles/' . $filename;
            
            if (!move_uploaded_file($_FILES['image']['tmp_name'], '../' . $image_path)) {
                $errors[] = "Erreur lors de l'upload de l'image";
            }
        }
    }
    
    // Si pas d'erreurs, insérer dans la base
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO articles (title, description, image_path, category, content) 
                VALUES (?, ?, ?, ?, ?)
            ");
            $stmt->execute([$title, $description, $image_path, $category, $content]);
            $success = true;
            
            // Réinitialiser le formulaire
            $title = $description = $category = $content = '';
        } catch(PDOException $e) {
            $errors[] = "Erreur lors de l'insertion: " . $e->getMessage();
        }
    }
}

// Catégories prédéfinies
$categories = [
    'Droit du travail',
    'Procédure civile',
    'Droit numérique',
    'Immobilier',
    'Droit pénal',
    'Droit de la famille',
    'Droit commercial'
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel Article - JusticeVocale Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .preview-image {
            transition: all 0.3s ease;
        }
        .preview-image:hover {
            transform: scale(1.05);
        }
        .image-upload-area {
            border: 2px dashed #cbd5e0;
            transition: all 0.3s ease;
        }
        .image-upload-area:hover, .image-upload-area.dragover {
            border-color: #667eea;
            background-color: #f7fafc;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <?php include('partials/header.php'); ?>
    
    <div class="ml-0 md:ml-64 min-h-screen p-4 md:p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Nouvel Article</h1>
                <p class="text-gray-600">Créez un nouvel article pour le blog</p>
            </div>
            <div>
                <a href="articles.php" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left mr-2"></i> Retour aux articles
                </a>
                <a href="index.php" class="text-gray-600 hover:text-gray-800 ml-4">
                    <i class="fas fa-home mr-2"></i> Retour au tableau de bord
                </a>
            </div>
        </div>
        
        <!-- Messages -->
        <?php if ($success): ?>
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 animate-pulse">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3 text-xl"></i>
                    <div>
                        <p class="font-medium text-green-800">Article créé avec succès!</p>
                        <p class="text-green-700 text-sm">L'article a été ajouté au blog.</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($errors)): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle text-red-500 mr-3 text-xl"></i>
                    <div>
                        <p class="font-medium text-red-800">Erreurs:</p>
                        <ul class="list-disc list-inside text-red-700 text-sm mt-1">
                            <?php foreach($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Formulaire -->
        <form method="POST" action="" enctype="multipart/form-data" class="space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Colonne de gauche -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Titre -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-heading mr-2 text-indigo-500"></i>
                            Titre de l'article *
                        </label>
                        <input type="text" 
                               name="title" 
                               value="<?php echo htmlspecialchars($title ?? ''); ?>"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                               placeholder="Ex: Comprendre le droit du travail en RDC">
                    </div>
                    
                    <!-- Description -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-align-left mr-2 text-indigo-500"></i>
                            Description *
                        </label>
                        <textarea name="description" 
                                  required
                                  rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                                  placeholder="Brève description de l'article (visible sur la page d'accueil)"><?php echo htmlspecialchars($description ?? ''); ?></textarea>
                        <p class="text-sm text-gray-500 mt-2">Maximum 300 caractères</p>
                    </div>
                    
                    <!-- Contenu -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-file-alt mr-2 text-indigo-500"></i>
                            Contenu de l'article
                        </label>
                        <textarea name="content" 
                                  rows="12"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                                  placeholder="Contenu détaillé de l'article..."><?php echo htmlspecialchars($content ?? ''); ?></textarea>
                        <p class="text-sm text-gray-500 mt-2">Support HTML autorisé</p>
                    </div>
                </div>
                
                <!-- Colonne de droite -->
                <div class="space-y-6">
                    <!-- Catégorie -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-tag mr-2 text-indigo-500"></i>
                            Catégorie *
                        </label>
                        <select name="category" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                            <option value="">Sélectionnez une catégorie</option>
                            <?php foreach($categories as $cat): ?>
                                <option value="<?php echo $cat; ?>" <?php echo ($category ?? '') === $cat ? 'selected' : ''; ?>>
                                    <?php echo $cat; ?>
                                </option>
                            <?php endforeach; ?>
                            <option value="other">Autre</option>
                        </select>
                        <input type="text" 
                               name="custom_category" 
                               placeholder="Nouvelle catégorie..."
                               class="w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg hidden"
                               id="customCategoryInput">
                    </div>
                    
                    <!-- Image -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-image mr-2 text-indigo-500"></i>
                            Image de l'article
                        </label>
                        
                        <!-- Zone de drag & drop -->
                        <div class="image-upload-area rounded-lg border-dashed border-2 p-8 text-center cursor-pointer mb-4"
                             id="dropZone">
                            <i class="fas fa-cloud-upload-alt text-gray-400 text-4xl mb-4"></i>
                            <p class="text-gray-600 mb-2">Glissez-déposez votre image ici</p>
                            <p class="text-sm text-gray-500 mb-4">ou</p>
                            <label for="imageUpload" 
                                   class="inline-block bg-indigo-50 text-indigo-700 px-4 py-2 rounded-lg font-medium cursor-pointer hover:bg-indigo-100 transition">
                                Parcourir les fichiers
                            </label>
                            <input type="file" 
                                   name="image" 
                                   id="imageUpload" 
                                   accept="image/*" 
                                   class="hidden"
                                   onchange="previewImage(event)">
                        </div>
                        
                        <!-- Prévisualisation -->
                        <div id="imagePreview" class="hidden">
                            <p class="text-sm text-gray-700 mb-2">Aperçu:</p>
                            <div class="relative rounded-lg overflow-hidden border">
                                <img id="preview" class="w-full h-48 object-cover preview-image">
                                <button type="button" 
                                        onclick="removeImage()"
                                        class="absolute top-2 right-2 bg-red-500 text-white w-8 h-8 rounded-full hover:bg-red-600 transition">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        
                        <p class="text-xs text-gray-500 mt-4">
                            Formats acceptés: JPG, PNG, GIF, WebP<br>
                            Taille max: 5MB<br>
                            Dimensions recommandées: 800x400px
                        </p>
                    </div>
                    
                    <!-- Boutons -->
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="space-y-4">
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-3 px-4 rounded-lg font-semibold hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition flex items-center justify-center">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Publier l'article
                            </button>
                            
                           
                            
                            <button type="reset"
                                    class="w-full border border-gray-300 text-gray-700 py-3 px-4 rounded-lg font-medium hover:bg-gray-50 transition flex items-center justify-center">
                                <i class="fas fa-redo mr-2"></i>
                                Réinitialiser
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <script>
        // Gestion de la catégorie "Autre"
        document.querySelector('select[name="category"]').addEventListener('change', function() {
            const customInput = document.getElementById('customCategoryInput');
            if (this.value === 'other') {
                customInput.classList.remove('hidden');
                customInput.required = true;
            } else {
                customInput.classList.add('hidden');
                customInput.required = false;
                customInput.value = '';
            }
        });
        
        // Drag & drop pour l'image
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('imageUpload');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight() {
            dropZone.classList.add('dragover');
        }
        
        function unhighlight() {
            dropZone.classList.remove('dragover');
        }
        
        dropZone.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            fileInput.files = files;
            previewImage({ target: { files: files } });
        }
        
        // Prévisualisation de l'image
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    const previewContainer = document.getElementById('imagePreview');
                    
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
        
        // Supprimer l'image
        function removeImage() {
            fileInput.value = '';
            document.getElementById('imagePreview').classList.add('hidden');
        }
        
        // Sauvegarder comme brouillon
        function saveAsDraft() {
            alert('Fonctionnalité brouillon à implémenter');
        }
        
        // Compteur de caractères pour la description
        const descriptionField = document.querySelector('textarea[name="description"]');
        const charCounter = document.createElement('p');
        charCounter.className = 'text-sm text-right mt-1';
        descriptionField.parentNode.appendChild(charCounter);
        
        function updateCharCount() {
            const length = descriptionField.value.length;
            charCounter.textContent = `${length}/300 caractères`;
            charCounter.className = `text-sm text-right mt-1 ${length > 300 ? 'text-red-500' : 'text-gray-500'}`;
        }
        
        descriptionField.addEventListener('input', updateCharCount);
        updateCharCount();
    </script>
</body>
</html>
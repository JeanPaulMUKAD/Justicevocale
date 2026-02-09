<?php
include('database.php');

$sql = "CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_path VARCHAR(500),
    category VARCHAR(100),
    content LONGTEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sql_users = "CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

try {
    $pdo->exec($sql);
    $pdo->exec($sql_users);
    
    // Créer l'utilisateur admin par défaut
    $check_user = $pdo->query("SELECT * FROM admin_users WHERE username = 'JusticeVocale'");
    if ($check_user->rowCount() == 0) {
        $hashed_password = password_hash('admin123', PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO admin_users (username, password, email) VALUES (?, ?, ?)");
        $stmt->execute(['JusticeVocale', $hashed_password, 'admin@justicevocale.com']);
    }
    
    echo "Tables créées avec succès!";
} catch(PDOException $e) {
    die("Erreur lors de la création des tables: " . $e->getMessage());
}
?>
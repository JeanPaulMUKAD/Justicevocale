<?php
// config/database.php

$host = '127.0.0.1:3306';
$dbname = 'u913148723_justicevocale';
$username = 'u913148723_justicevocale'; 
$password = 'JusticeVocale123'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}
?>
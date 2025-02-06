<?php
// Connexion à la base de données
$dsn = 'mysql:host=mariadb;dbname=bdd_db;charset=utf8';
$username = 'user';
$password = 'password';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connexion échouée : ' . $e->getMessage());
}

// Récupération des données
$stmt = $pdo->query('SELECT users.username, users_infos.bio FROM users JOIN users_infos ON users.id = users_infos.user_id');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupération de l'url demandé
$url = $_SERVER['REQUEST_URI'];

define('VIEWS_PATH', '../app/views/');
// Redirection via URL

ob_start();
$head_title="Template";
switch($url) {
    case '':
    case '/':
    case '/home':
        require VIEWS_PATH.'home.view';
        $head_title.=" - Accueil";
        $view='home';
        break;
    case '/p2':
        require VIEWS_PATH.'p2.view';
        $head_title.=" - CV";
        $view='p2';
        break;
    case '/p3':
        require VIEWS_PATH.'p3.view';
        $head_title.=" - Projets";
        $view='p3';
        break;
    case '/p4':
        require VIEWS_PATH.'p4.view';
        $head_title.=" - p4";
        $view='p4';
        break;
    case '/p5':
        require VIEWS_PATH.'p5.view';
        $head_title.=" - p5";
        $view='p5';
        break;
    default:
        require VIEWS_PATH.'errors/404.view';
        $head_title="Page inconnu";
        $view='404';
        break;
}

$contents=ob_get_clean();

require VIEWS_PATH.'core/head.view';
require VIEWS_PATH.'layout/header.view';
echo $contents;
require VIEWS_PATH.'layout/footer.view';
?>
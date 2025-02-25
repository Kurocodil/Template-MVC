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

// Routeur
// Récupération de l'url demandé
$url = $_SERVER['REQUEST_URI'];

// Définition de la constante VIEWS_PATH pour éviter de réécrire le chemin
define('VIEWS_PATH', '../app/views/');
// Redirection via URL

ob_start();
$head_title="Portfolio";
switch($url) {
    case '':
    case '/':
    case '/home':
        require VIEWS_PATH.'home.php';
        $head_title.=" - Accueil";
        $view='home';
        break;
    case '/p2':
        require VIEWS_PATH.'p2.php';
        $head_title.=" - CV";
        $view='p2';
        break;
    case '/p3':
        require VIEWS_PATH.'p3.php';
        $head_title.=" - Projets";
        $view='p3';
        break;
    case '/p4':
        require VIEWS_PATH.'p4.php';
        $head_title.=" - p4";
        $view='p4';
        break;
    case '/p5':
        require VIEWS_PATH.'p5.php';
        $head_title.=" - p5";
        $view='p5';
        break;
    default:
        require VIEWS_PATH.'errors/404.php';
        $head_title="Page inconnu";
        $view='404';
        break;
}

$contents=ob_get_clean();

require VIEWS_PATH.'core/head.php';
require VIEWS_PATH.'layout/header.php';
echo $contents;
require VIEWS_PATH.'layout/footer.php';
?>

<?php
require_once '../source/config.php';
include_once("../source/database.php");
    
$request_url = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$page = end($request_url);

if (empty($page) || $page === 'index.php') {
    $page = 'home';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Groene Kist</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <?php include '../source/views/navigation.php'; ?>
        
        <?php 
        $allowed_pages = ['home', 'groente', 'fruit', 'contact', 'aanbiedingen'];
        $pages_dir = '../source/pages/';

        if ($page === 'home') {
            include '../source/views/main.php';
        } elseif (in_array($page, $allowed_pages) && file_exists($pages_dir . $page . '.php')) {
            include $pages_dir . $page . '.php';
        } else {
            include '../source/views/main.php'; 
        }
        ?>
        <?php include '../source/views/footer.php'; ?>
    </div>
</body>
</html>
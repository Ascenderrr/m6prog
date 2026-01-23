<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../source/controller/postmessagecontroller.php';
    $ctrl = new PostMessageController();
    
    $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
    if (strpos($contentType, 'application/json') !== false) {
        $ctrl->handlePostFromJson();
        require_once __DIR__ . '/../source/views/wall.php';
        exit();
    } else {
        $ctrl->handlePost();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wall</title>
    <link rel="stylesheet" href="assets/styling/style.css">
    <script src="assets/js/main.js" defer></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>The Wall</h1>
        </header>

        <main>
            <section>
            <form action="" method="POST">
                <input type="text" name="name" placeholder="jou naam" >
                <textarea name="bericht" placeholder="dit is jouw lelijke bericht..."></textarea>
                <button type="submit">DE MUUR</button>
            </form>
            </section>
            <?php require_once __DIR__ . '/../source/views/wall.php'; ?>
        </main>
    </div>
</body>
</html>
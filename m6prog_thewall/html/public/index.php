<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Wall</title>
    <link rel="stylesheet" href="styling/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>The Wall</h1>
        </header>

        <main>
            <section>
            <form action="post_message.php" method="POST">
                <input type="text" name="name" placeholder="jou naam" >
                <textarea name="bericht" placeholder="dit is jouw lelijke bericht..."></textarea>
                <button type="submit">DE MUUR</button>
            </form>
            </section>
            <?php require_once __DIR__ . '/../source/views/bericht.php'; ?>
        </main>
    </div>
</body>
</html>
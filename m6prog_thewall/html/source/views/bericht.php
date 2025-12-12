<?php
require_once __DIR__ . '/../dataclasses/user.php';

$users = getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <section>
            <?php foreach ($users as $user): ?>
            <article class="post">
                <div class="post-header">
                    <strong><?php echo ($user->name); ?></strong>
                </div>
                <div class="post-content">
                    <p><?php echo ($user->bericht); ?></p>
                </div>
            </article>
            <?php endforeach; ?>
            </section>
</body>
</html>
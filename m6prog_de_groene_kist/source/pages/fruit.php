<?php
include_once __DIR__ . '/../dataclasses/product.php';
?>

<main>
    <section class="content-section">
        <h1>Fruit</h1>
        <div class="product-grid">
            <?php
            $products = Product::GetAllFruit($connection);
            foreach ($products as $product) {
                include("../source/views/product.php");
            }
            ?>
        </div>
    </section>
</main>
<?php
include_once __DIR__ . '/../dataclasses/product.php';
?>

<main>
    <section class="content-section">
        <h2>Groente</h2>
        <div class="product-grid">
            <?php 
            $products = Product::GetAllGroente($connection);
            foreach ($products as $product): ?>
                <?php include("../source/views/product.php"); ?>
            <?php endforeach; ?>
        </div>
    </section>
</main>


<?php
$query = "SELECT p.naam, p.prijs, a.korting FROM aanbiedingen a JOIN product p ON a.product_idproduct = p.idproduct";
$result = $connection->query($query);
$products = $result->fetch_all(MYSQLI_ASSOC);
?>

<main>
    <section class="content-section">
        <h2>Aanbiedingen</h2>
        <div class="product-grid">
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-item">
                        <h3><?php echo ($product['naam']); ?></h3>
                        <?php
                            $originalPrice = $product['prijs'];
                            $discount = $product['korting'];
                            $newPrice = $originalPrice - ($originalPrice * $discount / 100);
                        ?>
                        <p><s>Prijs: € <?php echo number_format($originalPrice, 2, ',', '.' ); ?></s></p>
                        <p>Nu met <?php echo $discount; ?>% korting!</p>
                        <p><strong>Nieuwe prijs: € <?php echo number_format($newPrice, 2, ',', '.'); ?></strong></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Er zijn momenteel geen aanbiedingen.</p>
            <?php endif; ?>
        </div>
    </section>
</main>

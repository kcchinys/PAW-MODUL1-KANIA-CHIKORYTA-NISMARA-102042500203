<?php

$products = [
    [
        "name"     => "MacBook Air M3",
        "category" => "Laptop",
        "price"    => 15500000,
        "stock"    => 4
    ],
    [
        "name"     => "Samsung Galaxy S24",
        "category" => "Smartphone",
        "price"    => 13000000,
        "stock"    => 6
    ],
    [
        "name"     => "iPad Air 5",
        "category" => "Tablet",
        "price"    => 9200000,
        "stock"    => 0
    ],
    [
        "name"     => "Logitech MX Master 3S",
        "category" => "Mouse",
        "price"    => 1450000,
        "stock"    => 7
    ],
    [
        "name"     => "Keychron K2 Pro",
        "category" => "Keyboard",
        "price"    => 1200000,
        "stock"    => 0
    ],
    [
        "name"     => "AirPods Pro 2",
        "category" => "Earbuds",
        "price"    => 3500000,
        "stock"    => 9
    ],
    [
        "name"     => "Xiaomi 33W Charger",
        "category" => "Charger",
        "price"    => 150000,
        "stock"    => 15
    ],
    [
        "name"     => "Sandisk 1TB SSD",
        "category" => "Storage",
        "price"    => 1800000,
        "stock"    => 3
    ]
];

$totalProducts = count($products);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
    <div class="navbar-inner">
        <div class="logo">
            <span class="logo-dot"></span>
            <span>Cia Store</span>
        </div>
        <nav>
            <a href="#">Home</a>
            <a href="#products">Products</a>
            <a href="#about">About</a>
        </nav>
    </div>
</header>
   
    <section class="hero">
        <div class="hero-content">
            <p class="hero-label">CIA STORE</p>
            <h1>Simple Tech Store</h1>
            <p class="hero-description">
                Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu
            </p>
            <a href="#products" class="hero-button">Lihat Produk</a>
        </div>
    </section>

   
    <section class="catalog-header" id="products">
        <div>
            <p class="section-label">OUR PRODUCTS</p>
            <h2>Katalog Produk</h2>
        </div>
        <div class="product-count">
            Total Produk: <?= $totalProducts ?>
        </div>
    </section>

    <main>
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <?php
                    $hasDiscount = $product["price"] >= 1000000;
                    $discount    = $hasDiscount ? 10 : 0;
                    $finalPrice  = $hasDiscount
                        ? $product["price"] - ($product["price"] * 0.10)
                        : $product["price"];
                ?>

                <article class="product-card">
                    <span class="category"><?= $product["category"] ?></span>

                    <h3><?= $product["name"] ?></h3>

                    <?php if ($hasDiscount): ?>
                        <p class="normal-price">
                            Rp<?= number_format($product["price"], 0, ',', '.') ?>
                        </p>
                        <span class="discount">-<?= $discount ?>%</span>
                        <p class="discount-price">
                            Rp<?= number_format($finalPrice, 0, ',', '.') ?>
                        </p>
                    <?php else: ?>
                        <p class="price">
                            Rp<?= number_format($product["price"], 0, ',', '.') ?>
                        </p>
                    <?php endif; ?>


                    <div class="stock-row">
                        <span>Stok: <?= $product["stock"] ?></span>
                        <?php if ($product["stock"] > 0): ?>
                            <span class="available">Tersedia</span>
                        <?php else: ?>
                            <span class="sold-out">Stok Habis</span>
                        <?php endif; ?>
                    </div>

                    <?php if ($product["stock"] > 0): ?>
                        <button>Beli Sekarang</button>
                    <?php else: ?>
                        <button disabled>Tidak Tersedia</button>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <section class="about" id="about">
        <p class="section-label">ABOUT CIA STORE</p>
        <h2>Teknologi untuk kebutuhan sehari-hari</h2>
        <p>
            Cia Store menyediakan berbagai perangkat dan aksesoris teknologi
            pilihan dengan harga yang menarik
        </p>
    </section>
    <footer>
        <p>&copy; 2026 Cia Store</p>
    </footer>

</body>
</html>
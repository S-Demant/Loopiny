<?php
require "../classes/classDB.php";
require "../settings/init.php";
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Loopiny Privat - Favoritter</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="../css/webapp-styles.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Glory:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php include("header-options.php"); ?>

<article>
    <section>
        <div class="container">
            <div class="text-center">
                <h2 class="text-primary fw-semibold mb-0">Dine favoritbutikker</h2>
                <span>Med Loopiny mindsker dine favoritbutikker spild</span>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row g-3 mt-2">
                <?php
                    $shops = $db->sql("SELECT *, (SELECT COUNT(*) FROM products WHERE productShopId = shopId) as productCount FROM shops WHERE shopFavorite = 1 GROUP BY shopId ORDER BY $orderString");
                    foreach($shops as $shop) {
                        ?>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="loop-card card-for-shops d-flex flex-column justify-content-between position-relative bg-light border border-2 border-light shadow w-100" data-value="<?php echo $shop->shopId ?>">
                                <div class="">
                                    <img src="<?php echo $shop->shopImage ?>" alt="<?php echo $shop->shopName ?>" class="img-fluid w-100">
                                    <div class="p-2 mx-1 mt-1">
                                        <a href="shop.php?shopId=<?php echo $shop->shopId ?>" class="text-dark stretched-link minimize-text" title="Vis produkter fra <?php echo $shop->shopName ?>"><?php echo $shop->shopName ?></a>
                                        <p class="opacity-50 pt-2"><?php echo $shop->shopAdress ?><br><?php echo $shop->shopAdressCode ?></p>
                                    </div>
                                </div>
                                <div class="p-2 mx-1 mb-1">
                                    <span class="">Produkter til salg: <?php echo $shop->productCount ?></span>
                                    <hr class="opacity-25 my-2">
                                    <img class="favorite-icon btn p-0" data-id="<?php echo $shop->shopId ?>" src="../img/icons/favorite.svg" style="display: <?php echo $shop->shopFavorite == 1 ? 'none' : 'block'; ?>;">
                                    <img class="favorite-icon btn p-0" data-id="<?php echo $shop->shopId ?>" src="../img/icons/favorite-on.svg" style="display: <?php echo $shop->shopFavorite == 1 ? 'block' : 'none'; ?>;">
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>

</article>

<?php include("footer.php"); ?>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/favorite.js"></script>

</body>
</html>
<?php
require "../classes/classDB.php";
require "../settings/init.php";

if(empty($_GET["shopId"])) {
    header("Location: ../private/discover.php");
}

$shopId = $_GET["shopId"];
$shop = $db->sql("SELECT *, (SELECT COUNT(*) FROM products WHERE productShopId = shopId) as productCount FROM shops WHERE shopId = :shopId", [":shopId" => $shopId]);
$shop = $shop[0];
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Loopiny Privat - Butik</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="../css/private-styles.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Glory:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php include("header.php"); ?>

<article>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <div class="loop-card d-flex flex-column position-relative border border-2 border-light bg-light shadow w-100">
                        <div class="row g-0">
                            <div class="col-6">
                                <img src="<?php echo $shop->shopImage ?>" alt="<?php echo $shop->shopName ?>" class="h-100 w-100 object-fit-cover">
                            </div>
                            <div class="col-6 h-100">
                                <div class="d-flex flex-column justify-content-between">
                                    <div class="p-3">
                                        <p class="text-dark fw-semibold"><?php echo $shop->shopName ?></p>
                                        <p class="opacity-50"><?php echo $shop->shopAdress ?><br><?php echo $shop->shopAdressCode ?></p>
                                    </div>
                                    <div class="p-3">
                                        <span class="">Produkter til salg: <?php echo $shop->productCount ?></span>
                                        <hr class="opacity-25 my-2">
                                        <img class="favorite-icon btn p-0" data-id="<?php echo $shop->shopId ?>" src="../img/icons/favorite.svg" style="display: <?php echo $shop->shopFavorite == 1 ? 'none' : 'block'; ?>;">
                                        <img class="favorite-icon btn p-0" data-id="<?php echo $shop->shopId ?>" src="../img/icons/favorite-on.svg" style="display: <?php echo $shop->shopFavorite == 1 ? 'block' : 'none'; ?>;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="text-center my-4">
                <h2 class="text-primary fw-semibold mb-0">Produkter der er klar til afhentning hos<br><?php echo $shop->shopName ?></h2>
            </div>
            <div class="row g-3">
                <?php
                $products = $db->sql("SELECT *, GROUP_CONCAT(conditionTitle SEPARATOR ', ') AS conditionTitle FROM products INNER JOIN connect_for_products ON productId = productIdConnect INNER JOIN conditions ON conditionId = conditionIdConnect INNER JOIN categories ON categoryId = productCategoryId INNER JOIN shops ON shopId = productShopId WHERE shopId = $shopId AND productReserved = 0 GROUP BY productId ORDER BY productId DESC ");
                foreach($products as $product) {
                    ?>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="loop-card d-flex flex-column justify-content-between position-relative bg-light border border-2 border-light shadow w-100">
                            <div class="">
                                <img src="<?php echo $product->productImage1 ?>" alt="<?php echo $product->productTitle ?>" class="img-fluid w-100">
                                <div class="p-2 mx-1 mt-1">
                                    <a href="product.php?productId=<?php echo $product->productId ?>" class="text-dark stretched-link" title="Gå til <?php echo $product->productTitle ?>"><?php echo $product->productTitle ?></a>
                                    <p class="opacity-50 pt-2"><?php echo $product->conditionTitle ?></p>
                                </div>
                            </div>
                            <div class="p-2 mx-1 mb-2">
                                <div class="d-flex justify-content-between">
                                    <span class="text-secondary fw-semibold"><?php echo $product->productPrice ?> DKK</span>
                                    <span class="text-dark fw-semibold opacity-50">
                                    <?php
                                    $savedPercentage = (($product->productRetailPrice - $product->productPrice) / $product->productRetailPrice) * 100; //Her udregnes besparrelsen i procent
                                    $savedPercentageResult = number_format($savedPercentage); echo "-" . $savedPercentageResult . "%"; //Her omregnes resultatet til et helt tal
                                    ?>
                                </span>
                                </div>
                                <hr class="opacity-25 my-2">
                                <span class="minimize-text"><?php echo $product->shopName ?></span>
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

<?php
require "../classes/classDB.php";
require "../settings/init.php";
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Loopiny Erhverv - Statistik</title>

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

<?php include("header.php"); ?>

<article>
    <section>
        <div class="container">
            <div class="text-center">
                <h2 class="text-primary fw-semibold mb-1">Statistik over din butik på Loopiny</h2>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row g-3 mt-2">
                <?php
                $sql = "SELECT COUNT(productId) AS savedProductCount FROM products WHERE productPickedUp = '1' AND productShopId = '1'";
                $result = $db->sql($sql);

                // Hent første række fra resultatet
                if (!empty($result)) {
                    $countRow = $result[0]; // Første objekt i array
                    $savedProductCount = $countRow->savedProductCount; // Brug egenskaben direkte
                } else {
                    $savedProductCount = 'Ingen data';
                }

                // Udregn antal træer plantet
                $treesPlanted = $savedProductCount / 4;
                ?>
                <div class="col-12 col-sm-6">
                    <div class="text-center w-100">
                        <object type="image/svg+xml" data="../img/icons/tag.svg" class="static-icon"></object>
                        <p class="fw-semibold mb-1">Produkter reddet fra destruktion</p>
                        <h1 class="fw-bold mb-3"><?php echo $savedProductCount ?> stk.</h1>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="text-center w-100">
                        <object type="image/svg+xml" data="../img/icons/tree.svg" class="static-icon"></object>
                        <p class="fw-semibold mb-1">Antal træer plantet med Loopiny</p>
                        <h1 class="fw-bold mb-3"><?php echo $treesPlanted ?> stk.</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-center mt-5">
                <h2 class="text-primary fw-semibold mb-1">Historik over dine solgte produkter på Loopiny</h2>
            </div>
            <div class="row g-3 mt-2">
                <?php
                $products = $db->sql("SELECT *, GROUP_CONCAT(conditionTitle SEPARATOR ', ') AS conditionTitle FROM products INNER JOIN connect_for_products ON productId = productIdConnect INNER JOIN conditions ON conditionId = conditionIdConnect INNER JOIN shops ON shopId = productShopId WHERE productPickedUp = 1 AND shopId = 1 GROUP BY productId ORDER BY productId DESC");
                if (empty($products)) {
                    // Hvis der ikke findes noget resultat
                    echo '
                    <div class="text-center mt-4">
                    <p class="opacity-50 mb-2">Du har endnu ikke solgt nogen produkter.</p>
                    <object type="image/svg+xml" data="../img/icons/tag.svg" class="tag-icon opacity-25"></object>
                    </div>
                    ';
                } else {
                    foreach($products as $product) {
                        ?>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="loop-card d-flex flex-column justify-content-between position-relative bg-light border border-2 border-light shadow w-100 opacity-50">
                                <div class="">
                                    <img src="<?php echo $product->productImage1 ?>" alt="<?php echo $product->productTitle ?>" class="img-fluid w-100">
                                    <div class="p-2 mx-1 mt-1">
                                        <span class="fw-semibold text-dark stretched-link" title="<?php echo $product->productTitle ?>"><?php echo $product->productTitle ?></span>
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
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

</article>


<?php include("footer.php"); ?>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

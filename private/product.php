<?php
require "../classes/classDB.php";
require "../settings/init.php";

if(empty($_GET["productId"])) {
    header("Location: ../private/discover.php");
}

$productId = $_GET["productId"];
$product = $db->sql("SELECT *, GROUP_CONCAT(conditionTitle ORDER BY conditionId ASC SEPARATOR ', ') AS conditionTitle FROM products INNER JOIN connect_for_products ON productId = productIdConnect INNER JOIN conditions ON conditionIdConnect = conditionId WHERE productId = :productId GROUP BY productId", [":productId" => $productId]);
$product = $product[0];
$conditions = explode(', ', $product->conditionTitle);

?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Loopiny Privat - Produkt</title>

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
                    <div class="loop-card d-flex flex-column position-relative big-border bg-light shadow w-100">

                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo $product->productImage1 ?>" alt="<?php echo $product->productTitle ?>" class="d-block img-fluid w-100" alt="<?php echo $product->productTitle ?>">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo $product->productImage1 ?>" alt="<?php echo $product->productTitle ?>" class="d-block img-fluid w-100" alt="<?php echo $product->productTitle ?>">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo $product->productImage1 ?>" alt="<?php echo $product->productTitle ?>" class="d-block img-fluid w-100" alt="<?php echo $product->productTitle ?>">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <h2 class="fw-semibold text-secondary my-3"><?php echo $product->productTitle ?></h2>
                        <div class="row">
                            <div class="col-6">
                                <table class="w-100">
                                    <tbody>
                                    <tr>
                                        <td class="fw-semibold text-secondary pb-1">Loopiny pris</td>
                                        <td class="fw-semibold text-secondary pb-1"><?php echo $product->productPrice ?>,00 DKK</td>
                                    </tr>
                                    <tr>
                                        <td class="opacity-50 pb-1">Udsalgspris</td>
                                        <td class="opacity-50 b-1"><?php echo $product->productRetailPrice ?>,00 DKK</td>
                                    </tr>
                                    <tr>
                                        <td class="opacity-50 pb-1">Besparrelse</td>
                                        <td class="opacity-50 pb-1">
                                            <?php
                                            $savedPercentage = (($product->productRetailPrice - $product->productPrice) / $product->productRetailPrice) * 100; //Her udregnes besparrelsen i procent
                                            $savedPercentageResult = number_format($savedPercentage); echo "-" . $savedPercentageResult . "%"; //Her omregnes resultatet til et helt tal
                                            ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <p class="fw-semibold mt-4 mb-1">Produktets tilstand</p>
                                <ul class="">
                                    <?php foreach ($conditions as $condition):?>
                                        <li class="pb-1">
                                            <?php echo htmlspecialchars($condition); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</article>

<?php include("footer.php"); ?>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/favorite.js"></script>

</body>
</html>

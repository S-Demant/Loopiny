<?php
require "../classes/classDB.php";
require "../settings/init.php";

// Tjek om success parameteren er sat i URL'en
$showAlert = false;
if (isset($_GET['success']) && $_GET['success'] == '1') {
    $showAlert = true;
}
?>

<?php if ($showAlert): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            alert("Produktet er nu oprettet.");
        });
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Loopiny Privat - Produkter</title>

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
                <h2 class="text-primary fw-semibold mb-1">Produkter du har til salg via Loopiny</h2>
                <span>Tryk for at se detaljer om hvert produkt, eller angiv som afhentet</span>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row g-3 mt-2">
                <?php
                    $products = $db->sql("SELECT *, GROUP_CONCAT(conditionTitle SEPARATOR ', ') AS conditionTitle FROM products INNER JOIN connect_for_products ON productId = productIdConnect INNER JOIN conditions ON conditionId = conditionIdConnect INNER JOIN categories ON categoryId = productCategoryId INNER JOIN shops ON shopId = productShopId WHERE shopId = 5 AND productPickedUp = 0 GROUP BY productId ORDER BY productId DESC");
                if (empty($products)) {
                    // Hvis der ikke findes noget resultat
                    echo '
                    <div class="text-center">
                    <p class="mb-2">Du har endnu ikke nogen produkter tilgængelig</p>
                    <a href="create.php" title="Opret produkt" class="btn btn-secondary fw-semibold rounded-3 py-1 px-3">Opret produkt</a>
                    </div>
                    ';
                } else {
                    foreach($products as $product) {
                        ?>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="loop-card d-flex flex-column justify-content-between position-relative bg-light border border-2 border-light shadow w-100">
                                <div class="">
                                    <img src="<?php echo $product->productImage1 ?>" alt="<?php echo $product->productTitle ?>" class="img-fluid w-100">
                                    <div class="p-2 mx-1 mt-1">
                                        <a href="product.php?productId=<?php echo $product->productId ?>" class="text-dark stretched-link" title="Gå til <?php echo $product->productTitle ?>"><?php echo $product->productTitle ?></a>
                                        <p class="opacity-50 pt-2 mb-0">Status</p>
                                        <?php
                                        if ($product->productReserved == 1) {
                                            echo '<span class="fw-semibold text-secondary">Reserveret</span>';
                                        } else {
                                            echo '<span class="fw-semibold">Tilgængelig</span>';
                                        }
                                        ?>
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

                                    <?php
                                    if ($product->productReserved == 1) {
                                        echo '
                                        <button type="button" id="pickItUp" class="btn btn-primary position-relative fw-semibold rounded-4 z-9 w-100 py-1 mt-2" data-product-id="' . $product->productId . '">Angiv som afhentet</button>
                                        ';
                                    } else {
                                        echo '
                                        <button type="button" class="btn btn-primary fw-semibold position-relative rounded-4 opacity-25 z-9 w-100 py-1 mt-2">Angiv som afhentet</button>
                                        ';
                                    }
                                    ?>

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

<script>
    // Registrer produktet som afhentet
    document.querySelector("#pickItUp").addEventListener("click", function() {
        const productId = this.getAttribute("data-product-id"); // Henter produktId'et fra data-attributten
        if (confirm("Du er ved at angive dette produkt som afhentet. Er dette korrekt?")) {
            fetch("set-to-pick-up.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `productPickedUp=1&productId=${productId}`
            })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Viser beskeden fra set-to-pick-up.php
                    location.reload(); // Opdaterer siden
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
    });
</script>

</body>
</html>
<?php
require "../classes/classDB.php";
require "../settings/init.php";

if(empty($_GET["productId"])) {
    header("Location: ../myshop/myproducts.php");
}

$productId = $_GET["productId"];
$product = $db->sql("SELECT *, GROUP_CONCAT(conditionTitle ORDER BY conditionId ASC SEPARATOR ', ') AS conditionTitle FROM products INNER JOIN connect_for_products ON productId = productIdConnect INNER JOIN conditions ON conditionIdConnect = conditionId INNER JOIN shops ON shopId = productShopId WHERE productId = :productId GROUP BY productId", [":productId" => $productId]);
$product = $product[0];
$conditions = explode(', ', $product->conditionTitle);
$productReserved = $product->productReserved;
$productPickedUp = $product->productPickedUp;
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Loopiny Erhverv - Produkt</title>

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
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <div class="loop-card d-flex flex-column position-relative big-border bg-light shadow w-100">
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo $product->productImage1 ?>" alt="<?php echo $product->productTitle ?>" class="d-block img-fluid w-100" alt="<?php echo $product->productTitle ?>">
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo $product->productShopImage ?>" alt="<?php echo $product->productTitle ?>" class="d-block img-fluid w-100" alt="<?php echo $product->productTitle ?>">
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
                        <h1 class="fw-semibold pt-1 mt-3 mb-4"><?php echo $product->productTitle ?></h1>
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
                            <div class="col-6">
                                <p class="fw-semibold mb-1"><?php echo $product->shopName ?></p>
                                <p><?php echo $product->shopAdress ?><br><?php echo $product->shopAdressCode ?></p>
                                <p class="fw-semibold mt-3 mb-1">Yderligere beskrivelse</p>
                                <p><?php echo $product->productDescription ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">
                    <?php
                    if ($product->productReserved == 1 && $product->productPickedUp != 1) {
                        echo '
                        <button type="button" id="pickItUp" class="btn btn-primary position-relative fw-semibold rounded-4 w-100 py-3 mt-3" data-product-id="' . $product->productId . '">Angiv som afhentet</button>
                        ';
                    } else if ($product->productReserved == 1 && $product->productPickedUp == 1) {
                        echo '
                        <p class="fw-semibold text-center mt-3">Dette produkt er afhentet, og ikke længere tilgængeligt.</p>
                        ';
                    } else {
                        echo '
                        <button type="button" class="btn btn-primary fw-semibold position-relative rounded-4 opacity-25 w-100 py-3 mt-3">Angiv som afhentet</button>
                        ';
                    }
                    ?>
                    <div class="d-flex flex-column justify-content-center mt-3">
                        <button id="deleteBtn" class="btn btn-outline-dark fw-semibold rounded-4 py-1 px-5 mt-2" data-product-id="<?php echo $product->productId; ?>">Slet produkt</button>
                        <button id="backBtn" class="btn btn-outline-dark fw-semibold rounded-4 py-1 px-5 mt-2">Tilbage</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>

<?php include("footer.php"); ?>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Går tilbage til forrige side
    const backBtn = document.querySelector("#backBtn");
    backBtn.addEventListener("click", function() {
        history.back();
    });
</script>

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
                    window.location.href = "myproducts.php"; // Omdirigerer til produkt oversigt
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
    });
</script>

<script>
    // Registrer event listener for slet knappen
    document.querySelector("#deleteBtn").addEventListener("click", function() {
        const productId = this.getAttribute("data-product-id"); // Henter produktId'et fra data-attributten
        if (confirm("Er du sikker på, at du vil slette dette produkt?")) {
            fetch("delete-product.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `productId=${productId}`
            })
                .then(response => response.text())
                .then(data => {
                    alert(data); // Viser beskeden fra delete-product.php
                    window.location.href = "myproducts.php"; // Omdirigerer til produktsiden efter sletning
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        }
    });

</script>

</body>
</html>
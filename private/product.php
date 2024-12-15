<?php
require "../classes/classDB.php";
require "../settings/init.php";

if(empty($_GET["productId"])) {
    header("Location: ../private/discover.php");
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

    <title>Loopiny Privat - Produkt</title>

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
                    <?php if ($productPickedUp == '1'): ?>
                        <p class="fw-semibold text-center mt-3">Dette produkt er afhentet, og ikke længere tilgængeligt.</p>
                    <?php else: ?>
                    <div id="reserveBtn" style="<?php echo ($productReserved == '1') ? 'display:none;' : ''; ?>">
                        <form id="reserveForm" method="POST">
                            <input type="hidden" name="productId" value="<?php echo $productId; ?>">
                            <button type="button" class="btn btn-primary fw-semibold rounded-4 w-100 py-3 mt-3">Reservér produktet nu</button>
                        </form>
                        <p class="text-center my-2">Produktet skal afhentes inden for 48 timer fra reservation, inden for butikkens åbningstid, ellers annulleres din reservation</p>
                        <div class="d-flex justify-content-center">
                            <button id="backBtn" class="btn btn-outline-dark fw-semibold rounded-4 py-1 px-5 mt-2">Tilbage</button>
                        </div>
                    </div>

                    <div class="text-center mt-3" id="reserveControle" style="display:<?php echo ($productReserved == '1') ? 'block' : 'none'; ?>;">
                        <h2 class="fw-semibold text-secondary mb-3">Swipe her når du afhenter dit produkt!</h2>
                        <div class="d-flex justify-content-center">
                            <div id="swipeBtn" class="swipe-button position-relative bg-light text-primary border border-2 border-primary rounded-5 overflow-hidden">
                                <span id="swipeCircle" class="swipe-circle position-absolute bg-primary rounded-circle translate-middle-y top-50"></span>
                                <h2 class="position-absolute translate-middle top-50 start-50 fw-semibold mb-0">Afhent nu!</h2>
                            </div>
                        </div>

                        <p class="fw-semibold mt-3 mb-0"><?php echo $product->productTitle ?> er reserveret af dig.</p>
                        <p>Swipe når du afhenter det reserverede produkt i butikken.<br>Reservationen annulleres om 8 timer og 31 minutter.</p>
                        <?php endif; ?>
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
    // Reservation funktion
    const reserveBtn = document.querySelector("#reserveBtn");

    reserveBtn.addEventListener('click', function() {
        const form = document.querySelector('#reserveForm');
        const formData = new FormData(form);

        fetch('reserve-product.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "Success") {
                    document.querySelector('#reserveBtn').style.display = 'none';
                    document.querySelector('#reserveControle').style.display = 'block';
                    alert('Du har reserveret dette produktet.');
                } else {
                    alert('Der opstod en fejl. Prøv venligst igen senere.');
                }
            })
    });
</script>

<script>
    function letsSwipe() {
        let swipeBtn = document.getElementById('swipeBtn');
        let swipeCircle = document.getElementById('swipeCircle');
        let startX;
        let isMouseDown = false;

        if (swipeBtn) { // Tjek om swipeBtn findes, før tilføjelse af event listeners
            // Touch events
            swipeBtn.addEventListener('touchstart', function(e) {
                startX = e.touches[0].clientX;
            });

            swipeBtn.addEventListener('touchmove', function(e) {
                let touch = e.touches[0];
                let change = touch.clientX - startX;
                if (change > 0 && change < swipeBtn.offsetWidth - swipeCircle.offsetWidth - 10) {
                    swipeCircle.style.left = change + 'px';
                }
            });

            swipeBtn.addEventListener('touchend', function(e) {
                let touch = e.changedTouches[0];
                let change = touch.clientX - startX;
                if (change > swipeBtn.offsetWidth / 1.5) { // Tjek om swipen var lang nok
                    swipeCircle.style.left = (swipeBtn.offsetWidth - swipeCircle.offsetWidth - 10) + 'px';
                    alert('Tillykke! Du har nu reddet dette produkt fra destruktion. Tryk OK for at fortsætte.');
                    setTimeout(function() {
                        swipeCircle.style.left = '0.15rem'; // Reset position
                    }, 1000);

                    // Send POST-anmodning for at opdatere productPickedUp
                    let productId = <?php echo $productId; ?>; // Hent productId fra PHP
                    fetch('product-picked-up.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ productId: productId })
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log('Update response:', data);
                            if (data.trim() === "Success") {
                                window.location.href = '../private/product-success.php?productId=<?php echo $productId; ?>'; // Omdiriger til den nye side
                            }
                        })
                        .catch(error => {
                            console.error('Fejl ved opdatering:', error);
                        });
                } else {
                    swipeCircle.style.left = '0.15rem'; // Reset position
                }
            });

            // Mouse events
            swipeBtn.addEventListener('mousedown', function(e) {
                startX = e.clientX;
                isMouseDown = true;
            });

            document.addEventListener('mousemove', function(e) {
                if (!isMouseDown) return;
                let change = e.clientX - startX;
                if (change > 0 && change < swipeBtn.offsetWidth - swipeCircle.offsetWidth - 10) {
                    swipeCircle.style.left = change + 'px';
                }
            });

            document.addEventListener('mouseup', function(e) {
                if (!isMouseDown) return;
                isMouseDown = false;
                let change = e.clientX - startX;
                if (change > swipeBtn.offsetWidth / 1.5) { // Tjek om swipen var lang nok
                    swipeCircle.style.left = (swipeBtn.offsetWidth - swipeCircle.offsetWidth - 10) + 'px';
                    alert('Tillykke! Du har nu reddet dette produkt fra destruktion. Tryk OK for at fortsætte.');
                    setTimeout(function() {
                        swipeCircle.style.left = '0.15rem'; // Reset position
                    }, 1000);

                    // Send POST-anmodning for at opdatere productPickedUp
                    let productId = <?php echo $productId; ?>;
                    fetch('product-picked-up.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ productId: productId })
                    })
                        .then(response => response.text())
                        .then(data => {
                            console.log('Update response:', data);
                            if (data.trim() === "Success") {
                                window.location.href = '../private/product-success.php?productId=<?php echo $productId; ?>'; // Omdiriger til den nye side
                            }
                        })
                        .catch(error => {
                            console.error('Fejl ved opdatering:', error);
                        });
                } else {
                    swipeCircle.style.left = '0.15rem'; // Reset position
                }
            });
        }
    }

    letsSwipe();
</script>

</body>
</html>
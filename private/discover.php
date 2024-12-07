<?php
require "../classes/classDB.php";
require "../settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Loopiny Privat - Opdag</title>

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

<?php include("header-options.php"); ?>

<article>
    <section>
        <div class="container">
            <div class="text-center">
                <h2 class="text-primary fw-semibold mb-0">Produkter der er klar til at blive reddet nær dig</h2>
                <span>Inden for 8 km. fra 4400 Kalundborg</span>
            </div>
            <form>
                <div class="d-flex text-center my-2">
                    <input type="radio" class="btn-check btn-pick" name="pick" id="products" autocomplete="off" checked>
                    <label class="btn btn-primary border-2 border-light rounded-start-4 py-2 px-4 w-100" for="products">Produkter</label>

                    <input type="radio" class="btn-check btn-pick" name="pick" id="stores" autocomplete="off">
                    <label class="btn btn-primary border-2 border-light rounded-end-4 py-2 px-4 w-100" for="stores">Butikker</label>
                </div>
            </form>
        </div>
    </section>

    <section>
        <div class="container">

        </div>
    </section>
</article>

<?php include("footer.php"); ?>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

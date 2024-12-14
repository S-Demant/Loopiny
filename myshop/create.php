<?php
require "../classes/classDB.php";
require "../settings/init.php";
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Loopiny Privat - Opret produkt</title>

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
                <h2 class="text-primary fw-semibold mb-1">Sæt dit produkt til salg med Loopiny</h2>
                <span>Produktet skal indeholde en fyldestgørende titel, et billede af produktet, samt en årsag til hvorfor produktet er tilgængeligt i Loopiny tjenesten</span>
            </div>
            <form class="mt-4">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">Produktets titel *</label>
                            <input type="text" class="form-control" id="title" aria-describedby="Produktets titel" placeholder="F.eks. Orange langærmet sweatshirt i str. large">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="mb-4">
                            <label for="category" class="form-label fw-semibold">Produktets kategori *</label>
                            <select class="form-select" aria-label="category" required>
                                <option selected>Vælg en kategori</option>
                                <option value="...">...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="mb-4">
                            <label for="price" class="form-label fw-semibold">Produktets Loopiny pris *</label>
                            <input type="text" class="form-control" id="price" aria-describedby="Produktets pris" placeholder="Skriv prisen for produktet" required>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="mb-4">
                            <label for="retailPrice" class="form-label fw-semibold">Produktets vejledende udsalgspris *</label>
                            <input type="text" class="form-control" id="retailPrice" aria-describedby="Produktets pris" placeholder="Skriv produktets oprindelige pris" required>
                        </div>
                    </div>
                    <span class="fw-semibold">Produktets tilstand *</span>
                    <div class="col-6 col-lg-4 mb-3">
                        <?php
                        $conditions = $db->sql("SELECT * FROM conditions WHERE conditionId % 2 = 0 ORDER BY conditionId ASC");
                        foreach($conditions as $condition) {
                            ?>
                            <div class="form-check py-1 mt-1">
                                <input class="form-check-input" type="checkbox" name="cat" value="<?php echo $condition->conditionId ?>" id="check<?php echo $condition->conditionId ?>">
                                <label class="form-check-label" for="check<?php echo $condition->conditionId ?>"><?php echo $condition->conditionTitle ?></label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-6 col-lg-4 mb-4">
                        <?php
                        $conditions = $db->sql("SELECT * FROM conditions WHERE conditionId % 2 = 1 ORDER BY conditionId ASC");
                        foreach($conditions as $condition) {
                            ?>
                            <div class="form-check py-1 mt-1">
                                <input class="form-check-input" type="checkbox" name="cat" value="<?php echo $condition->conditionId ?>" id="check<?php echo $condition->conditionId ?>">
                                <label class="form-check-label" for="check<?php echo $condition->conditionId ?>"><?php echo $condition->conditionTitle ?></label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-12 col-lg-4"></div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-4 pb-2">
                            <label for="uploadImage" class="form-label fw-semibold">Billede af produktet *</label>
                            <p class="mb-2">Vi accepterer billeder af filtypen png, jpeg og webp.</p>
                            <input type="file" class="form-control-file" id="uploadImage" accept="image/png, image/jpeg, image/webp" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-4 pb-2">
                            <label for="uploadImage2" class="form-label fw-semibold">Billede af fejlen / manglen</label>
                            <p class="mb-2">Vi accepterer billeder af filtypen png, jpeg og webp.</p>
                            <input type="file" class="form-control-file" id="uploadImage2" accept="image/png, image/jpeg, image/webp" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Yderligere beskrivelse af produktet</label>
                            <textarea class="form-control" id="description" rows="3" maxlength="300" aria-describedby="Beskrivelse af produktet" placeholder="F.eks. Står som ny, men med en enkelt syning der er gået op ved toppen af venstre arm."></textarea>
                        <span>Maks 300 tegn.</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="accept">
                            <label class="form-check-label" for="accept">Ved oprettelse af produktet accepterer du vilkår og betingelser fra Loopiny om gældende håndtering, handel og ansvar. Læs vores handelspolitik her</label>
                        </div>
                        <button type="createBtn" class="btn btn-primary fw-semibold rounded-3 px-5 py-2 mt-2">Opret produkt</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</article>

<?php include("footer.php"); ?>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/favorite.js"></script>

</body>
</html>

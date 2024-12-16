<?php
require "../classes/classDB.php";
require "../settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];

    // Håndter filuploaden
    if (!empty($_FILES["productImage1"])) {
        $image = $_FILES["productImage1"];
        $targetDir = "../img/uploads/product/";
        $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));

        // Opret et nyt filnavn med .webp udvidelse
        $newFileName = pathinfo($image["name"], PATHINFO_FILENAME) . '.webp';
        $targetFile = $targetDir . $newFileName;
        $uploadOk = 1;

        // Tjek om filen er et rigtigt billede
        $check = getimagesize($image["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Filen er ikke et billede.";
            $uploadOk = 0;
        }

        // Tjek filstørrelse (maks. 5MB)
        if ($image["size"] > 5000000) {
            echo "Desværre, din fil er for stor.";
            $uploadOk = 0;
        }

        // Tillad kun bestemte filformater
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp") {
            echo "Desværre, kun JPG, JPEG, PNG & WEBP filer er tilladt.";
            $uploadOk = 0;
        }

        // Tjek om $uploadOk er sat til 0 på grund af en fejl
        if ($uploadOk == 0) {
            echo "Desværre, din fil blev ikke uploadet.";
        } else {
            // Flyt den uploadede fil midlertidigt
            $tempFile = $targetDir . basename($image["name"]);
            if (move_uploaded_file($image["tmp_name"], $tempFile)) {
                echo "Filen ". htmlspecialchars(basename($image["name"])) . " er blevet uploadet.";

                // Komprimer billedet til 720x540 og konverter til .webp
                $newWidth = 720;
                $newHeight = 540;

                // Håndter forskellige billedtyper korrekt, inklusive webp
                if ($imageFileType == "jpg" || $imageFileType == "jpeg") {
                    $srcImage = imagecreatefromjpeg($tempFile);
                } elseif ($imageFileType == "png") {
                    $srcImage = imagecreatefrompng($tempFile);
                } elseif ($imageFileType == "webp") {
                    $srcImage = imagecreatefromwebp($tempFile);
                } else {
                    echo "Ugyldig billedtype.";
                    exit;
                }

                if ($srcImage === false) {
                    echo "Fejl ved oprettelse af billedressource fra fil.";
                    exit;
                }

                $dstImage = imagecreatetruecolor($newWidth, $newHeight);
                if (!$dstImage) {
                    echo "Fejl ved oprettelse af ny billedressource.";
                    exit;
                }

                imagecopyresampled($dstImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($srcImage), imagesy($srcImage));

                // Gem det komprimerede billede som .webp
                if (imagewebp($dstImage, $targetFile)) {
                    echo "Billedet er blevet komprimeret og konverteret til .webp format.";
                    imagedestroy($srcImage);
                    imagedestroy($dstImage);
                    // Fjern den midlertidige fil kun hvis den ikke er .webp
                    if ($imageFileType != "webp") {
                        unlink($tempFile);
                    }
                } else {
                    echo "Der var en fejl ved konvertering til .webp format.";
                    imagedestroy($srcImage);
                    imagedestroy($dstImage);
                }

                // Gem filstien i $data arrayet
                $data["productImage1"] = $targetFile;
            } else {
                echo "Der var en fejl ved upload af din fil.";
            }
        }
    }

    $sql = "INSERT INTO products (productTitle, productCategoryId, productShopId, productPrice, productRetailPrice, productImage1, productImage2, productDescription) VALUES (:productTitle, :productCategoryId, :productShopId, :productPrice, :productRetailPrice, :productImage1, :productImage2, :productDescription)";
    $bind = [
        ":productTitle" => $data["productTitle"],
        ":productCategoryId" => $data["productCategoryId"],
        ":productShopId" => $data["productShopId"],
        ":productPrice" => $data["productPrice"],
        ":productRetailPrice" => $data["productRetailPrice"],
        ":productImage1" => $data["productImage1"],
        ":productImage2" => $data["productImage2"],
        ":productDescription" => $data["productDescription"]
    ];

    $db->sql($sql, $bind, false);

    // Hent det nyligt indsatte productId med en SELECT-forespørgsel
    $sql = "SELECT productId FROM products WHERE productTitle = :productTitle AND (productCategoryId = :productCategoryId OR :productCategoryId IS NULL) AND (productShopId = :productShopId OR :productShopId IS NULL) AND (productPrice = :productPrice OR :productPrice IS NULL) AND (productRetailPrice = :productRetailPrice OR :productRetailPrice IS NULL) AND (productImage1 = :productImage1 OR :productImage1 IS NULL) AND (productImage2 = :productImage2 OR :productImage2 IS NULL) AND productDescription = :productDescription ORDER BY productId DESC LIMIT 1";
    $stmt = $db->sql($sql, $bind, false);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $productId = $product['productId'];
        echo "Produkt fundet. Produkt ID: " . $productId;

        // Indsæt de valgte conditions i connect_for_products tabellen
        if (!empty($data["conditions"])) {
            foreach ($data["conditions"] as $conditionIdConnect) {
                $sql = "INSERT INTO connect_for_products (productIdConnect, conditionIdConnect, categoryIdConnect) VALUES (:productIdConnect, :conditionIdConnect, :categoryIdConnect)";
                $bindCondition = [
                    ":productIdConnect" => $productId,
                    ":conditionIdConnect" => $conditionIdConnect,
                    ":categoryIdConnect" => $data["productCategoryId"]
                ];
                $db->sql($sql, $bindCondition, false);
            }
        }

        // Rediriger til success side
        header("Location: create.php?success=1");
        exit();
    } else {
        echo "Produktet blev ikke fundet.";
    }
}
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
                <?php
                if (!empty($_GET["success"]) && $_GET["success"] == 1) {
                    echo '<div class="mb-3"><h5 class="text-success">Produktet er oprettet!</h5></div>';
                }
                ?>
                <h2 class="text-primary fw-semibold mb-1">Sæt dit produkt til salg med Loopiny</h2>
                <span>Produktet skal indeholde en fyldestgørende titel, et billede af produktet, samt en årsag til hvorfor produktet er tilgængeligt i Loopiny tjenesten</span>
            </div>
            <form action="?success" enctype="multipart/form-data" method="post" class="mt-4">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="mb-4">
                            <label for="title" class="form-label fw-semibold">Produktets titel *</label>
                            <input type="text" class="form-control" id="title" name="data[productTitle]" aria-describedby="Produktets titel" placeholder="F.eks. Orange langærmet sweatshirt i str. large">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="mb-4">
                            <label for="category" class="form-label fw-semibold">Produktets kategori *</label>
                            <select class="form-select" name="data[productCategoryId]" aria-label="category" required>
                                <option selected>Vælg en kategori</option>
                                <?php
                                $categories = $db->sql("SELECT * FROM categories ORDER BY categoryId ASC");
                                foreach($categories as $category) {
                                ?>
                                <option value="<?php echo $category->categoryId ?>"><?php echo $category->categoryName ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="mb-4">
                            <label for="price" class="form-label fw-semibold">Produktets Loopiny pris *</label>
                            <input type="text" class="form-control" id="price" name="data[productPrice]" aria-describedby="Produktets pris" placeholder="Skriv prisen for produktet" required>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="mb-4">
                            <label for="retailPrice" class="form-label fw-semibold">Produktets vejledende udsalgspris *</label>
                            <input type="text" class="form-control" id="retailPrice" name="data[productRetailPrice]" aria-describedby="Produktets oprindelige udsalgspris" placeholder="Skriv produktets oprindelige pris" required>
                        </div>
                    </div>
                    <span class="fw-semibold mb-2">Produktets tilstand *</span>
                    <div class="col-12 col-sm-6 mb-4">
                        <?php
                        $conditions = $db->sql("SELECT * FROM conditions ORDER BY conditionId ASC");
                        foreach($conditions as $condition) {
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="data[conditions][]" value="<?php echo $condition->conditionId ?>" id="check<?php echo $condition->conditionId ?>">
                                <label class="form-check-label" for="check<?php echo $condition->conditionId ?>"><?php echo $condition->conditionTitle ?></label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="mb-4 pb-2">
                            <label for="uploadImage" class="form-label fw-semibold">Billede af produktet *</label>
                            <p class="mb-2">Vi accepterer billeder af filtypen png, jpg, jpeg og webp.</p>
                            <input type="file" class="form-control-file" id="uploadImage" name="productImage1" accept="image/png, image/jpg, image/jpeg, image/webp" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Yderligere beskrivelse af produktet</label>
                            <textarea class="form-control mb-1" id="description" name="data[productDescription]" rows="3" maxlength="300" aria-describedby="Beskrivelse af produktet" placeholder="F.eks. Står som ny, men med en enkelt syning der er gået op ved toppen af venstre arm."></textarea>
                            <div class="text-end">
                                <span class="text-end opacity-50">Maks 300 tegn.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-2 form-check">
                            <input type="checkbox" class="form-check-input" id="accept">
                            <label class="form-check-label" for="accept">Ved oprettelse af produktet accepterer du vilkår og betingelser fra Loopiny om gældende håndtering, handel og ansvar. Læs vores handelspolitik her</label>
                        </div>
                        <div class="d-none">
                            <input type="text" class="form-control" id="shop" name="data[productShopId]" aria-describedby="Butik der har produktet" value="5">
                        </div>
                        <button type="submit" class="btn btn-primary fw-semibold rounded-3 px-5 py-2 mt-2">Opret produkt</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</article>

<?php include("footer.php"); ?>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

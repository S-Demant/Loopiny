<?php
require "../classes/classDB.php";
require "../settings/init.php";
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Loopiny Privat - Indstillinger</title>

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
            <h2 class="fw-semibold mb-3">Brugerflade</h2>
            <form>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="language" class="form-label fw-semibold">Sprog</label>
                            <select class="form-select" aria-label="language">
                                <option>Vælg dit sprog</option>
                                <option selected value="dk">Dansk</option>
                                <option value="eng">Prototype</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="mode" class="form-label fw-semibold">Tilstand</label>
                            <select class="form-select" aria-label="mode">
                                <option selected value="light">Light mode</option>
                                <option value="dark">Prototype</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="location" class="form-label fw-semibold">Lokation</label>
                            <select class="form-select" aria-label="location">
                                <option>Vælg din lokation</option>
                                <option selected value="4200">4200 Slagelse</option>
                                <option value="4300">4300 Holbæk</option>
                                <option value="4400">4400 Kalundborg</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="distance" class="form-label fw-semibold">Afstand</label>
                            <select class="form-select" aria-label="distance">
                                <option>Vælg maks afstand fra lokation</option>
                                <option value="1">Inden for 1 km.</option>
                                <option selected value="3">Inden for 3 km.</option>
                                <option value="5">Inden for 5 km.</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary fw-semibold rounded-3 px-5 py-2 mt-2">Gem indstillinger</button>
            </form>

            <h2 class="fw-semibold mt-5 mb-3">Login oplysninger</h2>
            <form>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Navn</label>
                            <input type="text" class="form-control" id="name" aria-describedby="Dit navn" placeholder="Dit navn" value="Jens Jensen">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="mail" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="mail" aria-describedby="Din e-mail" placeholder="Din e-mail" value="jensen@prototype.dk">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="gender" class="form-label fw-semibold">Køn</label>
                            <select class="form-select" aria-describedby="Vælg dit køn" aria-label="gender">
                                <option selected>Intet køn valgt</option>
                                <option value="k">Kvinde</option>
                                <option value="m">Mand</option>
                                <option value="a">Andet</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Adgangskode</label>
                            <input type="password" class="form-control" id="password" aria-describedby="Din adgangskode" placeholder="Din adgangskode" value="dotdotdot">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary fw-semibold rounded-3 px-5 py-2 mt-2">Gem indstillinger</button>
            </form>

            <h2 class="fw-semibold mt-5 mb-3">Support</h2>
            <span>E-mail: mail@loopiny.com</span>
            <br>
            <span>Tlf.: 30 26 46 82</span>

            <h2 class="fw-semibold mt-5 mb-3">Slet</h2>
            <button id="delete" class="btn btn-outline-dark fw-semibold rounded-3 py-2 px-5 mt-2">Slet profil permanent</button>
        </div>
    </section>
</article>


<?php include("footer.php"); ?>

<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const deleteBtn = document.getElementById('delete');

    deleteBtn.addEventListener('click', function() {
        alert('Nej nej du! Det får du ikke lov til her... Det er jo kun en prototype.');
    });
</script>


</body>
</html>

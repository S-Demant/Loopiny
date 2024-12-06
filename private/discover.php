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

<header>
    <nav class="topnav align-content-center bg-light shadow fixed-top">
        <div class="container">

            <div class="d-flex justify-content-between">
                <a href="discover.php" class="my-auto"><img src="../img/loopiny/loopiny-logo-top.webp"></a>
                <div class="d-flex gap-3">
                    <a href="#" class="fw-semibold my-auto px-2" data-bs-toggle="offcanvas" data-bs-target="#navbarFilter" aria-controls="Viser navigationen for filtrering" aria-label="Filtrer listen">Filtrer &#9662;</a>
                    <a href="#" class="fw-semibold my-auto px-2" data-bs-toggle="offcanvas" data-bs-target="#navbarSort" aria-controls="Viser navigationen for sortering" aria-label="Sorter listen">Sorter &#9662;</a>
                </div>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarFilter" aria-labelledby="Filtrer listen">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="navbarFilterLabel">Filtrer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Luk"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Linker</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarSort" aria-labelledby="Sorter listen">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="navbarSortLabel">Sorter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Luk"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
</header>

<body>
<div class="container mt-5">
    <h1 class="text-primary">Ny test</h1>
</div>


<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

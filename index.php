<?php
require "classes/classDB.php";
require "settings/init.php";
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loopiny</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Glory:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<header>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container position-relative">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-start" id="navbarToggler">
                <div class="d-flex justify-content-between w-100">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link fw-semibold" href="#">Vores tjeneste</a>
                        </li>
                        <li class="nav-item me-3 me-lg-0 mx-lg-4">
                            <a class="nav-link fw-semibold" href="#">Vores vision</a>
                        </li>
                        <li class="nav-item me-3 me-lg-0 mx-lg-4">
                            <a class="nav-link fw-semibold" href="#">Om Loopiny</a>
                        </li>
                        <li class="nav-item me-lg-0 ms-lg-4">
                            <a class="nav-link fw-semibold" href="#">Blogindlæg</a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown language-in">
                    <button class="btn fw-semibold link-light dropdown-toggle ps-0" type="button" id="languageDropdown" data-bs-toggle="dropdown">Dansk</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Dansk</a></li>
                        <li><a class="dropdown-item" href="#">English</a></li>
                    </ul>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 d-flex gap-2">
                <a href="#" class="btn btn-loop btn-outline-light border-2 fw-semibold px-3 py-2">Loopiny Privat</a>
                <a href="#" class="btn btn-loop btn-outline-light border-2 fw-semibold px-3 py-2">Loopiny Erhverv</a>
                <div class="dropdown language-out">
                    <button class="btn fw-semibold link-light dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown">Dansk</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Dansk</a></li>
                        <li><a class="dropdown-item" href="#">English</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<section>
    <div class="container-fluid hero d-flex align-items-center">
        <div class="hero-image w-100 h-100">
            <div class="container h-100">
                <div class="text-center align-content-center h-100">
                    <img src="img/loopiny/loopiny-logo-hero.webp" class="img-fluid" alt="Loopiny logo">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 col-xl-4">
                            <p class="fw-semibold text-light mt-4 mb-0">Køb nyt med god samvittighed</p>
                            <p class="text-light">Opdag nye spændende produkter med Loopiny tjenesten som normalt ikke er til salg grundet fejl og mangler. Begynd at redde produkter til eksklusive Loopiny priser nu!</p>
                        </div>
                    </div>
                    <div class="row justify-content-center my-3">
                        <div class="col-12 col-md-6 col-xl-4">
                            <a href="#" class="btn btn-loop btn-outline-light border-2 fw-semibold w-100 py-3">Opdag nye produkter</a>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 mt-3 mt-md-0">
                            <a href="#" class="btn btn-loop btn-outline-light border-2 fw-semibold w-100 py-3">Benyt Loopiny Erhverv</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Lightmode Switch -->
<div class="lightmode-switch">
    <button class="btn btn-outline-light">Lightmode</button>
</div>


<article>
    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2 class="fw-semibold">Red produkter. Red planeten</h2>
                    <p>Vidste du, at utallige varer går til spilde, blot fordi de ikke kan sælges i almindelige butikker? Med Loopiny kan du give disse produkter en ny chance og gøre en positiv forskel for miljøet. Ved at redde usælgelige varer til en brøkdel af prisen hjælper du med at reducere spild og støtte en grønnere fremtid.</p>
                    <p class="fw-semibold">Download Loopiny i dag og vær med i bevægelsen, der gør verdenen grønnere – ét køb ad gangen!</p>
                    <a href="#" class="btn btn-primary rounded-3 fw-semibold py-2 px-4">Kom i gang</a>
                </div>
                <div class="col-12 col-md-6">
                    <img src="img/loopiny/vision.webp" class="img-fluid" alt="Infografik for Loopiny tjenesten">
                </div>
            </div>
            <div class="text-center mt-4">
                <img src="img/loopiny/inforgrafik.webp" class="img-fluid" alt="Infografik for Loopiny tjenesten">
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <h2 class="fw-semibold">Visionen bag</h2>
                    <p>Hos Loopiny drømmer vi om en verden, hvor varer med små fejl eller mangler ikke går til spilde, men i stedet får en ny chance. Vi ønsker at skabe en platform, der forbinder butikker med kunder, som ser værdien i det uperfekte. Vores vision er at gøre det nemt og tilgængeligt for alle at tage et mere ansvarligt valg, når de handler. Hver plet, ridse eller returvare har en historie, og vi hjælper med at sikre, at den ikke slutter for tidligt. Sammen kan vi mindske spild, udnytte ressourcerne bedre og samtidig tilbyde kunder unikke fund til gode priser. Med Loopiny gør vi det muligt at forvandle små fejl til store muligheder.</p>
                </div>
            </div>
        </div>

        <div class="container-fluid green-gradient mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 py-5 pe-5">
                        <h2 class="fw-semibold text-light">Vores tre kerneværdier</h2>
                        <p class="text-light">Hos Loopiny er vores vision at skabe en smartere og mere ansvarlig fremtid, hvor produkter får nyt liv i stedet for at gå til spilde. Vi arbejder ud fra tre kerneværdier – Environment (miljø), Social (social ansvarlighed) og Governance (god virksomhedsdrift) – for at gøre en positiv forskel.</p>
                        <ul class="text-light">
                            <li class="py-2"><span class="fw-semibold">Environment (Miljø)</span><br>Vi giver varer med små fejl eller overskudslager en ny chance, så de ikke ender som affald. Ved at reducere spild og fremme smartere ressourceudnyttelse tager vi ansvar for vores planets fremtid.</li>
                            <li class="py-2"><span class="fw-semibold">Social (Social ansvarlighed)</span><br>Vi tror på værdien af fællesskab og ansvarlige handlinger. Vores platform forbinder butikker og forbrugere, som ønsker at træffe bevidste valg og skabe en positiv forandring sammen.</li>
                            <li class="py-2"><span class="fw-semibold">Governance (Etisk virksomhedsdrift)</span><br>Gennemsigtighed og ansvarlig ledelse er hjørnestenen i Loopiny. Vi arbejder med klare retningslinjer og et etisk fokus for at opbygge tillid og skabe langsigtet værdi for alle interessenter.</li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 py-5 ps-5 position-relative">
                        <h2 class="fw-semibold text-light">Mindsk spild</h2>
                        <p class="text-light">Hvert år kasseres store mængder ikke-fødevareprodukter i detailhandlen på grund af små fejl, beskadigelse eller overskud. Eksempelvis smides 677 tons nyt tøj ud årligt i Danmark, ofte fordi returvarer og overproduktion gør det billigere at destruere tøjet end at donere det. I Europa anslås det, at op til 9% af alle tekstiler ødelægges, før de når forbrugeren, og at en tredjedel af returnerede varer købt online ender som affald. Dette kalder på smartere håndtering og mere bevidste valg, hvor produkter får en ny chance fremfor at gå tabt. Loopiny arbejder for at give varer nyt liv – til glæde for miljøet og os alle.</p>
                        <a href="#" class="btn btn-outline-light rounded-3 fw-semibold py-2 px-4">Kom med ombord</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content- mt-5">
                <div class="col-12 col-md-6 pt-0 pe-0 me-0">
                    <div class="">
                        <video controls class="bg-light shadow p-3 mt-4">
                            <source src="loopiny-video.mp4" type="video/mp4">
                            Din browser understøtter ikke videoelementet.
                        </video>
                    </div>
                </div>
                <div class="col-12 col-md-6 ps-5">
                    <h2 class="fw-semibold mt-4">Hvem er Loopiny?</h2>
                    <p>
                        Loopiny er en innovativ platform og applikation, der skaber en bro mellem butikker og kunder med
                        fokus på genanvendelse af varer med mindre fejl eller mangler. Vi tilbyder en løsning, hvor varer,
                        der ellers ville blive sat på udsalgsstativer eller kasseret, kan finde nye ejere, der værdsætter
                        deres funktionalitet og kvalitet.

                    </p>
                    <p>
                        Platformen gør det muligt for kunder at reservere varer direkte fra butikkerne og efterfølgende
                        hente dem på en enkel og overskuelig måde. Varerne kan eksempelvis være fra anden sortering,
                        returvarer eller produkter med kosmetiske skader, som fortsat er fuldt funktionelle.
                    </p>
                    <p>
                        Loopiny stræber efter at fremme ansvarlig forbrugerkultur ved at minimere spild og maksimere
                        værdien af eksisterende ressourcer. Vores mission er at skabe en smartere og mere ressourceeffektiv
                        måde at handle på, hvor både forbrugere og detailhandlen drager fordel.
                    </p>
                    <img src="img/loopiny/om-os.webp" class="img-fluid" alt="Om Loopiny">
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-12 col-md-6 text-center">
                    <h2 class="fw-semibold">Identitet og certifikater</h2>
                    <p>
                        Hos Loopiny går vi forrest for at fremme en mere klimavenlig tilgang til forbrug. Vi arbejder
                        aktivt for at reducere spild ved at give varer med små fejl eller mangler en ny chance og dermed
                        sikre, at ressourcer udnyttes til deres fulde potentiale.
                    </p>
                    <p>
                        Vores samarbejde med butikker inkluderer høje krav til ansvarlighed, og vi samarbejder med
                        partnere, der deler vores vision om en grønnere fremtid.
                    </p>
                    <p>
                        Loopiny er en del af en større bevægelse mod en mere cirkulær økonomi, hvor varer, der ellers ville
                        gå til spilde, finder nye ejere. Vores platform gør det nemt for dig at tage et klimavenligt valg i
                        hverdagen – og samtidig finde unikke varer til gode priser.
                    </p>
                    <p>
                        Ved at vælge Loopiny bidrager du aktivt til en grønnere fremtid og støtter butikker, der arbejder
                        for at reducere deres klimaaftryk. Sammen kan vi gøre en forskel, én vare ad gangen.
                    </p>
                </div>
            </div>
        </div>
    </section>
</article>

<img src="img/Logoer/bcopr-2.png">
<img src="img/Logoer/Amfori%20logo.png">





<!-- Blogindlæg Sektion -->
<div class="section py-5" style="background-color: #304229">
    <div class="container">
        <!-- Overskrift -->
        <h2 class="text-center mb-5 text-dark">Bliv inspireret af vores blogindlæg</h2>

        <!-- Kort Row -->
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <!-- Kort 1 -->
            <div class="col">
                <div class="card h-100 bg-dark text-white border-2" style="border-color: #46643c">
                    <div class="card-body">
                        <h5 class="card-title">Blogindlæg 1</h5>
                        <p class="card-text">Etiam at nibh viverra, sagittis lacus vel, tempus tortor. Donec eu turpis sed nisi aliquam luctus..</p>
                    </div>
                </div>
            </div>
            <!-- Kort 2 -->
            <div class="col">
                <div class="card h-100 bg-dark text-white border-2" style="border-color: #46643c">
                    <div class="card-body">
                        <h5 class="card-title">Blogindlæg 2</h5>
                        <p class="card-text">Etiam at nibh viverra, sagittis lacus vel, tempus tortor. Donec eu turpis sed nisi aliquam luctus..</p>
                    </div>
                </div>
            </div>
            <!-- Kort 3 -->
            <div class="col">
                <div class="card h-100 bg-dark text-white border-2" style="border-color: #46643c">
                    <div class="card-body">
                        <h5 class="card-title">Blogindlæg 3</h5>
                        <p class="card-text">Etiam at nibh viverra, sagittis lacus vel, tempus tortor. Donec eu turpis sed nisi aliquam luctus..</p>
                    </div>
                </div>
            </div>
            <!-- Kort 4 -->
            <div class="col">
                <div class="card h-100 bg-dark text-white border-2" style="border-color: #46643c">
                    <div class="card-body">
                        <h5 class="card-title">Blogindlæg 4</h5>
                        <p class="card-text">Etiam at nibh viverra, sagittis lacus vel, tempus tortor. Donec eu turpis sed nisi aliquam luctus..</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Knap og pagination -->
        <div class="text-center mt-5">
            <button class="btn btn-outline-light">Flere blogindlæg</button>
            <!-- Pagination dots -->
            <div class="mt-3">
                <span class="rounded-circle bg-secondary d-inline-block" style="width: 10px; height: 10px;"></span>
                <span class="rounded-circle bg-secondary d-inline-block mx-2" style="width: 10px; height: 10px;"></span>
                <span class="rounded-circle bg-secondary d-inline-block" style="width: 10px; height: 10px;"></span>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-white py-5" style="background-color: #46643c">
    <div class="container">
        <div class="row">
            <!-- Support Privat -->
            <div class="col-md-3 mb-3">
                <h5>Support privat</h5>
                <p>Opret Loopiny Privat<br>mail@loopiny.com<br>30 26 46 82</p>
            </div>
            <!-- Support Erhverv -->
            <div class="col-md-3 mb-3">
                <h5>Support erhverv</h5>
                <p>Opret Loopiny Erhverv<br>support@loopiny.com<br>20 46 12 13</p>
            </div>
            <!-- Dine Rettigheder -->
            <div class="col-md-3 mb-3">
                <h5>Dine rettigheder</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Handelsbetingelser</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Privatlivspolitik</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Cookiepolitik</a></li>
                </ul>
            </div>
            <!-- Loopiny Information -->
            <div class="col-md-3 mb-3">
                <h5>Loopiny ApS</h5>
                <p>KristoffersbakKlosterbæk Alle 23<br>4400 Kalundborg<br>CVR: 2534972</p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-4">
            <p class="mb-0">&copy; 2025 Loopiny ApS. All Rights Reserved</p>
        </div>
    </div>
</footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    let navbar = document.querySelector('.navbar');
    let navbarToggler = document.querySelector('.navbar-toggler');

    navbarToggler.addEventListener('click', showNav); // Aktiver funktion når der klikkes på menu toggler
    window.addEventListener('scroll', showNav); // Aktiver funktionen når der scrolles

    function showNav() {
        var y = window.scrollY;
        if (y > 100 || window.innerWidth < 992) { // Når man er scrollet 100+ ned, eller hvis skærmen er lille, gøres der efterfølgende
            navbar.classList.add('bg-primary', 'bg-opacity-85', 'shadow', 'nav-blur');
        } else {
            navbar.classList.remove('bg-primary', 'bg-opacity-85', 'shadow', 'nav-blur');
        }
    }
</script>

</body>
</html>
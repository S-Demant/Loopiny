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
                            <a class="nav-link fw-semibold" href="#tjeneste">Vores tjeneste</a>
                        </li>
                        <li class="nav-item me-3 me-lg-0 mx-lg-4">
                            <a class="nav-link fw-semibold" href="#vision">Vores vision</a>
                        </li>
                        <li class="nav-item me-3 me-lg-0 mx-lg-4">
                            <a class="nav-link fw-semibold" href="#om">Om Loopiny</a>
                        </li>
                        <li class="nav-item me-lg-0 ms-lg-4">
                            <a class="nav-link fw-semibold" href="#blog">Blogindlæg</a>
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
            <div class="position-absolute top-0 end-0 me-2 me-md-0 d-flex gap-2">
                <a href="private/discover.php" class="btn btn-loop btn-outline-light border-2 fw-semibold px-3 py-2">Loopiny Privat</a>
                <a href="myshop/myproducts.php" class="btn btn-loop btn-outline-light border-2 fw-semibold px-3 py-2">Loopiny Erhverv</a>
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
                            <a href="private/discover.php" class="btn btn-loop btn-outline-light border-2 fw-semibold w-100 py-3">Opdag nye produkter</a>
                        </div>
                        <div class="col-12 col-md-6 col-xl-4 mt-3 mt-md-0">
                            <a href="myshop/myproducts.php" class="btn btn-loop btn-outline-light border-2 fw-semibold w-100 py-3">Benyt Loopiny Erhverv</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<article>
    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div id="tjeneste" class="col-12 col-md-6 order-1 order-md-0">
                    <h2 class="fw-semibold">Red produkter. Red planeten</h2>
                    <p>Vidste du, at utallige varer går til spilde, blot fordi de ikke kan sælges i almindelige butikker? Med Loopiny kan du give disse produkter en ny chance og gøre en positiv forskel for miljøet. Ved at redde usælgelige varer til en brøkdel af prisen hjælper du med at reducere spild og støtte en grønnere fremtid.</p>
                    <p class="fw-semibold">Download Loopiny i dag og vær med i bevægelsen, der gør verdenen grønnere – ét køb ad gangen!</p>
                    <a href="private/discover.php" class="btn btn-primary rounded-3 fw-semibold py-2 px-4">Kom i gang</a>
                </div>
                <div class="col-12 col-md-6 mb-3 mb-md-0 order-0 order-md-1">
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
                <div id="vision" class="col-12 col-md-8 col-lg-6 text-center">
                    <h2 class="fw-semibold">Visionen bag</h2>
                    <p>Hos Loopiny drømmer vi om en verden, hvor varer med små fejl eller mangler ikke går til spilde, men i stedet får en ny chance. Vi ønsker at skabe en platform, der forbinder butikker med kunder, som ser værdien i det uperfekte. Vores vision er at gøre det nemt og tilgængeligt for alle at tage et mere ansvarligt valg, når de handler. Hver plet, ridse eller returvare har en historie, og vi hjælper med at sikre, at den ikke slutter for tidligt. Sammen kan vi mindske spild, udnytte ressourcerne bedre og samtidig tilbyde kunder unikke fund til gode priser. Med Loopiny gør vi det muligt at forvandle små fejl til store muligheder.</p>
                </div>
            </div>
        </div>

        <div class="container-fluid green-gradient mt-3">
            <div class="container">
                <div class="row py-5 py-md-0">
                    <div class="col-12 col-md-6 py-md-5 pe-md-5">
                        <h2 class="fw-semibold text-light">Vores tre kerneværdier</h2>
                        <p class="text-light">Hos Loopiny er vores vision at skabe en smartere og mere ansvarlig fremtid, hvor produkter får nyt liv i stedet for at gå til spilde. Vi arbejder ud fra tre kerneværdier – Environment (miljø), Social (social ansvarlighed) og Governance (god virksomhedsdrift) – for at gøre en positiv forskel.</p>
                        <ul class="text-light">
                            <li class="py-2"><span class="fw-semibold">Environment (Miljø)</span><br>Vi giver varer med små fejl eller overskudslager en ny chance, så de ikke ender som affald. Ved at reducere spild og fremme smartere ressourceudnyttelse tager vi ansvar for vores planets fremtid.</li>
                            <li class="py-2"><span class="fw-semibold">Social (Social ansvarlighed)</span><br>Vi tror på værdien af fællesskab og ansvarlige handlinger. Vores platform forbinder butikker og forbrugere, som ønsker at træffe bevidste valg og skabe en positiv forandring sammen.</li>
                            <li class="py-2"><span class="fw-semibold">Governance (Etisk virksomhedsdrift)</span><br>Gennemsigtighed og ansvarlig ledelse er hjørnestenen i Loopiny. Vi arbejder med klare retningslinjer og et etisk fokus for at opbygge tillid og skabe langsigtet værdi for alle interessenter.</li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6 py-md-5 ps-md-5 position-relative">
                        <h2 class="fw-semibold text-light">Mindsk spild</h2>
                        <p class="text-light">Hvert år kasseres store mængder ikke-fødevareprodukter i detailhandlen på grund af små fejl, beskadigelse eller overskud. Eksempelvis smides 677 tons nyt tøj ud årligt i Danmark, ofte fordi returvarer og overproduktion gør det billigere at destruere tøjet end at donere det. I Europa anslås det, at op til 9% af alle tekstiler ødelægges, før de når forbrugeren, og at en tredjedel af returnerede varer købt online ender som affald. Dette kalder på smartere håndtering og mere bevidste valg, hvor produkter får en ny chance fremfor at gå tabt. Loopiny arbejder for at give varer nyt liv – til glæde for miljøet og os alle.</p>
                        <a href="private/discover.php" class="btn btn-outline-light rounded-3 fw-semibold py-2 px-4">Kom med ombord</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row justify-content- mt-5">
                <div class="col-12 col-md-6 pt-0 pe-0 me-0">
                    <div class="text-center text-md-end pe-md-5">
                        <video controls class="bg-light shadow p-3 mt-4 mb-4 mb-md-0">
                            <source src="loopiny-video.mp4" type="video/mp4">
                            Din browser understøtter ikke videoelementet.
                        </video>
                    </div>
                </div>
                <div id="om" class="col-12 col-md-6 ps-md-5">
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
                <div class="col-12 col-md-10 col-xl-6 text-center">
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
                    <img src="img/certificates/amfori.webp" class="img-fluid mt-2" alt="Amfori certifikat">
                    <img src="img/certificates/b-corp.webp" class="img-fluid mt-2" alt="B-Corp certifikat">
                </div>
            </div>
        </div>
    </section>
</article>

<footer>
    <div class="container-fluid footer-bg mt-5">
        <div id="blog" class="container">
            <h2 class="fw-semibold text-center mb-4">Bliv inspireret af vores blogindlæg</h2>
            <div class="row gy-3">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="loop-card d-flex flex-column bg-primary border border-2 border-secondary shadow position-relative w-100">
                        <img src="img/blog/blog1.webp" class="img-fluid w-100">
                        <div class="p-2 mx-1 my-2">
                            <a href="#" class="stretched-link"><h3 class="fw-semibold text-light">Sammen gør vi en forskel for miljøet</h3></a>
                            <p class="text-light">I en verden, hvor overforbrug og affald er blevet en voksende udfordring, kan selv små handlinger have en enorm betydning. Hver dag smides tonsvis af genstande væk, som...</p>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="loop-card d-flex flex-column bg-primary border border-2 border-secondary shadow position-relative w-100">
                        <img src="img/blog/blog2.webp" class="img-fluid w-100">
                        <div class="p-2 mx-1 my-2">
                            <a href="#" class="stretched-link"><h3 class="fw-semibold text-light">Børn og klima: Fremtidens ansvar starter i dag</h3></a>
                            <p class="text-light">Børnene på billedet viser, hvor vigtigt det er at lære den næste generation om at passe på vores planet. Skolen er ikke bare et sted for faglig læring – det er også her, børn udvikler de...</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="loop-card d-flex flex-column bg-primary border border-2 border-secondary shadow position-relative w-100">
                        <img src="img/blog/blog3.webp" class="img-fluid w-100">
                        <div class="p-2 mx-1 my-2">
                            <a href="#" class="stretched-link"><h3 class="fw-semibold text-light">Overforbrug af tøj – Når skabet bugner</h3></a>
                            <p class="text-light">Vidste du, at verdens tekstilproduktion er næsten dobbelt så stor som for bare 20 år siden? Vi producerer mere tøj, end vi nogensinde kan bruge, og store dele af det bliver...</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="loop-card d-flex flex-column bg-primary border border-2 border-secondary shadow position-relative w-100">
                        <img src="img/blog/blog4.webp" class="img-fluid w-100">
                        <div class="p-2 mx-1 my-2">
                            <a href="#" class="stretched-link"><h3 class="fw-semibold text-light">CO2 og vores ansvar for fremtiden</h3></a>
                            <p class="text-light">CO2-aftrykket fra menneskelige aktiviteter vokser år for år og presser vores planet til det yderste. Billedet her symboliserer, hvordan naturen kan hjælpe os med at absorbere CO2...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="btn btn-outline-light rounded-3 mt-4 py-2 px-4">Flere blogindlæg</a>
            </div>
            <div class="text-center py-5">
                <a href="#" class="mx-2" title="Instagram"><object type="image/svg+xml" data="img/icons/instagram.svg" class="icons"></object></a>
                <a href="#" class="mx-2" title="Facebook"><object type="image/svg+xml" data="img/icons/facebook.svg" class="icons"></object></a>
                <a href="#" class="mx-2" title="Linkedin"><object type="image/svg+xml" data="img/icons/linkedin.svg" class="icons"></object></a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-secondary mt-0">
        <div class="container">
            <div class="row py-5">
                <!-- Support Privat -->
                <div class="col-md-3 mb-3">
                    <h3 class="fw-semibold text-light">Support privat</h3>
                    <p class="text-light">Opret Loopiny Privat<br>mail@loopiny.com<br>30 26 46 82</p>
                </div>
                <!-- Support Erhverv -->
                <div class="col-md-3 mb-3">
                    <h3 class="fw-semibold text-light">Support erhverv</h3>
                    <p class="text-light">Opret Loopiny Erhverv<br>support@loopiny.com<br>20 46 12 13</p>
                </div>
                <!-- Dine Rettigheder -->
                <div class="col-md-3 mb-3">
                    <h3 class="fw-semibold text-light">Dine rettigheder</h3>
                    <ul class="list-unstyled text-light">
                        <li><a href="#" class="text-white text-decoration-none">Handelsbetingelser</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Privatlivspolitik</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Cookiepolitik</a></li>
                    </ul>
                </div>
                <!-- Loopiny Information -->
                <div class="col-md-3 mb-3">
                    <h3 class="fw-semibold text-light">Loopiny ApS</h3>
                    <p class="text-light">KristoffersbakKlosterbæk Alle 23<br>4400 Kalundborg<br>CVR: 2534972</p>
                </div>
            </div>
        </div>
        <div class="text-center py-2">
            <p class="text-light opacity-50">&copy; 2025 Loopiny ApS. All Rights Reserved</p>
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
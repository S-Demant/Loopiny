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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #F5F5F0;
            font-family: 'Glory', sans-serif;
            color: white;
        }



        .hero-section {
            text-align: center;
            padding: 6rem 1rem; /* Ekstra højde */
        }

        .hero-section .btn {
            margin: 0.5rem;
            border: 2px solid white;
            color: white;
            padding: 0.5rem 2rem;
            font-size: 1rem;
            font-weight: bold;
        }

        .hero-section p {
            margin: 1rem auto;
            max-width: 600px;
            font-size: 1.1rem;
        }


        .content-section {
            background-color: #f5f5f0;
            color: #242424;
            padding: 4rem 1rem;
        }

        .content-section h2 {
            margin-bottom: 2rem;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .content-box {
            background-color: #242424;
            height: 200px;
            color: white;
        }

        .content-box1 {
            background-color: #242424;
            height: 400px;
            color: white;
        }




        .lightmode-switch {
            color: #F5F5F0;
            bottom: 20px;
            left: 20px;
            z-index: 1000;

        }



        .section h2 {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 2rem;
            text-align: center;
        }



        .navbar .nav-link,
        .navbar .btn,
        .navbar .dropdown-toggle {
            color: white !important; /* Sørg for, at teksten stadig er hvid */
            font-weight: 500; /* Gør teksten lidt tykkere for bedre synlighed */
        }

        .navbar .nav-link:hover,
        .navbar .btn:hover,
        .navbar .dropdown-toggle:hover {
            color: #dcdcdc !important; /* Lysere farve ved hover */
        }








    </style>
</head>
<body>
<div class="container-fluid" style="background-image: url('img/loopiny/hero-texture.webp'); background-color: #304229" >
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <!-- Logo i midten (mobil og desktop) -->
            <a class="navbar-brand mx-auto d-lg-none" href="#">
                <img src="img/loopiny/loopiny%20logo%20uden%20tekst.png" alt="Loopiny Logo" style="height: 50px;">
            </a>

            <!-- Navbar Toggler til mobil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Indholdet af navbaren -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Venstre links -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Vores tjeneste</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Vores vision</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Om Loopiny</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blogindlæg</a></li>
                </ul>

                <!-- Logo i midten til større skærme -->
                <a class="navbar-brand position-absolute d-none d-lg-block start-50 translate-middle-x" href="#">
                    <img src="img/loopiny/loopiny%20logo%20uden%20tekst.png" alt="Loopiny Logo" style="height: 50px;">
                </a>

                <!-- Højre links -->
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-light ms-2">Loopiny Privat</button>
                    <button class="btn btn-outline-light ms-2">Loopiny Erhverv</button>
                    <div class="dropdown ms-3">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown">
                            Dansk
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Dansk</a></li>
                            <li><a class="dropdown-item" href="#">English</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>



    <!-- Hero Section -->
    <div class="container-fluid hero-section" ">
    <img src="img/loopiny/loopiny%20logo%201.png" alt="Loopiny Logo">
    <p>
        <strong>Køb nyt med god samvittighed</strong><br>
        Opdag nye spændende produkter med Loopiny tjenesten<br>
        som normalt ikke er til salg grundet fejl og mangler.<br>
        Begynd at redde produkter til eksklusive Loopiny priser nu!
    </p>
    <div>
        <a href="#" class="btn btn-outline-light">Opdag nye produkter</a>
        <a href="#" class="btn btn-outline-light">Benyt Loopiny Erhverv</a>
    </div>
</div>

<!-- Lightmode Switch -->
<div class="lightmode-switch">
    <button class="btn btn-outline-light">Lightmode</button>
</div>

</div>

<!-- Content Section -->
<div class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2> Red produkter. Red planeten</h2>

                <p>
                    Vidste du, at utallige varer går til spilde, blot fordi de ikke kan sælges i almindelige butikker? Med Loopiny kan du give disse produkter en ny chance og gøre en positiv forskel for miljøet.
                </p>

                <p>
                    Ved at redde usælgelige varer til en brøkdel af prisen hjælper du med at reducere spild og støtte en grønnere fremtid.
                </p>


                <p><strong>                      Download Loopiny i dag og vær med i bevægelsen, der gør verdenen grønnere – ét køb ad gangen!
                    </strong></p>
                <button class="btn btn-success mt-3">Kom i gang</button>
            </div>
            <div class="col-lg-6">
                <div class="content-box1 d-flex align-items-center justify-content-center">
                    <p>Indholdsboks</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box1 d-flex align-items-center justify-content-center" style="height: 600px">
                    <p>Indholdsboks</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sektion: Visionen bag -->


<div class="text-center " style="background-color: #F5F5F0; color: #242424;" >
    <div class="col-6 mx-auto">
        <h2>Visionen bag</h2>
        <p>
            Hos Loopiny drømmer vi om en verden, hvor varer med små fejl eller mangler ikke går til spilde, men i stedet får en ny chance. Vi ønsker at skabe en platform, der forbinder butikker med kunder, som ser værdien i det uperfekte.
            Vores vision er at gøre det nemt og tilgængeligt for alle at tage et mere ansvarligt valg, når de handler. Hver plet, ridse eller returvare har en historie, og vi hjælper med at sikre, at den ikke slutter for tidligt. Sammen kan vi mindske spild, udnytte ressourcerne bedre og samtidig tilbyde kunder unikke fund til gode priser.
            Med Loopiny gør vi det muligt at forvandle små fejl til store muligheder.



        </p>
        <br><br><br><br><br><br><br>

    </div>
</div>

<div class="content-section">
    <div class="row">
        <div class="col-12 position-relative">

            <div class="content-box mx-auto d-flex align-items-center justify-content-center position-absolute"
                 style=" height: 400px; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                <p>Indholdsboks</p>
            </div>
        </div>
    </div>
</div>


<!-- Sektion: Underoverskrifter og tekst -->
<div class="container-fluid px-0">
    <div class="row gx-0 align-items-stretch">
        <!-- Første content-section -->
        <div class="col-lg-6 content-section d-flex flex-column justify-content-center"
             style="background-color: #304229; color: #F5F5F0; padding: 2rem; padding-top: 200px">
            <h3>ESG</h3>
            <p>

                Hos Loopiny er vores vision at skabe en smartere og mere ansvarlig fremtid, hvor produkter får nyt liv i stedet for at gå til spilde. Vi arbejder ud fra tre kerneværdier – Environment (miljø), Social (social ansvarlighed) og Governance (god virksomhedsdrift) – for at gøre en positiv forskel.

            </p>
            <ul>
                <li>Environment (Miljø):
                    Vi giver varer med små fejl eller overskudslager en ny chance, så de ikke ender som affald. Ved at reducere spild og fremme smartere ressourceudnyttelse tager vi ansvar for vores planets fremtid.
                </li>
                <li>Social (Social ansvarlighed):
                    Vi tror på værdien af fællesskab og ansvarlige handlinger. Vores platform forbinder butikker og forbrugere, som ønsker at træffe bevidste valg og skabe en positiv forandring sammen.
                </li>
                <li>Governance (Etisk virksomhedsdrift):
                    Gennemsigtighed og ansvarlig ledelse er hjørnestenen i Loopiny. Vi arbejder med klare retningslinjer og et etisk fokus for at opbygge tillid og skabe langsigtet værdi for alle interessenter.
                </li>


        </div>
        <!-- Anden content-section -->
        <div class="col-lg-6 content-section d-flex flex-column justify-content-center"
             style="background-color: #46643c; color: #F5F5F0; padding: 2rem; padding-top: 200px">
            <h3>Mindsk spild</h3>
            <p>
                Hvert år kasseres store mængder ikke-fødevareprodukter i detailhandlen på grund af små fejl, beskadigelse eller overskud. Eksempelvis smides 677 tons nyt tøj ud årligt i Danmark, ofte fordi returvarer og overproduktion gør det billigere at destruere tøjet end at donere det.
                I Europa anslås det, at op til 9% af alle tekstiler ødelægges, før de når forbrugeren, og at en tredjedel af returnerede varer købt online ender som affald. Dette kalder på smartere håndtering og mere bevidste valg, hvor produkter får en ny chance fremfor at gå tabt. Loopiny arbejder for at give varer nyt liv – til glæde for miljøet og os alle.


            </p>


            <button class="btn btn-outline-light mt-3">Kom med ombord</button>
        </div>
    </div>
</div>



<!-- Sektion: Call-to-action -->
<div class="content-section text-center" style="background-color: #f5f5f0; color: #242424; padding: 2rem;">
    <div class="container ">
        <h2>Sammen reducerer vi spild!</h2>
        <div class="row justify-content-center">
            <div class="col-md-4" >
                <div class="content-box1"></div>
            </div>
            <div class="col-md-4">
                <div class="content-box1" ></div>
            </div>
        </div>
    </div>
</div>

<!-- Sektion: Hvem er Loopiny? -->
<div class="content-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="content-box1"></div>
            </div>
            <div class="col-md-6">
                <h2>Hvem er Loopiny?</h2>
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
            </div>
        </div>
    </div>
</div>

<!-- Sektion: Identitet og certifikater -->
<div class="content-section" style="background-color: #f5f5f0; color: #242424; padding: 3rem 0;">
    <div class="container">
        <div class="row g-4 align-items-center">
            <!-- Venstre små bokse rykket mod højre -->
            <div class="col-md-2 offset-md-1 d-flex justify-content-center">
                <div class="content-box" style="width: 100%; height: 150px; background-color: #242424;"> <img src="img/Logoer/bcopr-2.png" style="width: 100%; height: 100%; object-fit: cover;"></div>
            </div>
            <div class="col-md-2 d-flex justify-content-center">
                <div class="content-box" style="width: 100%; height: 150px; background-color: #242424;"> <img src="img/Logoer/Amfori%20logo.png" style="width: 100%; height: 100%; object-fit: cover;"> </div>
            </div>
            <!-- Højre tekst -->
            <div class="col-md-7">
                <h2>Identitet og certifikater</h2>
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
</div>


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
</body>
</html>
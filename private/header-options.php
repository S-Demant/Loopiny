<?php
/* Følgende kode er for at tjekke url for produkt eller butik */
$url = 'http://' . $_SERVER['REQUEST_URI'];
$pageType = '';
if (str_contains($url, 'type=shops') == true) {
    $pageType = 'shops';
} else if (str_contains($url, 'type=products') == true) {
    $pageType = 'products';
} else {
    $pageType = 'products';
}
?>

<header>
    <nav class="topnav align-content-center bg-light shadow fixed-top">
        <div class="container">

            <div class="d-flex justify-content-between">
                <a href="discover.php" class="my-auto"><img src="../img/loopiny/loopiny-logo-top.webp"></a>

                <div class="d-flex gap-3">
                    <span class="fw-semibold my-auto px-2" data-bs-toggle="offcanvas" data-bs-target="#navbarFilter" aria-controls="Viser navigationen for filtrering" aria-label="Filtrer listen">Filtrér &#9662;</span>
                    <span class="fw-semibold my-auto px-2" data-bs-toggle="offcanvas" data-bs-target="#navbarOrder" aria-controls="Viser navigationen for sortering" aria-label="Sorter listen">Sortér &#9662;</span>
                </div>
            </div>

            <div class="offcanvas offcanvas-end bg-light" tabindex="-1" id="navbarFilter" aria-labelledby="Filtrer listen">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-semibold" id="navbarFilterLabel">Filtrér</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Luk"></button>
                </div>
                <div class="offcanvas-body">

                    <form>
                        <div class="mb-3">
                            <label for="Lokation" class="form-label fw-semibold">Lokation</label>
                            <select class="form-select" aria-label="Lokation">
                                <option selected>Vælg din lokation</option>
                                <option value="4200">4200 Holbæk</option>
                                <option value="4300">4300 Slagelse</option>
                                <option value="4400">4400 Kalundborg</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Afstand" class="form-label fw-semibold">Afstand</label>
                            <select class="form-select" aria-label="Afstand">
                                <option selected>Vælg maks afstand fra lokation</option>
                                <option value="0">Din lokation</option>
                                <option value="3">Inden for 3 km.</option>
                                <option value="5">Inden for 5 km.</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary fw-semibold rounded-3 w-100 mt-2">Gem</button>
                    </form>

                    <div class="my-4">
                        <hr>
                    </div>

                    <form id="categoryForm">
                        <div class="mb-3">
                            <span class="fw-semibold">Kategorier</span>
                            <?php
                            $categories = $db->sql("SELECT * FROM categories ORDER BY categoryId ASC");
                            foreach($categories as $category) {
                            ?>
                            <div class="form-check py-1 mt-1">
                                <input class="form-check-input" type="checkbox" name="cat" value="<?php echo $category->categoryShort ?>" id="check<?php echo $category->categoryName ?>" checked>
                                <label class="form-check-label" for="check<?php echo $category->categoryName ?>"><?php echo $category->categoryName ?></label>
                            </div>
                                <?php
                            }
                            ?>
                            <div class="d-flex gap-3 mt-3">
                                <button type="button" class="btn btn-primary fw-semibold rounded-3 w-100" id="checkAll">Markér alle</button>
                                <button type="button" class="btn btn-primary fw-semibold rounded-3 w-100" id="uncheckAll">Afmarkér alle</button>
                            </div>
                        </div>
                        <button id="saveCategoryBtn" type="submit" class="btn btn-primary fw-semibold rounded-3 w-100 mt-1">Gem</button>
                    </form>
                </div>
            </div>

            <div class="offcanvas offcanvas-end bg-light" tabindex="-1" id="navbarOrder" aria-labelledby="Sortér listen">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-semibold" id="navbarOrderLabel">Sortér</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Luk"></button>
                </div>
                <div class="offcanvas-body">

                    <?php
                    // Sortering af cards for både produkter og butikker
                    if ($pageType == 'products' || $pageType == '') {
                        if (str_contains($url, 'order=new') == true) {
                            $orderString = 'productId DESC';
                        } else if (str_contains($url, 'order=dist') == true) {
                            $orderString = 'productId ASC';
                        } else if (str_contains($url, 'order=low') == true) {
                            $orderString = 'productPrice ASC';
                        } else if (str_contains($url, 'order=high') == true) {
                            $orderString = 'productPrice DESC';
                        } else if (str_contains($url, 'order=a-z') == true) {
                            $orderString = 'productTitle ASC';
                        } else if (str_contains($url, 'order=z-a') == true) {
                            $orderString = 'productTitle DESC';
                        } else {
                            $orderString = 'productId DESC';
                        }
                    } else if ($pageType == 'shops') {
                        if (str_contains($url, 'order=dist') == true) {
                            $orderString = 'shopId DESC';
                        } else if (str_contains($url, 'order=a-z') == true) {
                            $orderString = 'shopName ASC';
                        } else if (str_contains($url, 'order=z-a') == true) {
                            $orderString = 'shopName DESC';
                        } else {
                            $orderString = 'shopId DESC';
                        }
                    }
                    ?>

                    <?php
                    // Gør at det rigtige sortering bliver markeret på knapperne
                    // isset($_GET['order']) er funktioner der tjekker og forsøger at hente værdien af order parameteret. Hvor ? tjekker om det er true eller false, og gør det sidste hvis det er false
                    $order = isset($_GET['order']) ? $_GET['order'] : '';
                    ?>

                    <form id="orderForm">
                        <?php
                        if ($pageType != 'shops') {
                        ?>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="order" id="new" value="new" autocomplete="off" <?php echo ($order == 'new' || $order == '') ? 'checked' : ''; ?>>
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="new">Nyeste</label>
                        </div>
                            <?php
                        }
                        ?>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="order" id="dist" value="dist" autocomplete="off" <?php echo ($order == 'dist') ? 'checked' : ''; ?>>
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="dist">Afstand</label>
                        </div>
                        <?php
                        if ($pageType != 'shops') {
                        ?>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="order" id="low" value="low" autocomplete="off" <?php echo ($order == 'low') ? 'checked' : ''; ?>>
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="low">Laveste pris</label>
                        </div>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="order" id="high" value="high" autocomplete="off" <?php echo ($order == 'high') ? 'checked' : ''; ?>>
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="high">Højeste pris</label>
                        </div>
                            <?php
                        }
                        ?>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="order" id="a-z" value="a-z" autocomplete="off" <?php echo ($order == 'a-z') ? 'checked' : ''; ?>>
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="a-z">Alfabetisk A-Z</label>
                        </div>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="order" id="z-a" value="z-a" autocomplete="off" <?php echo ($order == 'z-a') ? 'checked' : ''; ?>>
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="z-a">Alfabetisk Z-A</label>
                        </div>
                        <button id="saveBtn" class="btn btn-primary fw-semibold rounded-3 w-100 mt-2">Gem</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
    // Markér og afmarkér alle felter i filtrering
    const checkAllBtn = document.querySelector('#checkAll');
    const uncheckAllBtn = document.querySelector('#uncheckAll');
    const categoryForm = document.querySelector('#categoryForm');

    checkAllBtn.addEventListener('click', () => {
        const checkboxes = categoryForm.querySelectorAll('input[type="checkbox"]'); // Vælger alle checkboxes og giver dem const checkboxes
        checkboxes.forEach(checkbox => { // For hver checkbox der er, skal den ændre det til markeret
            checkbox.checked = true;
        });
    });

    uncheckAllBtn.addEventListener('click', () => {
        const checkboxes = categoryForm.querySelectorAll('input[type="checkbox"]'); // Vælger alle checkboxes og giver dem const checkboxes
        checkboxes.forEach(checkbox => { // For hver checkbox der er, skal den ændre det til afmarkeret
            checkbox.checked = false;
        });
    });
</script>

<script>
    document.querySelector('#saveCategoryBtn').addEventListener('click', (event) => {
        event.preventDefault(); // Forhindre standard form submit

        const form = document.querySelector('#categoryForm');
        const checkedCategories = form.querySelectorAll('input[name="cat"]:checked');
        let selectedValues = [];

        checkedCategories.forEach((checkbox) => {
            selectedValues.push(checkbox.value.toLowerCase());
        });

    // Sammenføj værdierne med et semikolon og tilføj til URL uden at kode dem
        const queryString = selectedValues.join('-');
        const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?cat=' + queryString;
        window.location.href = newUrl;
    });
</script>

<script>
    // Sætter sortering til med knap
    document.querySelector('#saveBtn').addEventListener('click', (event) => {
        event.preventDefault(); // Forhindre standard form submit

        const form = document.querySelector('#orderForm');
        const selectedOrder = form.querySelector('input[name="order"]:checked').value;
        const url = new URL(window.location);

        url.searchParams.set('order', selectedOrder);
        window.location.href = url;
    });
</script>

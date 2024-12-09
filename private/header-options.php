<header>
    <nav class="topnav align-content-center bg-light shadow fixed-top">
        <div class="container">

            <div class="d-flex justify-content-between">
                <a href="discover.php" class="my-auto"><img src="../img/loopiny/loopiny-logo-top.webp"></a>

                <div class="d-flex gap-3">
                    <a href="#" class="my-auto px-2" data-bs-toggle="offcanvas" data-bs-target="#navbarFilter" aria-controls="Viser navigationen for filtrering" aria-label="Filtrer listen">Filtrér &#9662;</a>
                    <a href="#" class="my-auto px-2" data-bs-toggle="offcanvas" data-bs-target="#navbarSort" aria-controls="Viser navigationen for sortering" aria-label="Sorter listen">Sortér &#9662;</a>
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
                                <input class="form-check-input" type="checkbox" value="" id="check<?php echo $category->categoryName ?>" checked>
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
                        <button type="submit" class="btn btn-primary fw-semibold rounded-3 w-100 mt-1">Gem</button>
                    </form>
                </div>
            </div>

            <div class="offcanvas offcanvas-end bg-light" tabindex="-1" id="navbarSort" aria-labelledby="Sorter listen">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-semibold" id="navbarSortLabel">Sortér</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Luk"></button>
                </div>
                <div class="offcanvas-body">
                    <form>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="sort" id="new" autocomplete="off" checked>
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="new">Nyeste</label>
                        </div>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="sort" id="distance" autocomplete="off">
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="distance">Afstand</label>
                        </div>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="sort" id="low" autocomplete="off">
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="low">Laveste pris</label>
                        </div>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="sort" id="high" autocomplete="off">
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="high">Højeste pris</label>
                        </div>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="sort" id="a-z" autocomplete="off">
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="a-z">Alfabetisk A-Z</label>
                        </div>
                        <div class="my-2">
                            <input type="radio" class="btn-check" name="sort" id="z-a" autocomplete="off">
                            <label class="btn btn-outline-secondary border-2 rounded-3 w-100" for="z-a">Alfabetisk Z-A</label>
                        </div>
                        <button type="submit" class="btn btn-primary fw-semibold rounded-3 w-100 mt-2">Gem</button>
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
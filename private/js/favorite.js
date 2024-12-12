// Funktion hvor man ændrer mellem favorit og ikke favorit butik
document.addEventListener('DOMContentLoaded', function() {
    const favoriteIcons = document.querySelectorAll('.favorite-icon');
    favoriteIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            const shopId = this.getAttribute('data-id');
            changeFavorite(shopId);
        });
    });

    function changeFavorite(shopId) {
        const favorite = document.querySelector(`.favorite-icon[data-id="${shopId}"][src$="favorite.svg"]`);
        const favoriteOn = document.querySelector(`.favorite-icon[data-id="${shopId}"][src$="favorite-on.svg"]`);

        if (favorite.style.display === "none") {
            favorite.style.display = "block";
            favoriteOn.style.display = "none";
        } else {
            favorite.style.display = "none";
            favoriteOn.style.display = "block";
        }

        fetch('http://localhost/loopiny/private/update-favorite.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'shopId=' + shopId
        })
            .then(response => response.text())
            .then(data => {
                if (data !== 'success') {
                    // Hvis der opstår en fejl, skift ikonernes visning tilbage
                    if (favorite.style.display === "none") {
                        favorite.style.display = "block";
                        favoriteOn.style.display = "none";
                    } else {
                        favorite.style.display = "none";
                        favoriteOn.style.display = "block";
                    }
                    alert('Fejlede med at opdatere favorit: ' + data);
                }
            })
            .catch(error => {
                console.error('Fejl:', error);
                alert('En ukendt fejl opstod. Prøv igen senere.');
            });
    }
});
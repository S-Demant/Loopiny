<?php
require "../classes/classDB.php";
require "../settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productPickedUp"]) && isset($_POST["productId"])) {
    $sql = "UPDATE products SET productPickedUp = :productPickedUp WHERE productId = :productId";
    $bind = [
        ":productPickedUp" => $_POST["productPickedUp"],
        ":productId" => $_POST["productId"]
    ];

    $db->sql($sql, $bind, false);
    echo "Produktet er nu markeret som afhentet, og er fjernet fra produktsiden. Tak for at du reducerer spild sammen med os!";
} else {
    echo "Noget gik galt, prøv igen senere.";
}
?>

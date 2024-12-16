<?php
require "../classes/classDB.php";
require "../settings/init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productId"])) {
    $productId = $_POST["productId"];

    $sql = "DELETE FROM products WHERE productId = :productId";
    $bind = [
        ":productId" => $productId
    ];

    $result = $db->sql($sql, $bind, false);
    if ($result) {
        echo "Produktet er slettet.";
    } else {
        echo "Noget gik galt ved sletning af produktet.";
    }
} else {
    echo "Ingen produktId modtaget.";
}
?>

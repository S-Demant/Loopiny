<?php
require "../classes/classDB.php";
require "../settings/init.php";

if (!empty($_POST["productId"])) {
    $productId = $_POST["productId"];
    $sql = "UPDATE products SET productReserved = '1' WHERE productId = :productId";
    $db->sql($sql, [":productId" => $productId]);
    echo "Success"; // Returner en succesbesked
} else {
    echo "Error"; // Returner en fejlbesked
}
?>

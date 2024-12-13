<?php
require "../classes/classDB.php";
require "../settings/init.php";

// Hent POST-data
$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data["productId"])) {
    $productId = $data["productId"];
    $sql = "UPDATE products SET productPickedUp = '1' WHERE productId = :productId";
    $db->sql($sql, [":productId" => $productId]);
    echo "Success"; // Returner en succesbesked
} else {
    echo "Error"; // Returner en fejlbesked
}
?>

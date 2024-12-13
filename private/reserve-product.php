// reserve-product.php
<?php
require 'db_connection.php'; // Forbind til din database

if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    // Opdater produktet til reserveret
    $stmt = $db->prepare("UPDATE products SET productReserved = 1 WHERE productId = :productId");
    $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header("Location: your_page.php?productId=$productId&reserved=true");
        exit();
    } else {
        echo "Error updating record";
    }
}
?>

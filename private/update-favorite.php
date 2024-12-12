<?php
if (isset($_POST['shopId'])) {
    $shopId = $_POST['shopId'];

    // Forbind til databasen
    $db = new mysqli('localhost', 'root', 'root', 'loopiny');
    if ($db->connect_error) {
        die('Connection failed: ' . $db->connect_error);
    }

    // Tjek den aktuelle værdi af shopFavorite
    $sql = "SELECT shopFavorite FROM shops WHERE shopId = ?";
    $stmt = $db->prepare($sql);
    if ($stmt === false) {
        die('Prepare failed: ' . $db->error);
    }
    $stmt->bind_param('i', $shopId);
    $stmt->execute();
    $stmt->bind_result($currentFavorite);
    $stmt->fetch();
    $stmt->close();

    // Toggle værdien af shopFavorite
    $newFavorite = ($currentFavorite == 1) ? 0 : 1;

    // Opdater shopFavorite i databasen
    $sql = "UPDATE shops SET shopFavorite = ? WHERE shopId = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ii', $newFavorite, $shopId);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    // Luk forbindelse
    $stmt->close();
    $db->close();
}
?>

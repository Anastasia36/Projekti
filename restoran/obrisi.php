<?php
require 'spoj.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM proizvodi WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: Store.php");
    } else {
        echo "Greška prilikom brisanja proizvoda: " . $conn->error;
    }

    $stmt->close();
}
?>
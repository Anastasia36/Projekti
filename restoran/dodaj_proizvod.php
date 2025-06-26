<?php
session_start();

if (!isset($_SESSION['prijavljen']) || $_SESSION['uloga'] !== 'admin') {
    header("Location: Store.php");
    exit;
}

require 'spoj.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proizvod = $_POST['proizvod'];
    $opis = $_POST['opis'];
    $cijena = $_POST['cijena'];
    $slika = $_POST['slika'];

    $stmt = $conn->prepare("INSERT INTO proizvodi (proizvod, opis, cijena, slika) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $proizvod, $opis, $cijena, $slika);

    if ($stmt->execute()) {
        echo "<p>Proizvod je uspješno dodan!</p>";
    } else {
        echo "<p>Greška prilikom dodavanja proizvoda: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dodaj proizvod</title>
</head>
<body>
    <h1>Dobrodošao, <?php echo htmlspecialchars($_SESSION['ime'] . ' ' . $_SESSION['prezime']); ?>!</h1>
    <form method="post">
        <label for="proizvod">Proizvod:</label>
        <input type="text" id="proizvod" name="proizvod" required><br><br>

        <label for="opis">Opis:</label>
        <input type="text" id="opis" name="opis" required><br><br>

        <label for="kolicina">Slika:</label>
        <input type="text" id="slika" name="slika" required><br><br>

        <label for="cijena">Cijena:</label>
        <input type="text" id="cijena" name="cijena" required><br><br>

        <button type="submit">Dodaj proizvod</button>
    </form>
    <br>
    <a href="Store.php">Pogledaj proizvode</a> | 
    <a href="odjava.php">Odjava</a>
</body>
</html>

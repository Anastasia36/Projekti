<?php
session_start();

if (!isset($_SESSION['prijavljen']) || $_SESSION['uloga'] != 'admin') {
    header("Location: prijava.php");
    exit;
}

require 'spoj.php'; // Povezivanje na bazu podataka.

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Dohvat podataka o proizvodu iz baze.
    $stmt = $conn->prepare("SELECT * FROM proizvodi WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 0) {
        echo "Proizvod nije pronađen!";
        exit;
    }
    
    $proizvod = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "ID proizvoda nije naveden.";
    exit;
}

// Ažuriranje podataka nakon submit-a forme.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proizvod_naziv = $_POST['proizvod'];
    $opis = $_POST['opis'];
    $cijena = $_POST['cijena'];
    $slika = $_POST['slika'];



    // Ažuriranje podataka u bazi.
    $stmt = $conn->prepare("UPDATE proizvodi SET proizvod = ?, opis = ?, cijena = ?, slika = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $proizvod_naziv, $opis, $cijena, $slika, $id);

    if ($stmt->execute()) {
        header("Location: Store.php"); // Preusmjeravanje na listu proizvoda.
    } else {
        echo "Greška prilikom ažuriranja proizvoda: " . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uredi Proizvod</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Uredi Proizvod</h2>
        <form action="izmjena.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="proizvod">Naziv Proizvoda</label>
                <input type="text" class="form-control" id="proizvod" name="proizvod" value="<?php echo htmlspecialchars($proizvod['proizvod']); ?>" required>
            </div>
            <div class="form-group">
                <label for="opis">Opis</label>
                <textarea class="form-control" id="opis" name="opis" rows="4" required><?php echo htmlspecialchars($proizvod['opis']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="cijena">Cijena</label>
                <input type="text" class="form-control" id="cijena" name="cijena" value="<?php echo htmlspecialchars($proizvod['cijena']); ?>" required>
            </div>
            <div class="form-group">
                <label for="slika">Slika</label>
                <input type="text" class="form-control" id="slika" name="slika" value="<?php echo htmlspecialchars($proizvod['slika']); ?>">
                <small>Trenutna slika: <?php echo htmlspecialchars($proizvod['slika']); ?></small>
            </div>
            <button type="submit" class="btn btn-primary">Spremi Promjene</button>
            <a href="Store.php" class="btn btn-secondary">Povratak</a>
        </form>
    </div>
</body>
</html>
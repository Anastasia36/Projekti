<!DOCTYPE html>
<html lang="hr">
<head>
    <title>Prijava</title>
    <link href="admin.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="login-container">
        <h2 class="text-center">Prijava</h2>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Korisničko ime</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Lozinka</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-custom w-100">Prijava</button>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Zaboravili ste <a href="#">lozinku?</a></span>
              </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<?php
session_start();
include 'spoj.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];

    $sql = "SELECT * FROM korisnici WHERE korisnicko_ime = '$korisnicko_ime' AND lozinka = '$lozinka'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['prijavljen'] = true;
        $_SESSION['username'] = $row['korisnicko_ime'];
        $_SESSION['ime'] = $row['ime'];
        $_SESSION['prezime'] = $row['prezime'];
        $_SESSION['uloga'] = $row['uloga'];

        if ($_SESSION['uloga'] == 'admin') {
            header('Location: dodaj_proizvod.php');
        } else {
            header('Location: ispis.php');
        }
        exit();
    } else {
        echo "<p>Pogrešno korisničko ime ili lozinka.</p>";
    }
}
?>
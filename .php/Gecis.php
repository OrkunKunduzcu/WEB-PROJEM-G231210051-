<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hoş Geldiniz</title>
    <script>
        setTimeout(function() {
            window.location.href = "Hakkimda.html";
        }, 3000);
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hakkımda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Özgeçmiş</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Memleketim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">İlgi Alanlarim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mirasımız</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">İletişim</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    Hoş Geldiniz G231210051, Otomatik olarak yönlendiriliyorsunuz.
    </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    $correct_email = "G231210051@sakarya.edu.tr";
    $correct_password = "G231210051";

    if ($email === $correct_email && $password === $correct_password) {
        header("Location: Hakkimda.html");
        exit;
    } else {
        echo "<script>alert('Girdiğiniz bilgiler yanlış. Lütfen tekrar deneyin.'); window.location.href='giris.html';</script>";
    }
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

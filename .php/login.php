<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css"> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Giriş Kontrol - Orkun Kunduzcu</title>
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
                        <a class="nav-link" href="#">İlgi Alanlarım</a>
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
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card text-center">
                <div class="card-header">Giriş Durumu</div>
                <div class="card-body">
                    <?php

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
                        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

                        $correct_email = "G231210051@sakarya.edu.tr";
                        $correct_password = "G231210051";

                        if (empty($email) || empty($password)) {
                            echo '<p class="alert alert-warning">E-posta ve şifre alanları boş bırakılamaz.</p>';
                            echo '<p><a href="index.html" class="btn btn-primary">Giriş Sayfasına Dön</a></p>';
                        }
                        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo '<p class="alert alert-warning">Geçersiz e-posta formatı.</p>';
                            echo '<p><a href="index.html" class="btn btn-primary">Giriş Sayfasına Dön</a></p>';
                        }
                        */
                        else if ($email === $correct_email && $password === $correct_password) {
                            header("Location: Gecis.PHP");
                            exit;
                        } else {
                            echo '<p class="alert alert-danger">E-posta veya şifre yanlış. Lütfen tekrar deneyin.</p>';
                            echo '<p><a href="index.html" class="btn btn-primary">Giriş Sayfasına Dön</a></p>';
                        }
                    } else {
                        echo '<p class="alert alert-info">Lütfen giriş formunu kullanınız.</p>';
                        echo '<p><a href="index.html" class="btn btn-secondary">Giriş Sayfasına Git</a></p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
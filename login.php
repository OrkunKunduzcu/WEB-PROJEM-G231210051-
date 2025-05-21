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
        <a class="navbar-brand" href="https://www.sakarya.edu.tr" target="_blank">
            <img src="css/logo-sakarya-universitesi.png" alt="LOGO" title="Sakarya Üniversitesi Logosudur" style="height: 40px;">
        </a>
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
                    // session_start(); // Eğer oturum yönetimi kullanacaksanız bu satırı aktif edin.
                                    // Proje isterlerinde session'dan bahsedilmiyor, bu yüzden şimdilik kapalı olabilir.

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
                        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

                        // ----- SENİN GİRİŞ BİLGİLERİN -----
                        $correct_email = "G231210051@sakarya.edu.tr"; // E-posta formatında öğrenci numaran
                        $correct_password = "G231210051";          // Sadece öğrenci numaran
                        // ------------------------------------

                        // Boş alan kontrolü (PHP tarafında da yapmak iyi bir pratiktir)
                        if (empty($email) || empty($password)) {
                            echo '<p class="alert alert-warning">E-posta ve şifre alanları boş bırakılamaz.</p>';
                            echo '<p><a href="index.html" class="btn btn-primary">Giriş Sayfasına Dön</a></p>';
                        }
                        // E-posta format kontrolü (PHP tarafında da yapılabilir)
                        // Proje isterlerinde bu kontrolün JavaScript ile yapılması isteniyor login sayfasında.
                        // O yüzden burada çok detaylı bir regex'e gerek yok, temel bir filter_var yeterli olabilir veya JS'e güvenilebilir.
                        /*
                        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo '<p class="alert alert-warning">Geçersiz e-posta formatı.</p>';
                            echo '<p><a href="index.html" class="btn btn-primary">Giriş Sayfasına Dön</a></p>';
                        }
                        */
                        else if ($email === $correct_email && $password === $correct_password) {
                            // Başarılı giriş durumunda Gecis.PHP'ye yönlendir.
                            // Eğer session kullanacaksanız, burada session değişkenlerini ayarlayabilirsiniz.
                            // $_SESSION['user_email'] = $email;
                            // $_SESSION['loggedin'] = true;
                            header("Location: Gecis.PHP");
                            exit; // Yönlendirmeden sonra kodun devam etmemesi için exit() önemlidir.
                        } else {
                            // Başarısız giriş
                            echo '<p class="alert alert-danger">E-posta veya şifre yanlış. Lütfen tekrar deneyin.</p>';
                            echo '<p><a href="index.html" class="btn btn-primary">Giriş Sayfasına Dön</a></p>';
                            // Otomatik yönlendirme için JavaScript (isteğe bağlı)
                            // echo '<script>setTimeout(function(){ window.location.href = "index.html"; }, 3000);</script>';
                        }
                    } else {
                        // POST metodu ile gelinmediyse (yani doğrudan login.php'ye erişilmeye çalışıldıysa)
                        // ana giriş sayfasına yönlendir.
                        echo '<p class="alert alert-info">Lütfen giriş formunu kullanınız.</p>';
                        echo '<p><a href="index.html" class="btn btn-secondary">Giriş Sayfasına Git</a></p>';
                        // header("Location: index.html");
                        // exit;
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
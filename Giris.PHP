<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css"> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Giriş Sayfası - Proje</title>
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
        <div class="col-lg-6">
            <div class="card text-center">
                <div class="card-header">
                    GİRİŞ YAP
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateGirisForm()">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta (ÖğrenciNumaranız@sakarya.edu.tr)</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="G231210051@sakarya.edu.tr" required autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Şifre (Öğrenci Numaranız)</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="G231210051" required autocomplete="off">
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" class="btn btn-primary" name="submit" value="Giriş Yap">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="errorModal" class="modal" tabindex="-1" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Giriş Hatası!</h5>
                    <button type="button" class="btn-close" onclick="closeErrorModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>E-posta veya şifre yanlış. Lütfen tekrar deneyin.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeErrorModal()">Kapat</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateGirisForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!email || !password) {
                alert("E-posta ve şifre alanları doldurulmalıdır.");
                return false;
            }
            if (!emailPattern.test(email)) {
                alert("Geçerli bir e-mail adresi giriniz. Örneğin: kullanici@sakarya.edu.tr");
                return false;
            }
            return true;
        }

        function showErrorModal() {
            var modal = document.getElementById('errorModal');
            modal.style.display = 'block';
            modal.classList.add('show');
        }

        function closeErrorModal() {
            var modal = document.getElementById('errorModal');
            modal.style.display = 'none';
            modal.classList.remove('show');
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        // Kendi öğrenci numaran ve şifren
        $correct_email = "G231210051@sakarya.edu.tr";
        $correct_password = "G231210051";

        if (!empty($email) && !empty($password)) {
            if ($email === $correct_email && $password === $correct_password) {
                // Giriş başarılı, Gecis.PHP'ye yönlendir
                header("Location: Gecis.PHP");
                exit();
            } else {
                // Giriş başarısız, JavaScript ile modalı göster
                echo "<script>showErrorModal();</script>";
            }
        } else {
            // Alanlar boşsa JavaScript ile uyarı ver (validateGirisForm zaten yapıyor ama ek kontrol)
             echo "<script>alert('E-posta ve şifre alanları doldurulmalıdır.');</script>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

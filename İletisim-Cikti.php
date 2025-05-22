<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim Formu Sonuçları - Orkun Kunduzcu</title>
    <link rel="stylesheet" href="css/style.css"> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a class="nav-link" href="Hakkimda.HTML">Hakkımda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Oz-Gecmis.HTML">Özgeçmiş</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Memleketim.HTML">Memleketim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ilgi-alanlarim.HTML">İlgi Alanlarım</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Mirasimiz.HTML">Mirasımız</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="İletisim-Sayfasi.HTML">İletişim</a> </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2>Gönderilen İletişim Bilgileri</h2>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<div class='alert alert-success'>Form başarıyla gönderildi. İşte gönderdiğiniz bilgiler:</div>";
            echo "<ul class='list-group'>";

            if (isset($_POST['adSoyad']) && !empty($_POST['adSoyad'])) {
                echo "<li class='list-group-item'><strong>Ad Soyad:</strong> " . htmlspecialchars($_POST['adSoyad']) . "</li>";
            } else {
                echo "<li class='list-group-item'><strong>Ad Soyad:</strong> Belirtilmedi</li>";
            }

            if (isset($_POST['email']) && !empty($_POST['email'])) {
                echo "<li class='list-group-item'><strong>E-posta:</strong> " . htmlspecialchars($_POST['email']) . "</li>";
            } else {
                echo "<li class='list-group-item'><strong>E-posta:</strong> Belirtilmedi</li>";
            }

            if (isset($_POST['telefon']) && !empty($_POST['telefon'])) {
                echo "<li class='list-group-item'><strong>Telefon:</strong> " . htmlspecialchars($_POST['telefon']) . "</li>";
            } else {
                echo "<li class='list-group-item'><strong>Telefon:</strong> Belirtilmedi (Opsiyonel)</li>";
            }

            if (isset($_POST['cinsiyet']) && !empty($_POST['cinsiyet'])) {
                echo "<li class='list-group-item'><strong>Cinsiyet:</strong> " . htmlspecialchars($_POST['cinsiyet']) . "</li>";
            } else {
                echo "<li class='list-group-item'><strong>Cinsiyet:</strong> Belirtilmedi</li>";
            }

            if (isset($_POST['konu']) && !empty($_POST['konu'])) {
                echo "<li class='list-group-item'><strong>Konu:</strong> " . htmlspecialchars($_POST['konu']) . "</li>";
            } else {
                echo "<li class='list-group-item'><strong>Konu:</strong> Seçilmedi</li>";
            }

            if (isset($_POST['mesaj']) && !empty($_POST['mesaj'])) {
                echo "<li class='list-group-item'><strong>Mesaj:</strong><br>" . nl2br(htmlspecialchars($_POST['mesaj'])) . "</li>"; // nl2br ile satır başlarını <br> yapar
            } else {
                echo "<li class='list-group-item'><strong>Mesaj:</strong> Boş bırakıldı</li>";
            }
            
            if (isset($_POST['yas']) && !empty($_POST['yas'])) {
                echo "<li class='list-group-item'><strong>Yaş:</strong> " . htmlspecialchars($_POST['yas']) . "</li>";
            } else {
                echo "<li class='list-group-item'><strong>Yaş:</strong> Belirtilmedi (Opsiyonel)</li>";
            }

            if (isset($_POST['website']) && !empty($_POST['website'])) {
                echo "<li class='list-group-item'><strong>Web Sitesi:</strong> " . htmlspecialchars($_POST['website']) . "</li>";
            } else {
                echo "<li class='list-group-item'><strong>Web Sitesi:</strong> Belirtilmedi (Opsiyonel)</li>";
            }

            if (isset($_POST['dogumTarihi']) && !empty($_POST['dogumTarihi'])) {
                echo "<li class='list-group-item'><strong>Doğum Tarihi:</strong> " . htmlspecialchars($_POST['dogumTarihi']) . "</li>";
            } else {
                echo "<li class='list-group-item'><strong>Doğum Tarihi:</strong> Belirtilmedi (Opsiyonel)</li>";
            }

            // Şartlar Kabul
            if (isset($_POST['sartlarKabul']) && $_POST['sartlarKabul'] == 'on') { // Checkbox 'on' değeriyle gelir
                echo "<li class='list-group-item'><strong>Kullanım Şartları:</strong> Kabul Edildi</li>";
            } else {
                echo "<li class='list-group-item'><strong>Kullanım Şartları:</strong> Kabul Edilmedi</li>";
            }

            if (isset($_FILES['ekDosya']) && $_FILES['ekDosya']['error'] == UPLOAD_ERR_OK) {
                echo "<li class='list-group-item'><strong>Ek Dosya Adı:</strong> " . htmlspecialchars($_FILES['ekDosya']['name']) . "</li>";
                echo "<li class='list-group-item'><strong>Ek Dosya Boyutu:</strong> " . ($_FILES['ekDosya']['size'] / 1024) . " KB</li>";
            } elseif (isset($_FILES['ekDosya']) && $_FILES['ekDosya']['error'] != UPLOAD_ERR_NO_FILE) {
                echo "<li class='list-group-item'><strong>Ek Dosya:</strong> Yüklenirken bir hata oluştu. Hata kodu: " . $_FILES['ekDosya']['error'] . "</li>";
            } else {
                echo "<li class='list-group-item'><strong>Ek Dosya:</strong> Yüklenmedi (Opsiyonel)</li>";
            }


            echo "</ul>";
        } else {
            echo "<div class='alert alert-warning'>Bu sayfaya doğrudan erişim desteklenmemektedir. Lütfen iletişim formunu kullanınız.</div>";
            echo "<p><a href='İletisim-Sayfasi.HTML' class='btn btn-primary'>İletişim Formuna Geri Dön</a></p>";
        }
        ?>
        <div class="mt-4">
            <a href="İletisim-Sayfasi.HTML" class="btn btn-secondary">&laquo; İletişim Formuna Geri Dön</a>
        </div>
    </div>

    <footer class="text-center bg-dark text-white p-3 mt-5">
        <p class="mb-0">&copy; 2024 Orkun Kunduzcu. Tüm Hakları Saklıdır.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="tr">

<!-- eksiklikler -->
<!-- kullanıcı fotografı -->


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> <?php
          echo $_SESSION["user"]; ?></title>
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="images/favicon.png" />
  <!--
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#no-limit .select2').select2({
        multiple: "multiple",
      });

      $('#limit-2 .select2').select2({
        multiple: "multiple",
        maximumSelectionLength: 2,
      });

      $('#limit-2-custom-message .select2').select2({
        multiple: "multiple",
        maximumSelectionLength: 2,
        language: {
          maximumSelected: (args) => args.maximum + ' Sadece birini seçebilirsin'
        }
      });
    });
  </script>

  -->
</head>

<body>
  <div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->


    <!-- partial -->
    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->

        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src="images/e.png" alt="">
            <p class="name"><?php echo $_SESSION["ad"] . " " . $_SESSION["soyad"]; ?></p>
            <p class="designation">
              <?php echo $_SESSION['user']; ?>
            </p>
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item">
              <!--active-->
              <a class="nav-link" href="panel.php">
                <img src="images/icons/1.png" alt="">
                <span class="menu-title">Ana Ekran</span>
              </a>
            </li>

            <li class="nav-item">
              <!--active-->
              <a class="nav-link" href="etkinlik_ekle.php">
                <img src="images/icons/1.png" alt="">
                <span class="menu-title">Etkinlik İşlemleri</span>
              </a>
            </li>


          
                <li class="nav-item">
              <a class="nav-link" href="duyuruislemleri.php">
                <img src="images/icons/9.png" alt="">
                <span class="menu-title">Duyuru İşlemleri</span>
              </a>
            </li>



            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sample-pages1" aria-expanded="false" aria-controls="sample-pages">
                <img src="images/icons/9.png" alt="">
                <span class="menu-title">Kullanıcı İşlemleri<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="sample-pages1">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="kullanici_ekle.php">
                      Kullanıcı Ekle
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="kullanici_sil.php">
                      Kullanıcı Sil
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="kullanici_yetkisi.php">
                      Kullanıcı Yetkisi
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="kullanici_listele.php">
                      Kullanıcı Listele
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="kullanici_guncelle.php">
                      Kullanıcı Güncelle
                    </a>
                  </li>
                </ul>
              </div>
            </li>



            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sample-pages2" aria-expanded="false" aria-controls="sample-pages">
                <img src="images/icons/9.png" alt="">
                <span class="menu-title">Personel İşlemleri<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="sample-pages2">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="personel_ekle.php">
                      Personel Ekle
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="personel_sil.php">
                      Personel Sil
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="personel_listele.php">
                      Personel Listele
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="personel_guncelle.php">
                      Personel Güncelle
                    </a>
                  </li>
                </ul>
              </div>
            </li>



            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#sample-pages3" aria-expanded="false" aria-controls="sample-pages">
                <img src="images/icons/9.png" alt="">
                <span class="menu-title">Kategori İşlemleri<i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="sample-pages3">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="kategori_ekle.php">
                      Kategori Ekle
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="kategori_sil.php">
                      Kategori Sil
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="kategori_listele.php">
                      Kategori Listele
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="kategori_guncelle.php">
                      Kategori Güncelle
                    </a>
                  </li>
                </ul>
              </div>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="mesaj.php">
                <img src="images/icons/005-forms.png" alt="">
                <span class="menu-title">Mesaj Kutusu</span>
              </a>
            </li>



            <li class="nav-item">
              <a class="nav-link" href="../login/cikis.php">
                <img src="images/icons/logout.png" alt="">
                <span class="menu-title">Çıkış Yap</span>
              </a>
            </li>
          </ul>
        </nav>
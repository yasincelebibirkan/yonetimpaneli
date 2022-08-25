<?php
session_start();
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
  header("location:../login/panelgiris.php");
}
?>



<?php

include "../login/baglanti.php";

if (isset($_POST['submit'])) {

  $baslik = htmlentities($_POST['baslik'], ENT_QUOTES, 'UTF-8'); //htmlentities ise değişkendeki html etiketlerini bir htmlentities tablosundaki değerlerle değiştirip değişkeni güvenli hale getirir.
  $tarih = htmlentities($_POST['datetime'], ENT_QUOTES, 'UTF-8');
  $resim = htmlentities($_POST['resim'], ENT_QUOTES, 'UTF-8');
  /*$aciklama = $_POST["aciklama"];*/
  $aciklama = htmlentities($_POST['aciklama'], ENT_QUOTES, 'UTF-8');
  /*$gorevli_personel = $_POST["gorevli_personel"];*/
  $gorevli_personel = htmlentities($_POST['gorevli_personel'], ENT_QUOTES, 'UTF-8');
  /*$kategori = $_POST["kategori"];*/
  $kategori = htmlentities($_POST['kategori'], ENT_QUOTES, 'UTF-8');
  $etkinlik_id = htmlentities($_POST['id'], ENT_QUOTES, 'UTF-8');


  if (isset($baslik) && isset($aciklama) && isset($gorevli_personel) &&  isset($kategori) &&  isset($tarih)) {
    $ekle = "UPDATE etkinlikler SET tarih=('$datetime'), kategori_id=('$kategori'), baslik=( '$baslik'), aciklama=('$aciklama'),gorevli_personel_id=('$gorevli_personel'), gorsel=('$resim') WHERE id='$etkinlik_id'";


    $sonuc = mysqli_query($conn, $ekle);

    if ($sonuc) {
      echo "<script>alert('etkinlik eklendi')</script>";
    } else {

      echo "<script>alert('veri tabanına eklenirken hata oluştu')</script>";
    }
  } else {
    echo "<script>alert('boş alanları doldurun')</script>";
  }
}
?>


<?php include "navbar_sol.php"; ?>

<div class="content-wrapper">
  <h3 class="page-heading mb-4">Etkinlik İşlemleri</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-4">Etkinlik Güncelle</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="etkinlik_guncelle.php" method="POST">

                    <div class="form-group">
                      <label for="etkinlikbasligi">Etkinlik Başlığı</label>
                      <input type="text" class="form-control p-input" name="baslik" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Etkinlik Başlığı giriniz">
                    </div>

                    <div class="form-group">
                      <label for="etkinlikfile">Görsel Yükle</label>
                      <input type="file" class="form-control p-input" id="etkinlikfile" name="resim">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea">Etkinlik Açıklama</label>
                      <textarea class="form-control p-input" id="exampleTextarea" rows="10" name="aciklama" placeholder="Etkinlik açıklması giriniz..."></textarea>
                    </div>


                    <div class="form-group">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                        <div class="card card-statistics">

                          <label for="etkinlikbasligi">Görevli Personel Seçin</label>
                          <div class="form-check">
                            <select name="gorevli_personel" id="format" class="form-control">
                              <!-- <option selected disabled>Personeli Seçin</option> -->

                              <?php
                              include "../login/baglanti.php";
                              $cek = "SELECT * FROM personeller";
                              $sorgu = mysqli_query($conn, $cek);
                              mysqli_close($conn);

                              foreach ($sorgu as $row) {
                                echo "<option value='" . $row['id'] . "'>" . $row['ad'] . " " . $row['soyad'] . "</option>";
                              }
                              ?>

                            </select>
                          </div>


                          <label for="etkinlikbasligi">Kategori Seçin</label>
                          <div class="form-check">
                            <select name="kategori" id="format">
                              <!-- <option selected>Kategori Seçiniz</option> -->

                              <?php
                              include "../login/baglanti.php";

                              $cek2 = "SELECT * FROM kategoriler";
                              $sorgu2 = mysqli_query($conn, $cek2);
                              mysqli_close($conn);

                              foreach ($sorgu2 as $row2) {
                                echo "<option value='" . $row2['id'] . "'>" . $row2['kategori_adi'] . "</option>";
                              }

                              ?>

                            </select>
                          </div>

                          <label for="etkinlikbasligi">Tarih Seçin</label>
                          <div class="form-check">

                            <input type="datetime-local" name="datetime" min="2022-01-01">

                          </div>

                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <button type="submit" name="etkinlikekle" class="btn btn-primary">Ekle</button>
                    </div>


                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>
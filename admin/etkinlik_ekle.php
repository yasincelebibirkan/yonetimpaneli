<?php
session_start();
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
  header("location:../login/panelgiris.php");
}
?>


<?php

include "../login/baglanti.php";

if (isset($_POST['etkinlikekle'])) {

  $baslik = htmlentities($_POST['baslik'], ENT_QUOTES, 'UTF-8'); //htmlentities ise değişkendeki html etiketlerini bir htmlentities tablosundaki değerlerle değiştirip değişkeni güvenli hale getirir.
  $tarih = htmlentities($_POST['datetime'], ENT_QUOTES, 'UTF-8');
  $resim = htmlentities($_POST['resim'], ENT_QUOTES, 'UTF-8');
  /*$aciklama = $_POST["aciklama"];*/
  //$aciklama = htmlentities($_POST['aciklama'], ENT_QUOTES, 'UTF-8');
  $aciklama = $_POST['aciklama'];
  /*$gorevli_personel = $_POST["gorevli_personel"];*/
  $gorevli_personel = htmlentities($_POST['gorevli_personel'], ENT_QUOTES, 'UTF-8');
  /*$kategori = $_POST["kategori"];*/
  $kategori = htmlentities($_POST['kategori'], ENT_QUOTES, 'UTF-8');



  if (!empty($baslik) && !empty($aciklama) && !empty($gorevli_personel) &&  !empty($kategori) &&  !empty($tarih)) {
    $ekle = "INSERT INTO `onay_bekleyen_etkinlik` (`id`, `tarih`, `kategori_id`, `baslik`, `aciklama`, `gorevli_personel_id`, `gorsel`) VALUES (NULL, '" . $tarih . "', '" . $kategori . "', '" . $baslik . "', '" . $aciklama . "', '" . $gorevli_personel . "', 'url')";
    //$ekle = "INSERT INTO `onay_bekleyen_etkinlik`(`id`, `tarih`, `kategori_id`, `baslik`, `aciklama`, `gorevli_personel_id`, `gorsel`) VALUES (NULL,$tarih,$kategori,$baslik,$aciklama,$gorevli_personel,'url')";

    $sonuc = mysqli_query($conn, $ekle);

    if ($sonuc) {
      echo "<script>alert('etkinlik eklendi  onaya gönderildi')</script>";
    } else {

      echo "<script>alert('veri tabanına eklenirken hata oluştu')</script>";
    }
  } else {
    echo "<script>alert('boş alanları doldurun')</script>";
  }
}


if (isset($_POST['etkinlikguncelle'])) {

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
    $ekle = "UPDATE etkinlikler SET tarih=('$tarih'), kategori_id=('$kategori'), baslik=( '$baslik'), aciklama=('$aciklama'),gorevli_personel_id=('$gorevli_personel'), gorsel=('$resim') WHERE id='$etkinlik_id'";


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


if (isset($_POST['etkinliksil'])) {


  $etkinlik_sil_id = htmlentities($_POST['etkinlik_sil_id'], ENT_QUOTES, 'UTF-8'); //post içinde input name göre yazılacak


  if (!isset($etkinlik_sil_id)) {

    echo "<script>alert('boş alanları doldurun')</script>";
  } else {

    // $sil = "DELETE FROM `kategoriler` WHERE id='".$kategori_id."'";

    $sil = "DELETE FROM etkinlikler WHERE id='$etkinlik_sil_id'";

    $sonuc = mysqli_query($conn, $sil);

    if ($sonuc) {
      echo "<script>alert('etkinlik silindi')</script>";
    } else {

      echo "<script>alert('veri tabanından silinirken hata oluştu')</script>";
    }
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
                <h5 class="card-title mb-4">Etkinlik Ekle</h5>

                <div class="table-responsive">
                  <form class="forms-sample" action="etkinlik_ekle.php" method="POST">

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
                      <textarea class="form-control p-input" id="exampleTextarea" rows="10" name="aciklama" placeholder="Etkinlik açıklaması giriniz..."></textarea>
                    </div>

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

                    <div class="form-group">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                        <div class="card card-statistics">

                          <label for="etkinlikbasligi">Görevli Personel Seçin</label>
                          <div class="form-check">
                            <div id="no-limit">
                              <select name="gorevli_personel" id="format" class="form-control select2">
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



  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-4">Etkinlik Güncelle</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="etkinlik_ekle.php" method="POST">

                    <div class="form-group">
                      <!--
                      <label for="etkinlikbasligi">Etkinlik ID</label>
                      <input type="text" class="form-control p-input" name="id" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Etkinlik Id Giriniz">
                       -->
                      <label for="etkinlikbasligi">Güncellenecek Etkinliği Seçin</label>

                      <select name="id" id="format">
                        <!-- <option selected>Kategori Seçiniz</option> -->

                        <?php
                        include "../login/baglanti.php";

                        if (isset($_GET['pid'])) {
                          //$duzenle=$_POST['duzenle'];
                          $duzenle = $_GET['pid'];

                          $cek3 = "SELECT etkinlikler.id,etkinlikler.baslik,etkinlikler.aciklama FROM etkinlikler where etkinlikler.id=$duzenle";
                          $sorgu3 = mysqli_query($conn, $cek3);
                          mysqli_close($conn);

                          foreach ($sorgu3 as $row3) {
                            echo "<option value='" . $row3['id'] . "'>" . $row3['baslik'] . "  >>  " . $row3['aciklama'] . "</option>";
                          }

                          $cek4 = "SELECT * from etkinlikler LEFT JOIN kategoriler ON kategoriler.id=etkinlikler.kategori_id INNER JOIN personeller ON personeller.id=etkinlikler.gorevli_personel_id ORDER BY etkinlikler.id DESC";
                          $sorgu4 = mysqli_query($conn, $cek4);
                          mysqli_close($conn);
                          foreach ($sorgu4 as $row4) {
                            $baslik = $row4['baslik'];
                            $aciklama = $row4['aciklama'];
                            $gorevli_personel = $row4['ad'] . " " . $row4['soyad'];
                            $kategori = $row4['kategori_adi'];
                            $tarih = $row4['tarih'];
                          }
                        } else {
                          $cek3 = "SELECT etkinlikler.id,etkinlikler.baslik,etkinlikler.aciklama FROM etkinlikler";
                          $sorgu3 = mysqli_query($conn, $cek3);
                          mysqli_close($conn);

                          foreach ($sorgu3 as $row3) {
                            echo "<option value='" . $row3['id'] . "'>" . $row3['baslik'] . "  >>  " . $row3['aciklama'] . "</option>";
                          }
                        }


                        ?>

                      </select>
                    </div>


                    <div class="form-group">
                      <label for="etkinlikbasligi">Etkinlik Başlığı</label>
                      <input type="text" class="form-control p-input" name="baslik" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Etkinlik Başlığı giriniz" value="<?= $baslik ?>">
                    </div>

                    <div class="form-group">
                      <label for="etkinlikfile">Görsel Yükle</label>
                      <input type="file" class="form-control p-input" id="etkinlikfile" name="resim">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea">Etkinlik Açıklama</label>
                      <textarea class="form-control p-input" id="exampleTextarea" rows="10" name="aciklama" placeholder="Etkinlik açıklması giriniz..." value="<?= $aciklama ?>"></textarea>
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
                      <button type="submit" name="etkinlikekle" class="btn btn-primary">Güncelle</button>
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



  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-4">Etkinlik Sil</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="etkinlik_ekle.php" method="POST">

                    <select name="etkinlik_sil_id" id="format">
                      <!-- <option selected>Kategori Seçiniz</option> -->

                      <?php
                      include "../login/baglanti.php";

                      //$cek4 = "SELECT * from etkinlikler WHERE etkinlikler.tarih > CURRENT_TIMESTAMP ORDER BY etkinlikler.id DESC";
                      $cek4 = "SELECT * from etkinlikler  ORDER BY etkinlikler.id DESC";
                      $sorgu4 = mysqli_query($conn, $cek4);
                      mysqli_close($conn);

                      foreach ($sorgu4 as $row4) {
                        echo "<option value='" . $row4['id'] . "'>" . $row4['baslik'] . "_____"  . ">>" . "_____" . $row4['aciklama'] . "</option>";
                      }

                      ?>

                    </select>


                    <div class="form-group">
                      <button type="submit" name="etkinliksil" class="btn btn-primary">Sil</button>
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




</div>

<?php include "footer.php"; ?>
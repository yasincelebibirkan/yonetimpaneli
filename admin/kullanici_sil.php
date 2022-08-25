<?php
session_start();
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
  header("location:../login/panelgiris.php");
}
?>


<?php

include "../login/baglanti.php";

if (isset($_POST['submit'])) {

  $kullanici_id = htmlentities($_POST['etkinlik_sil_id'], ENT_QUOTES, 'UTF-8');



  if (!isset($kullanici_id)) {

    echo "<script>alert('boş alanları doldurun')</script>";
  } else {

    // $sil = "DELETE FROM `kategoriler` WHERE id='".$kategori_id."'";

    $sil = "DELETE FROM kullanicilar WHERE tc='$kullanici_id'";

    $sonuc = mysqli_query($conn, $sil);

    if ($sonuc) {
      echo "<script>alert('personel silindi')</script>";
    } else {

      echo "<script>alert('veri tabanından silinirken hata oluştu')</script>";
    }
  }
}
?>


<?php include "navbar_sol.php"; ?>



<div class="content-wrapper">
  <h3 class="page-heading mb-4">Kullanıcı İşlemleri</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">


              <!-- SİLME KISMI -->

              <div class="card-body">
                <h5 class="card-title mb-4">Kullanıcı Sil</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="kullanici_sil.php" method="POST">


                    <select name="etkinlik_sil_id" id="format">
                      <!-- <option selected>Kategori Seçiniz</option> -->

                      <?php
                      include "../login/baglanti.php";

                      //$cek4 = "SELECT * from etkinlikler WHERE etkinlikler.tarih > CURRENT_TIMESTAMP ORDER BY etkinlikler.id DESC";
                      $cek4 = "SELECT * FROM kullanicilar";
                      $sorgu4 = mysqli_query($conn, $cek4);
                      mysqli_close($conn);

                      foreach ($sorgu4 as $row4) {
                        echo "<option value='" . $row4['tc'] . "'>" . $row4['ad'] . " " .  $row4['soyad'] . "</option>";
                      }

                      ?>

                    </select>

                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Sil</button>
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
<?php
session_start();
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
  header("location:../login/panelgiris.php");
}
?>

<?php
include "navbar_sol.php";
define('permissions', ['ana ekran', 'etkinlik işlemleri', 'duyuru işlemleri', 'kullanıcı işlemleri', 'personel işlemleri', 'kategori işlemleri', 'mesaj kutusu']);


if (isset($_POST['yetki'])) {
  include "../login/baglanti.php";
  $secilenkullanici_id = $_POST['id'];
  $permissions = $_POST['izinler'];
  $json = json_encode($permissions);
  echo "<script>alert($json)</script>";

  $ekle = "UPDATE `kullanicilar` SET `permission`=$json WHERE kullanicilar.tc=$secilenkullanici_id";
  if (mysqli_query($conn, $ekle)) {
    echo "<script>alert('veri eklendi')</script>";
  } else {
    //echo "<script>alert('yetki eklendi')</script>";
    echo "<script>alert('veri eklenemedi')</script>";
  }

  /*
   foreach($permissions as $h)
   {
      
      echo "<script>alert($h)</script> <br>";

   }*/
  /*
   $permissions2=implode($permissions);

   $ekle = "UPDATE `kullanicilar` SET `permission`=$permissions2 WHERE kullanicilar.tc=$secilenkullanici_id";
*/
} else {
  echo "<script>alert('yasaklı giriş')</script>";
}





?>

<div class="content-wrapper">
  <h3 class="page-heading mb-4">Kullanıcı İşlemleri</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-4">Kullanıcı Yetkisi</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="kullanici_yetkisi.php" method="POST">

                    <label for="etkinlikbasligi">Güncellenecek Kullanıcıyı seçin</label>

                    <select name="id" id="format">
                      <!-- <option selected>Kategori Seçiniz</option> -->

                      <?php
                      include "../login/baglanti.php";
                      $cek3 = "SELECT * FROM kullanicilar";
                      $sorgu3 = mysqli_query($conn, $cek3);
                      mysqli_close($conn);

                      foreach ($sorgu3 as $row3) {
                        echo "<option value='" . $row3['tc'] . "'>" . $row3['tc']  . " " . $row3['ad'] . "  " . $row3['soyad'] . "</option>";
                      }
                      ?>

                    </select>
                     <!---->
                    <div class="form-group">
                      <label>İzinler</label>
                      <br>
                      <?php foreach (permissions as $key => $value) {
                      ?>

                        <input type="checkbox" name="izinler[]" value="<?= $key; ?>"><?= $value; ?> <br>

                      <?php
                      }
                      ?>


                    </div>
                    



                    <div class="form-group">
                      <button type="submit" name="yetki" class="btn btn-primary">Ekle</button>
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
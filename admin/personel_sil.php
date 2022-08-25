<?php
session_start();
if($_SESSION["ad"]=="" || $_SESSION["soyad"]=="")
{
  header("location:../login/panelgiris.php");
}
?>

<?php

include "../login/baglanti.php";

if (isset($_POST['submit'])){

$personel_id = $_POST["personel_id"]; //post içinde input name göre yazılacak


if (!isset($personel_id)) {

  echo "<script>alert('boş alanları doldurun')</script>";
} else {

   // $sil = "DELETE FROM `kategoriler` WHERE id='".$kategori_id."'";

      $sil = "DELETE FROM personeller WHERE id='$personel_id'";

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
  <h3 class="page-heading mb-4">Personel İşlemleri</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">


            <!-- SİLME KISMI -->

              <div class="card-body">
                <h5 class="card-title mb-4">Personel Sil</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="" method="POST">

                    <div class="form-group">
                      <label for="etkinlikbasligi">Personel id Giriniz</label>
                      <input type="text" class="form-control p-input" name="personel_id" id="etkinlikbasligi" aria-describedby="emailHelp"placeholder="Personel ID">
                    </div>

                    <br>

                    <div class="form-group">
                      <button type="submit" name="submit"  class="btn btn-primary">Sil</button>
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



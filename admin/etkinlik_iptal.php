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
                <h5 class="card-title mb-4">Etkinlik Sil</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="etkinlik_iptal.php" method="POST">

                    <div class="form-group">
                      <label for="etkinlikbasligi">Etkinlik id Giriniz</label>
                      <input type="text" class="form-control p-input" name="etkinlik_sil_id" id="etkinlikbasligi" aria-describedby="emailHelp">
                    </div>


                    <div class="form-group">
                      <button type="submit" name="submit"class="btn btn-primary">Sil</button>
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



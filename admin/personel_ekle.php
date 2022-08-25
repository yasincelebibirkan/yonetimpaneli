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

$personel_isim_ekle = htmlentities($_POST['ad'], ENT_QUOTES, 'UTF-8'); //post içinde input name göre yazılacak
$personel_soyad_ekle = htmlentities($_POST['soyad'], ENT_QUOTES, 'UTF-8'); //post içinde input name göre yazılacak


if (!isset($personel_isim_ekle)) {

  echo "<script>alert('boş alanları doldurun')</script>";
} else {

      $ekle = "INSERT INTO personeller(ad,soyad) VALUES ('$personel_isim_ekle','$personel_soyad_ekle')";
      // $ekle = "INSERT INTO `personeller`(`ad`) VALUES ('".$personel_isim_ekle."')";

      $sonuc = mysqli_query($conn, $ekle);
 


  if ($sonuc) {
    echo "<script>alert('personel eklendi')</script>";
  } else {
    
    echo "<script>alert('veri tabanına eklenirken hata oluştu')</script>";
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
              <div class="card-body">
                <h5 class="card-title mb-4">Personel Ekle</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="" method="POST">

                    <div class="form-group">
                      <label for="etkinlikbasligi">Ad</label>
                      <input type="text" class="form-control p-input" name="ad" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Ad">
                    </div>

                    <div class="form-group">
                      <label for="etkinlikfile">Soyad</label>
                      <input type="text" class="form-control p-input" id="etkinlikfile" name="soyad" placeholder="Soyad">
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit "class="btn btn-primary">Ekle</button>
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


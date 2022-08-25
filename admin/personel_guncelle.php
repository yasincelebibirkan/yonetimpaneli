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

$personel_isim_guncelle = $_POST["ad"]; //post içinde input name göre yazılacak
$personel_soyad_guncelle = $_POST["soyad"]; 
$personel_durum_guncelle = $_POST["durum"]; 
$personel_id = $_POST["id"]; 


if (!isset($personel_isim_guncelle)) {

  echo "<script>alert('boş alanları doldurun')</script>";
} else {

      $guncelle = "UPDATE personeller SET ad=('$personel_isim_guncelle'), soyad=('$personel_soyad_guncelle'), personel_durum=('$personel_durum_guncelle') WHERE id='$personel_id'";


      $sonuc = mysqli_query($conn, $guncelle);
 


  if ($sonuc) {
    echo "<script>alert('personel güncellendi')</script>";
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
                <h5 class="card-title mb-4">Personel Güncelle</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="" method="POST">

                  <div class="form-group">
                      <label for="etkinlikbasligi">Personel ID</label>
                      <input type="text" class="form-control p-input" name="id" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Personel Id Giriniz">
                    </div>

                    <div class="form-group">
                      <label for="etkinlikbasligi">Ad</label>
                      <input type="text" class="form-control p-input" name="ad" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Personel Ad Giriniz">
                    </div>

                    <div class="form-group">
                      <label for="etkinlikfile">Soyad</label>
                      <input type="text" class="form-control p-input" id="etkinlikfile" name="soyad" placeholder="Personel Soyad Giriniz">
                    </div>


                    <div class="form-group">
                    <label for="etkinlikfile">Durum</label>
                    <fieldset>
                        <input type="radio" id="html" name="durum" value="1"checked>
                        <label for="html">Çalışıyor</label><br>
                        <input type="radio" id="css" name="durum" value="0">
                        <label for="css">İzinli</label><br>
                        <input type="radio" id="css" name="durum" value="0">
                        <label for="css">Ayrıldı</label><br>
                     </fieldset>
                     
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Güncelle</button>
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






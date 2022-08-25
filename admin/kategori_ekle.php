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

$kategori_ekle = htmlentities($_POST['kategori'], ENT_QUOTES, 'UTF-8');

if (!isset($kategori_ekle)) {

  echo "<script>alert('boş alanları doldurun')</script>";
} else {


      $ekle = "INSERT INTO `kategoriler` (`kategori_adi`) VALUES ('".$kategori_ekle."')";

      $sonuc = mysqli_query($conn, $ekle);

  if ($sonuc) {
    echo "<script>alert('kullanıcı eklendi')</script>";
  } else {
    
    echo "<script>alert('veri tabanına eklenirken hata oluştu')</script>";
  }
}
}

?>


<?php include "navbar_sol.php"; ?>

<div class="content-wrapper">
  <h3 class="page-heading mb-4">Kategori İşlemleri</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-4">Kategori Ekle</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="kategori_ekle.php" method="POST">

                    <div class="form-group">
                      <label for="etkinlikbasligi">Kategori Giriniz</label>
                      <input type="text" class="form-control p-input" name="kategori" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Kategori giriniz">
                    </div>


                    <div class="form-group"> <button type="submit" name="submit" class="btn btn-primary">Kategori ekle</button> 

                     
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





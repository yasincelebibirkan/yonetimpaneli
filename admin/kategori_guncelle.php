<?php
session_start();
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
    header("location:../login/panelgiris.php");
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
                                <h5 class="card-title mb-4">Kategori Güncelle</h5>
                                <div class="table-responsive">

                                    <form class="forms-sample" action="" method="POST">

                                        <div class="form-group">
                                            <label for="etkinlikbasligi">Kategori ID</label>
                                            <input type="text" class="form-control p-input" name="id" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Kategori Id Giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label for="etkinlikbasligi">Kategori Ad</label>
                                            <input type="text" class="form-control p-input" name="ad" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Kategori Ad Giriniz">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Güncelle</button>
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

<?php

include "../login/baglanti.php";

if (isset($_POST['submit'])){

$kategori_id = $_POST["id"]; 
$kategori_ad_guncelle = $_POST["ad"]; //post içinde input name göre yazılacak
 


if (!isset($kategori_ad_guncelle)) {

  echo "<script>alert('boş alanları doldurun')</script>";
} else {

      $guncelle = "UPDATE kategoriler SET kategor_adi=('$kategori_ad_guncelle') WHERE id='$kategori_id'";


      $sonuc = mysqli_query($conn, $guncelle);
 


  if ($sonuc) {
    echo "<script>alert('kategori güncellendi')</script>";
  } else {
    
    echo "<script>alert('veri tabanına eklenirken hata oluştu')</script>";
  }
}
}


?>
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

$baslik = $_POST["baslik"];
$tarih = $_POST["datetime"];
$resim = $_POST["resim"];
$aciklama = $_POST["aciklama"];


if (isset($baslik) && isset($aciklama) &&  isset($tarih) &&  isset($resim))
{
  $ekle = "INSERT INTO `duyurular` (`id`, `baslik`, `tarih`, `aciklama`,'fotograf') VALUES (NULL, '".$baslik."', '".$tarih."', '".$aciklama."', '".$resimh."')";
      

  $sonuc = mysqli_query($conn, $ekle);

  if ($sonuc) {
    echo "<script>alert('duyuru eklendi')</script>";
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
  <h3 class="page-heading mb-4">Duyuru İşlemleri</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-4">Duyuru Ekle</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="duyuru_ekle.php" method="POST">

                    <div class="form-group">
                      <label for="etkinlikbasligi">Duyuru Başlığı</label>
                      <input type="text" class="form-control p-input" name="baslik" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Duyuru Başlığı giriniz">
                    </div>

                    <div class="form-group">
                      <label for="etkinlikfile">Görsel Yükle</label>
                      <input type="file" class="form-control p-input" id="etkinlikfile" name="resim">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea">Duyuru Açıklaması</label>
                      <textarea class="form-control p-input" id="exampleTextarea" rows="10" name="aciklama" placeholder="Duyuru açıklaması giriniz"></textarea>
                    </div>


                    <div class="form-group">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                        <div class="card card-statistics">
                          </div>
                            </div>

                          <label for="etkinlikbasligi">Tarih Seçin</label>
                          <div class="form-check">

                            <input type="datetime-local" name="datetime" min="2022-01-01">

                          </div>

                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Ekle</button>
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


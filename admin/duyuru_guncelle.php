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

  $baslik = htmlentities($_POST['baslik'], ENT_QUOTES, 'UTF-8'); //htmlentities ise değişkendeki html etiketlerini bir htmlentities tablosundaki değerlerle değiştirip değişkeni güvenli hale getirir.
  $tarih = htmlentities($_POST['datetime'], ENT_QUOTES, 'UTF-8');
  $resim = htmlentities($_POST['resim'], ENT_QUOTES, 'UTF-8');
  /*$aciklama = $_POST["aciklama"];*/
  $aciklama = htmlentities($_POST['aciklama'], ENT_QUOTES, 'UTF-8');
  $duyuru_id = htmlentities($_POST['id'], ENT_QUOTES, 'UTF-8');

if (isset($baslik) && isset($aciklama) && isset($resim) &&  isset($duyuru_id) &&  isset($tarih))
{
  $ekle = "UPDATE duyurular SET id=('$duyuru_id'), baslik=('$baslik'),tarih=('$tarih'),  aciklama=('$aciklama'), fotograf=('$resim') WHERE id='$duyuru_id'";
      

  $sonuc = mysqli_query($conn, $ekle);

  if ($sonuc) {
    echo "<script>alert('duyuru güncellendi')</script>";
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
                <h5 class="card-title mb-4">Duyuru Güncelle</h5>

                <div class="table-responsive">

                  <form class="forms-sample" action="duyuru_guncelle.php" method="POST">

                  <div class="form-group">
                      <label for="duyurubasligi">Duyuru ID</label>
                      <input type="text" class="form-control p-input" name="id" id="duyurubasligi" aria-describedby="emailHelp" placeholder="Duyuru Id Giriniz">
                    </div>


                    <div class="form-group">
                      <label for="duyurubasligi">Duyuru Başlığı</label>
                      <input type="text" class="form-control p-input" name="baslik" id="duyurubasligi" aria-describedby="emailHelp" placeholder="Duyuru Başlığı giriniz">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea">Duyuru Açıklama</label>
                      <textarea class="form-control p-input" id="exampleTextarea" rows="10" name="aciklama" placeholder="Duyuru açıklaması giriniz..."></textarea>
                    </div>

                    <div class="form-group">
                      <label for="duyurufile">Görsel Yükle</label>
                      <input type="file" class="form-control p-input" id="duyurufile" name="resim">
                    </div>

                
                        <label for="duyurubasligi">Tarih Seçin</label>
                          <div class="form-check">
                            <input type="datetime-local" name="datetime" min="2022-01-01">
                          </div>

                        </div>
                      </div>
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
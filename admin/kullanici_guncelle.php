<?php
session_start();
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
    header("location:../login/panelgiris.php");
}
?>

<?php include "navbar_sol.php"; ?>


<div class="content-wrapper">
    <h3 class="page-heading mb-4">Kullanıcı</h3>
    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Kullanıcı Güncelle</h5>
                                <div class="table-responsive">

                                    <form class="forms-sample" action="kullanici_guncelle.php"  enctype="multipart/form-data" method="POST">
                                        <!--
                                        <div class="form-group">
                                            <label for="etkinlikbasligi">Kullanıcı ID</label>
                                            <input type="text" class="form-control p-input" name="id" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Kullanıcı Id Giriniz">
                                        </div>
                                        -->

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

                                        <div class="form-group">
                                            <label for="etkinlikbasligi">Ad</label>
                                            <input type="text" class="form-control p-input" name="ad" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Kullanıcı Ad Giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label for="etkinlikfile">Soyad</label>
                                            <input type="text" class="form-control p-input" id="etkinlikfile" name="soyad" placeholder="Kullanıcı Soyad Giriniz">
                                        </div>
                                        <div class="form-group">
                                            <label for="etkinlikfile">Fotoğraf</label>
                                            <input type="file" class="form-control p-input" id="etkinlikfile" name="fotograf" placeholder="Fotoğraf Yükleyiniz">
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

session_start();
include "../login/baglanti.php";
if ($_POST) {
    $kullanici_ad_guncelle = $_POST["ad"]; //post içinde input name göre yazılacak
    $kullanici_soyad_guncelle = $_POST["soyad"];
    $kullanici_id = $_POST["id"];
    echo "<script>alert('girdi')</script>";

    if ($kullanici_id <> "" && $kullanici_ad_guncelle <> "" && $kullanici_soyad_guncelle <> "" && isset($_FILES['fotograf'])) {
        echo "<script>alert('girdi2')</script>";

        if ($_FILES['fotograf']['error'] != 0) {
            echo 'Dosya yüklenirken hata gerçekleşti lütfen daha sonra tekrar deneyiniz.';
        } else {


            $dosya_adi = strtolower($_FILES['fotograf']['name']);
            if (file_exists('../images/' . $dosya_adi)) {
                echo "$dosya_adi diye bir dosya var";
                echo "<script>alert('diye bir dosya var')</script>";
            } else {
                $boyut = $_FILES['fotograf']['size'];
                if ($boyut > (1024 * 1024 * 30)) {
                    echo "<script>alert('Dosya boyutu 30MB den büyük olamaz.')</script>";
                } else {
                    $dosya_tipi = $_FILES['fotograf']['type'];
                    $dosya_uzanti = explode('.', $dosya_adi);
                    $dosya_uzanti = $dosya_uzanti[count($dosya_uzanti) - 1];

                    if (!in_array($dosya_tipi, ['image/png', 'image/jpeg']) || !in_array($dosya_uzanti, ['png', 'jpg'])) {
                        //if (($dosya_tipi != 'image/png' || $dosya_uzanti != 'png' )&&( $dosya_tipi != 'image/jpeg' || $dosya_uzanti != 'jpg')) {
                        echo "<script>alert('Hata, dosya türü JPEG veya PNG olmalı.')</script>";
                    } else {
                        $foto = $_FILES['fotograf']['tmp_name'];
                        copy($foto, '../images/' . $dosya_adi);

                        echo "<script>alert('Dosyanız upload edildi!')</script>";

                        if ($conn->query("UPDATE `kullanicilar` SET kullanicilar.ad ='$kullanici_ad_guncelle', kullanicilar.soyad='$kullanici_soyad_guncelle', kullanicilar.fotograf='$dosya_adi' WHERE kullanicilar.tc='$kullanici_id'")) // Veri ekleme sorgumuzu yazıyoruz.
                        {
                           
                            // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
                            echo "<script>alert('Veri Eklendi')</script>";
                        } else {
                            echo "<script>alert('Hata oluştu')</script>";
                        }
                    }
                }
            }
        }
    }
}



?>
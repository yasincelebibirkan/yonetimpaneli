<?php
session_start();
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
    header("location:../login/panelgiris.php");
}
?>


<?php

include "../login/baglanti.php";

if (isset($_POST['duyuruekle'])) {

    $baslik = htmlentities($_POST['baslik'], ENT_QUOTES, 'UTF-8');
    $tarih = htmlentities($_POST['datetime'], ENT_QUOTES, 'UTF-8');
    $aciklama = htmlentities($_POST['aciklama'], ENT_QUOTES, 'UTF-8');




    if (isset($baslik) && isset($tarih) && isset($aciklama)) {
        $ekle = "INSERT INTO `duyurular` (`duyuru_id`, `baslik`, `tarih`, `aciklama`) VALUES (NULL, '" . $baslik . "', '" . $tarih . "', '" . $aciklama . "')";


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


if (isset($_POST['duyuruguncelle'])) {

    $baslik = htmlentities($_POST['baslik'], ENT_QUOTES, 'UTF-8');
    $tarih = htmlentities($_POST['datetime'], ENT_QUOTES, 'UTF-8');
    $aciklama = htmlentities($_POST['aciklama'], ENT_QUOTES, 'UTF-8');


    if (isset($baslik) && isset($tarih) && isset($aciklama)) {
        $ekle = "UPDATE duyurular SET baslik=('$baslik'), tarih=( '$tarih'), aciklama=('$aciklama') WHERE id='$duyuru_id'";


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


if (isset($_POST['duyurusil'])) {


    $duyuru_sil_id = htmlentities($_POST['duyuru_sil_id'], ENT_QUOTES, 'UTF-8');


    if (!isset($duyuru_sil_id)) {

        echo "<script>alert('boş alanları doldurun')</script>";
    } else {


        $sil = "DELETE FROM duyurular WHERE id='$duyuru_sil_id'";

        $sonuc = mysqli_query($conn, $sil);

        if ($sonuc) {
            echo "<script>alert('duyuru silindi')</script>";
        } else {

            echo "<script>alert('veri tabanından silinirken hata oluştu')</script>";
        }
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

                                    <form class="forms-sample" action="duyuruislemleri.php" method="POST">

                                        <div class="form-group">
                                            <label for="etkinlikbasligi">Duyuru Başlığı</label>
                                            <input type="text" class="form-control p-input" name="baslik" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Duyuru Başlığı giriniz">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleTextarea">Duyuru Açıklama</label>
                                            <textarea class="form-control p-input" id="exampleTextarea" rows="10" name="aciklama" placeholder="Duyuru açıklaması giriniz..."></textarea>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                                                <div class="card card-statistics">


                                                    <label for="etkinlikbasligi">Tarih Seçin</label>
                                                    <div class="form-check">

                                                        <input type="datetime-local" name="datetime" min="2022-01-01">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" name="duyuruekle" class="btn btn-primary">Ekle</button>
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

    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Duyuru Güncelle</h5>

                                <div class="table-responsive">

                                    <form class="forms-sample" action="duyuruislemleri.php" method="POST">

                                        <div class="form-group">

                                            <label for="etkinlikbasligi">Güncellenecek Duyuruyu Seçin</label>

                                            <select name="id" id="format">

                                                <?php
                                                include "../login/baglanti.php";

                                                $cek3 = "SELECT duyurular.duyuru_id,duyurular.baslik,duyurular.aciklama FROM duyurular";
                                                $sorgu3 = mysqli_query($conn, $cek3);
                                                mysqli_close($conn);

                                                foreach ($sorgu3 as $row3) {
                                                    echo "<option value='" . $row3['duyuru_id'] . "'>" . $row3['baslik'] . "  >>  " . $row3['aciklama'] . "</option>";
                                                }

                                                ?>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="etkinlikbasligi">Duyuru Başlığı</label>
                                            <input type="text" class="form-control p-input" name="baslik" id="etkinlikbasligi" aria-describedby="emailHelp" placeholder="Duyuru Başlığı giriniz">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleTextarea">Duyuru Açıklama</label>
                                            <textarea class="form-control p-input" id="exampleTextarea" rows="10" name="aciklama" placeholder="Duyuru açıklaması giriniz..."></textarea>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
                                                <div class="card card-statistics">

                                                    <label for="etkinlikbasligi">Tarih Seçin</label>
                                                    <div class="form-check">

                                                        <input type="datetime-local" name="datetime" min="2022-01-01">

                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" name="duyuruekle" class="btn btn-primary">Güncelle</button>
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

    <div class="row mb-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Duyuru Sil</h5>

                                <div class="table-responsive">

                                    <form class="forms-sample" action="duyuruislemleri.php" method="POST">

                                        <select name="duyuru_sil_id" id="format">

                                            <?php
                                            include "../login/baglanti.php";

                                            $cek4 = "SELECT * from duyurular WHERE duyurular.tarih > CURRENT_TIMESTAMP ORDER BY duyurular.duyuru_id DESC";
                                            $sorgu4 = mysqli_query($conn, $cek4);
                                            mysqli_close($conn);

                                            foreach ($sorgu4 as $row4) {
                                                echo "<option value='" . $row4['duyuru_id'] . "'>" . $row4['baslik'] . "_____"  . ">>" . "_____" . $row4['aciklama'] . "</option>";
                                            }

                                            ?>

                                        </select>


                                        <div class="form-group">
                                            <button type="submit" name="duyurusil" class="btn btn-primary">Sil</button>
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


</div>

<?php include "footer.php"; ?>
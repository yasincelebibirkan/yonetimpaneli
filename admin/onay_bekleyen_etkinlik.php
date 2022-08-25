<?php
session_start();
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
    header("location:../login/panelgiris.php");
}
?>
<?php
include "../login/baglanti.php";

if (isset($_GET['eid1'])) {
    $ekle = $_GET['eid1'];
    $sorgula = "SELECT * FROM `onay_bekleyen_etkinlik` WHERE onay_bekleyen_etkinlik.id = $ekle";
    $query = mysqli_query($conn, $sorgula);
    if ($query) {
        echo "<script>alert('etkinlik bulundu')</script>";
        while ($bak = mysqli_fetch_row($query)) {
            $tarih = $bak[1];
            $kategori_id = $bak[2];
            $baslik = $bak[3];
            $aciklama = $bak[4];
            $gorevli_personel_id = $bak[5];
            $gorsel = $bak[6];
            $durum = $bak[7];
        }
        $ekle2 = "INSERT INTO `etkinlikler` (`id`, `tarih`, `kategori_id`, `baslik`, `aciklama`, `gorevli_personel_id`, `gorsel` , `durum`)
        VALUES (NULL,'" . $tarih . "', '" . $kategori_id . "','" . $baslik . "','" . $aciklama . "','" . $gorevli_personel_id . "','www' ,'1')";
        $query2 = mysqli_query($conn, $ekle2);
        if ($query2) {
            echo "<script>alert('onaylandı')</script>";
        } else {
            //echo "<script>alert('Hata')</script>";
            echo "<script>alert('veri eklenemedi')</script>";
        }

        $sil = "DELETE FROM `onay_bekleyen_etkinlik` WHERE onay_bekleyen_etkinlik.id = $ekle";
        $query2 = mysqli_query($conn, $sil);
        if ($query2) {
            echo "<script>alert('silindi')</script>";
            header("location:../admin/panel.php");
        } else {
            //echo "<script>alert('Hata')</script>";
            echo "<script>alert('veri eklenemedi')</script>";
        }
    } else {
        echo "<script>alert('sorgulama başarısız')</script>";
    }
}
?>

<?php

if (isset($_GET['eid2'])) {
    $ekle = $_GET['eid2'];
    $sorgula = "SELECT * FROM `onay_bekleyen_etkinlik` WHERE onay_bekleyen_etkinlik.id = $ekle";
    $query = mysqli_query($conn, $sorgula);
    if ($query) {
        while ($bak = mysqli_fetch_row($query)) {
            $tarih = $bak[1];
            $kategori_id = $bak[2];
            $baslik = $bak[3];
            $aciklama = $bak[4];
            $gorevli_personel_id = $bak[5];
            $gorsel = $bak[6];
            $durum = $bak[7];
        }
        $ekle2 = "INSERT INTO `reddedilmis_etkinlik` (`id`, `tarih`, `kategori_id`, `baslik`, `aciklama`, `gorevli_personel_id`, `gorsel` , `durum`)
        VALUES (NULL,'" . $tarih . "', '" . $kategori_id . "','" . $baslik . "','" . $aciklama . "','" . $gorevli_personel_id . "','www' ,'-1')";
        $query2 = mysqli_query($conn, $ekle2);
        if ($query2) {
            echo "<script>alert('onaylandı')</script>";
        } else {
            //echo "<script>alert('Hata')</script>";
            echo "<script>alert('veri eklenemedi')</script>";
        }

        $sil = "DELETE FROM `onay_bekleyen_etkinlik` WHERE onay_bekleyen_etkinlik.id = $ekle";
        $query2 = mysqli_query($conn, $sil);
        if ($query2) {
            echo "<script>alert('silindi')</script>";
            header("location:../admin/panel.php");
        } else {
            //echo "<script>alert('Hata')</script>";
            echo "<script>alert('veri reddedilmiş_etkinlik tablosuna eklenemedi')</script>";
        }
    } else {
        echo "<script>alert('sorgulama başarısız')</script>";
    }
}
?>


<?php include "navbar_sol.php"; ?>

<div class="content-wrapper">
    <h3 class="page-heading mb-4">YÖNETİM PANELİ</h3>

    <!-- Tarihi yaklaşan etkinlikler sırasıyla listelenecek -->
    <form action="../admin/excel/excel.php" method="post">
        <div class="card-deck">
            <div class="card col-lg-12 px-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title">Onay Bekleyen Etkinlikler</h5>
                    <div class="table-responsive">
                        <table class="table center-aligned-table">
                            <thead>
                                <tr class="text-primary">
                                    <th>Kategori</th>
                                    <th>Başlık</th>
                                    <th>Açıklama</th>
                                    <th>Sorumlu Personel Ad </th>
                                    <th>Sorumlu Personel Ad </th>
                                    <th>Tarih</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include "../login/baglanti.php";

                                $sec = "SELECT * from onay_bekleyen_etkinlik LEFT JOIN kategoriler ON kategoriler.id=onay_bekleyen_etkinlik.kategori_id INNER JOIN personeller ON personeller.id=onay_bekleyen_etkinlik.gorevli_personel_id WHERE durum='0' ORDER BY onay_bekleyen_etkinlik.id DESC";


                                $sorgu = mysqli_query($conn, $sec);

                                ?>

                                <?php while ($sonuc = mysqli_fetch_row($sorgu)) { ?>
                                    <tr>
                                        <td><?= $sonuc[9] ?></td>
                                        <td><?= $sonuc[3] ?></td>
                                        <td><?= $sonuc[4] ?></td>
                                        <td><?= $sonuc[11] . "  " . $sonuc[12] ?></td>
                                        <td><?= $sonuc[11] . "  " . $sonuc[12] ?></td>
                                        <td><?= $sonuc[1] ?></td>
                                        <td><a href="onay_bekleyen_etkinlik.php?eid1=<?= $sonuc[0] ?>" class="btn btn-primary btn-sm">Onayla</a></td>
                                        <td><a href="onay_bekleyen_etkinlik.php?eid2=<?= $sonuc[0] ?>" class="btn btn-danger btn-sm">Sil</a></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="yazdir_aktif" class="btn btn-primary">Yazdır</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--
    <form action="../admin/excel/excel.php" method="post">
        <div class="card-deck">
            <div class="card col-lg-12 px-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title">Reddedilmiş Etkinlikler</h5>
                    <div class="table-responsive">
                        <table class="table center-aligned-table">
                            <thead>
                                <tr class="text-primary">
                                    <th>Kategori</th>
                                    <th>Başlık</th>
                                    <th>Açıklama</th>
                                    <th>Sorumlu Personel Ad </th>
                                    <th>Sorumlu Personel Ad </th>
                                    <th>Tarih</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include "../login/baglanti.php";

                                $sec = "SELECT * from reddedilmis_etkinlik LEFT JOIN kategoriler ON kategoriler.id=reddedilmis_etkinlik.kategori_id INNER JOIN personeller ON personeller.id=reddedilmis_etkinlik.gorevli_personel_id WHERE durum='-1' ORDER BY reddedilmis_etkinlik.id DESC";


                                $sorgu = mysqli_query($conn, $sec);

                                ?>

                                <?php while ($sonuc = mysqli_fetch_row($sorgu)) { ?>
                                    <tr>
                                        <td><?= $sonuc[9] ?></td>
                                        <td><?= $sonuc[3] ?></td>
                                        <td><?= $sonuc[4] ?></td>
                                        <td><?= $sonuc[11] . "  " . $sonuc[12] ?></td>
                                        <td><?= $sonuc[11] . "  " . $sonuc[12] ?></td>
                                        <td><?= $sonuc[1] ?></td>
                                      
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="yazdir_aktif" class="btn btn-primary">Yazdır</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
-->

</div>
</div>

<?php include "footer.php"; ?>
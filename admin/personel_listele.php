<?php
session_start();
if($_SESSION["ad"]=="" || $_SESSION["soyad"]=="")
{
  header("location:../login/panelgiris.php");
}
?>

<?php include "navbar_sol.php"; ?>

<div class="content-wrapper">
<h3 class="page-heading mb-4">Personel İşlemleri</h3>   
<div class="card-deck">
    <div class="card col-lg-12 px-0 mb-4">
      <div class="card-body">
        <h5 class="card-title">Personel Listesi</h5>
        <div class="table-responsive">
          <table class="table center-aligned-table">

            <thead>

                    <tr class="text-primary">
                        <th>Personel ID</th>
                        <th>Personel Ad</th>
                        <th>Personel Soyad</th>
                    </tr>

            </thead>

            <tbody>

              <?php

              include "../login/baglanti.php";

              $sec = "SELECT * from personeller";
              $sorgu = mysqli_query($conn, $sec);

              while ($sonuc = mysqli_fetch_row($sorgu)) {

                    echo "<tr>
                            <td>" . $sonuc[0] . "</td>
                            <td>" . $sonuc[1] . "</td>
                            <td>" . $sonuc[2] . "</td>
                        </tr>
             ";
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>

      <div class="card-deck">
    <div class="card col-lg-12 px-0 mb-4">
      <div class="card-body">
        <h5 class="card-title">Ayrılan Listesi</h5>
        <div class="table-responsive">
          <table class="table center-aligned-table">

            <thead>

                    <tr class="text-primary">
                        <th>Personel ID</th>
                        <th>Personel Ad</th>
                        <th>Personel Soyad</th>
                    </tr>

            </thead>

            <tbody>

              <?php

              include "../login/baglanti.php";

              $sec = "SELECT * from personeller";
              $sorgu = mysqli_query($conn, $sec);

              while ($sonuc = mysqli_fetch_row($sorgu)) {

                    echo "<tr>
                            <td>" . $sonuc[0] . "</td>
                            <td>" . $sonuc[1] . "</td>
                            <td>" . $sonuc[2] . "</td>
                        </tr>
             ";
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>





      <!-- İZİNLİ PERSONEL KISMI -->

      <div class="card-body">
        <h5 class="card-title"> İzinli Personel Listesi</h5>
        <div class="table-responsive">
          <table class="table center-aligned-table">

            <thead>

                    <tr class="text-primary">
                        <th>Personel ID</th>
                        <th>Personel Ad</th>
                        <th>Personel Soyad</th>
                    </tr>

            </thead>

            <tbody>

             <?php

              include "../login/baglanti.php";

              $sec = "SELECT * FROM personeller WHERE personel_durum='0'";
              $sorgu = mysqli_query($conn, $sec);

              while ($sonuc = mysqli_fetch_row($sorgu)) {

                    echo "<tr>
                            <td>" . $sonuc[0] . "</td>
                            <td>" . $sonuc[1] . "</td>
                            <td>" . $sonuc[2] . "</td>
                        </tr>
             ";
              }
              ?>

          </tbody>



    </div>
  </div>

</div>

<?php include "footer.php"; ?>
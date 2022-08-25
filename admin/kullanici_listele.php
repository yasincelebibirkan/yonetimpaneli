<?php
session_start();
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
  header("location:../login/panelgiris.php");
}
?>

<?php include "navbar_sol.php"; ?>

<div class="content-wrapper">
<h3 class="page-heading mb-4">Kullanıcı İşlemleri</h3>
  <div class="card-deck">
    <div class="card col-lg-12 px-0 mb-4">
      <div class="card-body">
        <h5 class="card-title">Kullanıcı Listesi</h5>
        <div class="table-responsive">
          <table class="table center-aligned-table">

            <thead>

              <tr class="text-primary">
                <th>Kullanıcı Adı</th>
                <th>Kullanıcı Soyadı</th>
                <th>yetki</th>
              </tr>

            </thead>

            <tbody>

              <?php

              include "../login/baglanti.php";

              $sec = "SELECT * from kullanicilar";
              $sorgu = mysqli_query($conn, $sec);

              while ($sonuc = mysqli_fetch_row($sorgu)) {

                echo "<tr>
                            <td>" . $sonuc[1] . "</td>
                            <td>" . $sonuc[2] . "</td>
                            <td>" . $sonuc[5] . "</td>
                        </tr>
             ";
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

<?php include "footer.php"; ?>
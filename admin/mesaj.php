<?php
session_start();
if($_SESSION["ad"]=="" || $_SESSION["soyad"]=="")
{
  header("location:../login/panelgiris.php");
}
?>



<?php include "navbar_sol.php"; ?>


<div class="content-wrapper">
  <h3 class="page-heading mb-4">Mesaj Kutusu</h3>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-4">Gelen Mesajlar</h5>
                <div class="table-responsive">
                  <table class="table center-aligned-table">
                    <thead>
                      <tr class="text-primary">
                        <th>Mesaj id</th>
                        <th>Tarih</th>
                        <th>Ad</th>
                        <th>Soyad</th>
                        <th>Mesaj</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include "../login/baglanti.php";
                      $sorgu = "SELECT * FROM mesaj_kutusu ORDER BY tarih desc";
                      $getir = mysqli_query($conn, $sorgu);

                      while ($sonuc = mysqli_fetch_row($getir)) {
                        echo "
        
                                 <tr>
                                    <td>" . $sonuc[0] . "</td>
                                    <td>" . $sonuc[1] . "</td>
                                    <td>" . $sonuc[2] . "</td>
                                    <td>" . $sonuc[3] . "</td> 
                                    <td>" . $sonuc[4] . "</td>  
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
      </div>
    </div>
  </div>
</div>







<?php include "footer.php"; ?>
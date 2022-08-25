<?php
session_start();
if ($_SESSION["ad"] == "" || $_SESSION["soyad"] == "") {
  header("location:../login/panelgiris.php");
}

if ($_SESSION["yetki"] == 1) {

  include "goruntule.php";

}
if ($_SESSION["yetki"] == 2) {
  include "../login/baglanti.php";
  $sorgu="SELECT * FROM onay_bekleyen_etkinlik";
  $sorgula=mysqli_query($conn,$sorgu);
  $row=mysqli_fetch_assoc($sorgula);

  if(empty($row))
  {
    include "goruntule.php";
  }
  else
  {
    echo "<script>alert('onay bekleyen etkinlik var')</script>";
    include "onay_bekleyen_etkinlik.php";
  }

}
if ($_SESSION["yetki"] == 3) {

}
?>

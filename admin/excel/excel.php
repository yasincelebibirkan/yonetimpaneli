<?php

include "../../login/baglanti.php";
require_once '../excel/PHPExcel.php';

$myExcel = new PHPExcel();
$myExcel->getActiveSheet()->setTitle("etkinlikler");
$myExcel->getActiveSheet()->setCellValue("A1", "Kategori");
$myExcel->getActiveSheet()->setCellValue("B1", "Başlık");
$myExcel->getActiveSheet()->setCellValue("C1", "Açıklama");
$myExcel->getActiveSheet()->setCellValue("D1", "Sorumlu Personel Ad");
$myExcel->getActiveSheet()->setCellValue("E1", "Tarih");

if (isset($_POST['yazdir_aktif'])) {
  $sec = "SELECT * from etkinlikler LEFT JOIN kategoriler ON kategoriler.id=etkinlikler.kategori_id INNER JOIN personeller ON personeller.id=etkinlikler.gorevli_personel_id WHERE etkinlikler.tarih > CURRENT_TIMESTAMP and durum='1' ORDER BY etkinlikler.id DESC";


  $sorgu = mysqli_query($conn, $sec);

  $i = 2;
  while ($sonuc = mysqli_fetch_row($sorgu)) {

    $myExcel->getActiveSheet()->setCellValue("A" . $i, $sonuc[9]);
    $myExcel->getActiveSheet()->setCellValue("B" . $i, $sonuc[3]);
    $myExcel->getActiveSheet()->setCellValue("C" . $i, $sonuc[4]);
    $myExcel->getActiveSheet()->setCellValue("D" . $i, $sonuc[11] . " " . $sonuc[12]);
    $myExcel->getActiveSheet()->setCellValue("E" . $i, $sonuc[1]);
    $i++;
  }
}
if (isset($_POST['yazdir_pasif'])) {
  $sec = "SELECT * from etkinlikler LEFT JOIN kategoriler ON kategoriler.id=etkinlikler.kategori_id INNER JOIN personeller ON personeller.id=etkinlikler.gorevli_personel_id WHERE durum = '0' ORDER BY etkinlikler.id DESC";


  $sorgu = mysqli_query($conn, $sec);

  $i = 2;
  while ($sonuc = mysqli_fetch_row($sorgu)) {

    $myExcel->getActiveSheet()->setCellValue("A" . $i, $sonuc[9]);
    $myExcel->getActiveSheet()->setCellValue("B" . $i, $sonuc[3]);
    $myExcel->getActiveSheet()->setCellValue("C" . $i, $sonuc[4]);
    $myExcel->getActiveSheet()->setCellValue("D" . $i, $sonuc[11] . " " . $sonuc[12]);
    $myExcel->getActiveSheet()->setCellValue("E" . $i, $sonuc[1]);
    $i++;
  }
}
if(isset($_POST['yazdir_tarihi_gecmis']))
{
  $sec = "SELECT * from etkinlikler LEFT JOIN kategoriler ON kategoriler.id=etkinlikler.kategori_id INNER JOIN personeller ON personeller.id=etkinlikler.gorevli_personel_id WHERE etkinlikler.tarih < CURRENT_TIMESTAMP and durum='1' ORDER BY etkinlikler.id DESC";


  $sorgu = mysqli_query($conn, $sec);

  $i = 2;
  while ($sonuc = mysqli_fetch_row($sorgu)) {

    $myExcel->getActiveSheet()->setCellValue("A" . $i, $sonuc[9]);
    $myExcel->getActiveSheet()->setCellValue("B" . $i, $sonuc[3]);
    $myExcel->getActiveSheet()->setCellValue("C" . $i, $sonuc[4]);
    $myExcel->getActiveSheet()->setCellValue("D" . $i, $sonuc[11] . " " . $sonuc[12]);
    $myExcel->getActiveSheet()->setCellValue("E" . $i, $sonuc[1]);
    $i++;
  }
}



header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="etkinlikler.xlsx"');
header('Cache-Control: max-age=0');

header('Cache-Control: max-age=1');


header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');



$kaydet = PHPExcel_IOFactory::createWriter($myExcel, 'Excel2007');
ob_end_clean();
$kaydet->save('php://output');
exit;

<?php
/*
    define('access',"True");
    */
session_start(); /* kullanıcı giriş çıkış bilgi ve kontrollerinin sağlanabilmesi için oturum başlatır  */


$kuladi = $_POST["username"];
$parola = $_POST["pass"];

$hatavarmi = false;

if ($kuladi == " ") {
    echo "kullanıcı adı boş olamaz";
    $hatavarmi = true;
} else if (strlen($kuladi) < 3) {
    echo "kullanıcı adı 3 karakterden küçük olamaz";
    $hatavarmi = true;
} else if ($parola == "") {
    echo "parola boş olamaz";
    $hatavarmi = true;
} else if (strlen($parola) < 1) {
    echo "şifre en az 1 karekter olmalı";
    $hatavarmi = true;
} else {
    include "baglanti.php";
    $sorgu = "SELECT * FROM kullanicilar WHERE tc = '$kuladi' AND sifre = '$parola'";
    $sonuc = mysqli_query($conn, $sorgu);
    $row = mysqli_fetch_assoc($sonuc); /* ne kadar çalışan varsa kontrol eder */

    if (empty($row)) {
        echo "<script>alert('hatalı giriş')</script>";
        header("location:panelgiris.php");
    } else {


        $_SESSION["user"] = $_POST["username"];

        $sorgu2 = "SELECT * FROM kullanicilar WHERE tc = '$kuladi' AND sifre = '$parola'";

        $sorgu = mysqli_query($conn, $sorgu2);

        while ($sonuc = mysqli_fetch_row($sorgu)) {

            $_SESSION["ad"] = $sonuc[1];
            $_SESSION["soyad"] = $sonuc[2];
            $_SESSION["fotograf"] = $sonuc[3];
            $_SESSION["yetki"] = $sonuc[5];;
        }

        header("location:../admin/panel.php");
    }
}

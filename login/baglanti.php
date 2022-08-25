
<?php
$server="localhost";
$kullaniciadi="root";
$sifre="";
$db="gebze";
$conn= new mysqli($server,$kullaniciadi,$sifre,$db);

if($conn -> connect_error)
{
    die("baglanti hatası : ".$conn-> connect_error);
}
?>
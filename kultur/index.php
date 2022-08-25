<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kültür/Gebze</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <header id="header">
        <a href="#" class="logo">kültür.GEBZE</a>
        <div id="toggle"></div>
        <div id="navbar">
            <ul>
                <li><a href="#Konserler">Konserler</a></li>
                <li><a href="#Sergiler">Sergiler</a></li>
                <li><a href="#Soylesiler">Söyleşiler</a></li>
                <li><a href="#SiirDinletileri">Şiir Dinletileri</a></li>
                <li><a href="#Duyurular">Duyurular</a></li>
                <li><a href="#İletisim">İletişim</a></li>
            </ul>
        </div>
    </header>

    <section id="Konserler">Konserler</section>
    <section id="Sergiler">Sergiler</section>
    <section id="Soylesiler">Söyleşiler</section>
    <section id="SiirDinletileri">Şiir Dinletileri</section>
    <section id="Duyurular">
        <div class="leftBox">
            <div class="content">
                <h1>Events And Shows</h1>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia, harum corrupti? Obcaecati, nisi! Animi consectetur sint eveniet, consequatur temporibus earum qui harum saepe fugiat! Quia, mollitia placeat! Nostrum dolore obcaecati repellendus maxime atque facere, doloribus nisi, molestias incidunt nam id aperiam tempore explicabo, a exercitationem aliquam neque! Porro ad corrupti eveniet, ipsa repellat commodi provident enim quod, explicabo, suscipit labore? Exercitationem incidunt voluptas commodi adipisci minima nam id consequatur corrupti rerum corporis amet modi reprehenderit ipsum voluptate iste, nesciunt magni neque dignissimos deserunt tempora voluptatum asperiores fugit? Debitis, iusto consectetur! Alias facere sequi repudiandae nobis omnis quae quaerat fuga illum.
                </p>
            </div>
        </div>


        <div class="events">
            <ul>
                <li>

                    <div class="time">
                        <h2>24 <br><span>June</span></h2>
                    </div>

                    <div class="details">
                        <h3> <?php session_start(); echo $_SESSION['baslik']; ?> </h3>
                        <p>
                              <?php echo $_SESSION['aciklama']; ?> 
                        </p>
                        <a href="#">View Details</a>
                    </div>

                    <div style="clear:both;"></div>

                </li>

                <li>

                    <div class="time">
                        <h2>24 <br><span>June</span></h2>
                    </div>

                    <div class="details">
                        <h3>Where does it come from</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente quod iure maiores mollitia? Accusamus praesentium libero iusto illum ipsa natus eligendi quas sint blanditiis nemo sed quasi dolorem ab porro quos rerum esse eos iure et accusantium culpa, cupiditate asperiores.
                        </p>
                        <a href="#">View Details</a>
                    </div>

                    <div style="clear:both;"></div>

                </li>


                <li>

                    <div class="time">
                        <h2>24 <br><span>June</span></h2>
                    </div>

                    <div class="details">
                        <h3>Where does it come from</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente quod iure maiores mollitia? Accusamus praesentium libero iusto illum ipsa natus eligendi quas sint blanditiis nemo sed quasi dolorem ab porro quos rerum esse eos iure et accusantium culpa, cupiditate asperiores.
                        </p>
                        <a href="#">View Details</a>
                    </div>

                    <div style="clear:both;"></div>


                </li>

            </ul>
        </div>
    </section>

    <section id="İletisim">
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>

        <ul id="İletisim">
            <li><a href="#">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a></li>
            <li><a href="#">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a></li>
            <li><a href="#">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a></li>
            <li><a href="#">
                    <ion-icon name="logo-youtube"></ion-icon>
                </a></li>
            <li><a href="#">
                    <ion-icon name="logo-whatsapp"></ion-icon>
                </a></li>
        </ul>
    </section>

    <script type="text/javascript">
        const toggle = document.getElementById('toggle')
        const navbar = document.getElementById('navbar')
        const header = document.getElementById('header')
        document.onclick = function(e) {
            if (e.target.id !== 'header' && e.target.id !== 'toggle' && e.taget.id !== 'navbar') {
                toggle.classList.remove('active');
                navbar.classList.remove('active');

            }
        }

        toggle.onclick = function() {
            toggle.classList.toggle('active');
            navbar.classList.toggle('active');

        }
    </script>
</body>

</html>

<?php

include "../login/baglanti.php";
session_start();

$sorgu = "SELECT * from etkinlikler
LEFT JOIN kategoriler ON kategoriler.id=etkinlikler.kategori_id INNER JOIN personeller ON personeller.id=etkinlikler.gorevli_personel_id ORDER BY etkinlikler.id DESC LIMIT 1";
$sorgula = mysqli_query($conn,$sorgu);

while( $sonuc=mysqli_fetch_row($sorgula) )
{
    
    $_SESSION["baslik"] = $sonuc[3];
    $_SESSION["aciklama"] = $sonuc[4];
}

?>
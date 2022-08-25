-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Ağu 2022, 10:36:06
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `gebze`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `etkinlikler`
--

CREATE TABLE `etkinlikler` (
  `id` int(11) NOT NULL,
  `tarih` varchar(17) CHARACTER SET utf8mb4 NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `baslik` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `aciklama` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `gorevli_personel_id` int(11) NOT NULL,
  `gorsel` varchar(400) COLLATE utf8mb4_turkish_ci NOT NULL,
  `durum` enum('-1','0','1') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `etkinlikler`
--

INSERT INTO `etkinlikler` (`id`, `tarih`, `kategori_id`, `baslik`, `aciklama`, `gorevli_personel_id`, `gorsel`, `durum`) VALUES
(107, '2022-08-31T19:30', 2, 'BURAY', 'davetlisiniz', 4, 'www', '1'),
(109, '2022-08-31T15:15', 2, 'BURAY', 'açıklama', 2, 'www', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `kategori_adi` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategori_adi`) VALUES
(1, 'Söyleşi'),
(2, 'Konser'),
(3, 'elma');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `tc` varchar(11) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ad` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyad` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `fotograf` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `yetki` enum('1','2','3') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`tc`, `ad`, `soyad`, `fotograf`, `sifre`, `yetki`) VALUES
('12345678910', 'Mehmet', 'Çınar', '', '1234', '2'),
('26188888032', 'Yasin Birkan', 'ÇELEBİ', '222.jpg', '1234', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_oturum_bilgisi`
--

CREATE TABLE `kullanici_oturum_bilgisi` (
  `id` int(11) NOT NULL,
  `kullaniciadi` varchar(40) CHARACTER SET utf8 NOT NULL,
  `sifre` varchar(15) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici_oturum_bilgisi`
--

INSERT INTO `kullanici_oturum_bilgisi` (`id`, `kullaniciadi`, `sifre`) VALUES
(6, 'root', '1'),
(4, 'admin', '1234'),
(5, 'personel', '12345');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_profili`
--

CREATE TABLE `kullanici_profili` (
  `id` int(11) NOT NULL,
  `ad` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyad` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `fotograf` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici_profili`
--

INSERT INTO `kullanici_profili` (`id`, `ad`, `soyad`, `fotograf`) VALUES
(4, 'yasin birkan', 'çelebi', 0x89504e470d0a1a0a0000000d49484452000000d7000000ea0803000000064720f400000084504c5445000000ffffffeeeeeeedededfcfcfcf8f8f8f1f1f1f5f5f50b0b0bd4d4d4e1e1e1717171333333eaeaea9898989595957a7a7a1111115e5e5e494949393939d0d0d0c7c7c76c6c6ce4e4e4bababaa4a4a4aaaaaadadada2222221c1c1c8b8b8b8181814343435454542d2d2db3b3b31717175757576464648e8e8e363636c0c0c03f3f3f4d6a119d00000bad49444154789ced5de77aa33a101542d2d838b8ae3b8949e26cca7dfff7bb88664c954025e6dbf38b95b3a0638fa66934202702713176815f018eaef885130de164887f48b221c62f683e8439f25b507ec5b25b10cc0088131ccf97f5e6fd63354193d5c7fb661d9e8f81430018ee7557b1b9227dbc1c777a5a3ea37a3ccfe6dbdb831e85573404c7e5aa815386d5f208c92df4f3720b7feb5679b902337019f8bb5907a70cb39d0f4ce8ae555e6d7345848345007e01fcaa7388f22b9a0db1fb21a0dee2499015c7d3974705ee2a34b1db107223a45f5784e4eb8a2ed2af2b42fa7545c887d2ef261d728a4318bc7022c18a63127a805bef9a4e4c62ae48a97847ac9692a4122c03c04a17b8525ec49d77e98a26ac1689d657c64ba51ceede7bb2e278df299543e0a01c7717ad43503744483f11bc6119290a810709cd1589280391af0bb62f036921f4b185c18acb556b979df960561c7367d00257ee6f50513bdc851955ca6ba01cbaaf8a6821f4eaab91c37895c5b63d5dfd91d5ee1a827c28fe904e9bbcdb3e789ec63725350f92982bb75f15f7ccc5ae8c7bb653c88a6397099788835a3f57157679ab98564accb6bfa19e1642dbe1bc86fa1b81065a084d07fb1bf118be79ae1148fd502102cc87400f2d8402c827568c5685e72a195796c5e0201b93886272e85e08ad7165833210136ff2ad891642df447481abc8039478edb5d14268afe0f7eab3bea82a9fb009f3db837aacaffefa90a9b6c765ec98953cc041263bd3074f071b76990e0d23bbb1a48378f5f30f754b21c7aec24bd83fecebcf836e29e4f886defe7c491988c65fb030400ba10560a37900e619a18590c74ce60130e8571a099660320f8075b9bb557878401e40367fe8a84ad37463e6f4cb1ff6f1372818a38510d01a81d1e36f1033ca30c18298f2373035480b21eed61ac903b0ab515e47d6470e7bec573a6ba3bcd64e9ffdca924de8882be3af8b19a58550fcccb604a6a23cc0d130af634571e9f1373e0df3faeccf4bc6df20c337bae4f0427af81bd2fa90fd18a685d00f4b26e6ebb4cb7032ceeb0406ec3235abe539d6544d1ea0e66f0b6a565f2eb409df4cae9089f3122c0eca0d1e04ba52d7cd98042053c8c4afe4f5e1d4382dbebda23f0f60d6394c703560972f16785d0cd8659d7b0d4dd8cbcb6167cd4e3905f06681d75b5d32a07548dadf601b0bbc36a03d0fe0ffb1c0eb8fafdddff086d4e2f5c5bba73b0fe0042a6b6b44f11ce4fa41260f4059b166278dadef86683ee49b8e52385efc7c62827395cd0380ff6181d7879f4f4c531e005c2bbf970bfdecb2382f6c657de19ebcc4fd0db0a20f812b035f62ae053dcfaf68a63be3a1ba329edf61bf3ae72a6dbfc0a6bfa1d12e8315ffd0002fd3d9438ebd3caf2866ce6436ba4a3fa81b62699d7c6881d725adab179e6b8f3c80a578597b1ec0527e437b1e405b296533260713e7102de40f7bec13c9e601a8e15d3d8e4f272d5fd29807b09a9fd7980770b5975356b163ae76bbec62e391e58b6ba41e004c2fb035f4a80790d61b9418df5f266213bbd31b3957f1ba2f3bf500bafd8d08a6eb374a0b5c5bfda1d91de69f01bca4e4d021467991b2e2129243d9fdcaf8c26c3d5bf66c4766bf124bef2f63e3f587250755687f59de2e73f13655de8bd0d2e87907df182fdfec7987d010adb0ef7907091d5328e3c1c6eae70be702a4f2a2c51f41e2bc1ee83dfb95e176dec1845de662e09b389ff2d4b8c0657909e401125e46c2b01d6b5ce05d7980dca6b5d6ccd2bba1f8ef07b711e9c692541d03c1b90e388768eebc5ec591d37a0e118c9daf346797e365abf90cd8025a1597fa7301f91a05ade797013706149afa11d1f48a82c6f3e6406f0f32de8fc8d7dd1fa0556034f81be910e8da859882c002d7e16fa4e20d3ada8a20b405dbfd88b468fb1f18dc8fa826b686faa10673afa5bf8d88c3d33ad77ffd889ac59b6d95f68fda329905aec1dfc8972df314f6fbf2404a710df7375ac255e6abf23cf63e130ad83bfd8dc61f41eeebfaedfdf4dae3ca48e3c41f02ab88012868d2f692f53f2cf04a7c7a275277daea0f31de9ee7f370bfdecc7e809567c0d8d043e833c6cadf16839fd966fd192ee6e7adabfef7620e399c96c50abdcdae2a31743724d27cdad1aa74ef8a5566cfb39347b8448ae601128317194387db345c1ea2fe2eac561d2eb19364cc9993a706c8bcaf1f3c99c78fc434cbc3f3858caba986f7f0c7a72d73cd863af52176fc797dc9e1c73929992a6a2e08c25eb4c200ca5a16b3737d29f19fb91f4f71481e80c1b665d5ac838a7833f0a499f17ecbacb268a62dbb87b32d5496a28c5d86a0c32e9daacb36faf75c26dc7c9abbc51592f1eaa812d94fabaa53d82e43f799a88d576741c98fa89ddeff10a764ed392fafbb2af502ad72d81c5b3b62ea6d4ef2ff99df8b50e21f975d95f61fcba31bfd6565479f8aed1b3e456ebf7c1e00b350e4e6fcfed3ead795acbbf6f7054c6f5ae75e60a6a2e6e252555c9d798083447d7258eff1f0f73b5027b89e969ba74cff4f9e36cbd375daf67e8750fcc11bbfa2b83afc8d835463f2d58e2fe0ba1624499a828b473c032e26247f5095177676720f3eb4f32acba174bfa14faf6f07ab821c464642ba2a3a6890c3ba8547fa64992ed8e995e9bb0d39b8cf99d42911ed47d4377936f7733f5f3caacb449681dfd309cb52729dfe86d737e2585d82d4cf178f6cd3539b105cfabe6ae0d9abdeb5cedf204382fafd0fedc34bd88ed7e195d4f0aa4accc030eabfb997089d981c4643dee9bf618f9cd5c861ecd5e34250a2a07cf7ed7c8885ab1a3ee0fb216e50ce0a0ebc9c2aa14bd97e314559cecd29e04f69890039c1e0ace874d2b6bc05588997078a44012fb3f3344d87542376874ecf337585c2ff75e43788eaae069bafeb96c5e754138611086caf5faa4f915d482b2f4ddb3e933f9bfd32bc84cbcfb73f9a76cca6255e457d88b18dc3786ab0891835d96538db9edd009ca1d12efb36cef0aac2b3df54a767a877ad2e2ca0b84f74db2b0373c5927ae0437d3fa2c7feb910faaacd0350b3d5e33a4028aeda2f62a6525227e6a49207887e2fdbb352805bf490e701c823dbae0c6752cd0398a86bd58df7aabfa1a76ec634b6157fc35cc76b9d9895f300d0376bf2bbb062f7fd88a88d53ff3a70a577fd88e85fdb135284bfb468bf70300e318c043128be4fca70276f9db8b2022f2b4d50f4e033d9af89e32fb0d23c490f784ba6cc7e69abd2b58129e47699dae819aa0b5f34e765a577922efc4d7e2f1e349b7b1b8a014cbc3c0f60bea3864eec723d3fa6e5c59bfd66bccc77acd18975c68b8dc5894af0c1c32e44291995da881090b81f117bfc44d43de610e7018cbdcbcb149610db65f7713787eab171791e001f6ccf43390ed845e3531bb1e288f4fc7862ca0cd7d87e3dfa364a158b98d738328745cc625e634860dfe3899f43746dcf42035c868cbd39d424bc8897e92e72267064c8504317b39803822fdb93d0800ba011aa79aee8913336af976313f11a57b09c6015f1b23d072d70d018ca1baa20687c510a4780c69513cdb0436374372287038da1cca68af33f5e0f853332df75dd044e687cd90d8e050a6d4f410b2e688cee7ce4d0a3f1546e14f189c6b5a797618dc6540a70c3db68798d315c8e02e67fbc1e0a1ba4ae03d96fc2eb687fafb1eac3b1dae5b1fa87634ccfa388d558e3cab1e6a3c69a177dfc53957520c879e4b3d84d78761019a3a29f1164e1f586fa710234ae22f31401ef236de305d87af1cd3072059a1c3e1a2ec0fb128fafaed24beaccc7720631c35b5a3f3f3657ea98f222e3d21cdf243bc731ae4ad86bd68fe891db1055f1ca1b1325fd0134bd54c30e7650e80f309e230fcbbb7e44742c45be4f90f6238abb70e87859881d6c1d72d797f8a15b7ddd7086723fa251b88917a8f423c24e687b5683b174ca7d96e2be58a1ed790d44d8d09758d1bb426c61e134f5258647f6808f778daceffbf782f7a8db2b1b0fdafb123fa62ccebbfb121f74bee4500ff65e435fe2e23bc400b68fb527b6de02545ead5affbe9be071fce05920f57e22767a841fedef295e4212ef417018f3af97df9c20f80eaf7efab229095e84abc968197ac753b87e7d7f594d7e07562fefafebf0740c7877a8c25ccbbcfe07da30f329a1441ce20000000049454e44ae426082),
(5, 'test', ' deneme', 0x89504e470d0a1a0a0000000d49484452000000d7000000ea0803000000064720f400000084504c5445000000ffffffeeeeeeedededfcfcfcf8f8f8f1f1f1f5f5f50b0b0bd4d4d4e1e1e1717171333333eaeaea9898989595957a7a7a1111115e5e5e494949393939d0d0d0c7c7c76c6c6ce4e4e4bababaa4a4a4aaaaaadadada2222221c1c1c8b8b8b8181814343435454542d2d2db3b3b31717175757576464648e8e8e363636c0c0c03f3f3f4d6a119d00000bad49444154789ced5de77aa33a101542d2d838b8ae3b8949e26cca7dfff7bb88664c954025e6dbf38b95b3a0638fa66934202702713176815f018eaef885130de164887f48b221c62f683e8439f25b507ec5b25b10cc0088131ccf97f5e6fd63354193d5c7fb661d9e8f81430018ee7557b1b9227dbc1c777a5a3ea37a3ccfe6dbdb831e85573404c7e5aa815386d5f208c92df4f3720b7feb5679b902337019f8bb5907a70cb39d0f4ce8ae555e6d7345848345007e01fcaa7388f22b9a0db1fb21a0dee2499015c7d3974705ee2a34b1db107223a45f5784e4eb8a2ed2af2b42fa7545c887d2ef261d728a4318bc7022c18a63127a805bef9a4e4c62ae48a97847ac9692a4122c03c04a17b8525ec49d77e98a26ac1689d657c64ba51ceede7bb2e278df299543e0a01c7717ad43503744483f11bc6119290a810709cd1589280391af0bb62f036921f4b185c18acb556b979df960561c7367d00257ee6f50513bdc851955ca6ba01cbaaf8a6821f4eaab91c37895c5b63d5dfd91d5ee1a827c28fe904e9bbcdb3e789ec63725350f92982bb75f15f7ccc5ae8c7bb653c88a6397099788835a3f57157679ab98564accb6bfa19e1642dbe1bc86fa1b81065a084d07fb1bf118be79ae1148fd502102cc87400f2d8402c827568c5685e72a195796c5e0201b93886272e85e08ad7165833210136ff2ad891642df447481abc8039478edb5d14268afe0f7eab3bea82a9fb009f3db837aacaffefa90a9b6c765ec98953cc041263bd3074f071b76990e0d23bbb1a48378f5f30f754b21c7aec24bd83fecebcf836e29e4f886defe7c491988c65fb030400ba10560a37900e619a18590c74ce60130e8571a099660320f8075b9bb557878401e40367fe8a84ad37463e6f4cb1ff6f1372818a38510d01a81d1e36f1033ca30c18298f2373035480b21eed61ac903b0ab515e47d6470e7bec573a6ba3bcd64e9ffdca924de8882be3af8b19a58550fcccb604a6a23cc0d130af634571e9f1373e0df3faeccf4bc6df20c337bae4f0427af81bd2fa90fd18a685d00f4b26e6ebb4cb7032ceeb0406ec3235abe539d6544d1ea0e66f0b6a565f2eb409df4cae9089f3122c0eca0d1e04ba52d7cd98042053c8c4afe4f5e1d4382dbebda23f0f60d6394c703560972f16785d0cd8659d7b0d4dd8cbcb6167cd4e3905f06681d75b5d32a07548dadf601b0bbc36a03d0fe0ffb1c0eb8fafdddff086d4e2f5c5bba73b0fe0042a6b6b44f11ce4fa41260f4059b166278dadef86683ee49b8e52385efc7c62827395cd0380ff6181d7879f4f4c531e005c2bbf970bfdecb2382f6c657de19ebcc4fd0db0a20f812b035f62ae053dcfaf68a63be3a1ba329edf61bf3ae72a6dbfc0a6bfa1d12e8315ffd0002fd3d9438ebd3caf2866ce6436ba4a3fa81b62699d7c6881d725adab179e6b8f3c80a578597b1ec0527e437b1e405b296533260713e7102de40f7bec13c9e601a8e15d3d8e4f272d5fd29807b09a9fd7980770b5975356b163ae76bbec62e391e58b6ba41e004c2fb035f4a80790d61b9418df5f266213bbd31b3957f1ba2f3bf500bafd8d08a6eb374a0b5c5bfda1d91de69f01bca4e4d021467991b2e2129243d9fdcaf8c26c3d5bf66c4766bf124bef2f63e3f587250755687f59de2e73f13655de8bd0d2e87907df182fdfec7987d010adb0ef7907091d5328e3c1c6eae70be702a4f2a2c51f41e2bc1ee83dfb95e176dec1845de662e09b389ff2d4b8c0657909e401125e46c2b01d6b5ce05d7980dca6b5d6ccd2bba1f8ef07b711e9c692541d03c1b90e388768eebc5ec591d37a0e118c9daf346797e365abf90cd8025a1597fa7301f91a05ade797013706149afa11d1f48a82c6f3e6406f0f32de8fc8d7dd1fa0556034f81be910e8da859882c002d7e16fa4e20d3ada8a20b405dbfd88b468fb1f18dc8fa826b686faa10673afa5bf8d88c3d33ad77ffd889ac59b6d95f68fda329905aec1dfc8972df314f6fbf2404a710df7375ac255e6abf23cf63e130ad83bfd8dc61f41eeebfaedfdf4dae3ca48e3c41f02ab88012868d2f692f53f2cf04a7c7a275277daea0f31de9ee7f370bfdecc7e809567c0d8d043e833c6cadf16839fd966fd192ee6e7adabfef7620e399c96c50abdcdae2a31743724d27cdad1aa74ef8a5566cfb39347b8448ae601128317194387db345c1ea2fe2eac561d2eb19364cc9993a706c8bcaf1f3c99c78fc434cbc3f3858caba986f7f0c7a72d73cd863af52176fc797dc9e1c73929992a6a2e08c25eb4c200ca5a16b3737d29f19fb91f4f71481e80c1b665d5ac838a7833f0a499f17ecbacb268a62dbb87b32d5496a28c5d86a0c32e9daacb36faf75c26dc7c9abbc51592f1eaa812d94fabaa53d82e43f799a88d576741c98fa89ddeff10a764ed392fafbb2af502ad72d81c5b3b62ea6d4ef2ff99df8b50e21f975d95f61fcba31bfd6565479f8aed1b3e456ebf7c1e00b350e4e6fcfed3ead795acbbf6f7054c6f5ae75e60a6a2e6e252555c9d798083447d7258eff1f0f73b5027b89e969ba74cff4f9e36cbd375daf67e8750fcc11bbfa2b83afc8d835463f2d58e2fe0ba1624499a828b473c032e26247f5095177676720f3eb4f32acba174bfa14faf6f07ab821c464642ba2a3a6890c3ba8547fa64992ed8e995e9bb0d39b8cf99d42911ed47d4377936f7733f5f3caacb449681dfd309cb52729dfe86d737e2585d82d4cf178f6cd3539b105cfabe6ae0d9abdeb5cedf204382fafd0fedc34bd88ed7e195d4f0aa4accc030eabfb997089d981c4643dee9bf618f9cd5c861ecd5e34250a2a07cf7ed7c8885ab1a3ee0fb216e50ce0a0ebc9c2aa14bd97e314559cecd29e04f69890039c1e0ace874d2b6bc05588997078a44012fb3f3344d87542376874ecf337585c2ff75e43788eaae069bafeb96c5e754138611086caf5faa4f915d482b2f4ddb3e933f9bfd32bc84cbcfb73f9a76cca6255e457d88b18dc3786ab0891835d96538db9edd009ca1d12efb36cef0aac2b3df54a767a877ad2e2ca0b84f74db2b0373c5927ae0437d3fa2c7feb910faaacd0350b3d5e33a4028aeda2f62a6525227e6a49207887e2fdbb352805bf490e701c823dbae0c6752cd0398a86bd58df7aabfa1a76ec634b6157fc35cc76b9d9895f300d0376bf2bbb062f7fd88a88d53ff3a70a577fd88e85fdb135284bfb468bf70300e318c043128be4fca70276f9db8b2022f2b4d50f4e033d9af89e32fb0d23c490f784ba6cc7e69abd2b58129e47699dae819aa0b5f34e765a577922efc4d7e2f1e349b7b1b8a014cbc3c0f60bea3864eec723d3fa6e5c59bfd66bccc77acd18975c68b8dc5894af0c1c32e44291995da881090b81f117bfc44d43de610e7018cbdcbcb149610db65f7713787eab171791e001f6ccf43390ed845e3531bb1e288f4fc7862ca0cd7d87e3dfa364a158b98d738328745cc625e634860dfe3899f43746dcf42035c868cbd39d424bc8897e92e72267064c8504317b39803822fdb93d0800ba011aa79aee8913336af976313f11a57b09c6015f1b23d072d70d018ca1baa20687c510a4780c69513cdb0436374372287038da1cca68af33f5e0f853332df75dd044e687cd90d8e050a6d4f410b2e688cee7ce4d0a3f1546e14f189c6b5a797618dc6540a70c3db68798d315c8e02e67fbc1e0a1ba4ae03d96fc2eb687fafb1eac3b1dae5b1fa87634ccfa388d558e3cab1e6a3c69a177dfc53957520c879e4b3d84d78761019a3a29f1164e1f586fa710234ae22f31401ef236de305d87af1cd3072059a1c3e1a2ec0fb128fafaed24beaccc7720631c35b5a3f3f3657ea98f222e3d21cdf243bc731ae4ad86bd68fe891db1055f1ca1b1325fd0134bd54c30e7650e80f309e230fcbbb7e44742c45be4f90f6238abb70e87859881d6c1d72d797f8a15b7ddd7086723fa251b88917a8f423c24e687b5683b174ca7d96e2be58a1ed790d44d8d09758d1bb426c61e134f5258647f6808f778daceffbf782f7a8db2b1b0fdafb123fa62ccebbfb121f74bee4500ff65e435fe2e23bc400b68fb527b6de02545ead5affbe9be071fce05920f57e22767a841fedef295e4212ef417018f3af97df9c20f80eaf7efab229095e84abc968197ac753b87e7d7f594d7e07562fefafebf0740c7877a8c25ccbbcfe07da30f329a1441ce20000000049454e44ae426082),
(6, 'test', 'test', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj_kutusu`
--

CREATE TABLE `mesaj_kutusu` (
  `mesaj_id` int(11) NOT NULL,
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `ad` varchar(40) NOT NULL,
  `soyad` varchar(40) NOT NULL,
  `mesaj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `mesaj_kutusu`
--

INSERT INTO `mesaj_kutusu` (`mesaj_id`, `tarih`, `ad`, `soyad`, `mesaj`) VALUES
(1, '2022-08-03 09:24:45', 'Furkan', 'Çelik', '123123abcabc'),
(2, '2022-08-05 09:46:31', 'Yasin Birkan', 'ÇELEBİ', 'konserlerin devamını bekliyoruz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `onay_bekleyen_etkinlik`
--

CREATE TABLE `onay_bekleyen_etkinlik` (
  `id` int(11) NOT NULL,
  `tarih` varchar(17) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `baslik` varchar(40) NOT NULL,
  `aciklama` varchar(250) NOT NULL,
  `gorevli_personel_id` int(11) NOT NULL,
  `gorsel` varchar(400) NOT NULL,
  `durum` enum('-1','0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personeller`
--

CREATE TABLE `personeller` (
  `id` int(11) NOT NULL,
  `ad` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyad` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `personeller`
--

INSERT INTO `personeller` (`id`, `ad`, `soyad`) VALUES
(1, 'ahmet', 'demir'),
(2, 'mehmet', 'pektaş'),
(4, 'ibrahim', 'kara'),
(5, 'gülçin', 'arı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reddedilmis_etkinlik`
--

CREATE TABLE `reddedilmis_etkinlik` (
  `id` int(11) NOT NULL,
  `tarih` varchar(17) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `baslik` varchar(40) NOT NULL,
  `aciklama` varchar(250) NOT NULL,
  `gorevli_personel_id` int(11) NOT NULL,
  `gorsel` varchar(400) NOT NULL,
  `durum` enum('-1','0','1') NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `etkinlikler`
--
ALTER TABLE `etkinlikler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `gorevli_personel_id` (`gorevli_personel_id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD UNIQUE KEY `tc_unique` (`tc`);

--
-- Tablo için indeksler `kullanici_oturum_bilgisi`
--
ALTER TABLE `kullanici_oturum_bilgisi`
  ADD UNIQUE KEY `sifre` (`sifre`),
  ADD KEY `id` (`id`);

--
-- Tablo için indeksler `kullanici_profili`
--
ALTER TABLE `kullanici_profili`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Tablo için indeksler `mesaj_kutusu`
--
ALTER TABLE `mesaj_kutusu`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `onay_bekleyen_etkinlik`
--
ALTER TABLE `onay_bekleyen_etkinlik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`,`gorevli_personel_id`),
  ADD KEY `gorevli_personel._id` (`gorevli_personel_id`);

--
-- Tablo için indeksler `personeller`
--
ALTER TABLE `personeller`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `reddedilmis_etkinlik`
--
ALTER TABLE `reddedilmis_etkinlik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`,`gorevli_personel_id`),
  ADD KEY `gorevli_personel._id` (`gorevli_personel_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `etkinlikler`
--
ALTER TABLE `etkinlikler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici_profili`
--
ALTER TABLE `kullanici_profili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `mesaj_kutusu`
--
ALTER TABLE `mesaj_kutusu`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `onay_bekleyen_etkinlik`
--
ALTER TABLE `onay_bekleyen_etkinlik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Tablo için AUTO_INCREMENT değeri `personeller`
--
ALTER TABLE `personeller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `reddedilmis_etkinlik`
--
ALTER TABLE `reddedilmis_etkinlik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `etkinlikler`
--
ALTER TABLE `etkinlikler`
  ADD CONSTRAINT `etkinlikler_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `etkinlikler_ibfk_2` FOREIGN KEY (`gorevli_personel_id`) REFERENCES `personeller` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `kullanici_oturum_bilgisi`
--
ALTER TABLE `kullanici_oturum_bilgisi`
  ADD CONSTRAINT `kullanici_oturum_bilgisi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `kullanici_profili` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `onay_bekleyen_etkinlik`
--
ALTER TABLE `onay_bekleyen_etkinlik`
  ADD CONSTRAINT `onay_bekleyen_etkinlik_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `onay_bekleyen_etkinlik_ibfk_2` FOREIGN KEY (`gorevli_personel_id`) REFERENCES `personeller` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `reddedilmis_etkinlik`
--
ALTER TABLE `reddedilmis_etkinlik`
  ADD CONSTRAINT `reddedilmis_etkinlik_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reddedilmis_etkinlik_ibfk_2` FOREIGN KEY (`gorevli_personel_id`) REFERENCES `personeller` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

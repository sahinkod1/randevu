<!doctype html>
<html lang="en">
  <head>
    <?php
        ob_start();
        session_start();
        include("./baglan.php");
    ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KULLANICI PANELİ</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

  <nav class="navbar navbar-light bg-dark">
  <form class="container-fluid justify-content-start">
  <a class="btn btn-outline-success me-2" type="button" href="./admin.php">Kullanıcılar </a>
    <a class="btn btn-outline-success me-2" type="button" href="./danismanlar.php">Danışmanlar </a>
    <a class="btn btn-outline-success me-2" type="button" href="./iptal-randevu.php">İptal Randevu </a>
    <a class="btn btn-outline-success me-2" type="button" href="./danisman-randevu.php">Danışman Randevu Programı </a>
    <a class="btn btn-outline-success me-2" type="button" href="./gelinmeyen-randevu.php">Katılım Sağlanmayan Randevular </a>
    <a class="btn btn-outline-success me-2" type="button" href="./danisman-istatistik.php">Danışman İstatistik </a>
  </form>
</nav>

    <?php
            $uyesorgula = $db->prepare("SELECT * FROM kullanicilar WHERE kadi=:kullaniciadi");
            $uyesorgula->execute(array(
                'kullaniciadi' => $_SESSION['kadi']
            ));
            $say=$uyesorgula->rowcount();
            $uyecek=$uyesorgula->fetch(PDO::FETCH_ASSOC);
            $yetkino=$uyecek['k_yetki'];
              ?> 
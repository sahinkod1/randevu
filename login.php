<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GİRİŞ EKRANI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    


  <!-- GİRİŞ YAPMA FORMU VE KAYIT OL BUTONU -->
<div class="container">
    <form action="islem.php" method="POST">
  <div class="mb-3">
    <label >Kullanıcı Adı</label>
    <input type="text" class="form-control" name="kadi" placeholder="Kullanıcı adınızı girin..">
  </div>
  <div class="mb-3">
    <label >Şifre</label>
    <input type="password" class="form-control" name="pass" placeholder="Şifrenizi girin.."> 
  </div>

  <div class="mb-3 form-check">
    <input type="checkbox" name="beni_hatirla" class="form-check-input" >
    <label class="form-check-label" >Beni Hatırla</label>
  </div>
  <button type="submit" name="kullanici_giris" class="btn btn-primary">Giriş Yap</button>
  <a href="http://localhost/randevu/kayit.php">KAYIT OL</a> 
</form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
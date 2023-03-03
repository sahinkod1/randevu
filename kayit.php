<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KAYIT OL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  <!-- kullanıcı kayıt formu  -->
<div class="container">
  <form action="islem.php" method="POST">
    <div class="mb-3">
        <label >Kullanıcı Adı</label>
        <input type="text" class="form-control" name="kadi" placeholder="Kullanıcı adınızı girin..">
    </div>
    <div class="mb-3">
        <label >Ad</label>
        <input type="text" class="form-control" name="k_ad" placeholder="Adınızı giriniz..">
    </div>
    <div class="mb-3">
        <label >Soyad</label>
        <input type="text" class="form-control" name="k_soyad" placeholder="Soyadınızı giriniz..">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control"  name="k_mail">
  
    </div>
    <div class="mb-3">
        <label >Şifre</label>
        <input type="password" class="form-control" name="pass1" placeholder="Şifrenizi girin.."> 
    </div>
    <div class="mb-3">
        <label >Şifre</label>
        <input type="password" class="form-control" name="pass2" placeholder="Şifrenizi girin.."> 
    </div>
  <button type="submit" class="btn btn-primary" name="uyekayit">Kayıt Ol</button>
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
<?php include 'a-header.php'; ?>

<?php 
if(isset($_GET['durum'])) {
if ($_GET['durum']=="ok") {?>

<b style="color:green;">İşlem Başarılı...</b>

<?php } elseif ($_GET['durum']=="no") {?>

<b style="color:red;">İşlem Başarısız...</b>

<?php } 
}
?>
<?php
            if($yetkino==1){ 


                $uyeduzenle = $db->prepare("SELECT * FROM kullanicilar WHERE k_id=:kid");
                $uyeduzenle->execute(array(
                'kid' => $_GET['k_id']
                    ));
                
                $uye=$uyeduzenle->fetch(PDO::FETCH_ASSOC);

                
                ?>

            

            <div class="container">
                <form action="../islem.php" method="POST">
                    <div class="mb-3">
                        <label >ID </label>
                        <input type="hidden" name="k_id" value="<?php echo $uye['k_id'] ?>"> 
                    </div>
                    <div class="mb-3">
                        <label >Kullanıcı Adı </label>
                        <input type="text" class="form-control" name="kadi"  value="<?php echo $uye["kadi"]; ?>" >
                    </div>
                    <div class="mb-3">
                        <label >AD </label>
                        <input type="text" class="form-control" name="k_ad"  value="<?php echo $uye["k_ad"]; ?>" >
                    </div>
                    <div class="mb-3">
                        <label >SOYAD </label>
                        <input type="text" class="form-control" name="k_soyad"  value="<?php echo $uye["k_soyad"]; ?>" >
                    </div>
                    <div class="mb-3">
                        <label >MAİL </label>
                        <input type="text" class="form-control" name="k_mail"  value="<?php echo $uye["k_mail"]; ?>" >
                    </div>
                    <div class="mb-3">
                        <label >Yetki </label>
                        <input type="text" class="form-control" name="k_yetki"  value="<?php echo $uye["k_yetki"]; ?>" >
                    </div>
                    
                    <button type="submit" name="kullaniciduzenle" class="btn btn-primary">Düzenle</button>
                    
                </form>
            </div>



            <?php    
                }
            ?>













<a href="logout.php" ><button type="button" class="btn btn-danger">Çıkış Yap</button> </a>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
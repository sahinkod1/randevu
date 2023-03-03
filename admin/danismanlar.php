<?php include 'a-header.php'; ?>
<?php 
 if($yetkino==1){  

  if(isset($_GET['durum'])) {
    if ($_GET['durum']=="ok") {?>

    <b style="color:green;">Randevu Oluşturuldu...</b>


<?php }
else { ?>
   <b style="color:red;">Daha önceden randevu oluşturulmuş...</b>
<?php }
}

if(isset($_GET['rduz'])) {
  if ($_GET['rduz']=="ok") {?>

  <b style="color:green;">Randevu Düzenlendi...</b>


<?php }
else { ?>
 <b style="color:red;">Randevu düzenleme başarısız...</b>
<?php }
}

  


  
    $uyeCek = $db->prepare("SELECT * FROM kullanicilar WHERE k_yetki=2");
    $uyeCek->execute();
     ?> <table style="width:50%" class="table table-bordered border-primary"> 
          <thead>
            <tr>
              <th scope="col"><?php echo "ID" ; ?></th>
              <th scope="col"><?php echo "Danışman AD" ; ?></th>
              <th scope="col"><?php echo "Danışman SOYAD"; ?></th>
              <th scope="col"><?php echo "KULLANICI ADI"; ?></th>
              <th scope="col"><?php echo "MAİL"; ?></th>
              <th scope="col"><?php echo "YETKİ"; ?></th>
              <th scope="col"><?php echo "Randevu Oluştur"; ?></th>
              <th scope="col"><?php echo "Randevu Düzenle"; ?></th>
              <th scope="col"><?php echo "DÜZENLE"; ?></th>
              <th scope="col"><?php echo "SİL"; ?></th>
            </tr>
          </thead>
      <?php
    while ($cikti = $uyeCek->fetch(PDO::FETCH_ASSOC)) { ?>
      
        <thead>
          <tr>
            <th scope="col"><?php echo $cikti["k_id"] ; ?></th>
            <th scope="col"><?php echo $cikti["k_ad"] ; ?></th>
            <th scope="col"><?php echo $cikti["k_soyad"]; ?></th>
            <th scope="col"><?php echo $cikti["kadi"]; ?></th>
            <th scope="col"><?php echo $cikti["k_mail"]; ?></th>
            <th scope="col"><?php echo $cikti["k_yetki"]; ?></th>
            <th scope="col"><a class="button" href="danisman-randevu.php?k_id=<?php echo $cikti["k_id"]; ?> "><button type="button" class="btn btn-primary">Randevu Oluştur</button></a></th>
            <th scope="col"><a class="button" href="danisman-randevu-duzenle.php?k_id=<?php echo $cikti["k_id"]; ?> "><button type="button" class="btn btn-primary">Randevu Düzenle</button></a></th>
            <th scope="col"><a class="button" href="kullanici-duzenle.php?k_id=<?php echo $cikti["k_id"]; ?> "><button type="button" class="btn btn-primary">Düzenle</button></a></th>
            <th scope="col"><a class="button" href="../islem.php?k_id=<?php echo $cikti['k_id']; ?>&kullanicisil=ok "><button type="button" class="btn btn-danger">SİL</button></a></th>
          </tr>
        </thead>
    
       <?php  }  ?>   
        </table>


<?php
    }
     ?>

<?php 
if(isset($_GET['sil'])) {
  if ($_GET['sil']=="ok") {?>

  <b style="color:green;">İşlem Başarılı...</b>


<?php } 
}
?>



<?php include 'a-footer.php'; ?>
<?php include 'd-header.php'; ?>
<?php
if($yetkino==2){   

    $d_id = $uyecek['k_id'];
    $dCek = $db->prepare("SELECT * FROM kullanicilar WHERE k_yetki=2 and k_id=$d_id");
    $dCek->execute();

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


     ?> <table style="width:50%" class="table table-bordered border-primary"> 
          <thead>
            <tr>
              <th scope="col"><?php echo "ID" ; ?></th>
              <th scope="col"><?php echo "Danışman AD" ; ?></th>
              <th scope="col"><?php echo "Danışman SOYAD"; ?></th>
              <th scope="col"><?php echo "KULLANICI ADI"; ?></th>
              <th scope="col"><?php echo "MAİL"; ?></th>
              <th scope="col"><?php echo "YETKİ"; ?></th>
              <th scope="col"><?php echo "RANDEVU DURUMU"; ?></th>
              <th scope="col"><?php echo "Randevu Oluştur"; ?></th>
              <th scope="col"><?php echo "Randevu Düzenle"; ?></th>
            </tr>
          </thead>
      <?php
    while ($cikti = $dCek->fetch(PDO::FETCH_ASSOC)) { ?>
      
        <thead>
          <tr>
            <th scope="col"><?php echo $cikti["k_id"] ; ?></th>
            <th scope="col"><?php echo $cikti["k_ad"] ; ?></th>
            <th scope="col"><?php echo $cikti["k_soyad"]; ?></th>
            <th scope="col"><?php echo $cikti["kadi"]; ?></th>
            <th scope="col"><?php echo $cikti["k_mail"]; ?></th>
            <th scope="col"><?php echo $cikti["k_yetki"]; ?></th>
            <th scope="col"><?php echo $cikti["k_randevu"]; ?></th>
            <th scope="col"><a class="button" href="danisman-randevu.php?k_id=<?php echo $cikti["k_id"]; ?> "><button type="button" class="btn btn-primary">Randevu Oluştur</button></a></th>
            <th scope="col"><a class="button" href="danisman-randevu-duzenle.php?k_id=<?php echo $cikti["k_id"]; ?> "><button type="button" class="btn btn-primary">Randevu Düzenle</button></a></th>
          </tr>
        </thead>
    
       <?php  }  ?>   
        </table>
    
    
    



















<?php } ?>





<?php include 'd-footer.php'; ?>
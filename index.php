<?php include 'header.php'; ?>
<?php 
if($yetkino==3) {
  $randevuDurum = $uyecek['k_randevu'] ;


  if($randevuDurum==0) {

    
    $dCek = $db->prepare("SELECT * FROM kullanicilar WHERE k_yetki=2");
    $dCek->execute();

    ?> <table style="width:50%" class="table table-bordered border-primary"> 
    <thead>
      <tr>
        <th scope="col"><?php echo "Danışman AD" ; ?></th>
        <th scope="col"><?php echo "Danışman SOYAD"; ?></th>
        <th scope="col"><?php echo "Randevu Oluştur"; ?></th>
      </tr>
    </thead>
<?php
while ($cikti = $dCek->fetch(PDO::FETCH_ASSOC)) { ?>

  <thead>
    <tr>
      <th scope="col"><?php echo $cikti["k_ad"] ; ?></th>
      <th scope="col"><?php echo $cikti["k_soyad"]; ?></th>
      <th scope="col"><a class="button" href="randevu-olustur.php?k_id=<?php echo $cikti["k_id"]; ?> "><button type="button" class="btn btn-primary">Randevu Oluştur</button></a></th>
    </tr>
  </thead>

 <?php  }  ?>   
  </table>



























<?php
  }
  else{






  }


}
?>




<?php include 'footer.php'; ?>
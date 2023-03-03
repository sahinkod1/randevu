<?php include 'a-header.php'; ?>
<?php
            if($yetkino==1){  
              $uyeCek = $db->prepare("SELECT * FROM kullanicilar");
              $uyeCek->execute();
               ?> <table style="width:50%" class="table table-bordered border-primary"> 
                    <thead>
                      <tr>
                        <th scope="col"><?php echo "ID" ; ?></th>
                        <th scope="col"><?php echo "AD" ; ?></th>
                        <th scope="col"><?php echo "SOYAD"; ?></th>
                        <th scope="col"><?php echo "KULLANICI ADI"; ?></th>
                        <th scope="col"><?php echo "MAİL"; ?></th>
                        <th scope="col"><?php echo "YETKİ"; ?></th>
                        <th scope="col"><?php echo "RANDEVU DURUMU"; ?></th>
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
                      <th scope="col"><?php echo $cikti["k_randevu"]; ?></th>
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
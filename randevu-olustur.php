<?php include 'header.php'; ?>
<?php
if($yetkino==3) {

   $d_id = $_GET['k_id'] ;

echo $d_id ;

    $ilkGun = date("Y-m-d",strtotime('monday next week'));
    $sayac = 0 ;
    $day = date('Y-m-d',strtotime($ilkGun. ' + '.$sayac.' days'));
    ?>

<div class="container">
    <form action="./islem.php" method="POST">
        <table style="width:50%" class="table table-bordered border-primary"> 
            <thead>
                                <?php $dongu=1 ; ?>
                <tr>
                        <?php while($dongu < "33"){   ?>
                    <th scope="col"><?php echo $dongu ; ?></th> 
                    <?php $dongu++; }  ?>
                    
                </tr> 
                    
<?php


    while ($sayac < 5) {
    $randevuDuzenle = $db->prepare("SELECT * FROM randevu WHERE k_id=:kid and date=:day");
    $randevuDuzenle->execute(array(
    'kid' => $_GET['k_id'],
    'day' => date('Y-m-d',strtotime($ilkGun. ' + '.$sayac.' days'))
         ));

    
    $rDuz=$randevuDuzenle->fetch(PDO::FETCH_ASSOC);
    echo $rDuz['randevu_id'];
    
   
?>
                     
                  
                 
                <tr>
                <input type="hidden" name="date<?php echo $sayac ?>" value="<?php echo date('Y-m-d',strtotime($ilkGun. ' + '.$sayac.' days')); ?> ">
                    <input type="hidden" name="k_id" value="<?php echo $d_id ?>"> 
                    <input type="hidden" name="yetki_no" value="<?php echo $yetkino ?>">
                    <input type="hidden" name="randevu_id<?php echo $sayac ; ?>" value="<?php echo $rDuz['randevu_id'] ?>"> 
                        <?php for ($i=1; $i < 33 ; $i++) {   ?>
                            <?php if($rDuz['kutu'.$i]==1){  ?>
                    <th scope="col"><input class="form-check-input mt-1" name="dat<?php echo $sayac ; ?>kutu<?php echo $i ; ?>" type="checkbox" value="2"   ></th> <?php } ?>
                    <?php if($rDuz['kutu'.$i]==0){  ?>
                        <th scope="col"><input class="form-check-input mt-1" name="dat<?php echo $sayac ; ?>kutu<?php echo $i ; ?>" type="checkbox" value="0"  disabled ></th> <?php } ?>
                        <?php } ?>
                        <th scope="col"><?php echo date('Y-m-d',strtotime($ilkGun. ' + '.$sayac.' days')); ?></th>
                </tr>
                    
       
<?php 
    $sayac++;
    }
    ?>
    </thead>
       
    </table>
    <button type="submit" name="randevuAl" class="btn btn-primary">Randevu Oluştur</button>
    </form>
    </div>






?>





<?php } ?>

<?php include 'footer.php'; ?>
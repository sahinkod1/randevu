<?php include 'd-header.php'; ?>
<?php  
if($yetkino==2) {
date_default_timezone_set('Europe/Istanbul');
$ilkGun = date("Y-m-d",strtotime('monday next week')); echo "</br>";

$sayac = "0";

$kullanici_id = $_GET['k_id']; 

?>
<div class="container">
                <form action="../islem.php" method="POST">
    <table style="width:50%" class="table table-bordered border-primary"> 
        <thead>
            <?php while($sayac < "5" ) { 
                    $dongu=1;
            ?>
                <tr>
                      <?php while($dongu < "33"){   ?>
                        <th scope="col"><?php echo $dongu ; ?></th> 
                                    <?php $dongu++ ; } ?>
                        <th scope="col"><?php echo date('Y-m-d',strtotime($ilkGun. ' + '.$sayac.' days')); ?></th> 
                        <input type="hidden" name="date<?php echo $sayac ?>" value="<?php echo date('Y-m-d',strtotime($ilkGun. ' + '.$sayac.' days')); ?> ">
                        <input type="hidden" name="k_id" value="<?php echo $kullanici_id ?>">
                        <input type="hidden" name="yetki_no" value="<?php echo $yetkino ?>"> 
                </tr>  
                <tr>
                    <?php for ($i=1; $i < 33 ; $i++) {   ?>
                        <th scope="col"><input class="form-check-input mt-1" name="dat<?php echo $sayac ; ?>kutu<?php echo $i ; ?>" type="checkbox" value="1" checked></th> 
                                    <?php } ?>
                </tr>
                    <?php $sayac++; } ?>
                    </thead>
                   
    </table>
    <button type="submit" name="randevuOlustur" class="btn btn-primary">Oluştur</button>
    </form>
</div>






<?php } ?>
<?php include 'd-footer.php'; ?>
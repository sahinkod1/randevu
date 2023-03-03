<?php
ob_start();
session_start();
include("baglan.php");

// kayit.php ALANI --UYELİK KAYITLARININ OLUŞTURULDUĞU PDO ALANI
if(isset($_POST['uyekayit'])) {

    $kullaniciad = $_POST['kadi'];
    $k_ad= $_POST['k_ad'];
    $k_soyad=$_POST['k_soyad'];
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    $k_mail=$_POST['k_mail'];

    if($pass1==$pass2){

        $kullanicisor=$db->prepare("SELECT * FROM kullanicilar WHERE kadi=:kullaniciad");
        $kullanicisor->execute(array(
            'kullaniciad' => $kullaniciad
        ));

        $say=$kullanicisor->rowcount();

            if($say==0){

                $password=md5($pass1);
                $kullanici_yetki=1;
               
                $kullanicikaydet=$db->prepare("INSERT INTO kullanicilar SET 
                    k_ad=:k_ad,
                    k_soyad=:k_soyad,
                    kadi=:kadi,
                    pass=:pass,
                    k_yetki=:k_yetki,
                    k_mail=:k_mail");
                $insert=$kullanicikaydet->execute(array(
                    'k_ad' => $k_ad,
                    'k_soyad' => $k_soyad,
                    'kadi' => $kullaniciad,
                    'pass' => $password,
                    'k_mail' => $k_mail,
                    'k_yetki' => $kullanici_yetki
                ));

                if ($insert){
                    header("location:login.php");
                    exit;
                }
        




            }

    } else {
        header("location:kayit.php");
        exit;
    }



}


// LOGİN.PHP ALANI...KULLANICIADI VE ŞİFRE UYUMLULUĞU ALANI.

if(isset($_POST['kullanici_giris'])) {

    $username = $_POST["kadi"];
    $password = md5($_POST["pass"]);
    $login = $db->prepare("SELECT * FROM kullanicilar WHERE kadi=? AND pass=?");
            $login->execute(array($username, $password));
            $l = $login->fetch(PDO::FETCH_ASSOC);

            if($l){
                echo '<span style="color:blue;">Giriş Başarılı</span>';
                $_SESSION["kadi"] = $username ;
                header("location:index.php");
                exit;

            } else{
                echo '<span style="color:red;">Kullanıcıadı Şifrenizi Hatalı Girdiniz</span>';
            }

    echo "deneme";


    //BENİ HATIRLA CHECHBOXI'I ÇALIŞTIRAN SETCOOKİLER
    if(isset($_POST['beni_hatirla'])){

        setcookie("kadi","",strtotime("+1 day")) ;

     } else {

        setcookie("kadi","",strtotime("-1 day")) ;

     }


} 
// kullanıc düzenleme
if (isset($_POST['kullaniciduzenle'])) {
    
	$k_id=$_POST['k_id'];

	$duzenle=$db->prepare("UPDATE kullanicilar SET
		kadi=:kadi,
		k_ad=:k_ad,
		k_soyad=:k_soyad,
        k_mail=:k_mail,
        k_yetki=:k_yetki
		WHERE k_id={$_POST['k_id']}");

	$update=$duzenle->execute(array(
		'kadi' => $_POST['kadi'],'k_ad' => $_POST['k_ad'],'k_soyad' => $_POST['k_soyad'],'k_mail' => $_POST['k_mail'],
        'k_yetki' => $_POST['k_yetki']
		));


	if ($update) {

		Header("Location:../randevu/admin/kullanici-duzenle.php?k_id=$k_id&durum=ok");

	} else {

		Header("Location:../randevu/admin/kullanici-duzenle.php?k_id=$k_id&durum=no");
	}

}
 
if ($_GET['kullanicisil']=="ok") {

	$sil=$db->prepare("DELETE from kullanicilar where k_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['k_id']
		));


	if ($kontrol) {


		header("location:../randevu/admin/admin.php?sil=ok");


	} else {

		header("location:../randevu/admin/admin.php?sil=no");

	}


}

if (isset($_POST['randevuOlustur'])) {
    $sayac = 0 ;
    $dongu1=0;
    $say = 0 ;
    $yetkino = $_POST['yetki_no'];


    $randevuSor=$db->prepare("SELECT * FROM randevu WHERE k_id=:k_id and date=:date");
    $randevuSor->execute(array(
        'k_id' => $_POST['k_id'],
        'date' => $_POST['date0']

    ));

    $say=$randevuSor->rowcount();
    echo $say ;
    echo "</br>";
if ($say==0){
while($dongu1 < 5){
    $dongu2=1;
    while($dongu2 < 33) {
    if (!isset($_POST['dat'.$dongu1.'kutu'.$dongu2])) {
        $_POST['dat'.$dongu1.'kutu'.$dongu2] = 0 ;
    } 
    $dongu2++;
    }
    $dongu1++;
}




    while($sayac < 5) {
        $randevukaydet=$db->prepare("INSERT INTO randevu SET 
        kutu1=:kutu1,kutu2=:kutu2,kutu3=:kutu3,kutu4=:kutu4,kutu5=:kutu5,kutu6=:kutu6,kutu7=:kutu7,kutu8=:kutu8,
        kutu9=:kutu9,kutu10=:kutu10,kutu11=:kutu11,kutu12=:kutu12,kutu13=:kutu13,kutu14=:kutu14,kutu15=:kutu15,kutu16=:kutu16,
        kutu17=:kutu17,kutu18=:kutu18,kutu19=:kutu19,kutu20=:kutu20,kutu21=:kutu21,kutu22=:kutu22,kutu23=:kutu23,kutu24=:kutu24,
        kutu25=:kutu25,kutu26=:kutu26,kutu27=:kutu27,kutu28=:kutu28,kutu29=:kutu29,kutu30=:kutu30,kutu31=:kutu31,kutu32=:kutu32,
        k_id=:k_id,
        date=:date");
    $insert=$randevukaydet->execute(array(
        'kutu1' => $_POST['dat'.$sayac.'kutu1'],'kutu2' => $_POST['dat'.$sayac.'kutu2'],'kutu3' => $_POST['dat'.$sayac.'kutu3'],'kutu4' => $_POST['dat'.$sayac.'kutu4'],
        'kutu5' => $_POST['dat'.$sayac.'kutu5'],'kutu6' => $_POST['dat'.$sayac.'kutu6'],'kutu7' => $_POST['dat'.$sayac.'kutu7'],'kutu8' => $_POST['dat'.$sayac.'kutu8'],
        'kutu9' => $_POST['dat'.$sayac.'kutu9'],'kutu10' => $_POST['dat'.$sayac.'kutu10'],'kutu11' => $_POST['dat'.$sayac.'kutu11'],'kutu12' => $_POST['dat'.$sayac.'kutu12'],
        'kutu13' => $_POST['dat'.$sayac.'kutu13'],'kutu14' => $_POST['dat'.$sayac.'kutu14'],'kutu15' => $_POST['dat'.$sayac.'kutu15'],'kutu16' => $_POST['dat'.$sayac.'kutu16'],
        'kutu17' => $_POST['dat'.$sayac.'kutu17'],'kutu18' => $_POST['dat'.$sayac.'kutu18'],'kutu19' => $_POST['dat'.$sayac.'kutu19'],'kutu20' => $_POST['dat'.$sayac.'kutu20'],
        'kutu21' => $_POST['dat'.$sayac.'kutu21'],'kutu22' => $_POST['dat'.$sayac.'kutu22'],'kutu23' => $_POST['dat'.$sayac.'kutu23'],'kutu24' => $_POST['dat'.$sayac.'kutu24'],
        'kutu25' => $_POST['dat'.$sayac.'kutu25'],'kutu26' => $_POST['dat'.$sayac.'kutu26'],'kutu27' => $_POST['dat'.$sayac.'kutu27'],'kutu28' => $_POST['dat'.$sayac.'kutu28'],
        'kutu29' => $_POST['dat'.$sayac.'kutu29'],'kutu30' => $_POST['dat'.$sayac.'kutu30'],'kutu31' => $_POST['dat'.$sayac.'kutu31'],'kutu32' => $_POST['dat'.$sayac.'kutu32'],
        'k_id' => $_POST['k_id'],
        'date' => $_POST['date'.$sayac]
    ));
   
    $sayac++;
    }
   
}
if($yetkino==1) {
if ($insert) {


    header("location:../randevu/admin/danismanlar.php?durum=ok");
    exit;


} else {

    header("location:../randevu/admin/danismanlar.php?durum=no");
    exit;

}
}   else {
    if ($insert) {


        header("location:../randevu/danisman/danisman.php?durum=ok");
        exit;
    
    
    } else {
    
        header("location:../randevu/danisman/danisman.php?durum=no");
        exit;
    
    }

}





}



if (isset($_POST['randevuDuzenle'])) {
    $randevu_id = $_POST['randevu_id0'];
    $yetkino = $_POST['yetki_no'];
    $k_id = $_POST['k_id'];
    $sayac = 0 ;
    $dongu1=0;
    $say = 0 ;
	while($dongu1 < 5){
        $dongu2=1;
        while($dongu2 < 33) {
        if (!isset($_POST['dat'.$dongu1.'kutu'.$dongu2])) {
            $_POST['dat'.$dongu1.'kutu'.$dongu2] = 0 ;
        } 
        $dongu2++;
        }
        $dongu1++;
    }
   


    while($sayac < 5) {
        echo $_POST['date'.$sayac];
        echo "</br>" ;
	$rDuzenle=$db->prepare("UPDATE randevu SET
		kutu1=:kutu1,kutu2=:kutu2,kutu3=:kutu3,kutu4=:kutu4,kutu5=:kutu5,kutu6=:kutu6,kutu7=:kutu7,kutu8=:kutu8,
        kutu9=:kutu9,kutu10=:kutu10,kutu11=:kutu11,kutu12=:kutu12,kutu13=:kutu13,kutu14=:kutu14,kutu15=:kutu15,kutu16=:kutu16,
        kutu17=:kutu17,kutu18=:kutu18,kutu19=:kutu19,kutu20=:kutu20,kutu21=:kutu21,kutu22=:kutu22,kutu23=:kutu23,kutu24=:kutu24,
        kutu25=:kutu25,kutu26=:kutu26,kutu27=:kutu27,kutu28=:kutu28,kutu29=:kutu29,kutu30=:kutu30,kutu31=:kutu31,kutu32=:kutu32
		WHERE randevu_id=$randevu_id");

	$rDuz=$rDuzenle->execute(array(
		'kutu1' => $_POST['dat'.$sayac.'kutu1'],'kutu2' => $_POST['dat'.$sayac.'kutu2'],'kutu3' => $_POST['dat'.$sayac.'kutu3'],'kutu4' => $_POST['dat'.$sayac.'kutu4'],
        'kutu5' => $_POST['dat'.$sayac.'kutu5'],'kutu6' => $_POST['dat'.$sayac.'kutu6'],'kutu7' => $_POST['dat'.$sayac.'kutu7'],'kutu8' => $_POST['dat'.$sayac.'kutu8'],
        'kutu9' => $_POST['dat'.$sayac.'kutu9'],'kutu10' => $_POST['dat'.$sayac.'kutu10'],'kutu11' => $_POST['dat'.$sayac.'kutu11'],'kutu12' => $_POST['dat'.$sayac.'kutu12'],
        'kutu13' => $_POST['dat'.$sayac.'kutu13'],'kutu14' => $_POST['dat'.$sayac.'kutu14'],'kutu15' => $_POST['dat'.$sayac.'kutu15'],'kutu16' => $_POST['dat'.$sayac.'kutu16'],
        'kutu17' => $_POST['dat'.$sayac.'kutu17'],'kutu18' => $_POST['dat'.$sayac.'kutu18'],'kutu19' => $_POST['dat'.$sayac.'kutu19'],'kutu20' => $_POST['dat'.$sayac.'kutu20'],
        'kutu21' => $_POST['dat'.$sayac.'kutu21'],'kutu22' => $_POST['dat'.$sayac.'kutu22'],'kutu23' => $_POST['dat'.$sayac.'kutu23'],'kutu24' => $_POST['dat'.$sayac.'kutu24'],
        'kutu25' => $_POST['dat'.$sayac.'kutu25'],'kutu26' => $_POST['dat'.$sayac.'kutu26'],'kutu27' => $_POST['dat'.$sayac.'kutu27'],'kutu28' => $_POST['dat'.$sayac.'kutu28'],
        'kutu29' => $_POST['dat'.$sayac.'kutu29'],'kutu30' => $_POST['dat'.$sayac.'kutu30'],'kutu31' => $_POST['dat'.$sayac.'kutu31'],'kutu32' => $_POST['dat'.$sayac.'kutu32']
		));
        $sayac++;
        $randevu_id++;
        print_r($rDuzenle) ;
    }
    
    if($yetkino==1){
    if ($rDuz) {

		Header("Location:../randevu/admin/danismanlar.php?k_id=$k_id&rduz=ok");
        

	} else {

		Header("Location:../randevu/admin/danismanlar.php?k_id=$k_id&rduz=no");
       
	}} else {
        if ($rDuz) {

            Header("Location:../randevu/danisman/danisman.php?k_id=$k_id&rduz=ok");
            
    
        } else {
    
            Header("Location:../randevu/danisman/danisman.php?k_id=$k_id&rduz=no");
           
        }


    }

	

}


if (isset($_POST['randevuAl'])) { 
$dat=0;

$sayac=0;

 while ($dat<5) { 
    $kutu=1;
    while ($kutu<33) {
        if (isset($_POST['dat'.$dat.'kutu'.$kutu])) {
            $sayac++;
            $randSaat = "dat".$dat."kutu".$kutu;
        }
       $kutu++;
    }




    $dat++; 
 }

echo $sayac;
echo $randSaat ;

}


?>
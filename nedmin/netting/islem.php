<?php
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';






if (isset($_POST['admingiris'])) {

	$istifadeci_mail=$_POST['istifadeci_mail'];
	$istifadeci_password=md5($_POST['istifadeci_password']);

	$istifadeciaxtar=$db->prepare("SELECT * FROM istifadeci where istifadeci_mail=:mail and istifadeci_password=:password and istifadeci_role=:role");
	$istifadeciaxtar->execute(array(
		'mail' => $istifadeci_mail,
		'password' => $istifadeci_password,
		'role' => 5
		));

	echo $say=$istifadeciaxtar->rowCount();

	if ($say==1) {
				
		$_SESSION['istifadeci_mail']=$istifadeci_mail;
		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../production/login.php?status=no");
		exit;
	}
	

}



if (isset($_POST['logoduzenle'])) {

	

if ($_FILES['ayar_logo']['size']>1048576) {
	echo "Bu dosya boyutu cok boyuk";
	Header("Location:../production/genel-ayar.php?status=dosyabuyuk");
	
}


$izinli_uzantilar=array('jpg','gif','png');
$ext=strtolower(substr($_FILES['ayar_logo']["name"],strpos($_FILES['ayar_logo']["name"], '.')+1));

	if (in_array($ext, $izinli_uzantilar)===false) {
		echo "Bu uzanti kabul edilmiyor";
		Header("Location:../production/genel-ayar.php?durum=formathata");
	}



	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
		));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?status=ok");

	} else {

		Header("Location:../production/genel-ayar.php?status=no");
	}

}










/*


if (isset($_POST['genelayarkaydet'])) {
$ayarkaydet=$db->prepare("UPDATE ayar SET 
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");
	

	$update=$ayarkaydet->execute(array(
'ayar_title'=>$_POST['ayar_title'],
'ayar_description'=>$_POST['ayar_description'],
'ayar_keywords'=>$_POST['ayar_keywords'],
'ayar_author'=>$_POST['ayar_author']
	));
	
	if ($update) {
		header("Location:../production/genel-ayar.php?status=ok");
	}else  {
		header("Location:../production/genel-ayar.php?status=no");
	}

}

if (isset($_POST['iletisimayarkaydet'])) {
$ayarkaydet=$db->prepare("UPDATE ayar SET 
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=0");
	

	$update=$ayarkaydet->execute(array(
'ayar_tel'=>$_POST['ayar_tel'],
'ayar_gsm'=>$_POST['ayar_gsm'],
'ayar_faks'=>$_POST['ayar_faks'],
'ayar_mail'=>$_POST['ayar_mail'],
'ayar_adres'=>$_POST['ayar_adres'],
'ayar_mesai'=>$_POST['ayar_mesai']
	));
	
	if ($update) {
		header("Location:../production/iletisim-ayarlar.php?status=ok");
	}else  {
		header("Location:../production/iletisim-ayarlar.php?status=no");
	}

}



if (isset($_POST['apiayarkaydet'])) {
$ayarkaydet=$db->prepare("UPDATE ayar SET 
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");
	

	$update=$ayarkaydet->execute(array(
'ayar_analystic'=>$_POST['ayar_analystic'],
'ayar_maps'=>$_POST['ayar_maps'],
'ayar_zopim'=>$_POST['ayar_zopim']
	));
	
	if ($update) {
		header("Location:../production/api-ayarlar.php?status=ok");
	}else  {
		header("Location:../production/api-ayarlar.php?status=no");
	}

}







if (isset($_POST['hakkimizdakaydet'])) {
$ayarkaydet=$db->prepare("UPDATE haqqimizda SET 
		haqqimizda_basliq=:haqqimizda_basliq,
		haqqimizda_icerisi=:haqqimizda_icerisi,
		haqqimizda_video=:haqqimizda_video,
		haqqimizda_vizyon=:haqqimizda_vizyon,
		haqqimizda_misyon=:haqqimizda_misyon
		WHERE haqqimizda_id=0");
	

	$update=$ayarkaydet->execute(array(
'haqqimizda_basliq'=>$_POST['haqqimizda_basliq'],
'haqqimizda_icerisi'=>$_POST['haqqimizda_icerisi'],
'haqqimizda_video'=>$_POST['haqqimizda_video'],
'haqqimizda_vizyon'=>$_POST['haqqimizda_vizyon'],
'haqqimizda_misyon'=>$_POST['haqqimizda_misyon']
	));
	
	if ($update) {
		header("Location:../production/hakkimizda.php?status=ok");
	}else  {
		header("Location:../production/hakkimizda.php?status=no");
	}

}


*/


  ?>
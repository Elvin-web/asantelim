
<?php
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';




if (isset($_POST['telimcisekildeyisdir'])) {

$telimciler_id=$_POST['telimciler_id'];


if ($_FILES['telimciler_sekil']['size']>1048576) {
	echo "Bu dosya boyutu cok boyuk";
	Header("Location:../production/telimciler-deyisdir.php?status=dosyabuyuk");
	
}


$izinli_uzantilar=array('jpg','gif','png');
$ext=strtolower(substr($_FILES['telimciler_sekil']["name"],strpos($_FILES['telimciler_sekil']["name"], '.')+1));

	if (in_array($ext, $izinli_uzantilar)===false) {
		echo "Bu uzanti kabul edilmiyor";
		Header("Location:../production/telimciler-deyisdir.php?status=formathata");
	}

	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['telimciler_sekil']["tmp_name"];
	@$name = $_FILES['telimciler_sekil']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	$telimciler_id=$_POST['telimciler_id'];
	

	$duzenle=$db->prepare("UPDATE telimciler SET
		telimciler_sekil=:logo
		
	WHERE telimciler_id={$_POST['telimciler_id']}");
	    $update=$duzenle->execute(array(
		'logo' => $refimgyol
		));


if ($update) {
$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
		Header("Location:../production/telimciler-deyisdir.php?status=ok&telimciler_id=$telimciler_id");

	} else {

		Header("Location:../production/telimciler-deyisdir.php?status=no&telimciler_id=$telimciler_id");
	}


}


if (isset($_POST['telimcilerelaveet'])) {

$facebook=explode("@", $_POST['telimciler_facebook'], 2)[0];

	

	$kaydet=$db->prepare("INSERT INTO telimciler SET
		telimciler_adsoyad=:telimciler_adsoyad,
		telimciler_unvan=:telimciler_unvan,	
		telimciler_staj=:telimciler_staj,
		telimciler_tel=:telimciler_tel,
		telimciler_instagram=:telimciler_instagram,	
		telimciler_facebook=:telimciler_facebook,
        telimciler_mail=:telimciler_mail,
		active=:active
		");
	$insert=$kaydet->execute(array(
		'telimciler_adsoyad' => $_POST['telimciler_adsoyad'],
		'telimciler_unvan' => $_POST['telimciler_unvan'],
		'telimciler_staj' => $_POST['telimciler_staj'],
		'telimciler_tel' => $_POST['telimciler_tel'],
		'telimciler_instagram' => $_POST['telimciler_instagram'],
		'telimciler_facebook' => $facebook,
		'telimciler_mail' => $_POST['telimciler_mail'],
		'active' => $_POST['active']	
	));

	if ($insert) {

		Header("Location:../production/telimciler.php?status=ok");

	} else {

		Header("Location:../production/telimciler.php?status=no");
	}

}




if (isset($_POST['telimcilerdeyisdir'])) {

	$telimciler_id=$_POST['telimciler_id'];
	
$facebook=explode("@", $_POST['telimciler_facebook'], 2)[0];
	
	$kaydet=$db->prepare("UPDATE telimciler SET
		telimciler_adsoyad=:telimciler_adsoyad,
		telimciler_unvan=:telimciler_unvan,	
		telimciler_staj=:telimciler_staj,
		telimciler_tel=:telimciler_tel,
		telimciler_instagram=:telimciler_instagram,	
		telimciler_facebook=:telimciler_facebook,
        telimciler_mail=:telimciler_mail,
		active=:active
		WHERE telimciler_id={$_POST['telimciler_id']}");
	$update=$kaydet->execute(array(
		'telimciler_adsoyad' => $_POST['telimciler_adsoyad'],
		'telimciler_unvan' => $_POST['telimciler_unvan'],
		'telimciler_staj' => $_POST['telimciler_staj'],
		'telimciler_tel' => $_POST['telimciler_tel'],
		'telimciler_instagram' => $_POST['telimciler_instagram'],
		'telimciler_facebook' => $facebook,
		'telimciler_mail' => $_POST['telimciler_mail'],
		'active' => $_POST['active']		
		));

	if ($update) {

		Header("Location:../production/telimciler-deyisdir.php?status=ok&telimciler_id=$telimciler_id");

	} else {

		Header("Location:../production/telimciler-deyisdir.php?status=no&telimciler_id=$telimciler_id");
	}

}

if ($_GET['telimcilersil']=="ok") {
	
	$sil=$db->prepare("DELETE from telimciler where telimciler_id=:telimciler_id");
	$kontrol=$sil->execute(array(
		'telimciler_id' => $_GET['telimciler_id']
		));

	if ($kontrol) {

		Header("Location:../production/telimciler.php?status=ok");

	} else {

		Header("Location:../production/telimciler.php?status=no");
	}

}


  ?>
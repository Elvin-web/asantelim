<?php
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';





if (isset($_POST['telimlerelaveet'])) {

	$telim_seourl=seo($_POST['telim_ad']);

	// echo $telim_seourl;
	// exit;


	$kaydet=$db->prepare("INSERT INTO telimler SET
		telim_ad=:telim_ad,
		telim_melumat=:telim_melumat,
        telim_zaman=:telim_zaman,	
      
		telimciler_id=:telimciler_id,
		active=:active,
		
		telim_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'telim_ad' => $_POST['telim_ad'],
		'telim_melumat' => $_POST['telim_melumat'],
		
		'telimciler_id' => $_POST['telimciler_id'],
		'active' => $_POST['active'],
		'telim_zaman' => $_POST['telim_zaman'],
		'seourl' => $telim_seourl

	));

	if ($insert) {

		Header("Location:../production/telimler.php?status=ok");

	} else {

		Header("Location:../production/telimler.php?status=no");
	}

}



if (isset($_POST['telimdeyisdir'])) {

	$telim_id=$_POST['telim_id'];
	$telim_seourl=seo($_POST['telim_ad']);

	$kaydet=$db->prepare("UPDATE telimler SET
		telimciler_id=:telimciler_id,
		telim_ad=:telim_ad,
		telim_melumat=:telim_melumat,
		active=:active,
			
		telim_zaman=:telim_zaman,
		telim_seourl=:seourl		
		WHERE telim_id={$_POST['telim_id']}");
	$update=$kaydet->execute(array(
		'telimciler_id' => $_POST['telimciler_id'],
		'telim_ad' => $_POST['telim_ad'],
		'telim_melumat' => $_POST['telim_melumat'],
		'active' => $_POST['active'],
		

		'telim_zaman' => $_POST['telim_zaman'],
		'seourl' => $telim_seourl

	));

	if ($update) {

		Header("Location:../production/telimler-deyisdir.php?status=ok&telim_id=$telim_id");

	} else {

		Header("Location:../production/telimler-deyisdir.php?status=no&telim_id=$telim_id");
	}

}

if ($_GET['telimsil']=="ok") {
	
	$sil=$db->prepare("DELETE from telimler where telim_id=:telim_id");
	$kontrol=$sil->execute(array(
		'telim_id' => $_GET['telim_id']
		));

	if ($kontrol) {

		Header("Location:../production/telimler.php?status=ok");

	} else {

		Header("Location:../production/telimler.php?status=no");
	}

}




if ($_GET['telim_onecikar']=="ok") {

	
	$duzenle=$db->prepare("UPDATE telimler SET
		
		telim_onecikar=:telim_onecikar
		
		WHERE telim_id={$_GET['telim_id']}");
	
	$update=$duzenle->execute(array(


		'telim_onecikar' => $_GET['telim_one']
	));



	if ($update) {

		

		Header("Location:../production/telimler.php?status=ok");

	} else {

		Header("Location:../production/telimler.php?status=no");
	}

}



if ($_GET['telim_active']=="ok") {

	

	
	$duzenle=$db->prepare("UPDATE telimler SET
		
		active=:active
		
		WHERE telim_id={$_GET['telim_id']}");
	
	$update=$duzenle->execute(array(


		'active' => $_GET['telim_one']
	));



	if ($update) {

		

		Header("Location:../production/telimler.php?status=ok");

	} else {

		Header("Location:../production/telimler.php?status=no");
	}

}



if(isset($_POST['telimfotosil'])) {

	$telim_id=$_POST['telim_id'];


	echo $checklist = $_POST['telimfotosec'];

	
	foreach($checklist as $list) {

		$sil=$db->prepare("DELETE from telimfoto where telimfoto_id=:telimfoto_id");
		$kontrol=$sil->execute(array(
			'telimfoto_id' => $list
		));
	}

	if ($kontrol) {

		Header("Location:../production/telimler-galeri.php?telim_id=$telim_id&status=ok");

	} else {

		Header("Location:../production/telimler-galeri.php?telim_id=$telim_id&status=no");
	}


}
?>
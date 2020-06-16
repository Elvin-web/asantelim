<?php
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';







if ($_GET['istirakcisil']=="ok") {
	
	$sil=$db->prepare("DELETE from istirakci where istirakci_id=:istirakci_id");
	$kontrol=$sil->execute(array(
		'istirakci_id' => $_GET['istirakci_id']
		));

	if ($kontrol) {

		

		Header("Location:../production/qeydiyat.php?status=ok");

	} else {

		Header("Location:../production/qeydiyat.php?status=no");
	}

}






if ($_GET['onayla']=="ok") {

	

	
	$duzenle=$db->prepare("UPDATE istirakci SET
		
		active=:active
		
		WHERE istirakci_id={$_GET['istirakci_id']}");
	
	$update=$duzenle->execute(array(
		'active' => 1
		));



	if ($update) {

		

		Header("Location:../production/qeydiyat.php?status=ok");

	} else {

		Header("Location:../production/qeydiyat.php?status=no");
	}

}




?>
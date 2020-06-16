<?php
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';





if (isset($_POST['istirakcideyisdir'])) {

	$istirakci_id=$_POST['istirakci_id'];
	
$facebook=explode("@", $_POST['istirakci_facebook'], 2)[0];
	$kaydet=$db->prepare("UPDATE istirakci SET
		telim_id=:telim_id,
		istirakci_adsoyad=:istirakci_adsoyad,
		istirakci_tel=:istirakci_tel,
		istirakci_instagram=:istirakci_instagram,
		istirakci_facebook=:istirakci_facebook,	
		istirakci_mail=:istirakci_mail,	
		istirakci_ayliq=:istirakci_ayliq	
		WHERE istirakci_id={$_POST['istirakci_id']}");
	$update=$kaydet->execute(array(
		'telim_id' => $_POST['telim_id'],
		'istirakci_adsoyad' => $_POST['istirakci_adsoyad'],
		'istirakci_tel' => $_POST['istirakci_tel'],
		'istirakci_instagram' => $_POST['istirakci_instagram'],
		'istirakci_facebook' => $facebook,
		'istirakci_mail' => $_POST['istirakci_mail'],
		'istirakci_ayliq'=> $_POST['istirakci_ayliq']

	));

	if ($update) {

		Header("Location:../production/istirakcilar-deyisdir.php?status=ok&istirakci_id=$istirakci_id");

	} else {

		Header("Location:../production/istirakcilar-deyisdir.php?status=no&istirakci_id=$istirakci_id");
	}

}

if ($_GET['istirakcisil']=="ok") {
	
	$sil=$db->prepare("DELETE from istirakci where istirakci_id=:istirakci_id");
	$kontrol=$sil->execute(array(
		'istirakci_id' => $_GET['istirakci_id']
		));

	if ($kontrol) {

		Header("Location:../production/istirakcilar.php?status=ok");

	} else {

		Header("Location:../production/istirakcilar.php?status=no");
	}

}









?>
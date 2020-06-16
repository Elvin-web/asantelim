<?php
ob_start();
session_start();
include 'baglan.php';
include '../production/fonksiyon.php';



if (isset($_POST['istifadeciqeydet'])) {
	$facebook=explode("@", $_POST['istirakci_facebook'], 2)[0];



if (!empty($_POST['telim_ad1'])) {

	$facebook=explode("@", $_POST['istirakci_facebook'], 2)[0];
	
	

$kaydet=$db->prepare("INSERT INTO telebler SET
	    istirakci_adsoyad=:istirakci_adsoyad,
	    istirakci_tel=:istirakci_tel,	
        istirakci_instagram=:istirakci_instagram,
		istirakci_facebook=:istirakci_facebook,
		istirakci_mail=:istirakci_mail,
		telim_ad=:telim_ad,
        telim_zaman=:telim_zaman,	
        telim_vaxt=:telim_vaxt	
		");
	$insert=$kaydet->execute(array(
		'istirakci_adsoyad' => $_POST['istirakci_adsoyad'],
		'istirakci_tel' => $_POST['istirakci_tel'],
		'istirakci_instagram' => $_POST['istirakci_instagram'],
		'istirakci_facebook' => $facebook,
		'istirakci_mail' => $_POST['istirakci_mail'],
		'telim_ad' => $_POST['telim_ad1'],
		'telim_vaxt' => $_POST['telim_vaxt1'],
		'telim_zaman' => $_POST['telim_zaman1']
	));


}else{
	
	$kaydet=$db->prepare("INSERT INTO istirakci SET
		istirakci_adsoyad=:istirakci_adsoyad,
		telim_id=:telim_id,
        istirakci_tel=:istirakci_tel,	
        istirakci_instagram=:istirakci_instagram,
		istirakci_facebook=:istirakci_facebook,
		istirakci_mail=:istirakci_mail,
		telim_vaxt=:telim_vaxt
		");
	$insert=$kaydet->execute(array(
		'istirakci_adsoyad' => $_POST['istirakci_adsoyad'],
		'telim_id' => $_POST['telim_id'],
		'istirakci_tel' => $_POST['istirakci_tel'],
		'istirakci_instagram' => $_POST['istirakci_instagram'],
		'istirakci_facebook' => $facebook,
		'istirakci_mail' => $_POST['istirakci_mail'],
		'telim_vaxt' => $_POST['telim_vaxt']

	));

}

	if ($insert) {

		Header("Location:../../qeydiyatlar.php?status=ok");

	} else {

		Header("Location:../../qeydiyatlar.php?status=no");
	}


}
  ?>
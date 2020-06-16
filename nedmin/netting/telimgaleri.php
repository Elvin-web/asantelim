<?php 

ob_start();
session_start();

include 'baglan.php';

if (!empty($_FILES)) {



	$uploads_dir = '../../dimg/telim';
	@$tmp_name = $_FILES['file']["tmp_name"];
	@$name = $_FILES['file']["name"];
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$telim_id=$_POST['telim_id'];

	$kaydet=$db->prepare("INSERT INTO telimfoto SET
		telimfoto_resimyol=:resimyol,
		telim_id=:telim_id");
	$insert=$kaydet->execute(array(
		'resimyol' => $refimgyol,
		'telim_id' => $telim_id
		));




}





?>
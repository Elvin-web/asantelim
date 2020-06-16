
<?php
ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';


/*if (isset($_POST['telebdeyisdir'])) {

	$teleb_id=$_POST['teleb_id'];
	

	$kaydet=$db->prepare("UPDATE telebler SET
		telim_ad=:telim_ad,
		istirakci_adsoyad=:istirakci_adsoyad,
		telim_zaman=:telim_zaman,
		telim_vaxt=:telim_vaxt
		WHERE teleb_id={$_POST['teleb_id']}");
	$update=$kaydet->execute(array(
		'telim_ad' => $_POST['telim_ad'],
		'istirakci_adsoyad' => $_POST['istirakci_adsoyad'],
		'telim_zaman' => $_POST['telim_zaman'],
		'telim_vaxt' => $_POST['telim_vaxt']

	));

	if ($update) {

		Header("Location:../production/telebler-deyisdir.php?status=ok&teleb_id=$teleb_id");

	} else {

		Header("Location:../production/telebler-deyisdir.php?status=no&teleb_id=$teleb_id");
	}

}*/


if ($_GET['telebsil']=="ok") {
	
	$sil=$db->prepare("DELETE from telebler where teleb_id=:teleb_id");
	$kontrol=$sil->execute(array(
		'teleb_id' => $_GET['teleb_id']
		));

	if ($kontrol) {

		Header("Location:../production/telebler.php?status=ok");

	} else {

		Header("Location:../production/telebler.php?status=no");
	}

}

/*if ($_GET['telebonayla']=="ok") {
	'teleb_id' => $_GET['teleb_id']
	$telebaxtar=$db->prepare("SELECT * FROM telebler where teleb_id=:id");
    $telebaxtar->execute(array(
    'id' => $_GET['teleb_id']
    ));

     $telebcek=$telebaxtar->fetch(PDO::FETCH_ASSOC);
     $teleb_id=$_POST['teleb_id'];
	 $istirakci_adsoyad => $_POST['istirakci_adsoyad'];

	
    

    $telim_seourl=seo($_POST['telim_ad']);
	$kaydet=$db->prepare("INSERT INTO telimler SET
		telim_ad=:telim_ad,
		telim_melumat=:telim_melumat,
        telim_zaman=:telim_zaman,	
        telim_vaxt=:telim_vaxt,
		telimciler_id=:telimciler_id,
		telim_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'telim_ad' => $_POST['telim_ad'],
		'telim_melumat' => $_POST['telim_melumat'],
		'telim_vaxt' => $_POST['telim_vaxt'],
		'telimciler_id' => $_POST['telimciler_id'],
		'telim_zaman' => $_POST['telim_zaman'],
		'seourl' => $telim_seourl

	));
    $telim_id = $db->lastInsertId();
	$kaydet=$db->prepare("INSERT INTO istirakci SET
		istirakci_adsoyad=:istirakci_adsoyad,
		telim_id=:telim_id,
		istirakci_tel=:istirakci_tel,
		istirakci_instagram=:istirakci_instagram,
		istirakci_facebook=:istirakci_facebook,	
		istirakci_mail=:istirakci_mail,	
		istirakci_ayliq=:istirakci_ayliq");
	$update=$kaydet->execute(array(
		'istirakci_adsoyad' => $_POST['istirakci_adsoyad'],
		'telim_id' => $telim_id,
		'istirakci_tel' => $_POST['istirakci_tel'],
		'istirakci_instagram' => $_POST['istirakci_instagram'],
		'istirakci_facebook' => $facebook,
		'istirakci_mail' => $_POST['istirakci_mail'],
		'istirakci_ayliq'=> $_POST['istirakci_ayliq']

	));



	if ($kontrol) {

		Header("Location:../production/telebler.php?status=ok");

	} else {

		Header("Location:../production/telebler.php?status=no");
	}

}*/

if (isset($_POST['telebdeyisdir']))  {
	//'teleb_id' => $_GET['teleb_id']
	$teleb_id=$_POST['teleb_id'];
	$telebaxtar=$db->prepare("SELECT * FROM telebler where teleb_id={$_POST['teleb_id']}");
    $telebaxtar->execute(array());

     $telebcek=$telebaxtar->fetch(PDO::FETCH_ASSOC);
	

	
    

    $telim_seourl=seo($_POST['telim_ad']);
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
		'telim_zaman' => $_POST['telim_zaman'],
		'seourl' => $telim_seourl,
		'active' => 1

	));



	if ($insert) {
      $facebook=explode("@", $_POST['istirakci_facebook'], 2)[0];

      $stmt = $db->prepare("SELECT MAX(telim_id) AS telim_id FROM telimler");
      $stmt -> execute();
      $invNum = $stmt -> fetch(PDO::FETCH_ASSOC);
      $telim_id = $invNum['telim_id'];
       
    //$telim_id = $db->lastInsertId();
	$kaydet=$db->prepare("INSERT INTO istirakci SET
		istirakci_adsoyad=:istirakci_adsoyad,
		telim_id=:telim_id,
		istirakci_tel=:istirakci_tel,
		istirakci_instagram=:istirakci_instagram,
		istirakci_facebook=:istirakci_facebook,	
		istirakci_mail=:istirakci_mail,
		telim_vaxt=:telim_vaxt,
		active=:active,	
		istirakci_ayliq=:istirakci_ayliq");
	$update=$kaydet->execute(array(
		'istirakci_adsoyad' => $_POST['istirakci_adsoyad'],
		'telim_id' => $telim_id,
		'istirakci_tel' => $_POST['istirakci_tel'],
		'istirakci_instagram' => $_POST['istirakci_instagram'],
		'istirakci_facebook' => $facebook,
		'istirakci_mail' => $_POST['istirakci_mail'],
		'istirakci_ayliq'=> $_POST['istirakci_ayliq'],
		'telim_vaxt' => $_POST['telim_vaxt'],
		'active' => 1

	));


           if ($update) {

	                  $stmt = $db->prepare("SELECT MAX(teleb_id) AS teleb_id FROM telebler");
                      $stmt -> execute();
                         $invNum = $stmt -> fetch(PDO::FETCH_ASSOC);
                        $teleb_id = $invNum['teleb_id'];

                            $sil=$db->prepare("DELETE from telebler where teleb_id=:teleb_id");
	                          $kontrol=$sil->execute(array(
		                      'teleb_id' => $teleb_id
		                           ));

	                           if ($kontrol) {

		                         Header("Location:../production/telebler.php?status=ok");

	                            } else {

		                         Header("Location:../production/telebler.php?status=no");
	                             }
	           } else {

		          Header("Location:../production/telebler.php?status=no");
	           } 
	} else {

		Header("Location:../production/telebler.php?status=no");
	}

}

?>
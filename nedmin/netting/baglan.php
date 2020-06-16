
<?php 

try {

	$db=new PDO("mysql:host=localhost:3307;dbname=asan;charset=utf8",'root','');

	//echo "Versitabanı bağlantısı başarılı";

} catch (PDOExpception $e) {

	echo $e->getMessage();
}


?>


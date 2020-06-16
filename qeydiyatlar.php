
<?php
ob_start();
session_start();
include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
//Belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
  'id' => 0
  ));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$telimciaxtar=$db->prepare("SELECT * FROM telimciler where telimciler_id=:id");
$telimciaxtar->execute(array(
  'id' => 1
  ));
$telimcicek=$telimciaxtar->fetch(PDO::FETCH_ASSOC);
$id = $_GET['id'];


$telimleraxtar1=$db->prepare("select * from telimler where telim_id = '$id'");
$telimleraxtar1->execute();
$telim = $telimleraxtar1->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">




  <title>Qeydiyat</title>
  <meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
  <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
  <meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
  <!-- Bootstrap -->
  <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
  
  <!-- Main Style -->
  <link rel="stylesheet" href="style.css">
  
  <!-- owl Style -->
  <link rel="stylesheet" href="css\owl.carousel.css">
  <link rel="stylesheet" href="css\owl.transitions.css">

<style>
#myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;

};

</style>





<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script></script>
 
    </head>
    <body>
<!--------------------------------------------->      
<!--Header -->



   <div class="container"   >
  
  <div class="row" >
    
    <div class="col-sm-6"  > <a href="qeydiyatlar.php"><img  height=100%; width="100%" src="<?php echo $telimcicek['telimciler_sekil'] ?>" alt="Site Logosu" class="logo img-responsive"></a></div>
   
    <div class="col-sm-6" >
      <center>
            <div class="title-widget-cursive"><?php echo $telimcicek['telimciler_adsoyad'] ?></div>
</center>
            <br>
          <ul class="contact-widget">
            <li class="fphone"><label>Telefon: </label>
              <?php echo $telimcicek['telimciler_tel'] ?></li>
            <li class="fmail lastone"> 
              <label>Mail: </label> <?php echo $telimcicek['telimciler_mail'] ?> <br>    
             <label>Facebook: </label> <?php echo $telimcicek['telimciler_facebook'] ?><br>  
             <label>Instagram: </label> <?php echo $telimcicek['telimciler_instagram'] ?>
          </li>
                  
            
           
          </ul>
    
    </div>
    
  </div>
</div>



<!--Header -->



















<!--burdan yuxari headerdi-->

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner" style="height: 8px">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Təlim Qeydiyatı</div>
							<p >Təlim qeydiyat işləri aşağıdaki form vasitəsilə həyata keçirə bilərsiziniz.</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/istifadecicontroller.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-8">
				<div class="title-bg">
					<div class="title">Qeydiyat məlumatları</div>
				</div>

            <?php 
              if ($_GET['status']=="ok") {?>

               <b style="color:green;">Uğurlu əməliyat...</b>

              <?php } elseif ($_GET['status']=="no") {?>

              <b style="color:red;">Xəta! Uğursuz əməliyat...</b>

              <?php }

              ?>
				
            
				      <div class="form-group dob">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Ad Soyad <span class="required">*</span>
                  </label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="istirakci_adsoyad" placeholder="Ad ve Soyadınızı Yazın..." required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>


<!-- Kategori seçme başlangıç -->


              <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Təlim Seç
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

          
                  $telimleraxtar=$db->prepare("select * from telimler");
                  $telimleraxtar->execute();



                    ?>
                    <select onchange="location = this.id;" class="select2_multiple form-control"  name="telim_id" >
                      <option value="qeydiyatlar">Secin</option>


                     <?php 

                     while($telimlercek=$telimleraxtar->fetch(PDO::FETCH_ASSOC)) {

                       $telimler_id=$telimlercek['telimler_id'];

                       ?>

                       <option <?php echo  $telimlercek['telim_id'] == $id ?  'selected' : ' ' ?> id="qeydiyatlar?id=<?php echo $telimlercek['telim_id'] ?>"  value="<?php echo $telimlercek['telim_id'] ?>"><?php echo $telimlercek['telim_ad']; ?></option>

                       <?php } ?>

                     </select>

                   </div>
                   <!------->

                   <div class="col-md-2 machart" style="float: right;">
   <button id="popcart" class="btn btn-default btn-plus "><span >Ətraflı</span></button>
   <div class="popcart">
    <table class="table table-condensed popcart-inner">
     <tbody>
              <?php echo $telim['telim_melumat'] ?>


      

    </tbody>
  </table>
  <br>
  
 

</div>
</div>

<!------->


                 </div>


                 <!-- kategori seçme bitiş -->


              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Təlim Tarix <span class="required">*</span>
                </label>
                <div class="col-md-8 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="telim_zaman"  required="required" class="form-control col-md-7 col-xs-12" placeholder="Təlimin tarixini yazın..." disabled="" value=" <?php echo $telim['telim_zaman'] ?>">
                </div>
              </div>
             
              <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Təlim Vaxt <span class="required">*</span>
                </label>
                <div class="col-md-8 col-sm-6 col-xs-12">
                  <input type="time" id="first-name" name="telim_vaxt"  required="required" class="form-control col-md-7 col-xs-12" placeholder="Təlimin vaxtini yaın..." >
                </div>
              </div>

				<div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Telefon Nömrəsi 
                </label>
                <div class="col-md-8 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_tel"   class="form-control col-md-7 col-xs-12" placeholder="Telefon nömrəsini yazın...">
                </div>
              </div>


             <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">İnstagram Hesabı <span class="required">*</span>
                </label>
                <div class="col-md-8 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_instagram"  required="required" class="form-control col-md-7 col-xs-12" placeholder="İnstagram adınızı yazın...">
                </div>
              </div>
                <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Facebook Hesabı <span class="required">*</span>
                </label>
                <div class="col-md-8 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_facebook"  required="required" class="form-control col-md-7 col-xs-12" placeholder="Diqqət! Facebookda qeydiyatda olduğunuz emaili yazın ...">
                </div>
              </div>
                <div class="form-group">
                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
                </label>
                <div class="col-md-8 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_mail"  required="required" class="form-control col-md-7 col-xs-12" placeholder="Mailinizi Yazın...">
                </div>
              </div>
				
<!--burdan bawdiyir-->
<p><b>Note:</b> Əgər hər hansı bir təlim təklifiniz varsa  "Digər" düyməsinə basın.</p>
     <button id="diger" type="button" style="float: right;">Digər</button><br>

<div id="myDIV" style="background-color: #dae2e4; display: none;">
               <div class="form-group dob">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Təlim adı
                  </label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="telim_ad1" placeholder="Təlim adını yazın..."  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group dob">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Təlim Tarixi
                  </label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="text" id="thedate" name="telim_zaman1" placeholder="Təlimin tarixini yazın..."  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group dob">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Təlim Vaxtı
                  </label>
                  <div class="col-md-8 col-sm-6 col-xs-12">
                    <input type="time" id="first-name" name="telim_vaxt1" placeholder="Təlimin vaxtini yazın..."  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
</div><br>

<!--burda bitir-->


        <button style="float: right;" type="submit" name="istifadeciqeydet" class="btn btn-default btn-red">Qeydiyatdan Keç</button>
			</div>
			
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>






    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap\js\bootstrap.min.js"></script>
	
	<!-- map -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
	<script type="text/javascript" src="js\jquery.ui.map.js"></script>
	<script type="text/javascript" src="js\demo.js"></script>
	
	<!-- owl carousel -->
    <script src="js\owl.carousel.min.js"></script>
	
	<!-- rating -->
	<script src="js\rate\jquery.raty.js"></script>
	<script src="js\labs.js" type="text/javascript"></script>
	
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="js\product\lib\jquery.mousewheel-3.0.6.pack.js"></script>
	
	<!-- fancybox -->
    <script type="text/javascript" src="js\product\jquery.fancybox.js?v=2.1.5"></script>
	
	<!-- custom js -->
    <script src="js\shop.js"></script>
	</div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script>

    



   $('#diger').click(function() {
  
  var x = document.getElementById("myDIV");
 
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  };

});





    
</script>
        <script type="text/javascript">
            $(function () {
        $('#thedate').datepicker({
        minDate: "+15",
        dateFormat: 'dd-mm-yy'
    });
    $('#thedate').datepicker("setDate", "+15");
            });
        </script>
  </body>
</html>
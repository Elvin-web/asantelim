<?php include 'header.php'; ?>

<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>

	<!-- Slider Gelecek -->
	<?php include 'slider.php'; ?>
</div>

<div class="f-widget featpro">

<div class="container">
		<div class="title-widget-bg">
			<div class="title-widget">Öne Çıxan Təlimlər</div>
			<div class="carousel-nav">
				<a class="prev"></a>
				<a class="next"></a>
			</div>
		</div>
<div id="product-carousel" class="owl-carousel owl-theme">
<!-- ******** problem burdadi-->

<?php 
			$telimaxtar=$db->prepare("SELECT * FROM telimler where active=:active and telim_onecikar=:telim_onecikar");
			$telimaxtar->execute(array(
				'active' => 1,
				'telim_onecikar' => 1
				));

/****birinci hisse****/

while($telimcek=$telimaxtar->fetch(PDO::FETCH_ASSOC)) {


					$telimler_id=$telimcek['telim_id'];
					$telimfotoaxtar=$db->prepare("SELECT * FROM telimfoto where telimler_id=:telimler_id order by telimfoto_sira ASC limit 1 ");
					$telimfotoaxtar->execute(array(
						'telimler_id' => $telimler_id
						));

					$telimfotocek=$telimfotoaxtar->fetch(PDO::FETCH_ASSOC);

/***** bura qeder birinci******/
?>

<!--****ikinci hsse****/-->

               <div class="item">
					<div class="productwrap">
						<div class="pr-img">
							<div class="hot"></div>
							<a href="telim-<?=seo($telimcek["telim_ad"]).'-'.$telimcek["telim_id"]?>"><img  src="<?php echo $telimfotocek['telimfoto_resimyol'] ?>" alt="" class="img-responsive"></a>
							<div class="pricetag blue"><div class="inner"><span><?php echo $telimcek['telim_qiymet'] ?> TL</span></div></div>
						</div>
						<span class="smalltitle"><a href="telim-<?=seo($telimcek["telim_ad"]).'-'.$telimcek["telim_id"]?>"><?php echo $telimcek['telim_ad'] ?></a></span>
						<span class="smalldesc">Təlim Kodu.: <?php echo $telimcek['telim_id'] ?></span>
					</div>
				</div>

<!--/*** bura qeder ikinci****/-->
 <?php } ?>
<!-- bu hisseye qeder-->
         
		</div>
		</div>
	</div>











<div class="container">
		<div class="row">
			<div class="col-md-12"><!--Main content-->
				<div class="title-bg">
					<div class="title">Haqqımızda Məlumat</div>
				</div>
				<p class="ct">
					<?php 
					$haqqimizdaaxtar=$db->prepare("SELECT * FROM haqqimizda where haqqimizda_id=:id");
					$haqqimizdaaxtar->execute(array(
						'id' => 0
						));
					$haqqimizdacek=$haqqimizdaaxtar->fetch(PDO::FETCH_ASSOC);

					echo substr($haqqimizdacek['haqqimizda_icerisi'],0,1000) ?>
				</p>

				<a href="haqqimizda" class="btn btn-default btn-red btn-sm">Davamını Oxu</a>

				
				<div class="spacer"></div>
			</div><!--Main content-->

			<!-- Siderbar buraya gelecek -->
		
		</div>
	</div>



<?php include 'footer.php'; ?>
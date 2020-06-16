<?php 

include 'header.php';

//Belirli veriyi seçme işlemi
$haqqimizdaaxtar=$db->prepare("SELECT * FROM haqqimizda where haqqimizda_id=:id");
$haqqimizdaaxtar->execute(array(
	'id' => 0
	));
$haqqimizdacek=$haqqimizdaaxtar->fetch(PDO::FETCH_ASSOC);


?>



<div class="container">
	<div class="row" >
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner" style="height: 8px">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Haqqımızda Səhifəsi</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"><!--Main content-->

			<div class="title-bg">
				<div class="title">Tanıtım Videosu</div>
			</div>

			<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $haqqimizdacek['haqqimizda_video'] ?>" frameborder="0" allowfullscreen></iframe>

			<div class="title-bg">
				<div class="title">Misyon</div>
			</div>

			<blockquote><?php echo $haqqimizdacek['haqqimizda_misyon']; ?></blockquote>



			<div class="title-bg">
				<div class="title">Vizyon</div>
			</div>

			<blockquote><?php echo $haqqimizdacek['haqqimizda_vizyon']; ?></blockquote>
			<div class="title-bg">
				<div class="title"><?php echo $haqqimizdacek['haqqimizda_basliq']; ?></div>
			</div>
			<div class="page-content">
				<p>
					<?php echo $haqqimizdacek['haqqimizda_icerisi']; ?>
				</p>

			</div>




		</div>



		<!-- Sidebar buraya gelecek -->
		


	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>
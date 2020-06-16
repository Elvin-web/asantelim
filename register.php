<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner" style="height: 8px">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">İstifadəçi Qeydiyatı</div>
							<p >İstifadəçi qeydiyat işləri aşağıdaki form vasitəsilə həyata keçirə bilərsiziniz.</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/istifadecicontroller.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Qeydiyat məlumatları</div>
				</div>

				<?php 

				if ($_GET['status']=="fərqlisifre") {?>

				<div class="alert alert-danger">
					<strong>Xəta!</strong> Girdiyiniz şifrələr eyni deyil.
				</div>
					
				<?php } elseif ($_GET['status']=="eksiksifre") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Şifrəniz minimum 6 karakter uzunluğunda olmalıdır.
				</div>
					
				<?php } elseif ($_GET['status']=="mukerrerkayit") {?>

				<div class="alert alert-danger">
					<strong>Xəta!</strong> Bu istifadəçi daha əvvəl qeydiyata alınmışdır.
				</div>
					
				<?php } elseif ($_GET['status']=="basarisiz") {?>

				<div class="alert alert-danger">
					<strong>Xəta!</strong> Qeydiyat alınmadı Sistem Yöneticisi ilə əlaqə saxlayın.
				</div>
					
				<?php }
				 ?>


				


				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"  required="" name="istifadeci_adsoyad" placeholder="Ad ve Soyadınızı Girin...">
					</div>
					
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" class="form-control" required="" name="istifadeci_mail"  placeholder="Diqqət! Mail adresiniz İstifadəçi adınız olacaqdır.">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" name="istifadeci_passwordone"    placeholder="Şifrənizi Girin...">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="istifadeci_passwordtwo"   placeholder="Şifrənizi Təkrar Girin...">
					</div>
				</div>



				<button type="submit" name="kullanicikaydet" class="btn btn-default btn-red">Qeydiyatdan Keç</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrenizi mi Unuttunuz?</div>
				</div>


				<center><img width="300" src="dimg/images.png"></center>
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>
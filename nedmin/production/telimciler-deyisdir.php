<?php 

include 'header.php'; 


$telimciaxtar=$db->prepare("SELECT * FROM telebler where teleb_id=:id");
$telimciaxtar->execute(array(
  'id' => $_GET['teleb_id']
  ));

$telimcilercek=$telimciaxtar->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Təlimçi Düzəlt <small>,

              <?php 

              if ($_GET['status']=='ok') {?>
                       <b style="color:green;">Uğurlu əməliyat...</b>
                       
                        <?php } 
                        elseif ($_GET['status']=='no') {?>
                       <b style="color:red;">Xəta! Uğursuz əməliyat...</b>

              <?php }

              ?>


            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-kategori" role="kategori">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

           



   <form action="../netting/telimcilercontroller.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklənmiş Şəkil<br><span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($telimcilercek['telimciler_sekil'])>0) {?>

                    <img width="200"  src="../../<?php echo $telimcilercek['telimciler_sekil']; ?>">

                    <?php } else {?>


                    <img width="200"  src="../../dimg/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şəkil Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="telimciler_sekil"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $telimcilercek['telimciler_sekil']; ?>">

            <input type="hidden" name="telimciler_id" value="<?php echo $telimcilercek['telimciler_id'] ?>"> 


                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="telimcisekildeyisdir" class="btn btn-primary">Dəyişdir</button>
                </div>

              </form>
  <hr>


            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/telimcilercontroller.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlimçi Adı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="telimciler_adsoyad" value="<?php echo $telimcilercek['telimciler_adsoyad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              
          

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlimçi Ünvanı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="telimciler_unvan" value="<?php echo $telimcilercek['telimciler_unvan'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İş stajı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="telimciler_staj" value="<?php echo $telimcilercek['telimciler_staj'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Nömrəsi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="telimciler_tel" value="<?php echo $telimcilercek['telimciler_tel'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İnstagram Hesabı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="telimciler_instagram" value="<?php echo $telimcilercek['telimciler_instagram'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook Hesabı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="telimciler_facebook" value="<?php echo $telimcilercek['telimciler_facebook'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="telimciler_mail" value="<?php echo $telimcilercek['telimciler_mail'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
               


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Active<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="active" required>




                  <option value="1" <?php echo $telimcilercek['active'] == '1' ? 'selected=""' : ''; ?>>Aktiv</option>



                  <option value="0" <?php if ($telimcilercek['active']==0) { echo 'selected=""'; } ?>>Passiv</option>
                 


                 </select>
               </div>
             </div>


             <input type="hidden" name="telimciler_id" value="<?php echo $telimcilercek['telimciler_id'] ?>"> 


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="telimcilerdeyisdir" class="btn btn-success">Dəyişdir</button>
              </div>
            </div>

          </form>



        </div>
      </div>
    </div>
  </div>



</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>

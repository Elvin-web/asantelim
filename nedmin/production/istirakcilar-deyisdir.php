<?php 

include 'header.php'; 


$istirakciaxtar=$db->prepare("SELECT * FROM istirakci where istirakci_id=:id");
$istirakciaxtar->execute(array(
  'id' => $_GET['istirakci_id']
  ));

$istirakcicek=$istirakciaxtar->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Istirakçı Dəyişdir <small>,

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

  


            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/istirakcicontroller.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İştirakçı Adı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_adsoyad" value="<?php echo $istirakcicek['istirakci_adsoyad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
 <!-- Kategori seçme başlangıç -->


              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlim Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">
                <?php 
                 $istirakci_id=$istirakcicek['telim_id']; 

                  $telimleraxtar=$db->prepare("select * from telimler");
                  $telimleraxtar->execute();?>
                    <select class="select2_multiple form-control" required="" name="telim_id" >


                     <?php 

                     while($telimlercek=$telimleraxtar->fetch(PDO::FETCH_ASSOC)) {

                       $telim_id=$telimlercek['telim_id'];

                       ?>

                       <option <?php if ($telim_id==$istirakci_id) { echo "selected='select'"; } ?> value="<?php echo $telimlercek['telim_id']; ?>"><?php echo $telimlercek['telim_ad']; ?></option>

                       <?php } ?>

                     </select>
                   </div>
                 </div>


                 <!-- kategori seçme bitiş -->













<div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Nömrəsi 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_tel" value="<?php echo $istirakcicek['istirakci_tel'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İnstagram Hesabı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_instagram" value="<?php echo $istirakcicek['istirakci_instagram'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook Hesabı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_facebook" value="<?php echo $istirakcicek['istirakci_facebook'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_mail" value="<?php echo $istirakcicek['istirakci_mail'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Aylıq 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_ayliq" value="<?php echo $istirakcicek['istirakci_ayliq'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>



           



             <input type="hidden" name="istirakci_id" value="<?php echo $istirakcicek['istirakci_id'] ?>"> 


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="istirakcideyisdir" class="btn btn-success">Dəyişdir</button>
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

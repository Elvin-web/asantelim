<?php 

include 'header.php'; 


$telebaxtar=$db->prepare("SELECT * FROM telebler where teleb_id=:id");
$telebaxtar->execute(array(
  'id' => $_GET['teleb_id']
  ));

$telebcek=$telebaxtar->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tələb Dəyişdir <small>,

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
            <form action="../netting/telebcontroller.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İştirakçı Adı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_adsoyad" value="<?php echo $telebcek['istirakci_adsoyad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlim ad 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="telim_ad" value="<?php echo $telebcek['telim_ad'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlim tarixi
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" id="first-name" name="telim_zaman" value="<?php echo $telebcek['telim_zaman'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlim vaxtı
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="time" id="first-name" name="telim_vaxt" value="<?php echo $telebcek['telim_vaxt'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                <!-- Ck Editör Başlangıç -->

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlim məlumat <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <textarea  class="ckeditor" id="editor1" name="telim_melumat"></textarea>
                  </div>
                </div>

                <script type="text/javascript">

                 CKEDITOR.replace( 'editor1',

                 {

                  filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

                  filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

                  filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

                  filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                  filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                  filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                  forcePasteAsPlainText: true

                } 

                );

              </script>

              <!-- Ck Editör Bitiş -->
                   
<!-- Kategori seçme başlangıç -->


              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlimçi Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

              
                  $telimcileraxtar=$db->prepare("select * from telimciler");
                  $telimcileraxtar->execute();

                    ?>
                    <select class="select2_multiple form-control" required="" name="telimciler_id" >


                     <?php 

                     while($telimcilercek=$telimcileraxtar->fetch(PDO::FETCH_ASSOC)) {

                       $telimciler_id=$telimcilercek['telimciler_id'];

                       ?>

                       <option  value="<?php echo $telimcilercek['telimciler_id']; ?>"><?php echo $telimcilercek['telimciler_adsoyad']; ?></option>

                       <?php } ?>

                     </select>
                   </div>
                 </div>


                 <!-- kategori seçme bitiş -->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Nömrəsi 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_tel" value="<?php echo $telebcek['istirakci_tel'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İnstagram Hesabı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_instagram" value="<?php echo $telebcek['istirakci_instagram'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook Hesabı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_facebook" value="<?php echo $telebcek['istirakci_facebook'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_mail" value="<?php echo $telebcek['istirakci_mail'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Aylıq 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="istirakci_ayliq"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>



             <input type="hidden" name="teleb_id" value="<?php echo $telebcek['teleb_id'] ?>"> 


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="telebdeyisdir" class="btn btn-success">Dəyişdir</button>
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

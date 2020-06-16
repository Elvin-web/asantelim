<?php 

include 'header.php'; 




?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Təlim əlavə et <small>,

              <?php 

              if ($_GET['status']=="ok") {?>

              <b style="color:green;">Uğurlu əməliyat...</b>

              <?php } elseif ($_GET['status']=="no") {?>

              <b style="color:red;">Xəta! Uğursuz əməliyat...</b>

              <?php }

              ?>


            </small></h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/telimlercontroller.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlim Adı <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="telim_ad" placeholder="Təlim adını girin" required="required" class="form-control col-md-7 col-xs-12">
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


        
         <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlim Tarixi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" id="first-name" name="telim_zaman" placeholder="Təlim tarixini girin" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
            




 <!-- Kategori seçme başlangıç -->


              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Təlimçi Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

                  $telim_id=$telimcek['telimciler_id']; 

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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Active<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="active" required>


                  <option value="1" >Aktiv</option>
                  <option value="0" >Passiv</option>
                  


                 </select>
               </div>
             </div>

             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="telimlerelaveet" class="btn btn-success">yadda saxla</button>
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

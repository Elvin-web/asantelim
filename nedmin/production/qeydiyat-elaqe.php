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
            <h2>Istirakçı<small>,

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

  


        




                    <form class="form-horizontal form-label-left input_mask" action="qeydiyat.php">

                      <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Ad Soyad" value="<?php echo $istirakcicek['istirakci_adsoyad'] ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                     

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email" value="<?php echo $istirakcicek['istirakci_mail'] ?>">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="inputSuccess5" placeholder="Phone" value="<?php echo $istirakcicek['istirakci_tel'] ?>">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>

                    
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"><label>Facebook: </label>
                          <a  class="btn btn-success" href="https://www.facebook.com/<?php echo $istirakcicek['istirakci_facebook'] ?>"> 
                        <?php echo $istirakcicek['istirakci_facebook'] ?></a> 
                        </div>
                     
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback"><label>Instagram: </label>
                          <a href="https://www.instagram.com/<?php echo $istirakcicek['istirakci_instagram'] ?>"><button type="submit"  class="btn btn-warning">
                        <?php echo $istirakcicek['istirakci_instagram'] ?></button></a> 
                        </div>
                     
                      <div class="form-group">
                       
                      </div>
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <a href="qeydiyat.php"> <button type="submit"  class="btn btn-danger">Çıx</button></a> 
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

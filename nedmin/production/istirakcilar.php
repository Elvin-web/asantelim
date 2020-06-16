<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$istirakciaxtar=$db->prepare("SELECT * FROM istirakci where active=:active");
$istirakciaxtar->execute(array(
'active' => 1));


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Təlimdə iştirak edənlər <small>,

              <?php 

              if ($_GET['status']=="ok") {?>

               <b style="color:green;">Uğurlu əməliyat...</b>

              <?php } elseif ($_GET['status']=="no") {?>

              <b style="color:red;">Xəta! Uğursuz əməliyat...</b>

              <?php }

              ?>


            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
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


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Ad Soyad</th>
                  <th>Təlim</th>
                  <th>Tarix</th>
                  <th>Vaxt</th>
                  <th>Əlaqə</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 
               $say=0;
                while($istirakcicek=$istirakciaxtar->fetch(PDO::FETCH_ASSOC)) { $say++?>


                  <?php $telimaxtar=$db->prepare("SELECT * FROM telimler where 
                    telim_id={$istirakcicek['telim_id']}");
                      $telimaxtar->execute(array());
                   $telimcek=$telimaxtar->fetch(PDO::FETCH_ASSOC); ?>





                <tr>
                  <td width="20"><?php echo $say ?></td>
                  <td><?php echo $istirakcicek['istirakci_adsoyad'] ?></td>
                  <td><?php echo $telimcek['telim_ad'] ?></td>
                  
                  <td><?php echo $telimcek['telim_zaman'] ?></td>
                  <td><?php echo $istirakcicek['telim_vaxt'] ?></td>
                      
                 <td><center><a href="istirakcilar-elaqe.php?istirakci_id=<?php echo $istirakcicek['istirakci_id']; ?>"><button class="btn btn-warning btn-xs">Əlaqə</button></a></center></td>
                 
                  <td><center><a href="istirakcilar-deyisdir.php?istirakci_id=<?php echo $istirakcicek['istirakci_id']; ?>"><button class="btn btn-primary btn-xs">Dəyişdir</button></a></center></td>
                 
                  <td><center><a href="../netting/istirakcicontroller.php?istirakci_id=<?php echo $istirakcicek['istirakci_id']; ?>&istirakcisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                </tr>



                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>

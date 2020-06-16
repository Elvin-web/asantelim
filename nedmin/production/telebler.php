<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$telebaxtar=$db->prepare("SELECT * FROM telebler");
$telebaxtar->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Təklif Edənlər <small>,

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

                while($telebcek=$telebaxtar->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $telebcek['istirakci_adsoyad'] ?></td>
                  <td><?php echo $telebcek['telim_ad'] ?></td>
                  
                  <td><?php echo $telebcek['telim_zaman'] ?></td>
                  <td><?php echo $telebcek['telim_vaxt'] ?></td>
                      
                 <td><center><a href="telebler-elaqe.php?teleb_id=<?php echo $telebcek['teleb_id']; ?>"><button class="btn btn-warning btn-xs">Əlaqə</button></a></center></td>
                <!--  <td><center><a href="telebler-deyisdir.php?teleb_id=<?php echo $telebcek['teleb_id']; ?>"><button class="btn btn-primary btn-xs">Dəyişdir</button></a></center></td>-->
                  
                  <td><center><a href="telebler-deyisdir.php?teleb_id=<?php echo $telebcek['teleb_id']; ?>"><button class="btn btn-primary btn-xs">Onayla</button></a></center></td>
                 
                  <td><center><a href="../netting/telebcontroller.php?teleb_id=<?php echo $telebcek['teleb_id']; ?>&telebsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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

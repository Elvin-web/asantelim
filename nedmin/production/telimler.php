<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$telimaxtar=$db->prepare("SELECT * FROM telimler order by telim_id DESC");
$telimaxtar->execute();



?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Təlim Siyahısı <small>,

              <?php 

              if ($_GET['status']=="ok") {?>

              <b style="color:green;">Uğurlu əməliyat...</b>

              <?php } elseif ($_GET['status']=="no") {?>

              <b style="color:red;">Xəta! Uğursuz əməliyat...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="telimler-elave-et.php"><button class="btn btn-success btn-xs"> Yeni Elave et</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Təlim Adı</th>
                  <th>Təlim tarixi</th>
                  <th>Təlimçi</th>
                  <th>Active</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($telimcek=$telimaxtar->fetch(PDO::FETCH_ASSOC)) { $say++?>
              <?php
                $telimciler_id=$telimcek['telimciler_id'];
                $telimciaxtar=$db->prepare("SELECT * FROM telimciler where telimciler_id={$telimciler_id}");
                $telimciaxtar->execute();
                $telimcicek=$telimciaxtar->fetch(PDO::FETCH_ASSOC);?>
                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo $telimcek['telim_ad'] ?></td>
                 <td><?php echo $telimcek['telim_zaman'] ?></td>
               
                 <td><?php echo $telimcicek['telimciler_adsoyad'] ?></td>
                            

                 <td><center><?php 

                  if ($telimcek['active']==1) {?>
                  <a href="../netting/telimlercontroller.php?telim_id=<?php echo $telimcek['telim_id'] ?>&telim_one=0&telim_active=ok">                 
                  <button class="btn btn-success btn-xs">Aktiv</button></a>

                <?php }

                    elseif ($telimcek['active']==0)   {?>

                  <a href="../netting/telimlercontroller.php?telim_id=<?php echo $telimcek['telim_id'] ?>&telim_one=1&telim_active=ok">
                <button class="btn btn-danger btn-xs">Passiv</button></a>
                <?php } ?>
              </center>


            </td>


            <td><center><a href="telimler-deyisdir.php?telim_id=<?php echo $telimcek['telim_id']; ?>"><button class="btn btn-primary btn-xs">Dəyişdir</button></a></center></td>
            
            <td><center><a href="../netting/telimlercontroller.php?telim_id=<?php echo $telimcek['telim_id']; ?>&telimsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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

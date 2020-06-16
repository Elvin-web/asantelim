<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$telimcileraxtar=$db->prepare("SELECT * FROM telimciler order by telimciler_id ASC");
$telimcileraxtar->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Təlimçilər Listesi <small>,

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
              <a href="telimciler-elave-et.php"><button class="btn btn-success btn-xs"> Yeni Elave et</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Təlimçi</th>
                  <th>Telefon</th>
                  <th>Mail</th>
                  <th>Facebook</th>
                  <th>İnstagram</th>
                <!--  <th></th>-->
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($telimcilercek=$telimcileraxtar->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo $telimcilercek['telimciler_adsoyad'] ?></td>
                 <td><?php echo $telimcilercek['telimciler_tel'] ?></td>
                 <td><?php echo $telimcilercek['telimciler_mail'] ?></td>  
                 <td>
                   <center>


                  <a href="https://www.facebook.com/<?php echo $telimcilercek['telimciler_facebook'] ?>">
                  <button class="btn btn-warning btn-xs" ><?php echo $telimcilercek['telimciler_facebook'] ?></button></a>
                  </center>
                 </td>
                  <td>
                   <center>


                  <a href="https://www.instagram.com/<?php echo $telimcilercek['telimciler_instagram'] ?>">
                  <button class="btn btn-success btn-xs" ><?php echo $telimcilercek['telimciler_instagram'] ?></button></a>
                  </center>
                 </td> 
             <!--    <td>
                   <center>


               <a href="telimciler-goster.php?telimciler_id=<?php echo $telimcilercek['telimciler_id']; ?>">
                  <button class="btn btn-warning btn-xs" >Bax</button></a>
                  </center>
                 </td>-->
                
            <td><center><a href="telimciler-deyisdir.php?telimciler_id=<?php echo $telimcilercek['telimciler_id']; ?>"><button class="btn btn-primary btn-xs">Dəyişdir</button></a></center></td>
           
            <td><center><a href="../netting/telimcilercontroller.php?telimciler_id=<?php echo $telimcilercek['telimciler_id']; ?>&telimcilersil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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

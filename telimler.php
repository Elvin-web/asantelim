
<?php 

include 'header.php'; 

$telimleraxtar=$db->prepare("select * from telimler");
$telimleraxtar->execute();


?>






<div class="container">

       <div class="clearfix"></div>
       <div class="lines"></div>
</div>

<div class="container">

       <div class="row">
              <div class="col-md-12"><!--Main content-->
                     <div class="title-bg">
                            <div class="title">Təlimlər</div>
                            <div class="title-nav">
                                   <a href="javascripti:void(0);"><i class="fa fa-th-large"></i>grid</a>
                                   <a href="javascripti:void(0);"><i class="fa fa-bars"></i>List</a>
                            </div>
                     </div>
                     
<div class="row prdct"><!--Products-->
<?php 


                     $sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                     $sorgu=$db->prepare("select * from telimler");
                     $sorgu->execute();
                     $toplam_icerik=$sorgu->rowCount();
                     $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                     // eğer sayfa girilmemişse 1 varsayalım.
                     $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                            // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                     if($sayfa < 1) $sayfa = 1; 
                                   // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                     if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
                     $limit = ($sayfa - 1) * $sayfada;

                 while($telimlercek=$telimleraxtar->fetch(PDO::FETCH_ASSOC)) {

 ?>

                           <div class="col-md-4" style="width: 300px;">
                                   <div class="productwrap">
                                          <div class="pr-img">
                                                
                                                 <a href="telim-<?=seo($telimlercek["telim_ad"]).'-'.$telimlercek["telim_id"]?>"><img src="images\aseftelim.jpg" alt="" class="img-responsive"></a>
                                                 <div class="pricetag on-sale" style="width: 100px; height: 85px"><div class="inner on-sale"><span class="onsale"><span ><?php echo $telimlercek['telim_qiymet'] ?>AZN</span></div></div>
                                          </div>
                                          <span class="smalltitle"><a href="product.htm"><?php echo $telimlercek['telim_ad'] ?></a></span>
                                          <span class="smalldesc">Təlim Kodu.: <?php echo $telimlercek['telim_id'] ?></span>
                                   </div>
                            </div>


                            <?php } ?>
                  <div align="right" class="col-md-12">
                                   <ul class="pagination">

                                          <?php

                                          $s=0;

                                          while ($s < $toplam_sayfa) {

                                                 $s++; ?>

                                                 <?php 

                                                 if ($s==$sayfa) {?>

                                                 <li class="active">

                                                        <a href="telimler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                                                 </li>

                                                 <?php } else {?>


                                                 <li>

                                                        <a href="telimler?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

                                                 </li>

                                                 <?php   }

                                          }

                                          ?>
       
                                   </ul>
                            </div>
 
             
                     </div>
                     </div>
                     
              </div>
              <div class="spacer"></div>
       </div>
       
       <?php include 'footer.php'; ?>

  <?php include('parts/header.php') ?> 
  <section id="page-wrapper" style="min-height: 100vh;">
    <br><br><br>
    <section id="content-wrapper">
         <div class="row">
          <div class="col-2"></div>
          <div class="col-8">
            <center>
            <img src="<?php echo base_url("public/img/mixy.png") ?>" style="">
        </center>  
          </div>
          <div class="col-2"></div>
        </div>
        <div class="row">
          <div class="col-12">
          <center style="font-size:17pt; color:#d6332b; font-weight: 550; ">
          Pilih Kendaraanmu dibawah
        </center>
        </div>
          <div class="col-1"></div>
            <div class="col-5">
              <center>
                <a href="<?php echo base_url("index.php/Mix/mobil")  ?>"><img src=" <?php echo base_url("public/img/mobil.gif") ?>"></a>
                </center>
            </div>
            <div class="col-5">
              <center>
                <a href="<?php echo base_url("index.php/Mix/motor") ?>"><img src="<?php echo base_url("public/img/motor.gif") ?>"></a>
                </center>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
          <div class="col-1"></div>
            <div class="col-10" style="font-size: 13px; color:#0077b6; font-weight: 400;">
              Dr.LUBE siap carikan oli yang pas untuk kendaraanmu. Cukup klik mobil atau motor di atas, lalu ikuti perintah selanjutnya. Kamu juga akan dikasih info-info menarik terkait kendaraanmu. Yuk coba sekarang!
            </div>
            <div class="col-1"></div>

        </div>
       <br><br>
          
</section>        
</section>
<script>



 if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register('../public/service-worker.js')
      .then(function(reg){
        console.log("Yes, it did.");
     }).catch(function(err) {
        console.log("No it didn't. This happened:", err)
    });
 }
</script>
  <?php include("parts/menubar.php"); include("parts/js.php") ?>
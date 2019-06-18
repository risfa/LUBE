  <?php include('parts/header.php') ?>

  

  <div class=preloader style="position: fixed; width: 100%; height: 100vh; z-index: 99999;top: 0;">
    <center>
        <img src="<?php echo base_url("public/img/Loading.gif") ?>" style="width: 25vh; margin-top: 30vh;">
    </center>
</div>
<style type="text/css">
.preloader
{
   background-image: linear-gradient(to bottom, #b09407, #c69b2a, #dba242, #dba242, #ffb370);
}
</style>

<section id="page-wrapper">
    <section id="content-wrapper">
        <br><br><br>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10" style="min-height: 45vh; border: 2px lightgray solid; border-radius: 30px;">
                <img src="<?php echo base_url("public/img/hasil.png") ?>" style="position: absolute;bottom: 5vh;left: 0px;z-index: 1;width: 45vh;">
                <center>

                </center>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                       <img style="margin-top: 13vh;max-width: 25vh; margin-left: -7vh" src="<?php echo base_url("public/img/img_kendaraan/lube")."/".$lube[0]['IdLube'].".jpg";?>">
                      <!-- <img src="<?php echo base_url("public/img/fuel.png") ?>" style="width: 18px"> --> &nbsp &nbsp <!-- <?php echo $lube[0]['NamaLube'] ?> --></div>
                </div>
            </div>
            <div class="col-1">

            </div>
        </div>
        <br><br>

        <div class="row" style="font-size: 17px;">
            <div class="col-1"></div>
            <div class="col-10">

                <center>
                    <!-- <img style="width: 280px;" src="mobilimage/10.jpg"> -->
                    <hr>
                </center>
                <!-- <hr> -->
                <label>TINGKATAN MUTU</label>
                <br>
                <?php echo $lube[0]['NamaLube'] ?>
                <br>
                memenuhi tingkatan mutu API Service SN.

                <hr>
                <div class="row">
                 <div class="col-10">
                    <h3>KEUNGGULAN</h3>
                    <hr>
                    <ul style="list-style: square;">
                        <li><?php echo $lube[0]['Description'] ?></li>
                        <li>Menggunakan teknologi base oil sintetik</li>
                        <li>
                            Diformulasikan dengan aditif pilihan yang mendukung penghematan bahan bakar dan teknologi pengolahan gas buang
                        </li>
                    </ul>
                </div>
            </div>
            <br><br>
            <div class="row" style="background-color: #d2a300;">
                <div class="col-1">
                </div>
                <div class="col-10" style="color: white;padding-top: 1%;padding-bottom: 1%;font-weight: 200;">
                    <?php echo $mixnmatch_brand[0]['NamaBrand'] . ' - ' . $mixnmatch_type[0]['NamaMotor']; ?>
                </div>
                <div class="col-1"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10" style="min-height: 20vh; border: 2px lightgray solid; border-radius: 30px;">
                    <center>
                        <img style="width: 100%; margin-top: 3vh;" src="<?php echo $this->config->item('img')."/".$mixnmatch_type[0]['idType'].".jpg";?>">
                    </center>
                </div>
                <div class="col-1">

                </div>
            </div>
            <hr>
            

            <img src="<?php echo base_url("public/img/informasiterkait.png"); ?>" style="width: 100%;">
            <hr>
            <center>

            </center>
            <div class="row">
             <div class="col-1"></div>
             <div  class="col-10">
              <div id="isi_googlesearch"></div>
              <div id="isi_googlesearch2"></div>
              <center id='center'>
      					<!-- <button class="btn btn-info" id="refresh_page" onclick="">Load More News</button> -->

      				</center>
          </div>



      </div>
      <div class="col-1"></div>
  </div>
</div>
<br><br><br><br><br><br>
</section>
</section>
<script>
    $( "div.preloader" ).delay( 4000 ).fadeOut( 1000 );
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>


// if (window.history && window.history.pushState) {
//         // window.history.pushState('', null, './');
//         $(window).on('popstate', function() {
//             // alert('Back button was pressed.');
//             document.location.href = "<?php echo base_url('index.php/Mixnmatch'); ?>";
//             // document.location.href = "#";

//         });
// }

// $(function() {
//     if (window.history && window.history.pushState) {
//         window.history.pushState('', null, './');
//         $(window).on('popstate', function() {
//             // alert('Back button was pressed.');
//             document.location.href = "<?php echo base_url('index.php/Mixnmatch'); ?>";
//
//         });
//     }
// });


	// var start = Math.floor(Math.random() * 10) + 1;
	var string = Array('otomotif','oli','pertamina','motor','mobil','honda','toyota','suzuki');
	var string_random = string[Math.floor(Math.random()*string.length)];

	// var start2 = Math.floor(Math.random() * 10) + 1;
	var string2 = Array('Fastron','Mesran','pertamina','Prima XP','Meditran','Enduro','pertamina lubricants');
	var string_random2 = string2[Math.floor(Math.random()*string2.length)];


  function onclickPoin(url,title)
  {

      $("#modal-youtube").iziModal('destroy');
      $("#modal-youtube").iziModal({
          title : title,
          iframe: true,
          iframeHeight: 500,
          iframeURL: url,
          transitionInOverlay: 'fadeInDown',
          
      });

      $('#modal-youtube').iziModal('open');
     window.open(param, '_blank');
     $.post('<?php echo base_url().'index.php/Home/insertPoin/'; ?>',{userId : localStorage.userId}, function(data, status){
       getPoinUser()

   });
 }


function searchGoogle(start = 1){
  // $.get("https://www.googleapis.com/customsearch/v1?key=AIzaSyCGRSHbeIKeUNdz9BYDYvvqL_dKv-S5hFw&cx=012990428627446266361:qt4-sjhubg0&q=<?php echo $mixnmatch_brand[0]['NamaBrand'] .' '. $mixnmatch_series[0]['Series']; ?>&start="+start+"&sort=date", function(data, status){
    
  //     console.log(data);
  //     var html = '';
  //     var load_more = '';

  //     $.each(data.items,function(value,result){

  //         // if (result.link.substring(0, 5) != 'https') {
  //         //   return false;
  //         // }


  //        if (value == 5) {
  //           return false;
  //       }

  //       if ('pagemap' in result ) {
  //           if ('cse_image' in result.pagemap) {
  //              html+=  '<div class="col-12" style="border: 1px solid #ECECEC; padding-top: 20px;">'+
  //              '<a onClick="onclickPoin(\'' + result.link + '\',\'' + result.title + '\')" >'+
  //              '<img src="'+result.pagemap.cse_image[0].src+'" style="width:100%;">'+
  //              '<h5 style="color:black;"> '+result.title+' </h5>'+
  //              '<div style="font-size: 7pt; color: #545454; font-weight: bolder; min-height: 70px; max-height: 100px;">'+
  //              result.snippet + ' ('+result.displayLink +')'+
  //              '</div>'+
  //              '</div>'+
  //              '</a><br>'

  //          }else{
  //              html+=  '<div class="col-12" style="border: 1px solid #ECECEC; padding-top: 20px;">'+
  //              '<a onClick="onclickPoin(\'' + result.link + '\',\'' + result.title + '\')" >'+
  //              '<img src="<?php echo base_url("public/img/contoh_news.jpeg") ?>" style="width:100%;">'+
  //              '<h5 style="color:black;"> '+result.title+' </h5>'+

  //              '<div style="font-size: 7pt; color: #545454; font-weight: bolder; min-height: 70px; max-height: 100px;">'+
  //              result.snippet + ' ('+result.displayLink +')'+
  //              '</div>'+
  //              '</div>'+
  //              '</a><br>'
  //          }
  //      }
  //  });

  //     $('#isi_googlesearch').append(html)

  // });

  $.get("https://www.googleapis.com/customsearch/v1?key=AIzaSyCGRSHbeIKeUNdz9BYDYvvqL_dKv-S5hFw&cx=012990428627446266361:qt4-sjhubg0&q="+string_random+"&start="+start+"&sort=date", function(data, status){
      console.log(data);
      var html = '';




      $.each(data.items,function(value,result){

          if (result.link.substring(0, 5) != 'https') {
            return false;
          }

         if (value == 7) {
            return false;
        }

        if ('pagemap' in result ) {
            if ('cse_image' in result.pagemap) {
               html+=  '<div class="col-12" style="border: 1px solid #ECECEC; padding-top: 20px;">'+
               '<a onClick="onclickPoin(\'' + result.link + '\',\'' + result.title + '\')" >'+
               '<img src="'+result.pagemap.cse_image[0].src+'" style="width:100%;">'+
               '<h5 style="color:black;"> '+result.title+' </h5>'+
               '<div style="font-size: 7pt; color: #545454; font-weight: bolder; min-height: 70px; max-height: 100px;">'+
               result.snippet + ' ('+result.displayLink +')'+
               '</div>'+
               '</div>'+
               '</a><br>'

           }else{
               html+=  '<div class="col-12" style="border: 1px solid #ECECEC; padding-top: 20px;">'+
               '<a onClick="onclickPoin(\'' + result.link + '\',\'' + result.title + '\')" >'+
               '<img src="<?php echo base_url("public/img/contoh_news.jpeg") ?>" style="width:100%;">'+
               '<h5 style="color:black;"> '+result.title+' </h5>'+
               '<div style="font-size: 7pt; color: #545454; font-weight: bolder; min-height: 70px; max-height: 100px;">'+
               result.snippet + ' ('+result.displayLink +')'+
               '</div>'+
               '</div>'+
               '</a><br>'

           }

       }


   });

      if ('nextPage' in data.queries) {
        load_more = '<button class="btn btn-info" id="refresh_page" onclick="searchGoogle('+data.queries.nextPage[0].startIndex+')">Load More News</button>'
      }
      $('#center').html(load_more)
      $('#isi_googlesearch').append(html)

  });
}

searchGoogle();


</script>
<?php include("parts/menubar.php"); include("parts/js.php") ?>

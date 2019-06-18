  <?php include('parts/header2.php') ?>


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

<section id="page-wrapper" style="min-height: 1200px !important;">
    <section id="content-wrapper">
        <br><br><br>
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10">
       <center><img style="width: 70%;" src="<?php echo base_url("public/img/Hasilmix.png") ?>"></center> 
        <!-- 1st row -->
        <!-- Mobil -->
        <div class="row">
          <div class="col-9" >
            <div class="row">
              <div class="col-12" style="min-height: 90px;max-height: 110px; background-color: #efefef; padding: 0;">
                <center><img style="width: 250px;" src="<?php echo base_url("public/img/img_kendaraan")."/".$mixnmatch_type[0]['idType'].".jpg";?>"></center>
              </div>
            </div>
            <div class="row">
              <div class="col-12" style="min-height: 40px; background-color:#f6c722">
                <?php echo $mixnmatch_brand[0]['NamaBrand'] . ' - ' . $mixnmatch_type[0]['NamaMotor']; ?>
              </div>
            </div>
          </div>
          <div class="col-3"><img style="bottom: -10%; left: -5%; position: absolute; width: 100px; max-width: 100px;" src="<?php echo base_url("public/img/sedekap.png") ?> "></div>
        </div>
        
        <!-- 2nd row -->
        <div class="row" style="margin-top: 15px;">
          <!-- left -->
          <div class="col-4" data-target="#carouselExampleIndicators" data-slide-to="0">
            <div class="row">
              <div class="col-12" style="background-color: #efefef; min-height: 140px;max-height: 140px;padding:0;">
               <center><img style="width: 100px;" src="<?php echo base_url("public/img/img_kendaraan/lube")."/".$lube[0]['IdLube'].".jpg";?>"></center> 
              </div>
            </div>
            <div class="row">
               <div class="col-12" style="background-color:#f6c722; min-height:70px;"><?php echo $lube[0]['NamaLube']; ?>
               </div> 
            </div>
          </div>
          <!-- middle -->
          <div class="col-4" style="padding-left: 5px; padding-right: 5px;" >
          
              <div class="col-12" style="min-height: 100px;max-height: 100px; background-color: red; margin-bottom:10px" data-target="#carouselExampleIndicators" data-slide-to="1">
                <div class="row">
                  <div class="col-12" style="min-height: 50px; background-color: #efefef;padding:0;">
                   <img id="tengah" style="position: absolute; top:50%; margin-top: -16px;width: 100px; left: 50%; margin-left: -50px" src="<?php echo base_url("public/img/img_kendaraan/fuel")."/".$fuel[0]['idfuel'].".jpg"; ?>">
                  </div>
                  <div class="col-12" style="min-height: 50px; background-color: #f6c722">BBM</div>
                </div>
              </div> 
            
              <div class="col-12" style="min-height: 100px; background-color: pink;" data-target="#carouselExampleIndicators" data-slide-to="2">
                <div class="row">
                  <div  class="col-12" style="min-height: 50px;padding:0; background-color: #efefef;">
                   <img id="tengah" style="position: absolute; top:50%; margin-top: -16px;width: 100px; left: 50%; margin-left: -50px" src="<?php echo base_url("public/img/img_kendaraan/fuel/4.jpg") ?>">
                  </div>
                  <div class="col-12" style="min-height: 50px; background-color: #f6c722;">VIGAS</div>
                </div>
              </div>
          </div>
          <!-- right -->
          <div class="col-4" style="padding: 0;" data-target="#carouselExampleIndicators" data-slide-to="3">
              <div class="col-12" style="background-color: #efefef; min-height: 140px;padding:0;">
                <center><img style="width: 100px;" src="<?php echo base_url("public/img/img_kendaraan/lube/5.png") ?>"></center> 
              </div>

              <div class="col-12" style="background-color:#f6c722; min-height:70px;"><?php echo $coolant[0]['CoolantName']; ?>
              </div> 
          </div>
        </div>
        <!-- end -->
       

      </div>
    </div>

<br>

<div class="row">
  <div class="col-1"></div>
  <div class="col-10" style="padding: 0;">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
  <!-- <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol> -->
  <div class="carousel-inner">

    <div class="carousel-item active">
  <div style="width: 500px; height: 300px; background-color: red;"><?php echo $lube[0]['Description']; ?></div>
    </div>

    <div class="carousel-item">
      <div style="width: 500px; height: 300px; background-color: blue;"><?php echo $fuel[0]['deskripsi_fuel']; ?></div>
    </div>

    <div class="carousel-item">
     <div style="width: 500px; height: 300px; background-color: yellow;"></div>
    </div>

    <div class="carousel-item">
     <div style="width: 500px; height: 300px; background-color: green;"><?php echo $coolant[0]['deskripsi']; ?></div>
    </div>

    <div class="carousel-item">
     <div style="width: 500px; height: 300px; background-color: brown;"></div>
    </div>


  </div>
 <!--  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>
</div>
  <div class="col-1"></div>
</div>
<br>
 <div class="row">
 	
 	<div id="pop-up">
 		<div class="row"><span>OLI</span></div>
 		<hr>
      <div class="row"><span>BBM</span></div>
      <hr>
      <div class="row"><span>VI-GAS</span></div>
 	</div>

          <div class="col-1"></div>
          <div class="col-10">
            <div class="row">
              <div class="col-5" id="bgc" style="font-size: 13px; text-align: center; color: white;padding-top: 5px;padding-bottom: 5px; border-radius: 10px">
              <a style="color: white;" href="">Share</a>
              </div>
              <div class="col-2"></div>
              <div class="col-5" id="btn-pop" style="font-size: 13px; text-align: center; color: white;padding-top: 5px;padding-bottom: 5px;border-radius: 10px">
                Where To Buy
              </div>
            </div>
          </div>
          <div class="col-1"></div>
        </div>



</section>
</section>
<style >
  #btn-pop
  {
  	background:linear-gradient(90deg, rgba(195,157,29,1) 0%, rgba(249,202,35,1) 54%);
  }	
  #bgc
  {
     background:linear-gradient(90deg, rgba(195,157,29,1) 0%, rgba(249,202,35,1) 54%);
  }
  img
  {
    width: 100%;
  }
  #pop-up
  {
  	position: absolute;
    right: 20%;
    z-index: 10;
    bottom: 5%;
    background-color: #efefef;
    width: 110px;
    margin-right: -45px;
    padding-top: 15px;
    padding-bottom: 15px;
    border-radius: 10px;
    display: none;
  }

  @media only screen 
and (min-device-width : 320px) 
and (max-device-width : 568px) 
and (orientation : portrait) { 
  #tengah
  {
    width: 80px !important;
    left: 50% !important;
    margin-left: -40px !important;
  }
 }


</style>
<script>
    $( "div.preloader" ).delay( 4000 ).fadeOut( 1000 );
</script>
<script>
$(document).ready(function(){
  $("#btn-pop").click(function(){
    $("#pop-up").toggle();
  });
});
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

<style>
  .nav-link.active
  {
    background-color: #c2b654 !important;
    color: white !important;
  }
  .nav-link
  {
    color:#c2b654 !important;
  }
</style>
<?php include("parts/menubar.php"); include("parts/js.php") ?>

<?php include("parts/header.php") ?>
<!-- <div style="background: url('<?php echo base_url("public/img/header_home.png") ?>'); background-size: 139%; position: relative; width: 100%; height: 200px; z-index: 99; background-attachment: fixed; background-position: top; background-repeat: no-repeat;"> -->

<!-- </div> -->


<?php // echo 'Session Id : '. $this->session->userdata('userId'); ?>






<div style="padding-top: 5vh;"></div>

<br>

<div class=preloader style="position: fixed; width: 100%; height: 200vh; z-index: 99999;top: 0;">
	<center>
		<img src="<?php echo base_url("public/img/logowhite.png") ?>" style="height: 20vh; margin-top: 30vh;">
	</center>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="false">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">skip</span>
        </button>
      </div>
      
      	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://cdn.themefoxx.com/wp-content/uploads/2017/03/Samsung-Galaxy-S8-Wallpapers-13.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://cdn.themefoxx.com/wp-content/uploads/2017/03/Samsung-Galaxy-S8-Wallpapers-13.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://cdn.themefoxx.com/wp-content/uploads/2017/03/Samsung-Galaxy-S8-Wallpapers-13.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
        
      
    </div>
  </div>



<!-- CONTENT -->
<section id="page-wrapper">
	<section id="content-wrapper">
		<!-- <div id="iframeHolder">iframe</div> -->
		<div class="row">
	<div class="col-1"></div>
	<div class="col-10" style="margin-top: 10px;">
		<!-- <span style="color:gray">Hi, User</span> -->
	<img class="lubers" src="<?php echo base_url("public/img/lubers.png") ?>" style="width: 100%;position: relative;">
	</div>
	<div class="col-1"></div>
</div>
		<div class="row">
			<div class="col-1"></div>
			<div class="col-10">
				<center style="font-size:16pt; color:#d6332b; font-weight: 550; ">
					Pilih Kendaraanmu di bawah
				</center>
			</div>
			<div class="col-1"></div>
		</div>
		<div class="row">
			<div class="col-6" style="padding-right: 0;">
				<a href="<?php echo base_url("index.php/Mix/mobil")  ?> "  style=" height: 155px">
					<img src="<?php echo base_url('public/img/mobil.gif') ?>" alt="" style="float: right;">
					<br>
				</a>
			</div>

			<div class="col-6">

				<a href="<?php echo base_url("index.php/Mix/motor") ?>" style="" >
					<img src="<?php echo base_url("public/img/motor.gif") ?>" alt="" style="max-width: 105%;">
					<br>

				</a>

			</div>
		</div>

		<br>
		<div class="row" id="beritaa" >
			<div class="col-1"></div>
			<div class="col-10">
			<img src="<?php echo base_url("public/img/baba.png") ?>"  style="position: relative;width: 100%;">
			</div>
			<div class="col-1"></div>
		</div>




		<div class="row">

			<div class="col-1"></div>
			<div class="col-10">
				<div class="col-12" style="padding-top: 20px;">
					<!-- <a href="http://pertaminalubricants.com/news/read/476/Pertamina%20Lubricants%20Buktikan%20Prestasi%20di%20%20TOP%20Brand%202019" target="__blank"> -->
					<!-- <a id="href_iframe" data-url = "http://pertaminalubricants.com/news/read/476/Pertamina%20Lubricants%20Buktikan%20Prestasi%20di%20%20TOP%20Brand%202019" data-title = "Pertamina Lubricants Buktikan Prestasi di TOP Brand 2019">
					<img src="http://pertaminalubricants.com/files/news/image/476/Pertamina%20Lubricants%20Topbrands2019.jpeg" style="width:100%;">
					<h5 style="color:black;">Pertamina Lubricants Buktikan Prestasi di TOP Brand 2019</h5>
					<div style="font-size: 7pt; color: #545454; font-weight: bolder; min-height: 70px; max-height: 100px;">
						Jakarta -  PT Pertamina Lubricants kembali menunjukan konsistensinya dalam memperkuat brand pelumas dengan  meraih Top Brand Award 2019 dengan kategori 4 Wheel Engine Lubricants untuk produk Fastron pada 14 Februari 2019. Penghargaan di terima langsung oleh Direktur Sales & Marketing Andria Nusa di Hotel Mulia Jakarta.
					</div>
					</div>
					</a><br> -->
				<div id="isi_googlesearch"></div>
				<!-- <div id="isi_googlesearch2"></div> -->
				<center id='center'>
					<!-- <button class="btn btn-info" id="refresh_page" onclick="">Load More News</button> -->

				</center>
				<br><br>
			</div>
			<div class="col-1"></div>
		</div>
		<div id="isian">

		</div>
</section>
</section>
<?php include ('parts/menubar.php'); ?>
<script>
	$( "div.preloader" ).delay( 3000 ).fadeOut( 1000 );
	$( "div.numscroller" ).delay( 1000 );
</script>
<?php include ("parts/js.php") ?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


<script>

	function runModal(url,title){
		$("#modal-youtube").iziModal('destroy');
	      $("#modal-youtube").iziModal({
	          title : title,
	          iframe: true,
	          iframeHeight: 700,
	          iframeURL: url,
	          transitionInOverlay: 'fadeInDown',

	      });

	      $('#modal-youtube').iziModal('open');
	}


function onclickPoin(url,title)
	 {


	      runModal(url,title)
		 // window.open(param, '_blank');
		 // href="'+result.link+'" target="__blank"
		 $.post('<?php echo base_url().'index.php/Home/insertPoin/'; ?>',{userId : localStorage.userId}, function(data, status){
			 getPoinUser()

		});
	 }


function run_news(start = 1){


	// var start = Math.floor(Math.random() * 20) + 1;
	var string = Array('otomotif','pertamina','motor','tabrakan','keselamatan berkendara','kecelakaan berkendara','kesenangan berkendara');
	var string_random = string[Math.floor(Math.random()*string.length)];

	// var start2 = Math.floor(Math.random() * 10) + 1;
	var string2 = Array('Fastron','pertamina','kecelakaan berkendara','keselamatan berkendara','Enduro','pertamina lubricants','kesenangan berkendara');
	var string_random2 = string2[Math.floor(Math.random()*string2.length)];




	// $.get("https://www.googleapis.com/customsearch/v1?key=AIzaSyCGRSHbeIKeUNdz9BYDYvvqL_dKv-S5hFw&cx=012990428627446266361:qt4-sjhubg0&q="+string_random+"&start="+start+"&sort=date", function(data, status){
	// 	console.log(data);
	// 	var html = '';




	// 	$.each(data.items,function(value,result){


	// 		if (value == 2) {
	// 			return false;
	// 		}




	// 		if ('pagemap' in result ) {
	// 			if ('cse_image' in result.pagemap) {
	// 				html+=  '<div class="col-12" style="border: 1px solid #ECECEC; padding-top: 20px;">'+
	// 				'<a onClick="onclickPoin(\'' + result.link + '\')" >'+
	// 				'<img src="'+result.pagemap.cse_image[0].src+'" style="width:100%;">'+
	// 				'<h5 style="color:black;"> '+result.title+' </h5>'+
	// 				'<div style="font-size: 7pt; color: #545454; font-weight: bolder; min-height: 70px; max-height: 100px;">'+
	// 				result.snippet + ' ('+result.displayLink +')'+
	// 				'</div>'+
	// 				'</div>'+
	// 				'</a><br>'

	// 			}else{
	// 				html+=  '<div class="col-12" style="border: 1px solid #ECECEC; padding-top: 20px;">'+
	// 				'<a onClick="onclickPoin(\'' + result.link + '\')" >'+
	// 				'<img src="<?php echo base_url("public/img/contoh_news.jpeg") ?>" style="width:100%;">'+
	// 				'<h5 style="color:black;"> '+result.title+' </h5>'+
	// 				'<div style="font-size: 7pt; color: #545454; font-weight: bolder; min-height: 70px; max-height: 100px;">'+
	// 				result.snippet + ' ('+result.displayLink +')'+
	// 				'</div>'+
	// 				'</div>'+
	// 				'</a><br>'

	// 			}

	// 		}


	// 	});


	// 	$('#isi_googlesearch').append(html)



	// });



	$.get("https://www.googleapis.com/customsearch/v1?key=AIzaSyCGRSHbeIKeUNdz9BYDYvvqL_dKv-S5hFw&cx=012990428627446266361:qt4-sjhubg0&q="+string_random2+"&start="+start+"&sort=date", function(data, status){
		console.log(data);
		var html = '';
		var load_more = '';



		$.each(data.items,function(value,result){
			console.log(result.link.substring(0, 5));

			if (result.link.substring(0, 5) != 'https') {
				return false;
			}

			if (value == 3) {
				return false;
			}




			if ('pagemap' in result ) {
				if ('cse_image' in result.pagemap) {
					html+=  '<div class="row" style="padding-top: 20px;">'+
                    '<a onClick="onclickPoin(\'' + result.link + '\',\'' + result.title + '\')" >'+
					'<img src="'+result.pagemap.cse_image[0].src+'" style="width:100%;">'+
					'<h5 style="color:black;"> '+result.title+' </h5>'+
					'<div style="font-size: 7pt; color: #545454; font-weight: bolder; min-height: 70px; max-height: 100px;">'+
					result.snippet + ' ('+result.displayLink +')'+
					'</div>'+
					'</div>'+
					'</a><br>'

				}else{
					html+=  '<div class="row" style="padding-top: 20px;">'+
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
		if('nextPage' in data.queries){
			load_more = '<button class="btn btn-info" id="refresh_page" onclick="run_news('+data.queries.nextPage[0].startIndex+')">Load More News</button>'
		}

		$('#center').html(load_more)
		$('#isi_googlesearch').append(html)



	});
}


run_news();

$('#refresh_page').click(function(){
	run_news();
})


$("#href_iframe").click(function() {
	var url = $(this).data('url') ;
	var title = $(this).data('title') ;
	runModal(url,title)
	// window.open("http://pertaminalubricants.com/news/read/476/Pertamina%20Lubricants%20Buktikan%20Prestasi%20di%20%20TOP%20Brand%202019","_blank")
		// $('#iframeHolder').html('<iframe id="iframe" src="https://www.gridoto.com/tag/honda-vario?id=https://www.gridoto.com/read/221651571/honda-beat-dan-vario-ternyata-jadi-favorit-di-2-negara-ini-lo" width="700" height="450"></iframe>');
		// $("<iframe />", { src: "https://www.gridoto.com/tag/honda-vario?id=https://www.gridoto.com/read/221651571/honda-beat-dan-vario-ternyata-jadi-favorit-di-2-negara-ini-lo" }).appendTo("body");
});




</script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#exampleModalScrollable").modal('show');
    });
</script>
<style type="text/css">
.preloader
{
	background-image: linear-gradient(to bottom, #b09407, #c69b2a, #dba242, #dba242, #ffb370);
}

body .modal-open {
position:relative;
overflow: hidden;
position: fixed;
height: 40vh
}
</style>
<!-- <?php // include('parts/markers.php'); ?> -->

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

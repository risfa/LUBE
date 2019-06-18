<?php include("parts/header.php") ?>
<section id="page-wrapper" style="min-height: 750px;">

<!--     <style>
    #iframe{
        z-index: 99;
        position: absolute;
        width: 100%;
        height: auto;
    }
</style>

<div id="iframe">
    <div style="background: blue; margin-top: 70px; width: 100%;">
        <a href="" style="float: right;">
            <i class="fa fa-times"></i> CLOSE
        </a>
    </div>
    <div style="width: 100%; height: 100%; overflow-y: auto;">
        <iframe src="https://www.lipsum.com/" style="width: 100%; height: 100vh;"></iframe>
    </div>
</div> -->


<section id="content-wrapper">
    <br><br><br>
    <div class="row">
        <div class="col-1"></div>




        <div class="col-10">
        <!-- <a href="" data-izimodal-open="#modal-youtube">Youtube</a> -->
        <!-- <button type="button" class="trigger" data-title= "Ini Adalah Tittle" data-url= "https://www.liputan6.com/news/read/3906021/foto-karen-agustiawan-jalani-sidang-pemeriksaan-saksi"> trigger</button> -->



            <img src="<?php echo base_url("public/img/informasigold.png")?>" style="box-shadow: 0px 8px 20px rgba(151, 150, 155, 1); border-radius:25px;  position: relative;width: 100%;">
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div  class="col-10">
          <div id="isi_googlesearch"></div>
          <div id="isi_googlesearch2"></div>
          <center id='center'>
              <!-- <button class="btn btn-info" onclick=""> Load More News</button> -->
          </center>
      </div>
      <div class="col-1"></div>
  </div>
  <br><br><br>
</section>
</section>
<style>
.mobil-img
{
    position: absolute;
    z-index: 11;
    left: 30%;
    top: 25%;
}
</style>

<script>





	// var start = Math.floor(Math.random() * 20) + 1;
  var string = Array('otomotif','pertamina','motor','tabrakan','keselamatan berkendara','kecelakaan berkendara','kesenangan berkendara');
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

     // window.open(param, '_blank');

     $.post('<?php echo base_url().'index.php/Home/insertPoin/'; ?>',{userId : localStorage.userId}, function(data, status){
       getPoinUser()

   });
 }

 function googleSearch(start = 1){
    $.get("https://www.googleapis.com/customsearch/v1?key=AIzaSyCGRSHbeIKeUNdz9BYDYvvqL_dKv-S5hFw&cx=012990428627446266361:qt4-sjhubg0&q="+string_random2+"&start="+start+"&sort=date", function(data, status){
        console.log(data);
        var html = '';
        var load_more = '';



        $.each(data.items,function(value,result){
            if (result.link.substring(0, 5) != 'https') {
                return false;
            }



            if (value == 5) {
                return false;
            }




            if ('pagemap' in result ) {
                if ('cse_image' in result.pagemap) {
                    html+=  '<div class="row" style="border: 1px solid #ECECEC; padding-top: 20px;">'+
                    '<a onClick="onclickPoin(\'' + result.link + '\',\'' + result.title + '\')" >'+
                    '<img src="'+result.pagemap.cse_image[0].src+'" style="width:100%;">'+
                    '<h5 style="color:black;"> '+result.title+' </h5>'+
                    '<div style="font-size: 7pt; color: #545454; font-weight: bolder; min-height: 70px; max-height: 100px;">'+
                    result.snippet + ' ('+result.displayLink +')'+
                    '</div>'+
                    '</div>'+
                    '</a><br>'

                }else{
                    html+=  '<div class="row" style="border: 1px solid #ECECEC; padding-top: 20px;">'+
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
            // if('nextPage' in data.queries){
            //     alert('sdsd')
            //     load_more = '<button class="btn btn-info" onclick="googleSearch('+data.queries.nextPage[0].startIndex+')"> Load More News</button>';
            // }

            // $('#center').html(load_more)
            $('#isi_googlesearch').append(html)



        });
    $.get("https://www.googleapis.com/customsearch/v1?key=AIzaSyCGRSHbeIKeUNdz9BYDYvvqL_dKv-S5hFw&cx=012990428627446266361:qt4-sjhubg0&q="+string_random+"&start="+start+"&sort=date", function(data, status){
        console.log(data);
        var html = '';
        var load_more = '';



        $.each(data.items,function(value,result){

            if (result.link.substring(0, 5) != 'https') {
                return false;
            }


            if (value == 5) {
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
        if('nextPage' in data.queries){
            load_more = '<button class="btn btn-info" onclick="googleSearch('+data.queries.nextPage[0].startIndex+')"> Load More News</button>';
        }

        $('#center').html(load_more)
        $('#isi_googlesearch').append(html)



    });
}




googleSearch();


</script>
<?php include("parts/menubar.php") ?>
<?php include("parts/js.php") ?>

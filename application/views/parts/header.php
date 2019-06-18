<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="apple-touch-icon" href="<?php echo base_url ("public/img/Icon-01.png") ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url ("public/img/Icon-01.png") ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url ("public/img/Icon-01.png") ?>">
<link rel="apple-touch-icon" sizes="167x167" href="<?php echo base_url ("public/img/Icon-01.png") ?>">
<link rel="icon" type="image/x-icon" href="<?php echo base_url ("public/img/Icon-01.png") ?>" />
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url ("public/img/Icon-01.png") ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url ("public/img/Icon-01.png") ?>">
<!-- BUAT ADD TO HOME SCREEN -->
<link rel="manifest" href="<?php echo base_url ("public/manifest.json")  ?>">
<meta name="theme-color" content="#9f8200">
<!-- BUAT ADD TO HOME SCREEN -->

<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Coiny" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

<!-- izimodal -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"  crossorigin="anonymous">
<meta charset="utf-8">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css'>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url ("public/css/flexslider.css")  ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url ("public/css/style.css")  ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url ("public/css/portfolio-component.css") ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/css/portfolio-default.css") ?> ">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/css/css.css") ?>">


<!-- bootstrap select -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script id="domain" data-name="16162242" type="text/javascript" src="https://xeniel.5dapps.com/webanalytic/js/analytics_js/client.js"></script>


<script type="text/javascript">

  var url = 'https://joker.5dapps.com/pertamina/drlube/index.php/';

</script>




<title>Dr.LUBE</title>
</head>
<body>
<section id="header" style="background: white; border-top: 2px solid lightgrey;
            border-bottom: 2px solid lightgrey; height: 60px;position: fixed; z-index: 10;">



                    <div class="row" style="margin-top: 3%;">
                        <div class="col-6" style="padding-left: 0px;">
                    <img src="<?php echo base_url("public/img/logofull1.png") ?>" style="width:90px;" alt="">
                    </div>
                    <div class="col-6" style="padding-right: 45px; ">
                      <?php if ($this->uri->segment(1) != 'login'): ?>
                        <div id="click_poin" style="width: 120px; border: gold solid 1px;border-radius: 40px; position: absolute; right:24%;"> <font style="font-size: 9pt; color: lightgray; text-align: left;" ><i class="fas fa-coins" id="poin_show"></i></font></div>
                      <?php endif; ?>
                    </div>
                    </div>




     </section>
     <div id="turn" style="height: 1000px; width: 100%; background-color: black; position: fixed;z-index: 99">
        <center style="color: white;">Please Rotate your screen to portrait</center>
    </div>


    <script type="text/javascript">



    $(document).ready(function(){
      if (localStorage.userId == 'NaN' || localStorage.userId == null || localStorage.userId == '' || localStorage.userId == 'null' ) {
        const today = new Date().getTime();
        const rand=()=>Math.random(0).toString(36).substr(2);
        const token=(length)=>(rand()+rand()+rand()+rand()+today).substr(0,length);
        var token_generate = token(40);
        $.post('<?php echo base_url().'index.php/Home/cekLocalStorage/'; ?>',{userId : token_generate}, function(data, status){
          localStorage.setItem('userId', token_generate );

        });
      }else{

        $.post('<?php echo base_url().'index.php/Home/cekStorage/'; ?>',{userId : localStorage.userId}, function(data, status){
          var data = JSON.parse(data);
          if (data.status == 'not match') {
            const today = new Date().getTime();
            const rand=()=>Math.random(0).toString(36).substr(2);
            const token=(length)=>(rand()+rand()+rand()+rand()+today).substr(0,length);
            var token_generate = token(40);
            $.post('<?php echo base_url().'index.php/Home/cekLocalStorage/'; ?>',{userId : token_generate}, function(data, status){
              localStorage.setItem('userId', token_generate );

            });

          }

        });

      }


      $('#click_poin').click(function(){
        window.open('<?php echo base_url().'index.php/Poin'; ?>', '_self')
      })

    })
    function getPoinUser(userId = localStorage.userId){
      $.post('<?php echo base_url().'index.php/Home/getPoint/'; ?>',{userId : userId}, function(data, status){
        var data = JSON.parse(data)
        if (data.data[0].jml_poin != null) {
          $('#poin_show').text(data.data[0].jml_poin)

        }else{
          $('#poin_show').text(' 0')

        }

      });

    }


    <?php if ($this->uri->segment(1) != 'login'): ?>
      getPoinUser()
    <?php endif; ?>






    </script>



    <script>

     if ('serviceWorker' in navigator) {
        console.log("Will the service worker register?");
        navigator.serviceWorker.register('/service-worker.js')
          .then(function(reg){
            console.log("Yes, it did.");
         }).catch(function(err) {
            console.log("No it didn't. This happened:", err)
            console.log('baba')
        });
     }


     // $(document).on('click', '.trigger', function (event) {
     //      event.preventDefault();
     //      var title = event.currentTarget.dataset.title
     //      var url = event.currentTarget.dataset.url
     //      // console.log(title)
     //      $("#modal-youtube").iziModal({
     //          title : title,
     //          iframe: true,
     //          iframeHeight: 500,
     //          iframeURL: url,
     //          transitionInOverlay: 'fadeInDown',
     //      });
     //      $('#modal-youtube').iziModal('open');
     //  });

    </script>
    <!-- dimitri -->
    <!-- <div id="modal-youtube" class="modais" data-izimodal-transitionin="fadeInDown" data-izimodal-title="TITLE DI header.php" data-izimodal-iframeURL="https://www.detik.com"></div> -->
    <div id="modal-youtube" ></div>

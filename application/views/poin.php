<?php include("parts/header.php") ?>





<section id="page-wrapper" style="min-height: 750px;">



    <section id="content-wrapper">
        <br><br><br>
         <div class="row">
            <div class="col-1"></div>
            <!-- <div class="col-10">
                Point kamu sekarang: <span id="poin_sekarang"></span>
            </div> -->
            <div class="col-1"></div>
        </div>
        <div class="row" style="">
            <div class="col-1"></div>
            <div class="col-10" id="side_poin" style="border-radius: 30px;height: 35vh; margin-top: 7vh; background-color: #99d2df; border: lightgray 2px solid">
                <div class="loading" id="loading_gif" style="width: 100%; height: 100%; position: absolute; background-color: rgba(0,0,0,0.5); z-index: 11; left: 0; border-radius: 30px; display:none;"> <img src="https://thumbs.gfycat.com/EmptyDeliriousBluefish-small.gif" style="margin-left: 48%; margin-top: 28%; width: 10%;"> </div>
                <br><br>
                 <img src="<?php echo base_url("public/img/a.png") ?>" style="height: 50vh; position: absolute; right: -10%; top:-9vh; max-width: none; ">
                <div class="row">

                <button class="btn btn-info" id="buttonNonRaffle" style="display:none; position: absolute;width: 50%; height: 100%;border-radius: 30px; top:0; background-color: lightgray;border-color: #99d2df;border:none; font-size: 1rem !important;" >Lakukan Mix & Match minimal satu kali untuk kesempatan raffle point</button>
                <button class="btn btn-info" id="buttonRaffle" style="display:none;position: absolute;width: 50%; height: 100%;border-radius: 30px; top:0; background-color:
                #99d2df;border-color: #99d2df" onclick="showRaffle()">Tekan disini untuk mendapatkan POINT</button>
                <button class="btn btn-danger" id="buttonStopRaffle" onclick="stopRaffle()" style="display: none;position: absolute;width: 50%; height: 100%;border-radius: 30px; top:0;">Tekan disini untuk STOP
                    <div id="raffleBox" style="font-size: 40pt;"></div>
                </button>
                <!-- <div id="raffleBox" style="font-size: 40pt; display: none; position: absolute; left: 15vw; top: 15vh; "></div> -->
                <div id="resultBox" style="font-size: 40pt; display: none; position: absolute; left: 10vw; top: 10vh; font-weight: 1000;"></div>
                <!-- <div id="div2" style="border-style: solid; border-width: 2px; width: 150px; height: 150px;"></div> -->

                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <br><br>
         <div class="row" >
            <div class="col-1"></div>
            <div class="col-10" style="font-size: 0.8rem; color: red; font-weight: 400;">
             <span id="engage">




         </span>

             <span id="redeem" style="display: none;">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                       
                    </div>
                    <div class="col-3"></div>
                </div>
                <br>
              Selamat Kamu mendapatkan poin tambahan. Redeem poin dengan klik button "Redeem Now" untuk update data kamu. Selanjutnya ikuti perintah yang ditampilkan. Hadiah menarik menunggu Kamu.</span>
            </div>
            <div class="col-1"></div>
        </div>
        <br><br>
          <div class="row">
            <div class="col-1"></div>
            <div class="col-10" style="border-radius: 40px; background-color: gold; height: 250px; background-image: linear-gradient(to right, #f8d11c 0%,#93861e 100%);">
                <label style="top:5vh; left: 11%; position: absolute; color: white;">Poin Kamu</label>
                <center>
                    <label id="label_poin" style="font-size: 90pt; text-align: center; color: white;left: 15%; top: 3vh; position: absolute; font-weight: lighter;"></label>

                </center>
                <div class="row">
                  <div class="col-4"></div>
                  <div class="col-4">
                     <!-- <button class="btn btn-info" id="link_update" style="width: 100%;"> Redeem Now</button> -->
                    
                  </div>
                  <div class="col-4"></div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>






    </section>
</section>

<script type="text/javascript">
    // function getData(){
    //     swal("Selamat, Anda baru saja mendapat point", "silakan mendaftar untuk menukarkan point", "success")};
    function getData(flag){
      // console.log(flag[0].flag_update)

      if (flag[0].flag_update != 1) {
        swal({
        title: "Selamat, kamu baru saja mendapatkan poin",
        text: "Silakan lengkapi data dirimu untuk menukarkan poin",
        type: "success"
          }).then(function() {
              window.location = "<?php echo base_url("index.php/Account/update_user/") ?>"+localStorage.userId;
          });

      }else{
        swal({
          title: "Selamat",
          text: "kamu baru saja mendapatkan poin",
          type: "success"
        }).then(function() {
              window.location = "<?php echo base_url("index.php/News") ?>";
          });
      }

    }

</script>


<style>

.mobil-img
{
    position: absolute;
    z-index: 11;
    left: 30%;
    top: 25%;
}
</style>
<script type="text/javascript">
    function showRaffle(){
        $('#raffleBox').css('display','block');
        $('#buttonRaffle').css('display','none');
        $('#buttonStopRaffle').css('display','block');
        $('#side_poin').css('background-color','#dc3545')
        $('#side_poin').css('border-color','#dc3545')
        $('#engage').css('display','none;')




    }

    function stopRaffle(){
        $('#raffleBox').css('display','none');
        $('#resultBox').css('display','block');
        $('#buttonStopRaffle').css('display','none');
        $('#side_poin').css('background-color','#99d2df')
        $('#side_poin').css('border-color','#99d2df')
        $('#redeem').css('display','block')
        $('#engage').css('display','none')



        $.post('<?php echo base_url().'index.php/Poin/insertPoinRaffle/'; ?>',{userId : localStorage.userId}, function(data, status){
          var data = JSON.parse(data);
          console.log(data.point_dapat)
          document.getElementById("resultBox").textContent = data.point_dapat;


          getPoinUser()
          getData(data.data_user_flag);


          // cekHistory();

      	});
    }
     $('#link_update').click(function(){
    location.href="<?php echo base_url("index.php/Account/update_user/")?>"+localStorage.userId
  })


  $.post('<?php echo base_url().'index.php/Account/get_user/'; ?>',{userId : localStorage.userId}, function(data, status){
    var data = JSON.parse(data);
    // console.log(data)

    $('#username_label').text('Username: '+data.data[0].username+' ')
    $('#email_label').text('Email: '+data.data[0].email+' ')
    if (data.data_poin[0].total_poin != null) {
      $('#label_poin').text(data.data_poin[0].total_poin);

    }else{
      $('#label_poin').text(0);

    }



  });
</script>

<script type="text/javascript">


        // $.post('<?php echo base_url().'index.php/Poin/cekPoin/'; ?>',{userId : localStorage.userId}, function(data, status){
        //   var data = JSON.parse(data);
        //   console.log(data.data.length)
        //   if (data.data.length >= 1) {
        //     $('#raffleBox').css('display','none');
        //     $('#resultBox').css('display','block');
        //     $('#buttonStopRaffle').css('display','none');
        //     document.getElementById("resultBox").textContent = data.data[0].poin;
        //
        //   }else{
        //     $('#buttonRaffle').css('display','block');
        //   }
        //
        // });



      function cekHistory(){
        $('#loading_gif').css('display','block')

        $.post('<?php echo base_url().'index.php/Poin/cekHistory/'; ?>',{userId : localStorage.userId}, function(data, status){
          var data = JSON.parse(data);
          // console.log(data.poin[0].poin);
          $('#loading_gif').css('display','none')

          if (data.data < 1) {
            $('#buttonRaffle').css('display','none');
            $('#buttonNonRaffle').css('display','block');
            // $('#poin_sekarang').text(data.poin[0].poin);
            $('#resultBox').css('display','block');
            $('#side_poin').css('background-color','lightgray')
            $('#side_poin').css('border-color','lightgray')
            $('#engage').html('<span> Mau dapat hadiah menarik? Gampang kok. Tinggal klik Mix & Match di bawah ini, kamu bisa dapat kesempatan raffle untuk mengumpulkan poin. Kumpulkan poin sebanyak-banyaknya, karena ada hadiah menarik menunggu kamu.</span>')




          }else{
            $('#buttonRaffle').css('display','block');
            $('#buttonNonRaffle').css('display','none');

            $('#engage').html('<span>Klik kolom di atas untuk mendapatkan poin. Dengan mengumpulkan poin sebanyak-banyaknya dari raffle point, ada hadiah menarik menunggu kamu.</span>')

          }


        });

      }


    function getRandom(){
        var words = ["62","14","42","32","15","32","88"];

        var getRandomWord = function () {
            return words[Math.floor(Math.random() * words.length)];
        };

        var word = getRandomWord();
        document.getElementById("raffleBox").textContent = word;

    }

    $('#buttonNonRaffle').click(function(){
      location.href="<?php echo base_url('index.php/Mixnmatch'); ?>"
    })

    cekHistory();

    setInterval(function(){

        getRandom();
    }, 50);
</script>

<?php include("parts/menubar.php") ?>

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

<?php include("parts/js.php") ?>

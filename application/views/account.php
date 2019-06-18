<?php include("parts/header.php") ?>
<section id="page-wrapper" style="min-height: 750px;">


    <section id="content-wrapper">
        <br><br><br><br><br>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-6">
                <h3>Data Kamu</h3>
            </div>
            <div class="col-4" style="float: right;">
                <button id="button_logout" class="btn btn-danger" style="width: 100%; font-size: 8pt!important; background-color: white; border: none; color:lightgray; text-align: right;">Log Out</button>
            </div>
            <div class="col-1"></div>
        </div>
        <br><br>
        <div class="row" style="margin-top: -40px;">
            <div class="col-1"> </div>
            <div class="col-10" style="border-radius: 40px; border:1px solid lightgray; text-align: center;padding-top: 10%;padding-bottom: 10%;font-size: 13pt;">


                <label id="username_label"></label>
                <br>
                <label id="email_label"></label>

                <br><br>
                <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <center>
                        <span style="font-size: 13px;"> Mau Update?</span>
                    <a id="link_update" class="btn btn-info" style="font-size: 11pt; color: white; width: 100%">Update</a>
                    <br>
                    <br>
                    
                    </center>
                </div>
                <div class="col-3"></div>
                </div>
            </div>
            </div>

            <div class="col-1"></div>
        </div>
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
<script type="text/javascript">

  $('#link_update').click(function(){
    location.href="<?php echo base_url("index.php/Account/update_user/")?>"+localStorage.userId
  })
  $('#button_logout').click(function(){
    localStorage.clear();
    location.href="<?php echo base_url('index.php/Account/logout'); ?>"
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

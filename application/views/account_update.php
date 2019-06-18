<?php include("parts/header.php") ?>



<section id="page-wrapper" style="min-height: 750px;">

    <section id="content-wrapper">
        <br><br><br>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10" style="border-radius: 40px; border:1px solid lightgray; text-align: center;padding-top: 10%;padding-bottom: 10%;font-size: 13pt;">

                <!-- <input class="form-control md-6" id="username" type="text" name="user_id" placeholder="Username"  required="" value=""> -->
                <!-- <form method="post" action="<?php echo base_url('index.php/Account/update') ?>" onsubmit="return validateForm()"> -->

                <label>Username</label><br>
                <input class="form-control" style="width: 100%; border-color: lightgray" id="username" type="text" name="username" placeholder="Username"  required="" value="<?php echo $user[0]['username'] ?>">
                <label>Email</label><br>
                <input class="form-control" style="width: 100%; border-color: lightgray" type="text" name="email" id="email" placeholder="email"  required="" value="<?php echo $user[0]['email'] ?>">
                <label>Mobile Number</label><br>
                <input class="form-control" style="width: 100%; border-color: lightgray" type="number" name="no_telp" pattern="\d*" id="telp" placeholder="telp"  required="" value="<?php echo $user[0]['no_telp'] ?>">
                <label>Password</label><br>
                <input class="form-control" style="width: 100%; border-color: lightgray" type="password" name="password" id="password" placeholder="Password"  required="" >
                <br>
                <label style="font-size: 11px;">Disclaimer: semua data yang terdaftar dalam aplikasi ini terjamin aman kerahasiaannya dan tidak akan disebarluaskan baik secara sengaja maupun tidak sengaja.</label> <br><br>

                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <input id="update_user" class="btn btn-info form-control" style="font-size: 11pt; width: 100%;" type="submit" value="Update" name="Update">
                    </div>
                    <div class="col-4"></div>
                </div>



            </div>

            <div class="col-1"></div>
        </div>
 </section>
</section>
<style>
    #turn
    {
        display: none !important;
    }
    .mobil-img
    {
        position: absolute;
    z-index: 11;
    left: 30%;
    top: 25%;
    }
</style>
<script type="text/javascript">


$('#update_user').click(function(){
    var username = $('#username').val();
    var email = $('#email').val();
    var telp = $('#telp').val();
    var password = $('#password').val();
    $.post('<?php echo base_url().'index.php/Account/update/'; ?>',{userId : localStorage.userId,username:username,email:email,telp:telp,password:password}, function(data, status){
      swal({
        title: "Terimakasih data Kamu sudah ter-Update",
        text: "Yuk terus buka Dr.LUBE, dan tunggu keseruan berikutnya",
        type: "success",
        button: false
      }).then(function() {
            window.location = "<?php echo base_url("index.php/Home/") ?>";
      });
    });
})
</script>
<?php include("parts/menubar.php") ?>
<?php include("parts/js.php") ?>

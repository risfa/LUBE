  <?php include('parts/header.php') ?>
  <section id="page-wrapper" style="min-height: 100vh;">
    <section id="content-wrapper">
        <br><br><br><br><br><br>
       <div class="row">
       	<div class="col-1"></div>
       	<div class="col-10">
       			<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-login" role="tab" aria-controls="nav-home" aria-selected="true">Login</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-profile" aria-selected="false">Register</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-home-tab">
  	<div class="row">
  		<div class="col-1"></div>
  		<div class="col-10" style="text-align: center;">
  	<center>
  		<br><br>
  		<input class="form-control" type="name" id="username" placeholder="Username">
  		<br>
  		<input class="form-control" type="password" id="password" placeholder="Password">
  		<br>
  		</center>
  		<div class="row">
  			<div class="col-4"></div>
  			<div class="col-4">

  				<input class="btn btn-info" type="submit" name="LOGIN" value="Login" id="button_login"  style="width: 100%;">
  				<br>

  			</div>
  			<div class="col-4"></div>
  		</div>
  		<label style="font-size: 7pt; text-align: center;">Dont	have account yet? Please Click Register above!</label>
  		<br>
  		</div>
  		<div class="col-1"></div>

  		<center>

  		</center>
  		<br>
  	</div>
  </div>
  <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-profile-tab">
  	<div class="row">
  	<div class="col-1"></div>
  		<div class="col-10">
  	<center>
  		<br><br>
  		<input class="form-control" type="name" name="" placeholder="Name">
  		<br>
  		<input class="form-control" type="email" name="" placeholder="Email">
  		<br>
  		<input class="form-control" type="name" name="" placeholder="Username">
  		<br>
  		<input class="form-control" type="password" name="" placeholder="Password">
  		</center> <br>
  		<div class="row">
  			<div class="col-4"></div>
  			<div class="col-4">

  				<input class="btn btn-info" type="submit" name="LOGIN" value="Register"  style="width: 100%; font-size: 7pt">

  			</div>
  			<div class="col-4"></div>
  		</div>
  		</div>
  		<div class="col-1"></div>
  		<br><br>
  	</div>
  </div>

</div>
       	</div>
       	<div class="col-1"></div>
       </div>

</section>
</section>

<style type="text/css">
   #turn
    {
        display: none !important;
    }
</style>

<script type="text/javascript">
  $('#button_login').click(function(){
      var username = $('#username').val();
      var password = $('#password').val();

      $.post('<?php echo base_url().'index.php/login/login/'; ?>',{username : username,password : password }, function(data, status){
        var data = JSON.parse(data);
          if (data.status) {
            localStorage.setItem('userId', data.data[0].userId);
            location.href="<?php echo base_url('index.php/home'); ?>"
          }else{

            alert(data.msg)

          }
      });


  })
</script>
  <?php include("parts/js.php") ?>

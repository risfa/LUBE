<div id="isian" style="height: 7vh;"></div>
<div class="row" id="menubar" style="position: fixed; height: 7vh; width: 100%;z-index: 1; bottom:0;margin: 0; border-top: 2px lightgray solid; padding-top:3px; ">
<?php $link = $_SERVER['REQUEST_URI']; ?>
<div class="col">
	<center>
	<a href="<?php echo base_url("index.php/Home") ?>">
		<?php
		if (strpos($link, 'Home')) {
		?>
			<img src="<?php echo base_url("public/img/homegold.png") ?>" style="width: 4vh;max-width: none;" >
		<?php
		}else{
		?>
			<img src="<?php echo base_url("public/img/home.png") ?>" style="width: 4vh; max-width: none;" >
		<?php
		}
		 ?>
	</a>
	</center>
</div>
<div class="col">
	<!-- <div style="width: 1vh; height: 1vh; background-color: red; position: absolute; left: 25%; border-radius: 100%;"></div> -->
	<div id="bubbleup"></div>
	<center>
	<a href="<?php echo base_url("index.php/Poin") ?>">
		<?php
		if (strpos($link, 'Poin')) {
		?>
			<img src="<?php echo base_url("public/img/poingold.png") ?>" style="width: 3.25vh; max-width: none;">
		<?php
		}else{
		?>
			<img src="<?php echo base_url("public/img/poin.png") ?>" style="width: 3.25vh; max-width: none;">
		<?php
		}
		?>
	</a>
	</center>
</div>
<div class="col">
	<center>
	<a href="<?php echo base_url("index.php/Mixnmatch") ?>">
		<?php
		if (strpos($link, 'mobil')) {
		?>
			<img src="<?php echo base_url("public/img/mixmatchgold.png") ?>" style="width: 7.5vh;max-width: none;" >
		<?php
		}
		else if(strpos($link, 'motor')){
		?>
			<img src="<?php echo base_url("public/img/mixmatchgold.png") ?>" style="width: 7.5vh;max-width: none;" >
		<?php
		}
		else if(strpos($link, 'result')){
		?>
			<img src="<?php echo base_url("public/img/mixmatchgold.png") ?>" style="width: 7.5vh;max-width: none;" >
		<?php
		}else if(strpos($link, 'Mixnmatch')){
		?>
			<img src="<?php echo base_url("public/img/mixmatchgold.png") ?>" style="width: 7.5vh;max-width: none;" >
		<?php
		}
		else{
		?>
			<img src="<?php echo base_url("public/img/mixmatch.png") ?>" style="width: 7.5vh;max-width: none;" >
		<?php
		}
		?>
		</a>
		</center>
</div>
<div class="col">
	<center>
	<a href="<?php echo base_url("index.php/News") ?>">
		<?php if (strpos($link, 'News')) {
			?>
				<img src="<?php echo base_url("public/img/newsgold.png") ?>" style="width: 4.65vh;max-width: none;" >
			<?php
		}else {
			?>
				<img src="<?php echo base_url("public/img/news.png") ?>" style="width: 4.65vh;max-width: none;" >
			<?php
		} ?>

	</a>
		</center>
</div>
<div class="col">
	<center>
	<a href="<?php echo base_url("index.php/Account") ?>">
		<?php
		if (strpos($link, 'Account')) {
		?>
			<img src="<?php echo base_url("public/img/accountgold.png") ?>" style="width: 8vh;max-width: none;" >
		<?php
		}else{
		?>
			<img src="<?php echo base_url("public/img/account.png") ?>" style="width: 8vh;max-width: none;" >
		<?php
		}
		?>
		</a>
		</center>
</div>


</div>


<style>
	#menubar {
  background:white;
  /*background-image: radial-gradient(circle at 12% 100%, #ffcd21, #4d3d15);*/
}
@media only screen and (max-device-width: 320px) {


}

</style>
<script type="text/javascript">

$.post('<?php echo base_url().'index.php/Poin/cekHistory/'; ?>',{userId : localStorage.userId}, function(data, status){
	var data = JSON.parse(data);
	console.log(data.data);
	if (data.data < 1) {
		$('#bubbleup').css('');
	}else{
		$('#bubbleup').css({'width': '1vh', 'height': '1vh', 'background-color': 'red', 'position': 'absolute', 'left':' 25%', 'border-radius': '100%', 'box-shadow': '2px 3px 8px 1px'});
	}


});

</script>

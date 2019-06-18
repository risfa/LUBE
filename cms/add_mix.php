 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 <?php
 include 'connect.php'; 

  if(isset($_POST['insert_mix'])){
  $mix_insert = mysqli_query($con,"INSERT INTO `tb_mixnmatch`(`id_mixmacth`, `IdBrand`, `IdSeries`, `IdLube`, `IdCoolant`, `idType`, `idfuel`, `id_admin`) VALUES (NULL,'$_POST[IdBrand]','$_POST[IdSeries]','$_POST[IdLube]','$_POST[IdCoolant]','$_POST[idType]','$_POST[idfuel]','$_SESSION[id_admin]')");
  $idmix = mysqli_insert_id($con);
  if($mix_insert){  
    echo "<script>alert('successfully insert mix')</script>";
    echo "<script>document.location.href='index.php?menu=add_mix'</script>";
  }else{
    echo "<script>alert('failed insert mix')</script>";
    echo "<script>document.location.href='index.php?menu=add_mix'</script>";
  }
}      

if(isset($_POST['update_mix'])){
  $Idmix = $_POST['id_mixmacth'];
  $mix_update = mysqli_query($con,"UPDATE `tb_mixnmatch` SET `IdBrand`='$_POST[IdBrand]',`IdSeries`='$_POST[IdSeries]',`IdLube`='$_POST[IdLube]',`IdCoolant`='$_POST[IdCoolant]',`idType`='$_POST[idType]',`idfuel`='$_POST[idfuel]' WHERE id_mixmacth = '$Idmix'");

  if($mix_update){
    echo "<script>alert('successfully update mix')</script>";
    echo "<script>document.location.href='index.php?menu=add_mix'</script>";
  }else{
    echo "<script>alert('failed update mix')</script>";
    echo "<script>document.location.href='index.php?menu=add_mix'</script>";
  }
}      
$mix_data = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `tb_mixnmatch` JOIN tb_brand ON tb_brand.IdBrand = tb_mixnmatch.IdBrand JOIN tb_series ON tb_mixnmatch.IdSeries = tb_series.IdSeries JOIN tb_type ON tb_mixnmatch.idType = tb_type.idType JOIN tb_lube ON tb_mixnmatch.IdLube = tb_lube.IdLube JOIN tb_fuel ON tb_mixnmatch.idfuel = tb_fuel.idfuel JOIN tb_coolant ON tb_mixnmatch.IdCoolant = tb_coolant.IdCoolant WHERE tb_mixnmatch.id_mixmacth='$_GET[edit]'"));
 ?>
 <div class="card-body">
  <h1>Mix n Match</h1>
  <br><br>
  
  <div class="row">

    <div class="col-6">
      <div class="card">
        <div class="card-header">Add Mix n Match</div>
        <form style="padding-left: 5%; padding-right: 5%; padding-top: 5%;" method="post" enctype='multipart/form-data'>
          <input style="width: 80%;" class="form-control" type="hidden" name="id_mixmacth" placeholder="Type Name" value="<?php echo $mix_data[0] ?>">
          <div class="form-group ">
            <div class="row">
              <select name="IdBrand" class="form-control col-5" onchange="setBrand(this.value)" id="brand">
                <option selected>-- Pilih Brand --</option>
                <?php  
               $tampil_brand = mysqli_query($con,"SELECT * FROM `tb_brand`");
              while($brand = mysqli_fetch_array($tampil_brand)){
                ?>
                <option <?php if ($mix_data['IdBrand'] == $brand[0]): ?>
                selected
            <?php endif ?> value="<?php echo $brand[0] ?>"><?php echo $brand['NamaBrand'] ?></option>
            <?php } ?>
              </select>
              <div class="col-2"></div>
              <select name="idType" class=" form-control col-5 " id="series">
              <option>-- Pilih Type --</option>
              
            </select>
          </div>
          <br>
          <div class="row">
            <select name="IdSeries" class="form-control col-5" onchange="setType(this.value)" id="tipe">
            <option>-- Pilih Series --</option>
            
          </select>
          <div class="col-2"></div>
          <select class="form-control col-5" name="IdLube">
            <option value="<?php echo $mix_data['IdLube'] ?>"><?php echo $mix_data['NamaLube'] ?></option>

          <!-- <option>-- Pilih Lube --</option> -->
          <?php 
            $tampil_lube = mysqli_query($con,"SELECT * FROM tb_lube");
            while($lube_data = mysqli_fetch_array($tampil_lube)){
          ?>
          <option value="<?php echo $lube_data['IdLube'] ?>"><?php echo $lube_data['NamaLube'] ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
        
    <div class="col-2"></div>
    <label>FUEL</label>
          <select class="form-control col-5" name="idfuel">
          <!-- <option>-- Pilih Fuel --</option> -->
            <option value="<?php echo $mix_data['idfuel'] ?>"><?php echo $mix_data['fuel'] ?></option>
          <?php 
            $tampil_fuel = mysqli_query($con,"SELECT * FROM tb_fuel");
            while($fuel_data = mysqli_fetch_array($tampil_fuel)){
          ?>
          <option value="<?php echo $fuel_data['idfuel'] ?>"><?php echo $fuel_data['fuel'] ?></option>
          <?php } ?>
        </select>

        <div class="col-2"></div>
    <label>Coolant</label>
          <select class="form-control col-5" name="IdCoolant">
          <!-- <option>-- Pilih Fuel --</option> -->
            <option value="<?php echo $mix_data['IdCoolant'] ?>"><?php echo $mix_data['CoolantName'] ?></option>
          <?php 
            $tampil_coolant = mysqli_query($con,"SELECT * FROM tb_coolant");
            while($coolant_data = mysqli_fetch_array($tampil_coolant)){
          ?>
          <option value="<?php echo $coolant_data['IdCoolant'] ?>"><?php echo $coolant_data['CoolantName'] ?></option>
          <?php } ?>
        </select>
    
    <div class="form-group">
      <center>
              <?php if($_GET['edit']){ ?>
                <input type="submit" class="btn btn-primary" name="update_mix" value="UPDATE">
                <a href="index.php?menu=add_mix" class="btn btn-danger">CANCEL</a>
              <?php }else{ ?>
                <input class="btn btn-success" type="submit" name="insert_mix" value="SUBMIT">
                <a href="index.php?menu=add_mix" class="btn btn-danger">CANCEL</a>
              <?php } ?>
      </center>
    </div>
  </form>
</div>
</div>
</div>
<br><br>
<button><a href="mix_export.php?id_admin=<?php echo $_SESSION['id_admin'] ?>">EXPORT</a></button>
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>No</th>
        <th>Brand</th>
        <th>Series</th>
        <th>Type</th>
        <th>Lube</th>
        <!-- <th>Lube2</th> -->
        <th>Fuel</th>
        <th>Coolant</th>
        <th>Username</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      if(isset($_GET['delete_mixmatch'])){
          $mix_delete = mysqli_query($con,"DELETE FROM `tb_mixnmatch` WHERE id_mixmacth = '$_GET[delete_mixmatch]'");
          if($mix_delete){
            
            echo"<script>alert('successfully delete brand')</script>";
            echo "<script>document.location.href='index.php?menu=add_mix'</script>";
          }else{
            echo"<script>alert('failed delete brand')</script>";
            echo "<script>document.location.href='index.php?menu=add_mix'</script>";
          }
        }
        $No = 1 ;
        $tampil_mix = mysqli_query($con,"SELECT * FROM `tb_mixnmatch` JOIN tb_brand ON tb_brand.IdBrand = tb_mixnmatch.IdBrand JOIN tb_series ON tb_mixnmatch.IdSeries = tb_series.IdSeries JOIN tb_type ON tb_mixnmatch.idType = tb_type.idType JOIN tb_lube ON tb_mixnmatch.IdLube = tb_lube.IdLube JOIN tb_fuel ON tb_mixnmatch.idfuel = tb_fuel.idfuel JOIN tb_coolant ON tb_mixnmatch.IdCoolant = tb_coolant.IdCoolant");
        while ($data_mix = mysqli_fetch_array($tampil_mix)) {
           
          if($data_mix['IdCoolant'] == 0){
            $cool = "Tidak Ada Coolant";
          }else{
            $cool = $data_mix['CoolantName'];
          }
       ?>

      <tr>
        <td><?php echo $No++; ?></td>
        <td><?php echo $data_mix['NamaBrand'] ?></td>
        <td><?php echo $data_mix['Series'] ?></td>
        <td><?php echo $data_mix['NamaMotor'] ?></td>
        <td><?php echo $data_mix['NamaLube'] ?></td>
        <!-- <td><?php echo $data_mix['LubeName'] ?></td> -->
        <td><?php echo $data_mix['fuel'] ?></td>
        <td>
          <?php echo $data_mix['CoolantName'] ?>
        </td>
        <td>
          <a href="index.php?menu=add_mix&edit=<?php echo $data_mix[0] ?>"><i class="fas fa-edit" title="edit-data"></i></a> &nbsp / &nbsp 
          <a href="index.php?menu=add_mix&delete_mixmatch=<?php echo $data_mix[0] ?>"><i class="fas fa-trash-alt" title="delete-data"></i></a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
<script type="text/javascript">
  var edit = '<?php echo $_GET['edit'] ?>'
  var type_id =''
  var series_id = ''
  if(edit){
    var editBrand = '<?php echo $mix_data['IdBrand'] ?>'
    var Type = '<?php echo $mix_data['idType'] ?>'
    var SeriesId = '<?php echo $mix_data['IdSeries'] ?>'
  }
  function setBrand(valueBrand){
    // alert(valueBrand)
    if (!valueBrand) {
      series_id = 0
    }else{
        
      series_id = valueBrand    
    } 
    $('#tipe').html('')
    $('#tipe').append('<option value = 0>-- Pilih series --</option>')
    $('#series').html('')
    $('#series').append('<option value = 0>-- Pilih tipe --</option>')

    $.ajax({type:"POST",url: "ajax/getBrand.php",data:{'value': series_id},success: function(result){


      var data = JSON.parse(result)
      // console.log(result)
      $.each(data, function(key,val){
          
        $('#tipe').append('<option value="'+val.IdSeries+'">'+val.Series+'</option>')  
        
      })
      
    }});
  }

  function setEditBrand(valueBrand){
    // alert(valueBrand)
    if (!valueBrand) {
      series_id = 0
    }else{
      
      series_id = valueBrand    
    } 
    $('#tipe').html('')
    $('#tipe').append('<option value = 0>-- Pilih series --</option>')
    $('#series').html('')
    $('#series').append('<option value = 0>-- Pilih tipe --</option>')

    $.ajax({type:"POST",url: "ajax/getBrand.php",data:{'value': series_id},success: function(result){


      var data = JSON.parse(result)
      // console.log(result)
      $.each(data, function(key,val){
          if(edit){
            if(val.IdSeries == SeriesId ){
        $('#tipe').append('<option selected value="'+val.IdSeries+'">'+val.Series+'</option>')  
            }else{
        $('#tipe').append('<option value="'+val.IdSeries+'">'+val.Series+'</option>')  
            }
          }else{
        $('#tipe').append('<option value="'+val.IdSeries+'">'+val.Series+'</option>')  
         }
      })
      
    }});
  }
</script>
<script type="text/javascript">
  function setType(valueSeries){
    // alert(valueSeries)
    $('#series').html('')
    if (!valueSeries) {
      series_id = 0
      $('#series').append('<option value = 0>-- Pilih tipe --</option>')
    }else{
      series_id = valueSeries 
      $('#series').append('<option value = 0 >-- Pilih tipe --</option>')   
    } 
    
    $.ajax({type:"POST",url: "ajax/getType.php",data:{'value': type_id, 'series' : series_id },success: function(result){


      var data = JSON.parse(result)
      // console.log(result)
      $.each(data, function(key,val){
          
        $('#series').append('<option value="'+val.idType+'">'+val.NamaMotor+'</option>')  
        
      })
      
    }});
  }

  function setEditType(valueSeries){

  $('#series').html('')
  if (!valueSeries) {
      type_id = 0
       $('#series').append('<option value = 0>-- Pilih tipe --</option>')
    }else{
      
      type_id = valueSeries
      $('#series').append('<option value = 0 >-- Pilih tipe --</option>')
    }

  $.ajax({type:"POST",url: "ajax/getType.php",data:{'value': editBrand, 'series' : type_id},success: function(result){
    var data = JSON.parse(result)
    
    $.each(data, function(key,val){
      
      if(edit){
          if (val.idType == Type) {
            $('#series').append('<option selected value="'+val.idType+'">'+val.NamaMotor+'</option>') 
          }else{
            $('#series').append('<option value="'+val.idType+'">'+val.NamaMotor+'</option>')
          }
        }else{
          
        $('#series').append('<option value="'+val.idType+'">'+val.NamaMotor+'</option>')  
        }
       
    })
  }});
}
  if(edit){
    setEditBrand(editBrand)
    setEditType(SeriesId)
  }
</script>
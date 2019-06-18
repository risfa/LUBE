<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php 
@session_start();
include 'connect.php';
  if(isset($_POST['insert_type'])){
  $type_insert = mysqli_query($con,"INSERT INTO `tb_type`(`idType`,`IdBrand`,`ID_jenisbrand`,`IdSeries`, `NamaMotor`, `Mesin`, `Bensin`, `TopSpeed`, `id_admin`) VALUES (NULL,'$_POST[IdBrand]','$_POST[ID_jenisbrand]','$_POST[IdSeries]','$_POST[NamaMotor]','$_POST[Mesin]','$_POST[Bensin]','$_POST[TopSpeed]','$_SESSION[id_admin]')");
  $idtype = mysqli_insert_id($con);
  if($type_insert){
    $upload = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../public/img/img_kendaraan/".$idtype.".jpg");
    if($upload){
      echo"<script>alert('berhasil upload gambar')</script>";
    }else{
      echo"<script>alert('tidak berhasil upload gambar')</script>";
    }

    echo "<script>alert('successfully insert type')</script>";
    echo "<script>document.location.href='index.php?menu=add_type'</script>";
  }else{
    echo "<script>alert('failed insert type')</script>";
    echo "<script>document.location.href='index.php?menu=add_type'</script>";

  }
}      

if(isset($_POST['update_type'])){
  $namamotor = $_POST['NamaMotor'];
  $mesin = $_POST['Mesin'];
  $bensin = $_POST['Bensin'];
  $topspeed = $_POST['TopSpeed'];
  $idbrand = $_POST['IdBrand'];
  $idseries = $_POST['IdSeries'];
  $idjenisbrand = $_POST['ID_jenisbrand'];
  
  $id_type = $_POST['idType'];
  $type_update = mysqli_query($con,"UPDATE `tb_type` SET `IdBrand`= '$idbrand', `ID_jenisbrand`= '$idjenisbrand', `IdSeries`= '$idseries', `NamaMotor`= '$namamotor',`Mesin`='$mesin',`Bensin`='$bensin',`TopSpeed`='$topspeed' WHERE idType ='$id_type'");
  if($type_update){
    $update = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../public/img/img_kendaraan/".$id_type.".jpg");
    if($update){
      echo"<script>alert('berhasil update gambar')</script>";
    }else{
      echo"<script>alert('tidak berhasil update gambar')</script>";
    }
    echo "<script>alert('successfully update type')</script>";
    echo "<script>document.location.href='index.php?menu=add_type'</script>";
  }else{
    echo "<script>alert('failed update type')</script>";
    echo "<script>document.location.href='index.php?menu=add_type'</script>";

  }
}      
$type_data = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_type JOIN tb_brand ON tb_type.IdBrand = tb_brand.IdBrand JOIN tb_series ON tb_type.IdSeries = tb_series.IdSeries JOIN tb_jenisbrand ON tb_type.ID_jenisbrand = tb_jenisbrand.ID_jenisbrand WHERE tb_type.idType='$_GET[edit]'"));

?>
 <div class="card-body">
  <h1>Type</h1>
  <br><br>
  
  <div class="row">
    
    <div class="col-5">
      <div class="card">
        <h5 style="padding:5%;">Add Type</h5>
        <center>
      <form style="padding-left: 5%;" method="post" enctype="multipart/form-data">
        <input style="width: 80%;" class="form-control" type="hidden" name="idType" placeholder="Type Name" value="<?php echo $type_data[0] ?>">
        <div class="form-group">
          <select style="width: 80%;"name="IdBrand" onchange="setCar(this.value)" class="form-control" required="" id="brand">
            <option selected>--Pilih Brand--</option>
            
            <?php 
              $tampil_brand = mysqli_query($con,"SELECT * FROM `tb_brand`");
              while($brand = mysqli_fetch_array($tampil_brand)){
            ?>
            <option <?php if ($type_data['IdBrand'] == $brand[0]): ?>
                selected
            <?php endif ?> value="<?php echo $brand[0] ?>"><?php echo $brand['NamaBrand'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <select style="width: 80%;"name="ID_jenisbrand" class="form-control" required="" onchange="setVehicle(this.value)"  id="vehicle">
            <option>-- Pilih Vehicle --</option>
          </select>
        </div>
        <div class="form-group">
          <select style="width: 80%;"name="IdSeries" class="form-control" required="" id="series">
            <option >--Pilih Series--</option>
            
          </select>
        </div>
        <div class="form-group">
          <input style="width: 80%;" autocomplete="off" class="form-control" type="text" name="NamaMotor" placeholder="Type Name" value="<?php echo $type_data['NamaMotor'] ?>">
        </div>
        
        <div class="form-group">
          <input style="width: 80%;" class="form-control" type="file" name="fileToUpload" id="fileToUpload"><br>
            <?php if($_GET['edit']){ ?>
            <img style="max-width: 100px" src="../public/img/img_kendaraan/<?php echo $_GET['edit'] ?>.jpg">
            <?php } ?>
        </div>
          <div class="form-group">
              <?php if($_GET['edit']){ ?>
                <input type="submit" class="btn btn-primary" name="update_type" value="UPDATE">
                <a href="index.php?menu=add_type" class="btn btn-danger">CANCEL</a>
              <?php }else{ ?>
                <input class="btn btn-success" type="submit" name="insert_type" value="SUBMIT">
                <a href="index.php?menu=add_type" class="btn btn-danger">CANCEL</a>
              <?php } ?>
            </div>
      </form>
      </center>
    </div>
  </div>
  </div>
  <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Brand</th>
                      <th>Series</th>
                      <th>Vehicle</th>
                      <th>Type Name</th>
                      <th>Username</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(isset($_GET['delete_type'])){
          $type_delete = mysqli_query($con,"DELETE FROM `tb_type` WHERE idType = '$_GET[delete_type]'");
          if($type_delete){
            $filePath = "../public/img/img_kendaraan/".$_GET['delete_type'].".jpg";
              if (file_exists($filePath)) 
               {
                    unlink($filePath);
                   "<script>alert('Picture has been Succesfully deleted!')</script>";
              }
              else
              {
                     "<script>alert('Foto tidak ada')</script>";
              }
            echo"<script>alert('successfully delete type')</script>";
            echo "<script>document.location.href='index.php?menu=add_type'</script>";
          }else{
            echo"<script>alert('failed delete type')</script>";
            echo "<script>document.location.href='index.php?menu=add_type'</script>";
          }
        }
                      $No=1;
                      $tampil_type = mysqli_query($con,"SELECT * FROM tb_type JOIN tb_brand ON tb_type.IdBrand = tb_brand.IdBrand JOIN tb_series ON tb_type.IdSeries = tb_series.IdSeries JOIN tb_jenisbrand ON tb_type.ID_jenisbrand = tb_jenisbrand.ID_jenisbrand JOIN tb_admin ON tb_type.id_admin = tb_admin.id_admin WHERE tb_type.id_admin = '$_SESSION[id_admin]' ORDER BY idType");
                      while($data_type = mysqli_fetch_array($tampil_type)){
                    ?>
                    <tr>
                      <td><?php echo $No++; ?></td>
                      <td><?php echo $data_type['NamaBrand'] ?></td>
                      <td><?php echo $data_type['Series'] ?></td>
                      <td><?php echo $data_type['JenisBrand'] ?></td>
                      <td><?php echo $data_type['NamaMotor'] ?></td>
                      <td><?php echo $data_type['username'] ?></td>
                     
                      <td>
                        <a href="index.php?menu=add_type&edit=<?php echo $data_type[0] ?>"><i class="fas fa-edit" title="edit-data"></i></a> &nbsp / &nbsp 
                        <a href="index.php?menu=add_type&delete_type=<?php echo $data_type[0] ?>"><i class="fas fa-trash-alt" title="delete-data"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

<script type="text/javascript">

  var edit = '<?php echo $_GET['edit']; ?>'
  var brand_id = ''
  var vehicle_id = ''
  if(edit){
  
  var editCar = '<?php echo $type_data['IdBrand']; ?>'
  var vehicleCar = '<?php echo $type_data['ID_jenisbrand']; ?>'
  var seriesId = '<?php echo $type_data['IdSeries']; ?>'
  
  }
  function setCar(valueBrand){
    // alert(value)
    if (!valueBrand) {
      brand_id = 0
    }else{
      
      brand_id = valueBrand    
    } 
    $('#vehicle').html('')
    $('#vehicle').append('<option value = 0>-- Select Vehicle --</option>')
    $('#series').html('')
    $('#series').append('<option value = 0>-- Select Series --</option>')

    $.ajax({type:"POST",url: "ajax/getCar.php",data:{'value': brand_id},success: function(result){


      var data = JSON.parse(result)
      // console.log(result)
      $.each(data, function(key,val){
          
        $('#vehicle').append('<option value="'+val.ID_jenisbrand+'">'+val.JenisBrand+'</option>')  
        
      })
      
    }});
  }
  function setEditCar(valueBrand){
    // alert(value)
    if (!valueBrand) {
      brand_id = 0
    }else{
      
      brand_id = valueBrand    
    }
    
    
    $('#vehicle').html('')
    $('#vehicle').append('<option value = 0>-- Select Vehicle --</option>')
    $('#series').html('')
    $('#series').append('<option value = 0>-- Select Series --</option>')

    $.ajax({type:"POST",url: "ajax/getCar.php",data:{'value': brand_id},success: function(result){


      var data = JSON.parse(result)
      // console.log(result)
      $.each(data, function(key,val){
        if(edit){
          if (val.ID_jenisbrand == vehicleCar) {

            $('#vehicle').append('<option selected value="'+val.ID_jenisbrand+'">'+val.JenisBrand+'</option>')
          }else{
            $('#vehicle').append('<option value="'+val.ID_jenisbrand+'">'+val.JenisBrand+'</option>')
          }
        }else{
          
        $('#vehicle').append('<option value="'+val.ID_jenisbrand+'">'+val.JenisBrand+'</option>')  
        }
      })
      
    }});
  }
</script>
<script type="text/javascript">
function setVehicle(valueVehicle){

  $('#series').html('')
  if (!valueVehicle) {
      vehicle_id = 0
       $('#series').append('<option value = 0>-- Select Series --</option>')
    }else{
      
      vehicle_id = valueVehicle
      $('#series').append('<option value = 0 >-- Select Series --</option>')
    }

  $.ajax({type:"POST",url: "ajax/getVehicle.php",data:{'value': brand_id, 'vehicle' : vehicle_id},success: function(result){
    var data = JSON.parse(result)
    
    $.each(data, function(key,val){
       
          
        $('#series').append('<option value="'+val.IdSeries+'">'+val.Series+'</option>')  
             
    })
  }});
}
function setEditVehicle(valueVehicle){

  $('#series').html('')
  if (!valueVehicle) {
      vehicle_id = 0
       $('#series').append('<option value = 0>-- Select Series --</option>')
    }else{
      
      vehicle_id = valueVehicle
      $('#series').append('<option value = 0 >-- Select Series --</option>')
    }

  $.ajax({type:"POST",url: "ajax/getVehicle.php",data:{'value': brand_id, 'vehicle' : vehicle_id},success: function(result){
    var data = JSON.parse(result)
    
    $.each(data, function(key,val){
      
      if(edit){
        
          if (val.IdSeries == seriesId) {
            $('#series').append('<option selected value="'+val.IdSeries+'">'+val.Series+'</option>') 
          }else{
            $('#series').append('<option value="'+val.IdSeries+'">'+val.Series+'</option>')
          }
        }else{
          
        $('#series').append('<option value="'+val.IdSeries+'">'+val.Series+'</option>')  
        }
       
    })
  }});
}
if(edit){
  
  setEditCar(editCar)
  setEditVehicle(vehicleCar)
}

</script>
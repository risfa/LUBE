<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
@session_start(); 
include 'connect.php';

  if(isset($_POST['insert_maps'])){
  $ID_ADMIN = $_SESSION['id_admin'];
  $maps_insert = mysqli_query($con,"INSERT INTO `tb_gmaps`(`ID_gmaps`, `name`, `kota`, `address`, `lng`, `lat`, `type`, `id_admin`) VALUES (NULL,'$_POST[name]','$_POST[kota]','$_POST[address]','$_POST[lng]','$_POST[lat]','$_POST[type]','$ID_ADMIN')");
  // $ID_gmaps = mysqli_insert_id($con);
  if($maps_insert){
    echo "<script>alert('successfully insert maps')</script>";
    echo "<script>document.location.href='index.php?menu=add_gmaps'</script>";
  }else{
    echo "<script>alert('failed insert maps')</script>";
    echo "<script>document.location.href='index.php?menu=add_gmaps'</script>";

  }
}      

if(isset($_POST['update_maps'])){
  $id_maps = $_POST['ID_gmaps'];
  $maps_update = mysqli_query($con,"UPDATE `tb_gmaps` SET `name`='$_POST[name]',`kota`='$_POST[kota]',`address`='$_POST[address]',`lng`='$_POST[lng]',`lat`='$_POST[lat]',`type`='$_POST[type]' WHERE ID_gmaps = '$id_maps'");
  if($maps_update){
    echo "<script>alert('successfully update maps')</script>";
    echo "<script>document.location.href='index.php?menu=add_gmaps'</script>";
  }else{
    echo "<script>alert('failed update maps')</script>";
    echo "<script>document.location.href='index.php?menu=add_gmaps'</script>";

  }
}      
$maps_data = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_gmaps WHERE tb_gmaps.ID_gmaps='$_GET[edit]'"));

?>
 <div class="card-body">
  <h1>Gmaps</h1>
  <br><br>
  
  <div class="row">
    
    <div class="col-5">
      <div class="card">
        <h5 style="padding:5%;">Add Gmaps</h5>
        <center>
      <form style="padding-left: 5%;" method="post" enctype="multipart/form-data">
        <input style="width: 80%;" class="form-control" type="hidden" name="ID_gmaps" placeholder="maps Name" value="<?php echo $maps_data[0] ?>">
        
        <div class="form-group">
          <input style="width: 80%;" autocomplete="off" class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $maps_data['name'] ?>">
        </div>
        <div class="form-group">
          <input style="width: 80%;" autocomplete="off" class="form-control" type="text" name="kota" placeholder="Kota" value="<?php echo $maps_data['kota'] ?>">
        </div>
        <div class="form-group">
        	<textarea style="width: 80%;" autocomplete="off" class="form-control" type="text" name="address" placeholder="Address"><?php echo $maps_data['address'] ?></textarea>
        </div>
        <div class="form-group">
          <input style="width: 80%;" autocomplete="off" class="form-control" type="text" name="lat" placeholder="Latitude" value="<?php echo $maps_data['lat'] ?>">
        </div>

        <div class="form-group">
          <input style="width: 80%;" autocomplete="off" class="form-control" type="text" name="lng" placeholder="Longitude" value="<?php echo $maps_data['lng'] ?>">
        </div>
        <div class="form-group">
        	<select style="width: 80%;" class="form-control" name="type">
        		<option value="<?php echo $maps_data['type'] ?>"><?php echo $maps_data['type'] ?></option>
        		<option>-- Tipe --</option>
        		<option value="oli">OLI</option>
        		<option value="spbu">SPBU</option>
        		<option value="spbu">VIGAS</option>
        	</select>
        </div>
          <div class="form-group">
              <?php if($_GET['edit']){ ?>
                <input type="submit" class="btn btn-primary" name="update_maps" value="UPDATE">
                <a href="index.php?menu=add_gmaps" class="btn btn-danger">CANCEL</a>
              <?php }else{ ?>
                <input class="btn btn-success" type="submit" name="insert_maps" value="SUBMIT">
                <a href="index.php?menu=add_gmaps" class="btn btn-danger">CANCEL</a>
              <?php } ?>
            </div>
      </form>
      </center>
    </div>
  </div>
  </div>
  <br><br>
  <button><a href="export_excel.php?id_admin=<?php echo $_SESSION['id_admin'] ?>">EXPORT EXCEL</a></button>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Kota</th>
                      <th>Address</th>

                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Type</th>
                      
                      <th>Username</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(isset($_GET['delete_maps'])){
          $maps_delete = mysqli_query($con,"DELETE FROM `tb_gmaps` WHERE ID_gmaps = '$_GET[delete_maps]'");
          if($maps_delete){
            
            echo"<script>alert('successfully delete maps')</script>";
            echo "<script>document.location.href='index.php?menu=add_gmaps'</script>";
          }else{
            echo"<script>alert('failed delete maps')</script>";
            echo "<script>document.location.href='index.php?menu=add_gmaps'</script>";
          }
        }
                      $No=1;
                      $tampil_maps = mysqli_query($con,"SELECT * FROM tb_gmaps JOIN tb_admin ON tb_gmaps.id_admin = tb_admin.id_admin WHERE tb_gmaps.id_admin = '$_SESSION[id_admin]' ORDER BY ID_gmaps");
                      while($data_maps = mysqli_fetch_array($tampil_maps)){
                    ?>
                    <tr>
                      <td><?php echo $No++; ?></td>
                      <td><?php echo $data_maps['name'] ?></td>
                      <td><?php echo $data_maps['kota'] ?></td>
                      <td><?php echo $data_maps['address'] ?></td>
                      <td><?php echo $data_maps['lat'] ?></td>
                      <td><?php echo $data_maps['lng'] ?></td>
                      <td><?php echo $data_maps['type'] ?></td>
           
                      <td><?php echo $data_maps['username'] ?></td>
                     
                      <td>
                        <a href="index.php?menu=add_gmaps&edit=<?php echo $data_maps[0] ?>"><i class="fas fa-edit" title="edit-data"></i></a> &nbsp / &nbsp 
                        <a href="index.php?menu=add_gmaps&delete_maps=<?php echo $data_maps[0] ?>"><i class="fas fa-trash-alt" title="delete-data"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>


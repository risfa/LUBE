<?php include 'connect.php'; 

if(isset($_POST['insert_fuel'])){
  $fuel_insert = mysqli_query($con,"INSERT INTO `tb_fuel`(`idfuel`, `fuel`, `deskripsi_fuel`) VALUES (NULL,'$_POST[fuel]','$_POST[deskripsi_fuel]')");
  $id_fuel = mysqli_insert_id($con);
  if($fuel_insert){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../public/img/img_kendaraan/fuel/".$id_fuel.".jpg");
    echo "<script>alert('successfully insert fuel')</script>";
    echo "<script>document.location.href='index.php?menu=add_fuel'</script>";
  }else{
    echo "<script>alert('failed insert fuel')</script>";
    echo "<script>document.location.href='index.php?menu=add_fuel'</script>";
  }
}      

if(isset($_POST['update_fuel'])){
  $nama_fuel = $_POST['fuel'];
  $isi = $_POST['deskripsi_fuel'];
  $id = $_POST['idfuel'];
  $fuel_update = mysqli_query($con,"UPDATE `tb_fuel` SET `fuel`='$_POST[fuel]',`deskripsi_fuel`='$_POST[deskripsi_fuel]' WHERE tb_fuel.idfuel = '$id'");

  if($fuel_update){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../public/img/img_kendaraan/fuel/".$id.".jpg");
    echo "<script>alert('successfully update fuel')</script>";
    echo "<script>document.location.href='index.php?menu=add_fuel'</script>";
  }else{
    echo "<script>alert('failed update fuel')</script>";
    echo "<script>document.location.href='index.php?menu=add_fuel'</script>";

  }
}      
$fuel_data = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_fuel WHERE idfuel='$_GET[edit]'"));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<!-- <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script> -->
  <body>
   <div class="card-body">
    <h1>Fuel</h1>
    <br><br>

    <div class="row">

      <div class="col-7">
        <div class="card">
          <h5 style="padding:5%;">Add Fuel</h5>
          <center>
            <form style="padding-left: 5%;" method="post" enctype="multipart/form-data">
              <input style="width: 80%;" class="form-control" type="hidden" name="idfuel" placeholder="fuel" value="<?php echo $fuel_data[0] ?>">
              <div class="form-group">
                <input style="width: 80%;" class="form-control" type="text" name="fuel" placeholder="Fuel" value="<?php echo $fuel_data['fuel'] ?>"><br>
              </div>
              <div class="form-group">
                <!-- <input style="width: 80%;" class="form-control" type="texta" name="" value="Brand"><br> -->
                <textarea class="ckeditor" style="width: 80%; margin-top: 0px; margin-bottom: 0px; height: 40px;" placeholder="Isi fuel" name="deskripsi_fuel" value=""><?php echo $fuel_data['deskripsi_fuel'] ?></textarea>
              </div>
              <div class="form-group">
                <input style="width: 80%;" class="form-control" type="file" name="fileToUpload" id="fileToUpload"><br>

                <?php if($_GET['edit']){ ?>
                  <img style="max-width: 100px" src="../public/img/img_kendaraan/fuel/<?php echo $_GET['edit'] ?>.jpg">
                <?php } ?>
              </div>
              <div class="form-group">
                <?php if($_GET['edit']){ ?>
                  <input type="submit" class="btn btn-primary" name="update_fuel" value="UPDATE">
                  <a href="index.php?menu=add_fuel" class="btn btn-danger">CANCEL</a>
                <?php }else{ ?>
                  <input class="btn btn-success" type="submit" name="insert_fuel" value="SUBMIT">
                  <a href="index.php?menu=add_fuel" class="btn btn-danger">CANCEL</a>
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
            <th>fuel</th>
            <th>Deskripsi fuel</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(isset($_GET['delete_fuel'])){
            $fuel_delete = mysqli_query($con,"DELETE FROM `tb_fuel` WHERE idfuel = '$_GET[delete_fuel]'");
            if($fuel_delete){
              $filePath = "../public/img/img_kendaraan/fuel/".$_GET['delete_fuel'].".jpg";
              if (file_exists($filePath)) 
               {
                    unlink($filePath);
                   "<script>alert('Picture has been Succesfully deleted!')</script>";
              }
              else
              {
                     "<script>alert('Foto tidak ada')</script>";
              }
              
              echo"<script>alert('successfully delete fuel')</script>";
              echo "<script>document.location.href='index.php?menu=add_fuel'</script>";
            }else{
              echo"<script>alert('failed delete fuel')</script>";
              echo "<script>document.location.href='index.php?menu=add_fuel'</script>";
            }
          }
          $No=1;
          $fuel = mysqli_query($con,"SELECT * FROM tb_fuel ORDER BY idfuel DESC");
          while ($data_fuel = mysqli_fetch_array($fuel)) {
           ?>
           <tr>
            <td><?php echo $No++; ?></td>
            <td><?php echo $data_fuel['fuel'] ?></td>
            <td><?php echo $data_fuel['deskripsi_fuel'] ?></td>
            <td>
              <a href="index.php?menu=add_fuel&edit=<?php echo $data_fuel[0] ?>"><i class="fas fa-edit" title="edit-data"></i></a> &nbsp / &nbsp 
              <a href="index.php?menu=add_fuel&delete_fuel=<?php echo $data_fuel[0] ?>"><i class="fas fa-trash-alt" title="delete-data"></i></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
<script type="text/javascript" src="vendor/ckeditor/ckeditor.js"></script>
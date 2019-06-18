<?php include 'connect.php'; 

if(isset($_POST['insert_coolant'])){
  $coolant_insert = mysqli_query($con,"INSERT INTO `tb_coolant`(`IdCoolant`, `CoolantName`, `deskripsi`) VALUES (NULL,'$_POST[CoolantName]','$_POST[deskripsi]')");
  $idcoolant = mysqli_insert_id($con);
  if($coolant_insert){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../public/img/img_kendaraan/coolant/".$idcoolant.".jpg");
    echo "<script>alert('successfully insert coolant')</script>";
    echo "<script>document.location.href='index.php?menu=add_coolant'</script>";
  }else{
    echo "<script>alert('failed insert coolant')</script>";
    echo "<script>document.location.href='index.php?menu=add_coolant'</script>";
  }
}      

if(isset($_POST['update_coolant'])){
  $namacoolant = $_POST['CoolantName'];
  $deskripsii = $_POST['deskripsi'];
  $idcoolant = $_POST['IdCoolant'];
  $coolant_update = mysqli_query($con,"UPDATE `tb_coolant` SET `CoolantName`= '$namacoolant',`deskripsi`='$deskripsii' WHERE IdCoolant = '$idcoolant'");

  if($coolant_update){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../public/img/img_kendaraan/coolant/".$idcoolant.".jpg");
    echo "<script>alert('successfully update coolant')</script>";
    echo "<script>document.location.href='index.php?menu=add_coolant'</script>";
  }else{
    echo "<script>alert('failed update coolant')</script>";
    echo "<script>document.location.href='index.php?menu=add_coolant'</script>";

  }
}      
$coolant_data = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_coolant WHERE IdCoolant='$_GET[edit]'"));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title></title>

	<!-- <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script> -->
  <body>
   <div class="card-body">
    <h1>coolant</h1>
    <br><br>

    <div class="row">

      <div class="col-7">
        <div class="card">
          <h5 style="padding:5%;">Add coolant</h5>
          <center>
            <form style="padding-left: 5%;" method="post" enctype="multipart/form-data">
              <input style="width: 80%;" class="form-control" type="hidden" name="IdCoolant" placeholder="coolant" value="<?php echo $coolant_data[0] ?>">
              <div class="form-group">
                <input style="width: 80%;" class="form-control" type="text" name="CoolantName" placeholder="coolant" value="<?php echo $coolant_data['CoolantName'] ?>"><br>
              </div>
              <div class="form-group">
                <!-- <input style="width: 80%;" class="form-control" type="texta" name="" value="Brand"><br> -->
                <textarea class="ckeditor" style="width: 80%; margin-top: 0px; margin-bottom: 0px; height: 40px;" placeholder="Description" name="deskripsi" value=""><?php echo $coolant_data['deskripsi'] ?></textarea>
              </div>
              <div class="form-group">
                <input style="width: 80%;" class="form-control" type="file" name="fileToUpload" id="fileToUpload"><br>

                <?php if($_GET['edit']){ ?>
                  <img style="max-width: 100px" src="../public/img/img_kendaraan/coolant/<?php echo $_GET['edit'] ?>.jpg">
                <?php } ?>
              </div>
              <div class="form-group">
                <?php if($_GET['edit']){ ?>
                  <input type="submit" class="btn btn-primary" name="update_coolant" value="UPDATE">
                  <a href="index.php?menu=add_coolant" class="btn btn-danger">CANCEL</a>
                <?php }else{ ?>
                  <input class="btn btn-success" type="submit" name="insert_coolant" value="SUBMIT">
                  <a href="index.php?menu=add_coolant" class="btn btn-danger">CANCEL</a>
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
            <th>Coolant Name</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(isset($_GET['delete_coolant'])){
            $coolant_delete = mysqli_query($con,"DELETE FROM `tb_coolant` WHERE IdCoolant = '$_GET[delete_coolant]'");
            if($coolant_delete){
              $filePath = "../public/img/img_kendaraan/coolant/".$_GET['delete_coolant'].".jpg";
              if (file_exists($filePath)) 
               {
                    unlink($filePath);
                   "<script>alert('Picture has been Succesfully deleted!')</script>";
              }
              else
              {
                     "<script>alert('Foto tidak ada')</script>";
              }
              
              echo"<script>alert('successfully delete coolant')</script>";
              echo "<script>document.location.href='index.php?menu=add_coolant'</script>";
            }else{
              echo"<script>alert('failed delete coolant')</script>";
              echo "<script>document.location.href='index.php?menu=add_coolant'</script>";
            }
          }
          $No=1;
          $coolant = mysqli_query($con,"SELECT * FROM tb_coolant ORDER BY Idcoolant DESC");
          while ($data_coolant = mysqli_fetch_array($coolant)) {
           ?>
           <tr>
            <td><?php echo $No++; ?></td>
            <td><?php echo $data_coolant['CoolantName'] ?></td>
            <td><?php echo $data_coolant['deskripsi'] ?></td>
            <td>
              <a href="index.php?menu=add_coolant&edit=<?php echo $data_coolant[0] ?>"><i class="fas fa-edit" title="edit-data"></i></a> &nbsp / &nbsp 
              <a href="index.php?menu=add_coolant&delete_coolant=<?php echo $data_coolant[0] ?>"><i class="fas fa-trash-alt" title="delete-data"></i></a>
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
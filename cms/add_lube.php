<?php include 'connect.php'; 

if(isset($_POST['insert_lube'])){
  $lube_insert = mysqli_query($con,"INSERT INTO `tb_lube`(`IdLube`, `NamaLube`, `Description`) VALUES (NULL,'$_POST[NamaLube]','$_POST[Description]')");
  $idlube = mysqli_insert_id($con);
  if($lube_insert){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../public/img/img_kendaraan/lube/".$idlube.".png");
    echo "<script>alert('successfully insert lube')</script>";
    echo "<script>document.location.href='index.php?menu=add_lube'</script>";
  }else{
    echo "<script>alert('failed insert lube')</script>";
    echo "<script>document.location.href='index.php?menu=add_lube'</script>";
  }
}      

if(isset($_POST['update_lube'])){
  $namalube = $_POST['NamaLube'];
  $deksripsi = $_POST['Description'];
  $idlube = $_POST['IdLube'];
  $lube_update = mysqli_query($con,"UPDATE `tb_lube` SET `NamaLube`='$namalube', `Description`='$deksripsi' WHERE IdLube = '$idlube'");

  if($lube_update){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../public/img/img_kendaraan/lube/".$idlube.".png");
    echo "<script>alert('successfully update lube')</script>";
    echo "<script>document.location.href='index.php?menu=add_lube'</script>";
  }else{
    echo "<script>alert('failed update lube')</script>";
    echo "<script>document.location.href='index.php?menu=add_lube'</script>";

  }
}      
$lube_data = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_lube WHERE IdLube='$_GET[edit]'"));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title></title>

	<!-- <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script> -->
  <body>
   <div class="card-body">
    <h1>Lube</h1>
    <br><br>

    <div class="row">

      <div class="col-7">
        <div class="card">
          <h5 style="padding:5%;">Add Lube</h5>
          <center>
            <form style="padding-left: 5%;" method="post" enctype="multipart/form-data">
              <input style="width: 80%;" class="form-control" type="hidden" name="IdLube" placeholder="Lube" value="<?php echo $lube_data[0] ?>">
              <div class="form-group">
                <input style="width: 80%;" class="form-control" type="text" name="NamaLube" placeholder="Lube" value="<?php echo $lube_data['NamaLube'] ?>"><br>
              </div>
              <div class="form-group">
                <!-- <input style="width: 80%;" class="form-control" type="texta" name="" value="Brand"><br> -->
                <textarea class="ckeditor" style="width: 80%; margin-top: 0px; margin-bottom: 0px; height: 40px;" placeholder="Description" name="Description" value=""><?php echo $lube_data['Description'] ?></textarea>
              </div>
              <div class="form-group">
                <input style="width: 80%;" class="form-control" type="file" name="fileToUpload" id="fileToUpload"><br>

                <?php if($_GET['edit']){ ?>
                  <img style="max-width: 100px" src="../public/img/img_kendaraan/lube/<?php echo $_GET['edit'] ?>.png">
                <?php } ?>
              </div>
              <div class="form-group">
                <?php if($_GET['edit']){ ?>
                  <input type="submit" class="btn btn-primary" name="update_lube" value="UPDATE">
                  <a href="index.php?menu=add_lube" class="btn btn-danger">CANCEL</a>
                <?php }else{ ?>
                  <input class="btn btn-success" type="submit" name="insert_lube" value="SUBMIT">
                  <a href="index.php?menu=add_lube" class="btn btn-danger">CANCEL</a>
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
            <th>Lube</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(isset($_GET['delete_lube'])){
            $lube_delete = mysqli_query($con,"DELETE FROM `tb_lube` WHERE IdLube = '$_GET[delete_lube]'");
            if($lube_delete){
              $filePath = "../public/img/img_kendaraan/lube/".$_GET['delete_lube'].".png";
              if (file_exists($filePath)) 
               {
                    unlink($filePath);
                   "<script>alert('Picture has been Succesfully deleted!')</script>";
              }
              else
              {
                     "<script>alert('Foto tidak ada')</script>";
              }
              
              echo"<script>alert('successfully delete lube')</script>";
              echo "<script>document.location.href='index.php?menu=add_lube'</script>";
            }else{
              echo"<script>alert('failed delete lube')</script>";
              echo "<script>document.location.href='index.php?menu=add_lube'</script>";
            }
          }
          $No=1;
          $lube = mysqli_query($con,"SELECT * FROM tb_lube ORDER BY IdLube DESC");
          while ($data_lube = mysqli_fetch_array($lube)) {
           ?>
           <tr>
            <td><?php echo $No++; ?></td>
            <td><?php echo $data_lube['NamaLube'] ?></td>
            <td><?php echo $data_lube['Description'] ?></td>
            <td>
              <a href="index.php?menu=add_lube&edit=<?php echo $data_lube[0] ?>"><i class="fas fa-edit" title="edit-data"></i></a> &nbsp / &nbsp 
              <a href="index.php?menu=add_lube&delete_lube=<?php echo $data_lube[0] ?>"><i class="fas fa-trash-alt" title="delete-data"></i></a>
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
 <?php include 'connect.php';

 if(isset($_POST['insert_brand'])){
  $brand_insert = mysqli_query($con,"INSERT INTO `tb_brand`(`IdBrand`, `NamaBrand`) VALUES (NULL,'$_POST[NamaBrand]')");
  $idbrand = mysqli_insert_id($con);
  if($brand_insert){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"assets/brand/".$idbrand.".jpg");
    echo "<script>alert('successfully insert brand')</script>";
    echo "<script>document.location.href='index.php?menu=add_brand'</script>";
  }else{
    echo "<script>alert('failed insert brand')</script>";
    echo "<script>document.location.href='index.php?menu=add_brand'</script>";


  }
}      

if(isset($_POST['update_brand'])){
  $namabrand = $_POST['NamaBrand'];
  $idbrand = $_POST['IdBrand'];
  $brand_update = mysqli_query($con,"UPDATE `tb_brand` SET `NamaBrand`='$namabrand' WHERE IdBrand = '$idbrand'");

  if($brand_update){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"assets/brand/".$idbrand.".jpg");
    echo "<script>alert('successfully update brand')</script>";
    echo "<script>document.location.href='index.php?menu=add_brand'</script>";
  }else{
    echo "<script>alert('failed update brand')</script>";
    echo "<script>document.location.href='index.php?menu=add_brand'</script>";

  }
}      
$brand_data = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_brand WHERE IdBrand='$_GET[edit]'"));
?>
<div class="card-body">
  <h1>Brand</h1>
  <br><br>
  
  <div class="row">

    <div class="col-5">
      <div class="card">
        <h5 style="padding:5%;">Add Brand</h5>
        <center>
          <form style="padding-left: 5%;" method="post" enctype="multipart/form-data">
            <input style="width: 80%;" type="hidden" name="IdBrand" id="Brand" class="form-control" required="required" value="<?php echo $brand_data[0] ?>">
            <div class="form-group">
              <input style="width: 80%;" autocomplete="off" type="text" name="NamaBrand" id="Brand" class="form-control" placeholder="NamaBrand" required="required" value="<?php echo $brand_data['NamaBrand'] ?>">
            </div>
            <div class="form-group">
                <!-- <input style="width: 80%;" class="form-control" type="file" name="fileToUpload" id="fileToUpload"><br> -->

                
              </div>

            <div class="form-group">
              <?php if($_GET['edit']){ ?>
                <input type="submit" class="btn btn-primary" name="update_brand" value="UPDATE">
                <a href="index.php?menu=add_brand" class="btn btn-danger">CANCEL</a>
              <?php }else{ ?>
                <input class="btn btn-success" type="submit" name="insert_brand" value="SUBMIT">
                <a href="index.php?menu=add_brand" class="btn btn-danger">CANCEL</a>
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
          <th>Brand Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if(isset($_GET['delete_brand'])){
          $brand_delete = mysqli_query($con,"DELETE FROM `tb_brand` WHERE IdBrand = '$_GET[delete_brand]'");
          if($brand_delete){
            $filePath = "assets/brand/".$_GET['delete_brand'].".jpg";
              if (file_exists($filePath)) 
               {
                    unlink($filePath);
                   "<script>alert('Picture has been Succesfully deleted!')</script>";
              }
              else
              {
                     "<script>alert('Foto tidak ada')</script>";
              }
            echo"<script>alert('successfully delete brand')</script>";
            echo "<script>document.location.href='index.php?menu=add_brand'</script>";
          }else{
            echo"<script>alert('failed delete brand')</script>";
            echo "<script>document.location.href='index.php?menu=add_brand'</script>";
          }
        }

        $No = 1;
        $tampil_brand = mysqli_query($con,"SELECT * FROM `tb_brand` ORDER BY IdBrand DESC");
        while ($data_brand = mysqli_fetch_array($tampil_brand)) {
         ?>
         <tr>
          <td><?php echo $No++; ?></td>
          <td><?php echo $data_brand['NamaBrand'] ?></td>
          <td>
            <a href="index.php?menu=add_brand&edit=<?php echo $data_brand[0] ?>"><i class="fas fa-edit" title="edit-data"></i></a> &nbsp / &nbsp 
            <a href="index.php?menu=add_brand&delete_brand=<?php echo $data_brand[0] ?>"><i class="fas fa-trash-alt" title="delete-data"></i></a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
<?php
@session_start(); 
include 'connect.php'; 

if(isset($_POST['insert_series'])){
  $series_insert = mysqli_query($con,"INSERT INTO `tb_series`(`IdSeries`, `IdBrand`, `ID_jenisbrand`, `Series`, `id_admin`) VALUES (NULL,'$_POST[IdBrand]','$_POST[ID_jenisbrand]','$_POST[Series]','$_SESSION[id_admin]')");

  if($series_insert){
    echo "<script>alert('successfully insert series')</script>";
    echo "<script>document.location.href='index.php?menu=add_series'</script>";
  }else{
    echo "<script>alert('failed insert series')</script>";
    echo "<script>document.location.href='index.php?menu=add_series'</script>";
  }
}

if(isset($_POST['update_series'])){
  $brand = $_POST['IdBrand'];
  $jenisbrand = $_POST['ID_jenisbrand'];
  $series = $_POST['Series'];
  $idseries = $_POST['IdSeries'];
  $series_update = mysqli_query($con,"UPDATE `tb_series` SET `IdBrand`='$brand',`ID_jenisbrand`='$jenisbrand',`Series`='$series' WHERE IdSeries = '$idseries' ");
  if($series_update){
    echo "<script>alert('successfully update series')</script>";
    echo "<script>document.location.href='index.php?menu=add_series'</script>";
  }else{
    echo "<script>alert('failed update series')</script>";
    echo "<script>document.location.href='index.php?menu=add_series'</script>";
  }
}
$edit_series = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_series JOIN tb_brand ON tb_series.IdBrand = tb_brand.IdBrand JOIN tb_jenisbrand ON tb_series.ID_jenisbrand = tb_jenisbrand.ID_jenisbrand WHERE tb_series.IdSeries = '$_GET[edit]'"));
?>
 <div class="card-body">
  <h1>Series</h1>
  <br><br>
  
  <div class="row">

    <div class="col-5">
      <div class="card">
        <h5 style="padding:5%;">Add Series</h5>
        <center>
          <form style="padding-left: 5%;" method="post">
            <input style="width: 80%;" type="hidden" name="IdSeries" id="IdSeries" class="form-control" placeholder="IdSeries" required="required" value="<?php echo $edit_series['IdSeries'] ?>">
            <div class="form-group">
               <select class="selectpicker form-control"  name="IdBrand" value ="<?php echo $edit_series['NamaBrand'] ?>">
                <option><?php echo $edit_series['NamaBrand'] ?></option>
                <?php 
                $brand = mysqli_query($con,"SELECT * FROM tb_brand"); 
                while($data_brand = mysqli_fetch_array($brand)){
                ?>
                <option value="<?php echo $data_brand['IdBrand']?>"><?php echo $data_brand['NamaBrand'] ?></option>
                <?php } ?>
              </select>
            </div>
              <div class="form-group">
               <select class="selectpicker form-control"  name="ID_jenisbrand" >
                <option data-thumbnail="images/icon-chrome.png"><?php echo $edit_series['JenisBrand'] ?></option>
                <?php 
                  $jenisbrand = mysqli_query($con,"SELECT * FROM tb_jenisbrand");
                  while($tampil_brand = mysqli_fetch_array($jenisbrand)){
                 ?>
                <option value="<?php echo $tampil_brand['ID_jenisbrand']?>"><?php echo $tampil_brand['JenisBrand']?></option>
                <?php } ?>
              </select>
              </div>
              <div class="form-group">
            <input style="width: 100%;" autocomplete="off" type="text" name="Series" id="Brand" class="form-control" placeholder="Series" required="required" value="<?php echo $edit_series['Series'] ?>">
            </div>
              <div class="form-group">
                <?php if($_GET['edit']){ ?>
                <input type="submit" class="btn btn-primary" name="update_series" value="UPDATE">
                <a href="index.php?menu=add_series" class="btn btn-danger">CANCEL</a>
              <?php }else{ ?>
              <input class="btn btn-success" type="submit" name="insert_series">
              <a href="index.php?menu=add_series" class="btn btn-danger">CANCEL</a>
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
          <th>Series</th>
          <th>Brand</th>
          <th>Vehicle</th>
          <th>Username</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_GET['delete_series'])){
               $series_delete = mysqli_query($con,"DELETE FROM `tb_series` WHERE IdSeries = '$_GET[delete_series]'");
                if($series_delete){
                    echo"<script>alert('successfully delete series')</script>";
                    echo "<script>document.location.href='index.php?menu=add_series'</script>";
              }else{
                    echo"<script>alert('failed delete series')</script>";
                    echo "<script>document.location.href='index.php?menu=add_series'</script>";
                }
              }
          $No=1;
          $tampil_series = mysqli_query($con,"SELECT * FROM tb_series JOIN tb_brand ON tb_series.IdBrand = tb_brand.IdBrand JOIN tb_jenisbrand ON tb_series.ID_jenisbrand = tb_jenisbrand.ID_jenisbrand JOIN tb_admin ON tb_series.id_admin = tb_admin.id_admin WHERE tb_series.id_admin = '$_SESSION[id_admin]'");
          while($data_series = mysqli_fetch_array($tampil_series)){
         ?>
        <tr>
          <td><?php echo $No++; ?></td>
          <td><?php echo $data_series['Series'] ?></td>
          <td><?php echo $data_series['NamaBrand'] ?></td>
          <td><?php echo $data_series['JenisBrand'] ?></td>
          <td><?php echo $data_series['username'] ?></td>
          <td>
            <a href="index.php?menu=add_series&edit=<?php echo $data_series[0] ?>"><i class="fas fa-edit" title="edit-data"></i></a> &nbsp / &nbsp 
            <a href="index.php?menu=add_series&delete_series=<?php echo $data_series[0] ?>"><i class="fas fa-trash-alt" title="delete-data"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
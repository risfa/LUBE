<?php include 'connect.php'; 

if(isset($_POST['insert_Promo'])){
  $Promo_insert = mysqli_query($con,"INSERT INTO `tb_detailpromo`(`ID_promo`, `Judul_promo`, `SDK`, `Cara_Pakai`, `Waktu_akhir`, `Flag_display`) VALUES (NULL,'$_POST[Judul_promo]','$_POST[SDK]','$_POST[Cara_Pakai]','$_POST[Waktu_akhir]','$_POST[Flag_display]')");
  if($Promo_insert){
    echo "<script>alert('successfully insert Promo')</script>";
    echo "<script>document.location.href='index.php?menu=add_promo'</script>";
  }else{
    echo "<script>alert('failed insert Promo')</script>";
    echo "<script>document.location.href='index.php?menu=add_romo'</script>";
  }
}      

if(isset($_POST['update_Promo'])){
  
  $idPromo = $_POST['ID_promo'];
  $Promo_update = mysqli_query($con,"UPDATE `tb_detailpromo` SET `Judul_promo`='$_POST[Judul_promo]',`SDK`='$_POST[SDK]',`Cara_Pakai`='$_POST[Cara_Pakai]',`Waktu_akhir`='$_POST[Waktu_akhir]',`Flag_display`='$_POST[Flag_display]' WHERE ID_promo = '$idPromo'");

  if($Promo_update){
    echo "<script>alert('successfully update Promo')</script>";
    echo "<script>document.location.href='index.php?menu=add_promo'</script>";
  }else{
    echo "<script>alert('failed update Promo')</script>";
    echo "<script>document.location.href='index.php?menu=add_promo'</script>";

  }
}      
$Promo_data = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_detailpromo WHERE ID_promo='$_GET[edit]'"));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title></title>

	<!-- <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script> -->
  <body>
   <div class="card-body">
    <h1>Promo</h1>
    <br><br>

    <div class="row">

      <div class="col-7">
        <div class="card">
          <h5 style="padding:5%;">Add Promo</h5>
          <center>
            <form style="padding-left: 5%;" method="post" enctype="multipart/form-data">
              <input style="width: 80%;" class="form-control" type="hidden" name="ID_promo" placeholder="Promo" value="<?php echo $Promo_data[0] ?>">
              <div class="form-group">
                <input style="width: 80%;" class="form-control" type="text" name="Judul_promo" placeholder="Title Promo" value="<?php echo $Promo_data['Judul_promo'] ?>"><br>
              </div>
              <div class="form-group">
                <input style="width: 80%;" class="form-control" type="date" name="Waktu_akhir" placeholder="Tanggal Berakhir Promo" value="<?php echo $Promo_data['Waktu_akhir'] ?>"><br>
              </div>
              <div class="form-group">
                <select style="width: 80%;" class="form-control" name="Flag_display">
                  <option disabled="" selected="">Pilih Display</option>
                  <option selected="" value="<?php echo $Promo_data['Flag_display'] ?>"><?php echo $Promo_data['Flag_dissplay'] ?></option>
                  <option value="0">Tidak Tampil</option>
                  <option value="1">Tampilkan</option>
                </select>
              </div>

              <div class="form-group">
                <label>Syartum</label>
                <textarea class="ckeditor" style="width: 80%; margin-top: 0px; margin-bottom: 0px; height: 40px;" placeholder="Syartum" name="SDK" value=""><?php echo $Promo_data['SDK'] ?></textarea>
              </div>

              <div class="form-group">
                <label>Cara Pakai</label>
                <textarea class="ckeditor" style="width: 80%; margin-top: 0px; margin-bottom: 0px; height: 40px;" placeholder="Syartum" name="Cara_Pakai" value=""><?php echo $Promo_data['Cara_Pakai'] ?></textarea>
              </div>
              
              <div class="form-group">
                <?php if($_GET['edit']){ ?>
                  <input type="submit" class="btn btn-primary" name="update_Promo" value="UPDATE">
                  <a href="index.php?menu=add_Promo" class="btn btn-danger">CANCEL</a>
                <?php }else{ ?>
                  <input class="btn btn-success" type="submit" name="insert_Promo" value="SUBMIT">
                  <a href="index.php?menu=add_Promo" class="btn btn-danger">CANCEL</a>
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
            <th>Promo</th>
            <th>Syartum</th>
            <th>Cara Pakai</th>
            <th>Waktu Akhir Promo</th>
            <th>Display Promo</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(isset($_GET['delete_Promo'])){
            $Promo_delete = mysqli_query($con,"DELETE FROM `tb_detailpromo` WHERE ID_promo = '$_GET[delete_Promo]'");
            if($Promo_delete){
              
              echo"<script>alert('successfully delete Promo')</script>";
              echo "<script>document.location.href='index.php?menu=add_promo'</script>";
            }else{
              echo"<script>alert('failed delete Promo')</script>";
              echo "<script>document.location.href='index.php?menu=add_promo'</script>";
            }
          }
          $No=1;
          $Promo = mysqli_query($con,"SELECT * FROM `tb_detailpromo` ORDER BY ID_promo DESC");
          while ($data_Promo = mysqli_fetch_array($Promo)) {
           ?>
           <tr>
            <td><?php echo $No++; ?></td>
            <td><?php echo $data_Promo['Judul_promo'] ?></td>
            <td><?php echo $data_Promo['SDK'] ?></td>
            <td><?php echo $data_Promo['Cara_Pakai'] ?></td>
            <td><?php echo $data_Promo['Waktu_akhir'] ?></td>
            <td><?php 
            if($data_Promo['Flag_display']== 0){
              echo "Tidak Ditampilkan";
            }else{
              echo"Ditampilkan";
            }
            // echo $data_Promo['Flag_display'] 
            ?></td>
            <td>
              <a href="index.php?menu=add_promo&edit=<?php echo $data_Promo[0] ?>"><i class="fas fa-edit" title="edit-data"></i></a> &nbsp / &nbsp 
              <a href="index.php?menu=add_promo&delete_Promo=<?php echo $data_Promo[0] ?>"><i class="fas fa-trash-alt" title="delete-data"></i></a>
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
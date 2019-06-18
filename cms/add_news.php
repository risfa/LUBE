<?php include 'connect.php'; 

if(isset($_POST['insert_news'])){
  $news_insert = mysqli_query($con,"INSERT INTO `tb_news`(`id_news`, `judul_news`, `isi_news`) VALUES (NULL,'$_POST[judul_news]','$_POST[isi_news]')");
  $idnews = mysqli_insert_id($con);
  if($news_insert){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../public/img/foto_news/".$idnews.".jpg");
    echo "<script>alert('successfully insert news')</script>";
    echo "<script>document.location.href='index.php?menu=add_news'</script>";
  }else{
    echo "<script>alert('failed insert news')</script>";
    echo "<script>document.location.href='index.php?menu=add_news'</script>";
  }
}      

if(isset($_POST['update_news'])){
  $judul = $_POST['judul_news'];
  $isi = $_POST['isi_news'];
  $id = $_POST['id_news'];
  $news_update = mysqli_query($con,"UPDATE `tb_news` SET `judul_news`='$judul', `isi_news`='$isi' WHERE id_news = '$id'");

  if($news_update){
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../public/img/foto_news/".$id.".jpg");
    echo "<script>alert('successfully update news')</script>";
    echo "<script>document.location.href='index.php?menu=add_news'</script>";
  }else{
    echo "<script>alert('failed update news')</script>";
    echo "<script>document.location.href='index.php?menu=add_news'</script>";

  }
}      
$news_data = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM tb_news WHERE id_news='$_GET[edit]'"));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<title></title>

	<!-- <script src="//cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script> -->
  <body>
   <div class="card-body">
    <h1>News</h1>
    <br><br>

    <div class="row">

      <div class="col-7">
        <div class="card">
          <h5 style="padding:5%;">Add News</h5>
          <center>
            <form style="padding-left: 5%;" method="post" enctype="multipart/form-data">
              <input style="width: 80%;" class="form-control" type="hidden" name="id_news" placeholder="News" value="<?php echo $news_data[0] ?>">
              <div class="form-group">
                <input style="width: 80%;" class="form-control" type="text" name="judul_news" placeholder="judul News" value="<?php echo $news_data['Namanews'] ?>"><br>
              </div>
              <div class="form-group">
                <!-- <input style="width: 80%;" class="form-control" type="texta" name="" value="Brand"><br> -->
                <textarea class="ckeditor" style="width: 80%; margin-top: 0px; margin-bottom: 0px; height: 40px;" placeholder="Isi News" name="isi_news" value="<?php echo $news_data['isi_news'] ?>"><?php echo $news_data['isi_news'] ?></textarea>
              </div>
              <div class="form-group">
                <input style="width: 80%;" class="form-control" type="file" name="fileToUpload" id="fileToUpload"><br>

                <?php if($_GET['edit']){ ?>
                  <img style="max-width: 100px" src="../public/img/foto_news/<?php echo $_GET['edit'] ?>.jpg">
                <?php } ?>
              </div>
              <div class="form-group">
                <?php if($_GET['edit']){ ?>
                  <input type="submit" class="btn btn-primary" name="update_news" value="UPDATE">
                  <a href="index.php?menu=add_news" class="btn btn-danger">CANCEL</a>
                <?php }else{ ?>
                  <input class="btn btn-success" type="submit" name="insert_news" value="SUBMIT">
                  <a href="index.php?menu=add_news" class="btn btn-danger">CANCEL</a>
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
            <th>Judul News</th>
            <th>Isi News</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          if(isset($_GET['delete_news'])){
            $news_delete = mysqli_query($con,"DELETE FROM `tb_news` WHERE id_news = '$_GET[delete_news]'");
            if($news_delete){
              $filePath = "../public/img/foto_news/".$_GET['delete_news'].".jpg";
              if (file_exists($filePath)) 
               {
                    unlink($filePath);
                   "<script>alert('Picture has been Succesfully deleted!')</script>";
              }
              else
              {
                     "<script>alert('Foto tidak ada')</script>";
              }
              
              echo"<script>alert('successfully delete news')</script>";
              echo "<script>document.location.href='index.php?menu=add_news'</script>";
            }else{
              echo"<script>alert('failed delete news')</script>";
              echo "<script>document.location.href='index.php?menu=add_news'</script>";
            }
          }
          $No=1;
          $news = mysqli_query($con,"SELECT * FROM tb_news ORDER BY id_news DESC");
          while ($data_news = mysqli_fetch_array($news)) {
           ?>
           <tr>
            <td><?php echo $No++; ?></td>
            <td><?php echo $data_news['judul_news'] ?></td>
            <td><?php echo $data_news['isi_news'] ?></td>
            <td>
              <a href="index.php?menu=add_news&edit=<?php echo $data_news[0] ?>"><i class="fas fa-edit" title="edit-data"></i></a> &nbsp / &nbsp 
              <a href="index.php?menu=add_news&delete_news=<?php echo $data_news[0] ?>"><i class="fas fa-trash-alt" title="delete-data"></i></a>
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
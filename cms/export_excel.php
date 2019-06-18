<?php 
@session_start();
include ('connect.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#result-datatable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                'copy', 'csv', 'excel', 'print'
                ]
            } );
        } );
    </script>
</head>
<body>
    <table id="result-datatable" class="display" style="width: 100%">
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
            </tr>
        </thead>
        <tbody>
        <?php 
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
        </tr>
        <?php
          }
        ?>
</tbody>
</table>
</body>
</html>

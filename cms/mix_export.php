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
                      <th>Brand</th>
        <th>Series</th>
        <th>Type</th>
        <th>Lube</th>
        
        <th>Fuel</th>
        <th>Coolant</th>
        <th>Username</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $No = 1 ;
        $tampil_mix = mysqli_query($con,"SELECT * FROM `tb_mixnmatch` JOIN tb_brand ON tb_brand.IdBrand = tb_mixnmatch.IdBrand JOIN tb_series ON tb_mixnmatch.IdSeries = tb_series.IdSeries JOIN tb_type ON tb_mixnmatch.idType = tb_type.idType JOIN tb_lube ON tb_mixnmatch.IdLube = tb_lube.IdLube JOIN tb_fuel ON tb_mixnmatch.idfuel = tb_fuel.idfuel JOIN tb_admin ON tb_mixnmatch.id_admin = tb_admin.id_admin  JOIN tb_coolant ON tb_mixnmatch.IdCoolant = tb_coolant.IdCoolant WHERE tb_mixnmatch.id_admin = '$_SESSION[id_admin]'");
        while ($data_mix = mysqli_fetch_array($tampil_mix)) {
        ?>
        <tr>
         <td><?php echo $No++; ?></td>
        <td><?php echo $data_mix['NamaBrand'] ?></td>
        <td><?php echo $data_mix['Series'] ?></td>
        <td><?php echo $data_mix['NamaMotor'] ?></td>
        <td><?php echo $data_mix['NamaLube'] ?></td>
        <!-- <td><?php echo $data_mix['LubeName'] ?></td> -->
        <td><?php echo $data_mix['fuel'] ?></td>
        <td>
          <?php echo $data_mix['CoolantName'] ?>
        </td>
        <td><?php echo $data_mix['username'] ?></td>
        </tr>
        <?php
          }
        ?>
</tbody>
</table>
</body>
</html>

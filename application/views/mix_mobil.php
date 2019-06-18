<?php include("parts/header.php") ?>
<section id="page-wrapper" style="min-height: 750px;">

  <section id="content-wrapper">
    <br><br><br>
    <div class="row">
      <div class="col-6">
        <img style="" class="mobil-img" src="<?php echo base_url("public/img/mobil.png") ?>">
      </div>
      <div class="col-6">
        <img style="position: absolute; right: 33%; width: 85px;" src="<?php echo base_url("public/img/doc1.png") ?>">
      </div>
    </div>
     <br><br><br><br><br>
   <div class="row">
      <div class="col-1">
      </div>
      <div class="col-10" style="background-color:lightgray; border-radius: 30px;">

        <div id="loader_select_box" style="display: none;background-color: rgba(40, 40, 40, 0.65); width: 100%; position: absolute; height:100%; margin-left: -3%; border-radius: 30px; ">
          <img src="https://thumbs.gfycat.com/EmptyDeliriousBluefish-small.gif" alt="" style="height: 35px; margin-left: 47%;margin-top: 22%;">
        </div>

        <br>
        <label>Pilih Merk</label><br>
        <select class=" form-control" id="select_merek">
          <option value="">-- Pilih Merek --</option>
          <?php
          foreach ($brand as $m) {
            ?>
            <option value="<?php echo $m->IdBrand ?>"><?php echo $m->NamaBrand ?></option>
          <?php } ?>
        </select>

        <br>

        <label>Pilih Varian</label><br>
        <select class=" form-control" id="select_series">
          <option value="">-- Pilih Varian --</option>

        </select>

        <br>


        <label>Pilih Tipe</label><br>
        <select class=" form-control" id="select_tipe">

          <option value="">-- Pilih Tipe --</option>

        </select>

        <br><br>

      </div>
      <div class="col-1"></div>
    </div>
    <div class="row" style="margin-top: 5%;">
      <div class="col-4"></div>
      <div class="col-4">
       <center>
         <a ><input style="padding:2%;background-color: #d2a300;font-size: 10pt;margin-top: -5px;" class="form-control" type="submit" id="mix_and_match" value="Mix n Match!" name=""></a>
       </center>
     </div>
     <div class="col-4"></div>
   </div>
 </section>
</section>
<style>
.mobil-img
{
  position: absolute;
  z-index: 11;
  left: 30%;
 top: 4vh;
}
</style>
<?php include("parts/menubar.php") ?>
<?php include("parts/js.php") ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">


  var IdBrand = 0;
  var IdSeries = 0;
  var idType = 0

  $(document).ready(function(){


    $('#select_merek').change(function(){
      id_select_brand = $(this).val();
      IdBrand = id_select_brand;

      var html = '';
      $('#loader_select_box').css('display','block');


      $.get(url+'Mix/api_varian_merek_mobil/'+id_select_brand, function(data, status){
        var data = JSON.parse(data)
        html += '<option>-- Pilih Varian --</option>'
        $.each(data,function(row,data){

          html += "<option value='"+data.IdSeries+"'>"+data.Series+"</option>";


        });

        $("#select_series").html(html);
        $('#loader_select_box').css('display','none');

      });


    });

    $('#select_series').change(function(){
      id_series = $(this).val();
      IdSeries = id_series

      var html = '';
      $('#loader_select_box').css('display','block');


      $.get(url+'Mix/api_varian_series/'+id_series, function(data, status){
        var data = JSON.parse(data)
        html += '<option value="">-- Pilih Tipe --</option>'
        $.each(data,function(row,data){

          html += "<option value='"+data.idType+"'>"+data.NamaMotor+"</option>";


        });

        $("#select_tipe").html(html);
        $('#loader_select_box').css('display','none');


      });


    });

    $('#select_tipe').change(function(){
      id_type = $(this).val();
      idType = id_type

    });



    $('#mix_and_match').click(function(){

      if($("#select_merek").val() == '') {
        alert("Harus Pilih Merek");
      }else{
        if ($('#select_series').val() == '') {
          alert("Harus Pilih Varian");
        }else{
          if ($('#select_tipe').val() == '') {
            alert('Harus Pilih Tipe')
          }else{

            $.post('<?php echo base_url().'index.php/Mix/insertHistoryMixnMatch/'; ?>',{userId : localStorage.userId,idSeries : IdSeries }, function(data, status){
              var URI = 'https://joker.5dapps.com/pertamina/drlube/index.php/Mix/result/'+IdBrand+'/'+IdSeries+'/'+idType+'';
              window.open(URI,"_self")
            });




          }
        }
      }



    })

  })


</script>

<div class="widget-box">
  <div class="widget-header">
      <h4 class="widget-title lighter-smaller"><i class="fa fa-print"> <?php echo "Cetak Data Mata Kuliah"; ?></i></h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div class="control-group">
        <form class="form-horizontal" id="form" name="form" method="post" action="<?php echo site_url('lap_matakuliah/cetak')?>">
          <div class="form-group">
            <label class="control-label col-sm-2">Program Studi:</label>
            <div class="col-sm-3">
              <select class="form-control" name="kd_prodi" id="kd_prodi" required>
                <option value="">--Pilih--</option>
                <?php foreach ($dataprodi as $rs): ?>
                  <option value="<?php echo $rs->kd_prodi?>"><?php echo $rs->prodi?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Semester:</label>
            <div class="col-sm-1">
              <select class="form-control" name="smt" id="smt">
                <option value="">--Pilih--</option>
                <?php for ($i=1; $i <=8 ; $i++) {
                  ?>
                  <option value="<?php echo $i?>"><?php echo $i?></option>
                  <?php
                } ?>
              </select>
            </div>
          </div>
          <div class="panel-footer center">
            <!-- <button type="button" class="btn btn-sm btn-danger" name="button"><i class="fa fa-chevron-circle-left bigger-125"></i> Kembali</button> -->
            <!-- <a href="<?php echo site_url('lap_mahasiswa')?>" class="btn btn-sm btn-danger" name=""><i class="fa fa-chevron-circle-left bigger-125"></i> Kembali</a> -->
            <button type="submit" class="btn btn-sm btn-success" name="cetak" id="cetak"><i class="fa fa-file-pdf-o bigger-125"></i> Cetak PDF</button>
            <button type="button" class="btn btn-sm btn-info" name="view_data" id="view_data"><i class="fa fa-search-plus bigger-125"></i> Lihat Data</button>
          </div>
        </form>
      </div>
      <br>
      <div class="view_detail" id="view_detail"></div>
    </div>
  </div>
  <div class="widget-footer">
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){

	$("#view_data").click(function(){
		cari_data();
	});
  // $("#smt").change(function(){
  //   cari_data();
  // });
  // $("#kd_prodi").change(function(){
  //   cari_data();
  // });

	function cari_data(){
		var kd_prodi = $("#kd_prodi").val();
		var smt = $("#smt").val();
    if (!$('#kd_prodi').val()) {
      $.gritter.add({
        title:'Error',
        text:'Prodi tidak boleh kosong',
        class_name:'gritter-error'
      });
      return false;
    }else {
      $.ajax({
        type	: 'POST',
        url		: "<?php echo site_url('Lap_matakuliah/cari_data'); ?>",
        data	: "kd_prodi="+kd_prodi+"&smt="+smt,
        cache	: false,
        success	: function(data){
          $("#view_detail").html(data);
          // alert(data);
        }
      });
    }

	}

	// $("#view_mhs_aktif").click(function(){
	// 	var th_akademik = $("#th_akademik").val();
	// 	var kd_prodi = $("#kd_prodi").val();
  //
  //
	// 	$.ajax({
	// 		type	: 'POST',
	// 		url		: "<?php echo site_url(); ?>/lap_mahasiswa/cari_data_mhs_aktif",
	// 		data	: "kd_prodi="+kd_prodi+"&th_akademik="+th_akademik,
	// 		cache	: false,
	// 		success	: function(data){
	// 			$("#view_detail").html(data);
	// 		}
	// 	});
	// });


});
</script>

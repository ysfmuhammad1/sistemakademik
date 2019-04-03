
<div class="widget-box">
  <div class="widget-header">
      <h4 class="widget-title lighter-smaller"><i class="fa fa-search-plus"> <?php echo "Lihat Data Mata Kuliah"; ?></i></h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div class="control-group">
        <form class="form-horizontal" id="form" name="form" method="post" action="<?php echo site_url('lap_matakuliah/cetak')?>">
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
		var smt = $("#smt").val();
    // if (!$('#smt').val()) {
    //   $.gritter.add({
    //     title:'Error',
    //     text:'Prodi tidak boleh kosong',
    //     class_name:'gritter-error'
    //   });
    //   return false;
    // }else {
      $.ajax({
        type	: 'POST',
        url		: "<?php echo site_url('site_dosen/matakuliah/cari_data'); ?>",
        // data	: "smt="+smt+'&nim='+nim+'&kd_prodi='+kd_prodi,
        data:"smt="+smt,
        cache	: false,
        success	: function(data){
          $("#view_detail").html(data);
          // alert(data);
        }
      });
    // }

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

<div class="widget-box">
  <div class="widget-header">
      <h4 class="widget-title lighter-smaller"><i class="fa fa-print"> <?php echo "Cetak Data Nilai"; ?></i></h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div class="control-group">
        <form class="form-horizontal" id="form" name="form" method="post" action="<?php echo site_url('lap_nilai/print_pdf')?>">
          <div class="form-group">
            <label class="control-label col-sm-2">Tahun Akademik:</label>
            <div class="col-sm-3">
              <select class="form-control" name="th_akademik" id="th_akademik" required>
                <option value="">--Pilih--</option>
                <?php foreach ($th_akademik_jadwal->result() as $rs): ?>
                  <option value="<?php echo $rs->th_akademik?>"><?php echo $rs->th_akademik?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Program Studi:</label>
            <div class="col-sm-3">
              <select class="form-control" name="kd_prodi" id="kd_prodi">
                <option value="">--Pilih--</option>
                <?php foreach ($dataprodi as $rs): ?>
                  <option value="<?php echo $rs->kd_prodi?>"><?php echo $rs->prodi?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Mata Kuliah:</label>
            <div class="col-sm-3">
              <select class="form-control" name="id_jadwal" id="id_jadwal" required>
                <option value="">--Pilih--</option>
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
  $(document).ready(function() {
    $("#th_akademik").change(function(){
      cari_mata_kuliah();
    });

    $('#view_data').click(function(event) {
      /* Act on the event */
      cari_data();
    });

    // $("#smt").change(function(){
    //   cari_mata_kuliah();
    // });
    $("#kd_prodi").change(function(){
      cari_mata_kuliah();
    });
    function cari_mata_kuliah(){
      var th_akademik = $("#th_akademik").val();
      var kd_prodi = $("#kd_prodi").val();

      if(!$("#th_akademik").val() || !$("#kd_prodi").val()){
        // alert('Tahun Akademik tidak boleh kosong');
        $.gritter.add({
          title:'Error',
          text:'Tahun Akademik dan prodi tidak boleh kosong',
          class_name:'gritter-error'
        });
        $("#th_akademik").focus();
        return false;
      }else {
        $.ajax({
          type	: 'POST',
          url		: "<?php echo site_url('lap_nilai/cari_mata_kuliah'); ?>",
          data	: "kd_prodi="+kd_prodi+"&th_akademik="+th_akademik,
          cache	: false,
          success	: function(data){
            $("#id_jadwal").html(data);
          }
        });
      }
    }

    // $('#cetak').click(function(event) {
    //   /* Act on the event */
    //   var string = $("#form").serialize();
    //
    //   if(!$("#th_akademik").val()){
    //     $.gritter.add({
    //       title: 'Peringatan..!!',
    //       text: 'Th Akademik tidak boleh kosong',
    //       class_name: 'gritter-error'
    //     });
    //     $("#th_akademik").focus();
    //     return false;
    //   }else if(!$("#id_jadwal").val()){
    //     $.gritter.add({
    //       title: 'Peringatan..!!',
    //       text: 'Mata Kuliah tidak boleh kosong',
    //       class_name: 'gritter-error'
    //     });
    //     $("#id_jadwal").focus();
    //     return false;
    //   }else if(!$("#kd_prodi").val()){
    //     $.gritter.add({
    //       title: 'Peringatan..!!',
    //       text: 'PRODI tidak boleh kosong',
    //       class_name: 'gritter-error'
    //     });
    //     $("#kd_prodi").focus();
    //     return false;
    //   }else {
    //
    //     $.ajax({
    //       type	: 'POST',
    //       url		: "<?php echo site_url('lap_nilai/print_pdf'); ?>",
    //       data	: string,
    //       cache	: false,
    //       success	: function(data){
    //         // $("#view_detail").html(data);
    //       }
    //     });
    //   }
    // });

    function cari_data(){
      var string = $("#form").serialize();

      if(!$("#th_akademik").val()){
        $.gritter.add({
          title: 'Peringatan..!!',
          text: 'Th Akademik tidak boleh kosong',
          class_name: 'gritter-error'
        });
        $("#th_akademik").focus();
        return false;
      }else if(!$("#id_jadwal").val()){
        $.gritter.add({
          title: 'Peringatan..!!',
          text: 'Mata Kuliah tidak boleh kosong',
          class_name: 'gritter-error'
        });
        $("#id_jadwal").focus();
        return false;
      }else if(!$("#kd_prodi").val()){
        $.gritter.add({
          title: 'Peringatan..!!',
          text: 'PRODI tidak boleh kosong',
          class_name: 'gritter-error'
        });
        $("#kd_prodi").focus();
        return false;
      }else {

        $.ajax({
          type	: 'POST',
          url		: "<?php echo site_url('lap_nilai/cari_data'); ?>",
          data	: string,
          cache	: false,
          success	: function(data){
            $("#view_detail").html(data);
          }
        });
      }

    }

  });
</script>

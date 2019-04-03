<div class="widget-box">
  <div class="widget-header">
      <h4 class="widget-title lighter-smaller"><i class="fa fa-clipboard"> Kartu Rencana Studi (KRS)</i></h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div class="control-group">
        <form class="form-horizontal" id="myForm" name="myForm">
          <table class="">
            <tr>
              <td valign="top" width="50%">
                <div class="form-group">
                  <label for="th_akademik" class="col-sm-4 control-label">Tahun Akademik</label>
                  <div class="col-sm-6">
                    <select class="" name="th_akademik" id="th_akademik">
                      <option value="">--Pilih--</option>
                      <?php foreach ($th_akademik_jadwal->result() as $rs): ?>
                      <option value="<?php echo $rs->th_akademik?>"><?php echo $rs->th_akademik?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <input type="hidden" name="semester" id="semester" value="">
                </div>
                <div class="form-group">
                  <label for="nim" class="col-sm-4 control-label">Nim</label>
                  <div class="col-sm-6">
                    <select class="chosen-select" style="width:50%;!important" name="nim" id="nim" data-placeholder="Cari Nim...">
                      <option value="">Pilih Nim.....</option>
                      <?php foreach ($data_mhs->result() as $rs): ?>
                      <option value="<?php echo $rs->nim?>"><?php echo $rs->nim;?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </td>

              <td valign="top" width="50%">
                <div class="form-group">
                  <label for="nama_mhs" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" readonly="" class="" name="nama_mhs" id="nama_mhs">
                  </div>
                </div>
                <div class="form-group">
                  <label for="prodi" class="col-sm-2 control-label">Prodi</label>
                  <div class="col-sm-8">
                    <input type="text" readonly="" class="" style="width:15%; !important" name="kd_prodi" id="kd_prodi" value="<?php //echo 'g'.substr($th_akademik,11,14)?>">
                    <input type="text" readonly="" class="" name="prodi" id="prodi" value="<?php //echo 'g'.substr($th_akademik,11,14)?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="smt" class="col-sm-2 control-label">Semester</label>
                  <div class="col-sm-2">
                    <input type="text" style="width:100%; !important" readonly="" class="" name="smt" id="smt" value="<?php //echo 'g'.substr($th_akademik,11,14)?>">
                  </div>
                  <label for="maxsks" class="col-sm-2 control-label">Max SKS</label>
                  <div class="col-sm-3">
                    <input type="text" readonly="" style="width:60%; !important" class="" name="maxsks" id="maxsks" value="<?php //echo 'g'.substr($th_akademik,11,14)?>">
                  </div>
                </div>
              </td>
            </tr>
          </table>
          <br>
          <div class="modal-content">
            <div class="modal-footer center">
              <div class="form-group">
                <div class="row">
                  <div class="container">

                    <label for="id_jadwal" class="col-sm-2 control-label">Mata Kuliah</label>
                    <div class="col-sm-8">
                      <select class="col-sm-12" name="id_jadwal" id="id_jadwal">
                        <option value="">-Pilih Mata Kuliah-</option>
                      </select>
                    </div>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="container">

                    <a href="<?php echo site_url('krs')?>" class="btn btn-danger btn-sm">
                      <i class="fa fa-chevron-circle-left bigger-125"> Kembali</i>
                    </a>
                    <button type="button" name="cetak" id="cetak" class="btn btn-info btn-sm">
                      <i class="ace-icon glyphicon glyphicon-print bigger-125"> Cetak</i>
                    </button>
                    <button type="button" name="simpan" id="simpan" class="btn btn-sm btn-success">
                      <i class="fa fa-check bigger-125"> Simpan</i>
                    </button>
                  </div>
                </div>
            </div>
          </div>
        </form>
      </div>
      Ket:KRS Dicetak Oleh Mahasiswa
    </div>
    <div class="view_data_krs" id="view_data_krs"></div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('.chosen-select').chosen();
    function cariJadwal(){
      var th_akademik= $('#th_akademik').val();
      var kd_prodi= $('#kd_prodi').val();
      var semester= $('#semester').val();
      $.ajax({
        type:'GET',
        url:'<?php echo site_url('jadwal/cari_jadwal')?>',
        data:"th_akademik="+th_akademik+"&kd_prodi="+kd_prodi+"&semester="+semester,
        cache:false,
        success:function(data){
          $('#semester').html(data);
          // alert(data);
        }
      });
    }

    function cariKRS(){
      var th_akademik =$('#th_akademik').val();
      var th = th_akademik.substr(10,5).toLowerCase();
      var semester = $('#semester').val();
      var nim= $('#nim').val();
      $.ajax({
          url:'<?php echo site_url('krs/cariKRS')?>',
          type:'GET',
          data:"th_akademik="+th_akademik+"&semester="+semester+"&nim="+nim,
          cache:false,
          success:function(data){
            $('#view_data_krs').html(data);

          }
      });

    }

    $('#th_akademik').change(function(event) {
      /* Act on the event */
      var th_akademik = $('#th_akademik').val();
      var th = th_akademik.substr(10,5).toLowerCase();
      $('#semester').val(th);
    });
    function cariMatkul(){
      var th_akademik = $('#th_akademik').val();
      var kd_prodi = $('#kd_prodi').val();
      var semester = $('#semester').val();
      if (!$('#th_akademik').val() || !$('#kd_prodi').val() || !$('#semester').val()) {
        $.gritter.add({
          title:'Error',
          text :'Tahun Akademik dan Data Mahasiswa Tidak boleh kosong..!',
          class_name:'gritter-error'
        });
      }else {
        $.ajax({
            url:'<?php echo site_url('krs/carimatkul')?>',
            type:'GET',
            data:"th_akademik="+th_akademik+"&semester="+semester+"&kd_prodi="+kd_prodi,
            cache:false,
            success:function(data){
              $('#id_jadwal').html(data);
              cariKRS();
              // alert(data);
            }
        });
      }
    }
    $('#nim').change(function(event) {
      /* Act on the event */
      var th_akademik = $('#th_akademik').val();
      var semester = $('#semester').val();
      var nim = $('#nim').val();
      if(!$('#th_akademik').val()){
        $.gritter.add({
          title:'Error..!',
          text:'Tahun Akademik tidak boleh kosong..!!!',
          class_name:'gritter-error'
        });
      }else{
      $.ajax({
        url:'<?php echo site_url('krs/cari_nim')?>',
        type:'POST',
        data:"th_akademik="+th_akademik+"&semester="+semester+"&nim="+nim,
        dataType:'json',
        cache:false,
        success:function(data){
          $('#nama_mhs').val(data.nama);
          $('#kd_prodi').val(data.kd_prodi);
          $('#prodi').val(data.prodi);
          $('#smt').val(data.smt);
          $('#maxsks').val(24);
          cariMatkul();
          cariKRS();
          // alert(data);
        }
      });
    }
      $.ajax({
        type:'GET',
        url:'<?php echo site_url('jadwal/dosen')?>',
        data:"kd_prodi="+kd_prodi,
        cache:false,
        success:function(data){
          $('#dosen').html(data);
        }
      });
    });

    $('#simpan').click(function(event) {
      /* Act on the event */
    var  data=$('#myForm').serialize();
      if( !$('#id_jadwal').val() || !$('#th_akademik').val() || !$('#nim').val() ){
        $.gritter.add({
          title:'Error..!',
          text:'Data Tidak Boleh Kosong..!!!',
          class_name:'gritter-error'
        });
      }else {
        $.ajax({
          type:'POST',
          url:'<?php echo site_url('krs/simpan')?>',
          data:data,
          cache:false,
          success:function(data){
            swal({
              title:'Info',
              text:data,
              icon:'success',
            }).then((isConfirm)=>{
              if(isConfirm){
                // location.reload();
                cariKRS();
              }
            });
          }
        });
      }
    });
    $('#cetak').click(function(event) {
      /* Act on the event */
      var  data=$('#myForm').serialize();
        if( !$('#th_akademik').val() || !$('#nim').val() ){
          $.gritter.add({
            title:'Error..!',
            text:'Data Tidak Boleh Kosong..!!!',
            class_name:'gritter-error'
          });
        }else {
          $.ajax({
            type:'POST',
            url:'<?php echo site_url('krs/validasi_print_krs')?>',
            data:data,
            cache:false,
            success:function(data){
              $.gritter.add({
                title:'Info..!',
                text:data,
                class_name:'gritter-info'
              });

              if (data=='Sukses') {
                window.location.assign("<?php echo site_url('krs/print_krs')?>");
              }
              // swal({
              //   title:'Info',
              //   text:data,
              //   icon:'success',
              // }).then((isConfirm)=>{
              //   if(isConfirm){
              //     // location.reload();
              //     cariKRS();
              //   }
              // });
            }
          });
        }
    });
  });
</script>

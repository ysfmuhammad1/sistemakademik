<div class="widget-box">
  <div class="widget-header">
      <h4 class="widget-title lighter-smaller"><i class="fa fa-clipboard"> Nilai Mahasiswa</i></h4>
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
                      <?php foreach ($th_akademik_krs->result() as $rs): ?>
                      <option value="<?php echo $rs->th_akademik?>"><?php echo $rs->th_akademik?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <input type="hidden" name="semester" id="semester" value="<?php echo substr($rs->th_akademik,10,5)?>">
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-4 control-label">Program Studi</label>
                  <div class="col-sm-6">
                    <select class="" name="kd_prodi" id="kd_prodi">
                      <option value="">--Pilih--</option>
                      <?php foreach ($prodi->result() as $rs): ?>
                        <option value="<?php echo $rs->kd_prodi?>"><?php echo $rs->prodi?></option>
                      <?php endforeach; ?>

                    </select>
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

                    <label class="col-sm-2 control-label">Mata Kuliah</label>
                    <div class="col-sm-8">
                      <select class="col-sm-12" name="mata_kuliah" id="mata_kuliah">
                        <option value="">-Pilih Mata Kuliah-</option>
                      </select>
                    </div>
                  </div>
                </div>
                <br>

                <div class="row">
                  <div class="container">

                    <a href="<?php echo site_url('nilai')?>" class="btn btn-danger btn-sm">
                      <i class="fa fa-chevron-circle-left bigger-125"> Kembali</i>
                    </a>
                    <!-- <button type="button" name="cetak" id="cetak" class="btn btn-info btn-sm">
                      <i class="ace-icon glyphicon glyphicon-print bigger-125"> Cetak</i>
                    </button> -->
                    <button type="button" name="simpan" id="simpan" class="btn btn-sm btn-success">
                      <i class="fa fa-check bigger-125"> Simpan</i>
                    </button>
                  </div>
                </div>
            </div>
          </div>
        </form>
      </div>
      <br>
      <div class="view_data_nila" id="view_data_nilai"></div>
    </div>
  </div>
  <div class="widget-footer">
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){

    // $('#mata_kuliah').click(function(event) {
    //   /* Act on the event */
    //   if (!$('#th_akademik').val() || !$('#kd_prodi').val()) {
    //     $.gritter.add({
    //       title:'Error',
    //       text:'Tahun Akademik dan Prodi tidak tersedia',
    //       class_name:'gritter-error'
    //     });
    //   }else {
    //     $.ajax({
    //       url: '<?php //echo site_url('nilai/cariNilai')?>',
    //       type: 'POST',
    //       data:"th_akademik="+$('#th_akademik').val()+"&kd_prodi="+$('#kd_prodi').val()+"&semester="+$('#semester').val()+'&kd_mk='+$('#mata_kuliah').val(),
    //       cache:false,
    //       success:function(result){
    //         $('#view_data_nilai').html(result);
    //       }
    //     });
    //
    //   }
    // });
    $('#simpan').click(function(event) {
      var jml_data=$('#jml_data').val();
      if (jml_data==0) {
        $.gritter.add({
          title: 'Peringatan..!!',
          text: 'Tidak Ada Nilai yang harus diisi',
          class_name: 'gritter-error'
        });
        return false();
      }
      if (!$('#th_akademik').val() || !$('#kd_prodi').val() || !$('#mata_kuliah').val()) {
        $.gritter.add({
          title:'Error',
          text:'Form tidak boleh kosng',
          class_name:'gritter-error'
        });
        return false();
      }else {
        for (var i = 1; i <= jml_data; i++) {
          var nim = $('#nim_'+i).val();
          var n = $('#nilai_'+i).val();
          var nilai =n.replace('+','*');

          $.ajax({
            url: '<?php echo site_url('nilai/simpan')?>',
            type: 'POST',
            data: 'nilai='+nilai+'&nim='+nim+'&th_akademik='+$('#th_akademik').val()+'&kd_prodi='+$('#kd_prodi').val()+'&kd_mk='+$('#mata_kuliah').val()+'&semester='+$('#semester').val()
            // success:function(result){

            // }
          });
          if (i == jml_data) {
            $.gritter.add({
              title:'Success',
              text:'Berhasil',
              class_name:'gritter-success'
            });
          }

        }

      }

    });

    $('#kd_prodi').change(function(event) {
      /* Act on the event */
      if (!$('#th_akademik').val()) {
        $.gritter.add({
          title:'Error',
          text:'Tahun Akademik tidak tersedia',
          class_name:'gritter-error'
        });
      }else {
          $.ajax({
            type:'GET',
            url:'<?php echo site_url('nilai/cariMk')?>',
            data:"th_akademik="+$('#th_akademik').val()+"&kd_prodi="+$('#kd_prodi').val()+"&semester="+$('#semester').val(),
            cache:false,
            success:function(data){
              $('#mata_kuliah').html(data);
              // alert(result);
            }
          });
      }
    });

    $('#mata_kuliah').change(function(event) {
      /* Act on the event */
      if (!$('#th_akademik').val() || !$('#kd_prodi').val() ||!$('#mata_kuliah').val()) {
        $.gritter.add({
          title:'Error',
          text:'Tahun Akademik tidak tersedia',
          class_name:'gritter-error'
        });
      }else {
          $.ajax({
            type:'POST',
            url:'<?php echo site_url('nilai/cariNilai')?>',
            data:"th_akademik="+$('#th_akademik').val()+"&kd_prodi="+$('#kd_prodi').val()+"&semester="+$('#semester').val()+'&kd_mk='+$('#mata_kuliah').val(),
            cache:false,
            // dataType:'json',
            success:function(data){
              $('#view_data_nilai').html(data);
              // alert(result);
            }
          });
      }
    });
    // $('.chosen-select').chosen();
    // function cariJadwal(){
    //   var th_akademik= $('#th_akademik').val();
    //   var kd_prodi= $('#kd_prodi').val();
    //   var semester= $('#semester').val();
    //   $.ajax({
    //     type:'GET',
    //     url:'<?php echo site_url('nilai/cariMk')?>',
    //     data:"th_akademik="+th_akademik+"&kd_prodi="+kd_prodi+"&semester="+semester,
    //     cache:false,
    //     success:function(data){
    //       $('#semester').html(data);
    //     }
    //   });
    // }
    //
    // function cariKRS(){
    //   var th_akademik =$('#th_akademik').val();
    //   var th = th_akademik.substr(10,5).toLowerCase();
    //   var semester = $('#semester').val();
    //   var nim= $('#nim').val();
    //   $.ajax({
    //       url:'<?php echo site_url('krs/cariKRS')?>',
    //       type:'GET',
    //       data:"th_akademik="+th_akademik+"&semester="+semester+"&nim="+nim,
    //       cache:false,
    //       success:function(data){
    //         $('#view_data_krs').html(data);
    //
    //       }
    //   });
    //
    // }
    //
    // $('#th_akademik').change(function(event) {
    //   var th_akademik = $('#th_akademik').val();
    //   $('#semester').val(th);
    // });
    // function cariMatkul(){
    //   var th_akademik = $('#th_akademik').val();
    //   var kd_prodi = $('#kd_prodi').val();
    //   var semester = $('#semester').val();
    //   if (!$('#th_akademik').val() || !$('#kd_prodi').val() || !$('#semester').val()) {
    //     $.gritter.add({
    //       title:'Error',
    //       text :'Tahun Akademik dan Data Mahasiswa Tidak boleh kosong..!',
    //       class_name:'gritter-error'
    //     });
    //   }else {
    //     $.ajax({
    //         url:'<?php echo site_url('krs/carimatkul')?>',
    //         type:'GET',
    //         data:"th_akademik="+th_akademik+"&semester="+semester+"&kd_prodi="+kd_prodi,
    //         cache:false,
    //         success:function(data){
    //           $('#id_jadwal').html(data);
    //           cariKRS();
    //         }
    //     });
    //   }
    // }
    // $('#kd_prodi').change(function(event) {
    //   var th_akademik = $('#th_akademik').val();
    //   var semester = $('#semester').val();
    //   var kd_prodi = $('#kd_prodi').val();
    //   if(!$('#th_akademik').val()){
    //     $.gritter.add({
    //       title:'Error..!',
    //       text:'Tahun Akademik tidak boleh kosong..!!!',
    //       class_name:'gritter-error'
    //     });
    //   }else{
    //   $.ajax({
    //     url:'<?php echo site_url('krs/cari_prodi')?>',
    //     type:'POST',
    //     data:"th_akademik="+th_akademik+"&semester="+semester+"&nim="+nim,
    //     dataType:'json',
    //     cache:false,
    //     success:function(data){
    //       $('#nama_mhs').val(data.nama);
    //       $('#kd_prodi').val(data.kd_prodi);
    //       $('#prodi').val(data.prodi);
    //       $('#smt').val(data.smt);
    //       $('#maxsks').val(24);
    //       cariMatkul();
    //
    //     }
    //   });
    // }
    //   $.ajax({
    //     type:'GET',
    //     url:'<?php echo site_url('jadwal/dosen')?>',
    //     data:"kd_prodi="+kd_prodi,
    //     cache:false,
    //     success:function(data){
    //       $('#dosen').html(data);
    //     }
    //   });
    // });
    //
    // $('#simpan').click(function(event) {
    // var  data=$('#myForm').serialize();
    //   if( !$('#id_jadwal').val() || !$('#th_akademik').val() || !$('#nim').val() ){
    //     $.gritter.add({
    //       title:'Error..!',
    //       text:'Data Tidak Boleh Kosong..!!!',
    //       class_name:'gritter-error'
    //     });
    //   }else {
    //     $.ajax({
    //       type:'POST',
    //       url:'<?php echo site_url('krs/simpan')?>',
    //       data:data,
    //       cache:false,
    //       success:function(data){
    //         swal({
    //           title:'Info',
    //           text:data,
    //           icon:'success',
    //         }).then((isConfirm)=>{
    //           if(isConfirm){
    //             cariKRS();
    //           }
    //         });
    //       }
    //     });
    //   }
    // });
  });
</script>

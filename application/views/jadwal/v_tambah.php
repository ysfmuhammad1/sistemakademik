<div class="widget-box">
  <div class="widget-header">
      <h4 class="widget-title lighter-smaller"><i class="fa fa-calendar"> Jadwal Kuliah Semester</i></h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div class="control-group">
        <form class="" name="myForm" id="myForm">
          <table width="100%" cellspacing="5" >
            <tbody>
              <tr>
                <td valign="top" width="50%">
                  <label for="th_akademik">Tahun Akademik</label>
                  <div class="control">
                    <input type="text" class="" name="th_akademik" id="th_akademik" value="<?php echo $th_akademik?>" readonly>
                  </div>
                  <!-- <label for="semester">Semester</label> -->
                  <div class="control">
                    <input type="hidden" class="" name="semester" id="semester" value="<?php echo 'g'.substr($th_akademik,11,14)?>">
                  </div>
                  <label for="prodi">Pilih Prodi</label>
                  <div class="control">
                    <select class="" name="kd_prodi" id="kd_prodi">
                      <option value="">--Pilih Prodi--</option>
                      <?php foreach ($fieldprodi as $t): ?>
                      <option value="<?php echo $t->kd_prodi?>"><?php echo $t->prodi;?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </td>
                <td valign="top" width="50%">
                  <label for="hari">Hari</label>
                  <!-- <input type="text" name="hari" id="hari" value=""> -->
                  <div class="control">
                    <select class="" name="hari" id="hari">
                        <option value="">--Pilih Hari--</option>
                      <?php foreach ($Hari as $h): ?>
                        <option value="<?php echo $h ?>"><?php echo $h ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <label for="waktu">Waktu</label>
                  <div class="control">
                    <select class="" name="waktu" id="waktu">
                      <option value="">--Pilih Waktu--</option>
                      <?php foreach ($Time as $t): ?>
                      <option value="<?php echo $t?>"><?php echo $t?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <label for="ruangan">Ruangan</label>
                  <div class="control">
                  <select class="" name="ruangan" id="ruangan">
                    <option value="">--Pilih Ruangan--</option>
                    <?php foreach ($Ruangan as $r): ?>
                      <option value="<?php echo $r?>"><?php echo $r;?></option>
                    <?php endforeach; ?>
                  </select>
                  </div>
                  <label for="matakuliah">Mata Kuliah</label>
                  <div class="control">
                    <select class="" name="matakuliah" id="matakuliah">
                      <option value="">--Pilih Mata Kuliah--</option>
                    </select>
                  </div>
                  <label for="kd_dosen">Dosen</label>
                  <div class="control">
                    <select class="" name="dosen" id="dosen">
                      <option value="">--Pilih Dosen--</option>
                    </select>
                  </div>
                </td>
              </tr>
            </tbody>
          </table><br>
          <div class="modal-content">
            <div class="modal-footer center">
              <a href="<?php echo site_url('jadwal')?>" class="btn btn-danger btn-sm">
                <i class="fa fa-chevron-circle-left"> Kembali</i>
              </a>
              <button type="reset" name="tambah" id="tambah" class="btn btn-info btn-sm">
                <i class="fa fa-plus-circle"> Tambah</i>
              </button>
              <button type="button" name="simpan" id="simpan" class="btn btn-sm btn-success">
                <i class="fa fa-check"> Simpan</i>
              </button>
            </div>
          </div>
        </form>

      </div>
    </div>
    <div class="view_data_jadwal" id="view_data_jadwal"></div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    function cariKRS(){
      var th_akademik= $('#th_akademik').val();
      var kd_prodi= $('#kd_prodi').val();
      var semester= $('#semester').val();
      $.ajax({
        type:'GET',
        url:'<?php echo site_url('jadwal/cari_jadwal')?>',
        data:"th_akademik="+th_akademik+"&kd_prodi="+kd_prodi+"&semester="+semester,
        cache:false,
        success:function(data){
          $('#view_data_jadwal').html(data);
          // alert(data);
        }
      });
    }
    $('#kd_prodi').change(function(event) {
      /* Act on the event */
      var kd_prodi = $('#kd_prodi').val();
      var semester = $('#semester').val();
      $.ajax({
        url:'<?php echo site_url('jadwal/matkul')?>',
        type:'POST',
        data:"kd_prodi="+kd_prodi+"&semester="+semester,
        cache:false,
        success:function(data){
          $('#matakuliah').html(data);
          cariKRS();
          // alert(data);
        }
      });
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
      if( !$('#matakuliah').val() || !$('#dosen').val() || !$('#hari').val() || !$('#waktu').val() || !$('#ruangan').val() ){
        $.gritter.add({
          title:'Error..!',
          text:'Data Tidak Boleh Kosong..!!!',
          class_name:'gritter-error'
        });
      }else {
        $.ajax({
          type:'POST',
          url:'<?php echo site_url('jadwal/simpan')?>',
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
              }
            });
          }
        });
      }
    });
  });
</script>

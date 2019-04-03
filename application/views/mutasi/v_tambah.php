<div class="widget-box">
  <div class="widget-header">
      <h4 class="widget-title lighter-smaller"><i class="fa fa-clipboard"> Mutasi Mahasiswa</i></h4>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div class="control-group">
        <form class="form-horizontal" id="formmutasi" name="formmutasi">
          <input type="hidden" name="id" id="id" value="<?php echo $id?>">
          <div class="form-group">
            <label class="control-label col-sm-2">Tahun Akademik:</label>
            <div class="col-sm-3">
              <select class="form-control" name="th_akademik" id="th_akademik">
                <option value="">--Pilih--</option>
                <?php foreach ($th_akademik_jadwal->result() as $rs): ?>
                  <option id="th_ak" value="<?php echo $rs->th_akademik;?>"><?php echo $rs->th_akademik;?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Tanggal:</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="text" name="tgl" id="tgl" class="form-control date-picker" data-date-format="dd-mm-yyyy" value="">
                <span class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Nim:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="nim" id="nim" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Nama Mahasiswa:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" value="" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Jenis Kelamin:</label>
            <div class="col-sm-1">
              <input type="text" class="form-control" name="sex" id="sex" value="" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Status</label>
            <div class="col-sm-3">
              <select class="form-control" name="status" id="status">
                <option value="">--Pilih--</option>
                <?php foreach ($data_status as $rs): ?>
                  <option value="<?php echo $rs;?>"><?php echo $rs;?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Keterangan:</label>
            <div class="col-sm-4">
              <textarea name="ket" id="ket" class="form-control" placeholder="Keterangan" rows="5" cols="80"></textarea>
            </div>
          </div>
          <div class="panel-footer">
            <!-- <button type="button" class="btn btn-sm btn-danger" name="button"><i class="fa fa-chevron-circle-left bigger-125"></i> Kembali</button> -->
            <a href="<?php echo site_url('mutasimhs')?>" class="btn btn-sm btn-danger" name=""><i class="fa fa-chevron-circle-left bigger-125"></i> Kembali</a>
            <button type="button" class="btn btn-sm btn-success" name="" id="simpan"><i class="fa fa-check bigger-125"></i> Simpan</button>
            <button type="reset" class="btn btn-sm btn-info" name=""><i class="fa fa-refresh bigger-125"></i> Reset</button>
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
  $(document).ready(function() {
    $('#tgl').datepicker({
      autoclose:true
    }).next().on(ace.click_event,function(){
      $(this).prev().focus();
    });
    // $('#th_akademik').change(function(event) {
    //   /* Act on the event */
    //   var smt
    // });

    $('#simpan').click(function(event) {
      /* Act on the event */
      var form =$('#formmutasi').serialize();
      // var id =$('#id').val();

      if (!$('#th_akademik').val()) {
        $.gritter.add({
          title:'Error',
          text:'Tahun akademik tidak boleh kosong',
          class_name:'gritter-error'
        });
        return false;
      }else if (!$('#tgl').val()) {
        $.gritter.add({
          title:'Error',
          text:'Tanggal Mutasi tidak boleh kosong',
          class_name:'gritter-error'
        });
        return false;
      }else if (!$('#nim').val() || !$('#nama_mhs').val() || !$('#sex').val() || !$('#status').val()) {
        $.gritter.add({
          title:'Error',
          text:'Semua Form Wajib diisi',
          class_name:'gritter-error'
        });
        return false;
      }else {
        $.ajax({
          url: '<?php echo site_url('mutasimhs/simpan')?>',
          type: 'POST',
          // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: form,
          success:function(result){
            swal({
              title:'Info',
              text:result,
              icon:'success'
            }).then((isConfirm)=>{
              if (isConfirm) {

              }
            });
          }
        });

      }
    });
  });
  cari_data();
  $("#nim").keyup(function(){
    cari_mhs();
  });
  function cari_mhs(){
    var nim = $("#nim").val();

    $.ajax({
      type	: "POST",
      url		: "<?php echo site_url('mutasimhs/cari_mhs'); ?>",
      data	: "nim="+nim,
       dataType: "json",
      success	: function(data){
        $('#nama_mhs').val(data.nama_mhs);
        $('#sex').val(data.sex);
        // alert(data.sex);
      }
    });
  }

  function cari_data(){
    var id	= $("#id").val();
    $.ajax({
      type	: "POST",
      url		: "<?php echo site_url('mutasimhs/cari'); ?>",
      data	: "id="+id,
      dataType: "json",
      success	: function(data){
        $('#th_ak').attr('selected', data.th_akademik);
        // $('#th_akademik').val(data.th_akademik);
        // $('#smt').val(data.smt);
        $('#tgl').val(data.tgl);
        $('#nim').val(data.nim);
        $('#status').val(data.status);
        $('#ket').val(data.ket);
        cari_mhs();
        // alert(data);
      }
    });

  }
</script>

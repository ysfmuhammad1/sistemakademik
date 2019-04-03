<div class="row">
  <div class="col-sm-12">
      <form class="" name="form_ortu" id="form_ortu" action="" method="post">

        <div class="profile-user-info">

          <div class="profile-info-row">
            <div class="profile-info-name">
              <label for="nama_ayah">Nama Ayah</label>
            </div>
            <div class="profile-info-value">
              <input type="text" name="nama_ayah" id="nama_ayah" class="col-sm-6" value="<?php echo $nama_ayah; ?>">
            </div>
          </div>

          <div class="profile-info-row">
            <div class="profile-info-name">
              <label for="nama_ibu">Nama Ibu</label>
            </div>
            <div class="profile-info-value">
              <input type="text" class="col-sm-6" name="nama_ibu" id="nama_ibu" value="<?php echo $nama_ibu; ?>">
            </div>
          </div>

          <div class="profile-info-row">
            <div class="profile-info-name">
              <label for="alamat_ortu">Alamat</label>
            </div>
            <div class="profile-info-value">
              <input type="text" class="col-sm-8" name="alamat_ortu" id="alamat_ortu" value="<?php echo $alamat_ortu; ?>">
            </div>
          </div>

          <div class="profile-info-row">
            <div class="profile-info-name">
              <label for="hp_ortu">Hp</label>
            </div>
            <div class="profile-info-value">
              <input type="text" class="col-sm-5" name="hp_ortu" id="hp_ortu" value="<?php echo $hp_ortu; ?>">
            </div>
          </div>

        </div>
        <input type="hidden" name="nim" value="<?php echo $nim;?>">

      </form>

      <div class="modal-content">
        <div class="modal-footer center">
          <a href="<?php echo site_url('mahasiswa/view');?>" class="btn btn-danger btn-sm">
            <i class="fa fa-chevron-circle-left"></i>
            Kembali
          </a>
          <button type="button" name="simpan_ortu" id="simpan_ortu" class="btn btn-primary btn-sm">
            <i class="fa fa-check"></i>
            Simpan
          </button>
        </div>
      </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#simpan_ortu').click(function(event) {
      /* Act on the event */
      var nim=<?php echo $nim;?>;
      var isiForm = $('#form_ortu').serialize();
      if (!$('#nama_ayah').val()) {
        $.gritter.add({
          title:'Warning',
          text:'Field Nama Ayah tidak boleh kosong',
          class_name:'gritter-error'
        });
        $('nama_ayah').focus();
        return false;
      }else {
        $.ajax({
          url: '<?php echo site_url('mahasiswa/simpan_ortu')?>',
          type: 'POST',
          data: isiForm,
          cache:false,
          success:function(data){
            swal({
              title:'Info.!',
              text:data,
              icon:'success',
            }).then((isConfirm)=>{
              if (isConfirm) {
                // location.reload();
              }
            });
          }
        });

      }
    });
  });
</script>

<div class="row">

  <div class="col-sm-3 center">
    <span class="profile-picture">
      <?php if (empty($foto)): ?>
        <img class="editable" id="avatar2" src="<?php echo base_url('assets/images/foto_mhs/no_foto.jpeg');?>">
        <?php else: ?>
        <img class="editable" id="avatar2" src="<?php echo base_url('assets/images/foto_mhs/<?php echo $foto;?>');?>">
      <?php endif; ?>
    </span>
  </div>
  <div class="col-sm-9">
    <h4 class="blue">
      <span class="label label-purple arrowed-in-right">
        <i class="fa fa-circle smaller-80"></i>
        <?php echo $status_mhs; ?>
      </span>
    </h4>
    <form class="" name="myForm" id="myForm" action="" method="">
      <div class="profile-user-info">

        <div class="profile-info-row">
          <div class="profile-info-name">Th Akademik</div>
          <div class="profile-info-value">
            <input type="text" name="th_akademik" id="th_akademik" readonly="" class="col-sm-3" value="<?php echo $th_akademik; ?>">
          </div>
        </div>

        <div class="profile-info-row">
          <div class="profile-info-name">Kode Prodi</div>
          <div class="profile-info-value">
            <input type="text" name="kd_prodi" id="kd_prodi" readonly="" class="col-sm-5" value="<?php echo $kd_prodi." "; ?> (<?php echo $nama_prodi;?>)">
          </div>
        </div>

        <div class="profile-info-row">
          <div class="profile-info-name">NIM</div>
          <div class="profile-info-value">
            <input type="text" name="nim" id="nim"  class="col-sm-3" value="<?php echo $nim; ?>">
            <div class="col-sm-7">
              <label class="inline">
                <input type="checkbox" class="ace" name="konversi" id="konversi" value="1" <?php if ($konver==2): ?>
                  <?php echo "disabled"; ?>
                  <?php else: ?>
                    <?php echo ""; ?>
                <?php endif; ?>>
                <span class="lbl middle">Konversi.?</span>
              </label>
            </div>
          </div>
        </div>

        <div class="profile-info-row">
          <div class="profile-info-name">Nama Lengkap</div>
          <div class="profile-info-value">
            <input type="text" name="nama_mhs" id="nama_mhs" class="col-sm-7" autofocus="" value="<?php echo $nama_mhs;?>">
          </div>
        </div>

        <div class="profile-info-row">
          <div class="profile-info-name">TTL</div>
          <div class="profile-info-value">
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="col-sm-6" value="<?php echo $tempat_lahir;?>">
            <div class="input-group col-sm-3">
              <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control date-picker" data-date-format="dd-mm-yyyy" value="<?php echo $tgl_lahir;?>">
              <span class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </span>
            </div>
          </div>
        </div>

        <div class="profile-info-row">
          <div class="profile-info-name">Jenis Kelamin</div>
          <div class="profile-info-value">
            <div class="col-sm-9">
              <label class="inline">
                <input type="radio" class="ace" name="sex" id="sex" value="L" <?php if ($sex=='L'): ?>
                  <?php echo "checked"; ?>
                <?php endif; ?>>
                <span class="lbl middle">Laki-Laki</span>
              </label>
              <label class="inline">
                <input type="radio" class="ace" name="sex" id="sex" value="P" <?php if ($sex=='P'): ?>
                  <?php echo "checked"; ?>
                <?php endif; ?>>
                <span class="lbl middle">Perempuan</span>
              </label>
            </div>
          </div>
        </div>

        <div class="profile-info-row">
          <div class="profile-info-name">Alamat</div>
          <div class="profile-info-value">
            <input type="text" name="alamat" id="alamat" class="col-sm-9" value="<?php echo $alamat;?>">
          </div>
        </div>

        <div class="profile-info-row">
          <div class="profile-info-name">Kota</div>
          <div class="profile-info-value">
            <input type="text" name="kota" id="kota" class="col-sm-4" value="<?php echo $kota;?>">
          </div>
        </div>

        <div class="profile-info-row">
          <div class="profile-info-name">Telp</div>
          <div class="profile-info-value">
            <input type="text" name="hp" id="hp" class="col-sm-3" value="<?php echo $hp;?>">
          </div>
        </div>

        <div class="profile-info-row">
          <div class="profile-info-name">E-Mail</div>
          <div class="profile-info-value">
            <input type="email" name="email" id="email" class="col-sm-5" value="<?php echo $email;?>">
          </div>
      </div>
    </div>
    <div class="modal-content">

      <div class="modal-footer center" align="center">

        <a href="<?php echo site_url('mahasiswa/view');?>" class="btn btn-danger btn-sm">
          <i class="fa fa-chevron-circle-left"></i>
          Kembali
        </a>
        <a href="<?php echo site_url('mahasiswa/tambah');?>" class="btn btn-info btn-sm">
          <i class="fa fa-plus-circle"></i>
          Tambah
        </a>
        <button type="button" name="simpan" id="simpan" class="btn btn-primary btn-sm">
          <i class="fa fa-check"></i>
          Simpan
        </button>

      </div>
    </div>
    </form>
  </div>
</div>



<script type="text/javascript">

  $(document).ready(function() {

    $('.date-picker').datepicker({
      autoclose:true
    }).next().on(ace.click_event,function(){
      $(this).prev().focus();
    });

    // $.ajax({
    //   url: '<?php //echo site_url('mahasiswa/edit');?>',
    //   type: 'GET',
    //   dataType: 'json',
    //   cache:false,
    //   data:data,
    //   success:function(data){
    //     $('#alamat').val(data.alamat);
    //   }
    // });


    $('#simpan').click(function(event) {
      /* Act on the event */
      var isiForm = $('#myForm').serialize();
      if (!$('#nama_mhs').val()) {
        $.gritter.add({
          title:'Peringatan !!',
          text:'Field Nama lengkap Tidak boleh kosong',
          class_name:'gritter-error'
        });
        return false;
        $('#nama_mhs').focus();
      }
      if (!$('#tempat_lahir').val() || !$('#tgl_lahir').val()) {
        $.gritter.add({
          title:'Peringatan !!',
          text:'Field Tempat & Tanggal lahir Tidak boleh kosong',
          class_name:'gritter-error'
        });
        return false;
        $('#tempat_lahir').focus();
      }
      if (!$('input[name=sex]:checked').val()) {
        $.gritter.add({
          title:'Peringatan !!',
          text:'Field Jenis Kelamin Tidak boleh kosong',
          class_name:'gritter-error'
        });
        return false;
      }

      $.ajax({
        url: '<?php echo site_url('mahasiswa/simpan')?>',
        type: 'POST',
        data: isiForm,
        cache:false,
        success:function(data){
          swal({
            title:'Info',
            text:data,
            icon:'success',
          }).then((isConfirm)=>{
            if (isConfirm) {
              // location.reload();
            }
          });
        }
      });


    });
  });
</script>

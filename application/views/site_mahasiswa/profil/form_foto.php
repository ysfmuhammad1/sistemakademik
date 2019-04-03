<div class="row-fluid">
  <div class="span12">
    <form class="form-foto" id="form-foto" action="<?php echo site_url('site_mahasiswa/profil/simpan_foto');?>" method="POST" enctype="multipart/form-data">
      <div class="profile-user-info">
        <div class="profile-info-row">
          <div class="profile-info-name"> Upload File Foto</div>
          <div class="profile-info-value">
            <input type="file" name="gambar" id="gambar" value="<?php echo $nama_lengkap; ?>">
          </div>
        </div>
      </div>

      <div class="form-action center">
        <button type="submit" name="upload_foto" id="upload_foto" class="btn btn-mini btn-primary"><i class="fa fa-cloud-upload bigger-120"></i> Upload Foto</button>
      </div>

    </form>
  </div>
</div>
<!-- <div class="row-fluid">
  <div class="col-sm-4">
    <div class="widget-box">
      <div class="widget-header">
        <h4 class="widget-title">Pilih Foto</h4>
      </div>
      <div class="widget-body">
        <div class="widget-main">
          <div class="form-group">
            <div class="col-xs-12">
              <input type="file" id="id-input-file-2" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-12">
              <input multiple="" type="file" id="id-input-file-3" />
            </div>
          </div>

          <label>
            <input type="checkbox" name="file-format" id="id-file-format" class="ace" />
            <span class="lbl"> Allow only images</span>
          </label>
        </div>
      </div>
    </div>
  </div>
</div> -->

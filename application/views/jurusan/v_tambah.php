
<form class="form-horizontal" method="POST" action="<?php echo site_url('jurusan/act_tambah');?>">

  <div class="control-group">
    <label class="control-label">Kode Prodi</label>
      <div class="controls">
        <input type="text" name="kd_prodi" id="kd_prodi" class="span1" required="">
      </div>
  </div>

  <div class="control-group">
    <label class="control-label">Program Studi</label>
      <div class="controls">
        <input type="text" name="prodi" id="prodi" class="span4" required="">
      </div>
  </div>

  <div class="control-group">
    <label class="control-label">Singkatan</label>
      <div class="controls">
        <input type="text" name="singkat" id="singkat" class="span1" required="">
      </div>
  </div>

  <div class="control-group">
    <label class="control-label">Ketua Prodi</label>
      <div class="controls">
        <input type="text" name="kaprodi" id="kaprodi" class="span4" required="">
      </div>
  </div>


  <div class="control-group">
    <label class="control-label">NIDN</label>
      <div class="controls">
        <input type="text" name="nidn" id="nidn" class="span3" required="">
      </div>
  </div>

  <div class="control-group">
    <label class="control-label">Akreditasi</label>
      <div class="controls">
        <select class="span2" name="akreditasi" id="akreditasi" required="">
          <option value="">--Pilih--</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="Proses Akreditasi">Proses Akreditasi</option>
        </select>
      </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-small" style="width:7%;">
      <a href="<?php echo site_url('jurusan')?>" class="btn btn-danger btn-small" style="width:7%;">Batal</a>
    <!--<button type="submit" class="btn btn-primary btn-small" name="simpan">Simpan</button>-->
    </div>
  </div>

</form>
